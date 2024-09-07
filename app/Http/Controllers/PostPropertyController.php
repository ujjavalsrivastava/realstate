<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use Auth;
use JWTAuth;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use App\Models\PaymentDetails;
use App\Models\ProDescriptionModel;
use App\Models\ProFeatureModel;
use App\Models\ProFeatureMasterModel;
use App\Models\RealPerameterModel;
use App\Models\ResComDetailModel;
use App\Models\FavoriteProModel;
use App\Models\ReviewModel;
use App\Models\ProMediaModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\User;

class PostPropertyController extends Controller
{
    function postProperty(){
        $getfeatureMasters = ProFeatureMasterModel::get();
        $getProTypes = RealPerameterModel::where('controle_code','PRO_TYPE')->get();
        $getResComTypes = RealPerameterModel::where('controle_code','RES_COM_TYPE')->get();
        $countries = CountryModel::get();
        return view('back.postProperty', compact('getfeatureMasters','getProTypes','getResComTypes','countries'));
    }

    // for dropdown
    function showResComDestail($id){
        $res_comm = ResComDetailModel::where('real_per_code', $id)->get();
        return response()->json([
            'status'=>'200',
            'data' => $res_comm,
          ]);
    }

    function showState($id){
        $state = StateModel::where('country_id', $id)->get();
        return response()->json([
            'status'=>'200',
            'data' => $state,
          ]);
    }

    function showCity($id){
        $city = CityModel::where('state_id', $id)->get();
        return response()->json([
            'status'=>'200',
            'data' => $city,
          ]);
    }

    public function proPostDes(Request $request)
    {
     // DB::beginTransaction();
       try{
        $validator = Validator::make($request->all(), 
                    [ 
                        'pro_title' => 'required',
                        'pro_description' => 'required',
                        'pro_type' => 'required',
                        'res_com_type' => 'required',
                        'res_com_detail' => 'required',
                        'price' => 'required',
                        'area_sq' => 'required',
                        'address' => 'required',
                        'city' => 'required',
                        'state' => 'required',
                        'country' => 'required',
                        'age' => 'required',
                        'name' => 'required|max:50',
                        'username' => 'required',
                        'email' => 'required|email',
                        'phone' => 'required|min:10|max:11',
                        'images.*' => 'required|mimes:jpg,jpeg,png|max:2048'
                    ]);  
            if ($validator->fails()) {  
               return response()->json(['error'=>$validator->errors()->first()], 401); 
            } 

            $success = true;
            $error = "Payment Failed!";
    
            if (empty($request->razorpay_payment_id) === false) {
                $api = new Api(Config("values.razorpayKey"), Config("values.razorpaySecret"));
                try {
                    $attributes = [
                        'razorpay_order_id' => $request->razorpay_order_id,
                        'razorpay_payment_id' => $request->razorpay_payment_id,
                        'razorpay_signature' => $request->razorpay_signature
                    ];
                    $api->utility->verifyPaymentSignature($attributes);
                } catch (SignatureVerificationError $e) {
                    $success = false;
                    $error = 'Razorpay Error : ' . $e->getMessage();
                }
            }
    
            if ($success === true) {
            $user = Auth::user();
            if ($request->file('video')) {
                $filename = uniqid() . '.' . $request->file('video')->getClientOriginalExtension();
                    $path = url('videos/'.$filename);
                    $uploade_path = public_path('videos');
                    $request->file('video')->move($uploade_path,$filename);
              }
            $findCity = CityModel::where('id',$request->city)->first()->city;
            $add = $request->address.' '.$findCity;
            $map = FindLatLong($add);
        
            $address = $map[0];
            $lat = $map[1];
            $lng = $map[2];        

            $pro_des = new ProDescriptionModel();
            $pro_des->user_id = $user->id;
            $pro_des->pro_title = $request->pro_title;
            $pro_des->pro_description = $request->pro_description;
            $pro_des->pro_type = $request->pro_type;
            $pro_des->res_com_type = $request->res_com_type;
            $pro_des->res_com_detail = $request->res_com_detail;
            $pro_des->area_sq = $request->area_sq;
            $pro_des->room = $request->room;
            $pro_des->bathroom = $request->bathroom;
            $pro_des->price = $request->price;
            $pro_des->city = $request->city;
            $pro_des->address = @$address;
            $pro_des->state = $request->state;
            $pro_des->country = $request->country;
            $pro_des->google_map_lat = @$lat;
            $pro_des->google_map_log = @$lng;
            $pro_des->age = $request->age;
            $pro_des->bathroom = $request->bathroom;
            $pro_des->name = $request->name;
            $pro_des->username = $request->username;
            $pro_des->email = $request->email;
            $pro_des->phone = $request->phone;
            @$pro_des->video = @$path;
            $pro_des->save();

            $payment = PaymentDetails::where('razorpay_order_id',$request->razorpay_order_id)->first();
            $payment->razorpay_payment_id = $request->razorpay_payment_id;
            $payment->razorpay_signature = $request->razorpay_signature;
            $payment->post_id = $pro_des->id;
            $payment->status = 'Success';
            $payment->save();
            
            // feature 
            if(!empty($request->feature_id)){
                foreach ($request->feature_id as $item) {
                    $feature= ProFeatureModel::insert(['feature_id' => $item,
                    'pro_des_id' => $pro_des->id]);
                }
            }
             
        // Loop through each image and store it
        if(!empty($request->file('images'))){
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = url('public/images/'.$filename);
                $uploade_path = public_path('images');
                $image->move($uploade_path,$filename);
                $imageFile = ProMediaModel::insert(['file_name' => $filename,'file_path' => $path,
                    'pro_des_id' => $pro_des->id]);
                }
        }
            return response()->json([
                'status'=>'200',
                'message'=>'Data save successfully',
                'success' => true,
              ]);

            } else {
                // Update database with error data
                // Redirect to payment page with error
                // Pass $error along with route
                return response()->json(['message' => 'Field Payment'], 400);
            }    
            //DB::commit();
        }catch(\Exception $e){
           // DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 400); 
        }
    }



    function getProperty($id){
        $pro = ProDescriptionModel::with('getUser','getProType','getResComType','getResComDetails','getProFeature','getMedia','getCountry','getState','getCity')->where('id',$id)->first();
        $similarPro = ProDescriptionModel::with('getUser','getProType','getResComType','getResComDetails','getProFeature','getMedia','getCountry','getState','getCity')->where('city',$pro->city)->where('state',$pro->state)->limit(3)->get();
        $images = ProMediaModel::where('pro_des_id',$id)->get();
        $reviewCount = ReviewModel::where('pro_des_id',$id)->count();
        $features = ProFeatureModel::with('getProFeatureMaster')->where('pro_des_id',$id)->get();
        $letistPro = ProDescriptionModel::with('getUser','getProType','getResComType','getResComDetails','getProFeature','getMedia','getCountry','getState','getCity')->orderBy('id','DESC')->limit(3)->get();
        $saidFeatures = ProDescriptionModel::with('getMedia','getCountry')->whereHas('getProFeature', function ($query){
            $query->where('feature_id' ,'>',0);
        })->orderBy('id','DESC')->limit(10)->get();
        return view('front.property', compact('pro','images','features','letistPro','saidFeatures','similarPro','reviewCount'));
    }
    


    function fatchPost(Request $request){
        $getPost = ProDescriptionModel::with('getFavProAuth','getUser','getProType','getResComType','getResComDetails','getProFeature','getMedia','getCountry','getState','getCity')->paginate(6);
        
        return view('ajax.post', compact('getPost'));
    }


    function propertyForSale(Request $request)
    { 
        $f = $request->feature;
        $getPost = ProDescriptionModel::with('getUser','getProType','getResComType','getResComDetails','getProFeature','getMedia','getCountry','getState','getCity');
       if(!empty($f)){
        $getPost->whereHas('getProFeature', function ($query) use($f) {
            $feature = explode(',',$f);
            if(count($feature) > 0){
                $query->whereIn('feature_id', $feature);
            }  
       });
       }
       
        if(!empty($request->country)){
            $getPost->where('country',$request->country);
        }
        
        if(!empty($request->state)){
            $getPost->where('state',$request->state);
        }
        if(!empty($request->city)){
            $getPost->where('city',$request->city);
        }

        if(!empty($request->pro_type)){
            $getPost->where('pro_type',$request->pro_type);
        }
        if(!empty($request->room)){
            $getPost->where('room',$request->room);
        }
        if(!empty($request->fromarea) && !empty($request->toarea)){
            $fromArea = str_replace(' sq ft','',$request->fromarea) ;
            $toArea = str_replace(' sq ft','',$request->toarea) ;
            $getPost->whereBetween('area_sq',[(int)$fromArea,(int)$toArea]);
        }
        if(!empty($request->fromprice) && !empty($request->toprice)){
            $fromPrice = str_replace('₹','',$request->fromprice) ;
            $fromPrice = str_replace(',','',$fromPrice) ;
            $toPrice = str_replace('₹','',$request->toprice) ;
            $toPrice = str_replace(',','',$toPrice) ;
            $getPost->whereBetween('area_sq',[(int)$fromPrice,(int)$toPrice]);
        }
       
        
        $getPostcount=$getPost->count();

        $letistPro = ProDescriptionModel::with('getUser','getProType','getResComType','getResComDetails','getProFeature','getMedia','getCountry','getState','getCity')->orderBy('id','DESC')->limit(3)->get();
        $getCountries = CountryModel::get();
        $getStates = StateModel::get();
        $getCities = CityModel::get();
        $featureMaster = ProFeatureMasterModel::get();
        return view('front.propertyforsale',compact('getPostcount','letistPro','getStates','getCities','getCountries','featureMaster'));
    }

    function searchPos(Request $request){
        $f = $request->feature;
        $getPost = ProDescriptionModel::with('getUser','getProType','getResComType','getResComDetails','getProFeature','getMedia','getCountry','getState','getCity');
       if(!empty($f)){
        $getPost->whereHas('getProFeature', function ($query) use($f) {
            $feature = explode(',',$f);
            if(count($feature) > 0){
                $query->whereIn('feature_id', $feature);
            }  
       });
       }
       
        if(!empty($request->country)){
            $getPost->where('country',$request->country);
        }
        
        if(!empty($request->state)){
            $getPost->where('state',$request->state);
        }
        if(!empty($request->city)){
            $getPost->where('city',$request->city);
        }

        if(!empty($request->pro_type)){
            $getPost->where('pro_type',$request->pro_type);
        }
        if(!empty($request->room)){
            $getPost->where('room',$request->room);
        }
        if(!empty($request->fromarea) && !empty($request->toarea)){
            $fromArea = str_replace(' sq ft','',$request->fromarea) ;
            $toArea = str_replace(' sq ft','',$request->toarea) ;
            $getPost->whereBetween('area_sq',[(int)$fromArea,(int)$toArea]);
        }
        if(!empty($request->fromprice) && !empty($request->toprice)){
            $fromPrice = str_replace('₹','',$request->fromprice) ;
            $fromPrice = str_replace(',','',$fromPrice) ;
            $toPrice = str_replace('₹','',$request->toprice) ;
            $toPrice = str_replace(',','',$toPrice) ;
           
            $getPost->whereBetween('price',[(int)$fromPrice,(int)$toPrice]);
        }
         if(!empty($request->sort)){
            $toArray = explode("_",$request->sort);
            $val = $toArray[0];
            $key = $toArray[1];
            if($key == 'price'){
                $getPost->orderBy('price', $val);
            }
            if($key == 'sqft'){
                $getPost->orderBy('area_sq', $val);
            }
            if($key == 'sent'){
                $getPost->orderBy('id', 'DESC');
            }
            // if($key == 'price'){
            //     $getPost->orderBy('price', $val);
            // }
            // if($key == 'price'){
            //     $getPost->orderBy('price', $val);
            // }
           
        }
      
        $getPost=$getPost->paginate(6);
        return view('ajax.search', compact('getPost'));
    }

    // for favorite property
    function favoritePro(Request $request){
        $user = Auth::user();
        try{
            if(FavoriteProModel::where('pro_des_id',$request->pro_des_id)->where('user_id',$user->id)->exists()){
                FavoriteProModel::where('pro_des_id',$request->pro_des_id)->where('user_id',$user->id)->delete();
                return response()->json(['status'=>'200','msg' => 'delete successfully','flag'=>'N']);
            }else{
                $fav = new FavoriteProModel();
                $fav->user_id = $user->id;
                $fav->pro_des_id = $request->pro_des_id;
                $fav->fav_pro = $request->fav_pro;
                $fav->save();
                return response()->json(['status'=>'200','msg' => 'added successfully','flag'=>'Y']);
            }
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 400); 
        }
    }
}

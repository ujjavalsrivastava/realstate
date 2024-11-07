<?php

namespace App\Http\Controllers\api;
use DB;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\ProDescriptionModel;
use App\Models\ProFeatureModel;
use App\Models\ProFeatureMasterModel;
use App\Models\ProMediaModel;
use App\Models\FavoriteProModel;
use App\Models\User;
use App\Models\Menu;
use App\Models\Chats;
use App\Models\ChatPost;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsSendMail;
use App\Models\ContactUsModel;
use App\Models\CountryModel;
use App\Models\PaymentDetails;
use App\Models\RealPerameterModel;
use App\Models\StateModel;
use App\Models\CityModel;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Events\MessageSent;
use Razorpay\Api\Api;

class HomeController extends Controller
{

    public function orderGenerate(Request $request)
    {
        $validator = Validator::make($request->all(), 
                    [ 
                        'price' => 'required',
                         ]);  
            if ($validator->fails()) {  
               return response()->json(['message'=>$validator->errors()], 400); 
            } 
            $api = new Api(Config("values.razorpayKey"), Config("values.razorpaySecret"));
            $orderData  = $api->order->create([
                'receipt' => '111',
                'amount' => $request->price * 100,
                'currency' => 'INR'
            ]); // Creates Razorpay order

        $data = [
            "key"               => Config("values.razorpayKey"),
            "amount"            => $request->price,
            "order_id"          => $orderData['id'],
        ];
        $user = JWTAuth::parseToken()->authenticate();
        $payment =  new PaymentDetails();
        $payment->user_id = $user->id;
        $payment->price = $request->price;
        $payment->razorpay_order_id = $orderData['id'];
        $payment->save();
        return response()->json($data, 200);
    }


    function savePayment(Request $request){
     
        try{
            $user = JWTAuth::parseToken()->authenticate();
        $payment =  new PaymentDetails();
        $payment->type = 'verified';
        $payment->user_id = $user->id;
        $payment->price = 500;
        $payment->razorpay_order_id = $request->razorpay_order_id;
        $payment->razorpay_payment_id = $request->razorpay_payment_id;
        $payment->razorpay_signature = $request->razorpay_signature;
        $payment->status = 'Success';
        $payment->save();
        $updateUser = User::where('id',$user->id)->first();
        $updateUser->user_verified = true;
        $updateUser->save();
        return response()->json(['msg' => 'Payment Successfuly'], 200);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 400); 
        }
    }

    public function proDescription(Request $request)
    {
        // dd($request->user_id);
       // DB::beginTransaction();
       try{
        $validator = Validator::make($request->all(), 
                    [ 
                        'pro_title' => 'required',
                        'pro_description' => 'required',
                        'pro_type' => 'required',
                        'res_com_type' => 'required',
                        'res_com_detail' => 'required',
                        'room' => 'required',
                        'price' => 'required',
                        'area_sq' => 'required',
                        'address' => 'required',
                        'city' => 'required',
                        'state' => 'required',
                        'country' => 'required',
                        'age' => 'required',
                        'bathroom' => 'required',
                        'name' => 'required|max:50',
                        'username' => 'required',
                        'email' => 'required|email',
                        'phone' => 'required|min:10|max:11',
                        'images.*' => 'required|mimes:jpg,jpeg,png|max:2048',
                        'vedio' => 'file|mimes:mp4,mov,avi,flv|max:2048',
                        'price' => 'required',
                        'razorpay_order_id' => 'required',
                        'razorpay_payment_id' => 'required',
                        'razorpay_signature' => 'required',
                    ]);  
            if ($validator->fails()) {  
               return response()->json(['message'=>$validator->errors()], 400); 
            } 
            $user = JWTAuth::parseToken()->authenticate();

            if ($request->file('video')) {
                $filename = uniqid() . '.' . $request->file('video')->getClientOriginalExtension();
                    $path = url('videos/'.$filename);
                    $uploade_path = public_path('videos');
                    $request->file('video')->move($uploade_path,$filename);
            }
              $findCity = CityModel::where('id',$request->city)->first()->city;
              $add = $request->address.' '.$findCity;
             // list[$address,$lat,$lng] = FindLatLong($add);
              $map = FindLatLong($add);
            $address = $map[0];
            $lat = $map[1];
            $lng = $map[2];

            $pro_des = new ProDescriptionModel();
            // video
            $pro_des->user_id = $user->id;
            $pro_des->pro_title = $request->pro_title;
            $pro_des->pro_description = $request->pro_description;
            $pro_des->pro_type = $request->pro_type;
            $pro_des->res_com_type = $request->res_com_type;
            $pro_des->res_com_detail = $request->res_com_detail;
            $pro_des->area_sq = $request->area_sq;
            $pro_des->room = $request->room;
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
             foreach ($request->feature_id as $item) {
                $feature= ProFeatureModel::insert(['feature_id' => $item,
                'pro_des_id' => $pro_des->id]);
            }
        // Loop through each image and store it
        if(!empty($request->file('images'))){
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = url('images/'.$filename);
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
                'data' => $pro_des
            ]);
            //DB::commit();
        }catch(\Exception $e){
           // DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 400); 
        }
    }

    public function paymentDetail(Request $request){
        try{
            $validator = Validator::make($request->all(), 
            [ 
                'price' => 'required',
                'razorpay_order_id' => 'required',
                'razorpay_payment_id' => 'required',
                'razorpay_signature' => 'required',
            ]);  
                if ($validator->fails()) {  
                    return response()->json(['message'=>$validator->errors()], 400); 
                } 

            $user = JWTAuth::parseToken()->authenticate();

            $payment =  new PaymentDetails();
            $payment->user_id = $user->id;
            $payment->price = $request->price;
            $payment->razorpay_order_id = $request->razorpay_order_id;
            $payment->razorpay_payment_id = $request->razorpay_payment_id;
            $payment->razorpay_signature = $request->razorpay_signature;
            $payment->save();
            return response()->json(['msg' => 'Payment Successfuly'], 200);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 400); 
        }
    }

    public function proDetail(Request $request){
        $proDetail = ProDescriptionModel::with('getUser','getProType','getResComType','getResComDetails','getProFeature','getMedia','getCountry','getState','getCity','getFavPro')->where('id',$request->id)->first();
        return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $proDetail]);
    }

    //get property Description
    public function getProDescription(){
        $user = JWTAuth::parseToken()->authenticate();
        $pro_description_list = ProDescriptionModel::where('user_id','!=',$user->id)->with('getUser','getProType','getResComType','getResComDetails','getProFeature','getMedia','getCountry','getState','getCity','getFavPro')->paginate(9);
        return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $pro_description_list]);
    }

    // get property feature master
    public function getProFeatureMas(Request $request){
        $feature_list = ProFeatureMasterModel::get();
        return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $feature_list]);
    }

    public function postContatctUs(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [ 
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
        ]);  
        if ($validator->fails()) {  
        return response()->json(['error'=>$validator->errors()->first()], 401); 
        }   
        try{
            $user = new ContactUsModel();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->message = $request->message;
            $user->email = $request->email;
            $user->save();
            $data=Mail::to('alphaland553@gmail.com')->send(new ContactUsSendMail($user));
            return response()->json(['status'=>'200','msg'=>'Save Successfully!','data' => $user]); 
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 400); 
        }
   }

    public function getAboutUs()
    {
        $about = RealPerameterModel::where('controle_code','About_Us')->get();
        return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $about]);
    }

    public function termsConditions()
    {
        $terms = RealPerameterModel::where('controle_code','Terms_Condition')->get();
        return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $terms]);
    }

    // Data search
    public function getSearchProperty(Request $request)
    {
        $data = ProDescriptionModel::with('getUser','getProType','getResComType','getResComDetails','getProFeature','getMedia','getCountry','getState','getCity','getFavPro')->where('pro_type','like',"%{$request->pro_type}%");
                if($request->country){
                    $data->where('country','like',"%{$request->country}%");
                }
                if($request->state){
                    $data->where('country','like',"%{$request->country}%");
                }
                if($request->city){
                    $data->where('city','like',"%{$request->city}%");
                }
                if(!empty($request->room)){
                    $data->where('room',$request->room);
                }
                if(!empty($request->res_com_detail)){
                    $data->where('res_com_detail','like',"%{$request->res_com_detail}%");
                }
                if(!empty($request->fromprice) && !empty($request->toprice)){
                    $fromPrice = str_replace('₹','',$request->fromprice) ;
                    $fromPrice = str_replace(',','',$fromPrice) ;
                    $toPrice = str_replace('₹','',$request->toprice) ;
                    $toPrice = str_replace(',','',$toPrice) ;
                    $data->whereBetween('price',[(int)$fromPrice,(int)$toPrice]);
                }
                $search = $data->paginate(6);
                return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $search]);
    }

     function getCountry(){
        $country = CountryModel::get();
        return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $country]);
     }
     
     function getState(Request $request){
        $state = StateModel::where('country_id',$request->country_id)->get();
        return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $state]);
     }

     function getCity(Request $request){
        $city = CityModel::where('state_id',$request->state_id)->get();
        return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $city]);
     }

     function menu(){
        $menu = Menu::get();
        return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $menu]);
     }

     // for favorite property
     function favoritePro(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        try{
            if(FavoriteProModel::where('pro_des_id',$request->pro_des_id)->where('user_id',$user->id)->exists()){
                FavoriteProModel::where('pro_des_id',$request->pro_des_id)->where('user_id',$user->id)->delete();
                return response()->json(['status'=>'200','msg' => 'delete successfully','flag'=>'N']);
            }else{
                $fav = new FavoriteProModel();
                $fav->user_id = $user->id;
                $fav->pro_des_id = $request->pro_des_id;
                $fav->fav_pro = 'Y';
                $fav->save();
                return response()->json(['status'=>'200','msg' => 'added successfully','flag'=>'Y']);
            }   
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 400); 
        }
    }

    // chat
    function sendMsg(Request $request){
        $validator = Validator::make($request->all(), 
        [ 
            'receiver_id' => 'required',
            'message' => 'required',
             ]);  
        if ($validator->fails()) {  
        return response()->json(['message'=>$validator->errors()], 400); 
        } 
        $sender = JWTAuth::parseToken()->authenticate();  // User A (the sender)
        $receiver = User::find($request->receiver_id);  // User B (the receiver)
      
        $message = $request->message;

        if (!$receiver) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        Chats::create([
            'sender_id' => $sender->id,
            'receiver_id' => $receiver->id,
            'msg' => $message,
        ]);

        // Broadcast the event to User B's private channel
        broadcast(new MessageSent($message, $sender,$receiver))->toOthers();
        return response()->json(['status'=>'200','msg' => 'Save successfully']);
        // return ['status' => 'Message Sent!'];
    }

    

      // Display chat between two users
      public function showChat($recieverId)
      {
          $user = JWTAuth::parseToken()->authenticate();
          $senderId = $user->id;
          $messages = Chats::where(function ($query) use ($senderId,$recieverId) {
              $query->where('sender_id',  $senderId)->where('receiver_id', $recieverId);
          })->orWhere(function ($query) use ($senderId,$recieverId) {
              $query->where('sender_id', $recieverId)->where('receiver_id',  $senderId);
          });
          
          $update =  $messages->update(['view'=>1]);

          $messages = $messages->orderBy('created_at', 'asc')->get();
          return response()->json(['status'=>'200','msg' => 'Fatch successfully','data'=> $messages]);
        //   return view('ajax.message', compact('messages'));
      }

      function sendMsgPost(Request $request){
        $validator = Validator::make($request->all(), 
        [ 
            'post_id' => 'required',
            'reciever_id' => 'required',
            'message' => 'required',
             ]);  
        if ($validator->fails()) {  
        return response()->json(['message'=>$validator->errors()], 400); 
        } 
        $sender = JWTAuth::parseToken()->authenticate();  // User A (the sender)
        $recieverId = $request->reciever_id; // User B (the receiver)
      
        $message = $request->message;

      

        ChatPost::create([
            'sender_id' => $sender->id,
            'receiver_id' =>  $recieverId,
            'post_id' => $request->post_id,
            'msg' => $message,
        ]);

        // Broadcast the event to User B's private channel
       // broadcast(new MessageSent($message, $sender,$receiver))->toOthers();
        return response()->json(['status'=>'200','msg' => 'Save successfully']);
      }

      function showChatPost($postId,$userId){
        
        $recieverId = $userId;
        $user = JWTAuth::parseToken()->authenticate();
        $senderId = $user->id;
        $messages = ChatPost::where('post_id',$postId)->where(function ($query) use ($senderId,$recieverId,$postId) {
            $query->where('post_id',$postId)->where('sender_id',  $senderId)->where('receiver_id', $recieverId);
        })->orWhere(function ($query) use ($senderId,$recieverId,$postId) {
            $query->where('post_id',$postId)->where('sender_id', $recieverId)->where('receiver_id',  $senderId);
        });
        
        $update =  $messages->update(['view'=>1]);

        $messages = $messages->orderBy('created_at', 'asc')->get();
        return response()->json(['status'=>'200','msg' => 'Fatch data successfully','data'=> $messages]);

      }

      function userListPost($postId){
        $user = JWTAuth::parseToken()->authenticate();
        $senderId = $user->id;
        $recieverId = ProDescriptionModel::where('id',$postId)->first()->user_id; // User B (the receiver)
      
      $data =  ChatPost::where('post_id',$postId)->with('sender')->groupby('sender_id')->select('sender_id',DB::raw('count("sender_id") as msgcount'))->get();
      $userList = [];
      foreach($data as $row){
        if($row->sender_id != $senderId)
        $userList[] = $row;
       }
      return response()->json(['status'=>'200','msg' => 'Fatch successfully','data'=> $userList]);

      }
    
}
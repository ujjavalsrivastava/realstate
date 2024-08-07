<?php

namespace App\Http\Controllers\api;

use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
use App\Models\ProDescriptionModel;
use App\Models\ProFeatureModel;
use App\Models\ProFeatureMasterModel;
use App\Models\ProMediaModel;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function proDescription(Request $request)
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
                        'room' => 'required',
                        'price' => 'required',
                        'area_sq' => 'required',
                        'address' => 'required',
                        'city' => 'required',
                        'state' => 'required',
                        'country' => 'required',
                        'google_map_lat' => 'required',
                        'google_map_log' => 'required',
                        'age' => 'required',
                        'bathroom' => 'required',
                        'name' => 'required|max:50',
                        'username' => 'required',
                        'email' => 'required|email',
                        'phone' => 'required|min:10|max:11',
                        'feature_id' => 'required',
                        'feature_id.*' => 'required',
                        'images.*' => 'required|mimes:jpg,jpeg,png|max:2048'
                    ]);  
            if ($validator->fails()) {  
               return response()->json(['error'=>$validator->errors()], 401); 
            } 
            $user = JWTAuth::parseToken()->authenticate();
        // dd($user->id);
            $pro_des = new ProDescriptionModel();
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
            $pro_des->address = $request->address;
            $pro_des->state = $request->state;
            $pro_des->country = $request->country;
            $pro_des->google_map_lat = $request->google_map_lat;
            $pro_des->google_map_log = $request->google_map_log;
            $pro_des->age = $request->age;
            $pro_des->bathroom = $request->bathroom;
            $pro_des->name = $request->name;
            $pro_des->username = $request->username;
            $pro_des->email = $request->email;
            $pro_des->phone = $request->phone;
            $pro_des->save();
            // feature 
             foreach ($request->feature_id as $item) {
                $feature= ProFeatureModel::insert(['feature_id' => $item,
                'pro_des_id' => $pro_des->id]);
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
                'data' => $pro_des
            ]);
            //DB::commit();
        }catch(\Exception $e){
           // DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 400); 
        }
    }

    //get property Description
    public function getProDescription(){
        $pro_description_list = ProDescriptionModel::with('getUser','getProType','getResComType','getResComDetails','getProFeature','getMedia')->get();
        return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $pro_description_list]);
    }

    // get property feature master
    public function getProFeatureMas(Request $request){
        $feature_list = ProFeatureMasterModel::get();
        return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $feature_list]);
    }

    // Data search
    public function getSearchProperty(Request $request){
        $data = ProDescriptionModel::where('pro_type','like',"%{$request->pro_type}%");
                if($request->res_com_type){
                    $data->where('res_com_type','like',"%{$request->res_com_type}%");
                }
                if($request->res_com_detail){
                    $data->where('res_com_detail','like',"%{$request->res_com_detail}%");
                }

                $search = $data->get();
                return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $search]);

    }
}
<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use Hash;
use App\Models\User;
use App\Models\ResComDetailModel;
use App\Models\OtpVerifyModel;
use App\Models\ProDescriptionModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpSendMail;
use App\Mail\ContactUsSendMail;
use App\Models\CountryModel;
use App\Models\NewslettersModel;
use App\Models\ContactUsModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\PlanModel;
use App\Models\ProFeatureMasterModel;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    function getLogin(){
        return view('admin.login');
    }

    function loginPost(Request $request){
        $validator = Validator::make($request->all(), 
                      [ 
                      'email' => 'required|email',
                      'password' => 'required', 
                     ]);  
            if ($validator->fails()) {  
               return response()->json(['error'=>$validator->errors()->first()], 401); 
            }  
            $credentials = $request->only('email', 'password','type');
            if (Auth::attempt($credentials)){
                // Authentication passed
                return response()->json(['status'=> 200,'success'=> 'Login Successfuly']); 
            }else{
                return response()->json(['status'=> 201, 'error'=> 'Invalid  credentials ']); 
            } 
    }

    function logout(){
        Auth::logout();
        return redirect('admin/login');
    }

    function home(){
        return view('admin.home');
    }

    function paymentList(){
        $user = Auth::user();
        $data = ProDescriptionModel::with('getUser','getProType','getResComType','getResComDetails','getProFeature','getMedia','getCountry','getState','getCity','getReview');
        $data->whereHas('getPayment', function($query) use($user){
            $query->whereNotNull('post_id');
            if($user->type != 'Admin'){
                $query->where('user_id',$user->id);
            }
         }); 
        $getPosts = $data->get();
        // with('getUser','getProType','getResComType','getResComDetails','getProFeature','getMedia','getCountry','getState','getCity','getReview');
        return view('admin.payment',compact('getPosts'));
    }

    function subPlan(){
        $getPlan = PlanModel::get();
        return view('admin.subplan',compact('getPlan'));
    }

    function subPlanDelete($id){
        $record = PlanModel::find($id);
        if ($record) {
            $record->delete();
            return response()->json(['status'=> 200,'success' => 'Record deleted successfully']);
        }
    
        return response()->json(['status'=> 201,'error' => 'Record not found']);
    }

    function editSubPlan($id){
        $data = PlanModel::where('id',$id)->first();
        return view('admin.editsubplan',compact('data'));
    }

    function updateSubPlan(Request $request, $id){
        $validator = Validator::make($request->all(), 
        [ 
        'plan' => 'required',
        'description' => 'required', 
        'price' => 'required'
       ]);  
        if ($validator->fails()) {  
        return response()->json(['error'=>$validator->errors()->first()], 401); 
        }  
        try{
            $update = PlanModel::where('id',$id)->update([
                'plan' => $request->plan,
                'description' => $request->description,
                'price' => $request->price,
            ]);
    
            return response()->json(['status'=> 200,'success' => 'Record Update successfully']);
        }catch(\Exception $e){
            return response()->json(['status'=>'400', 'message' => $e->getMessage()]); 
        }
    }

}
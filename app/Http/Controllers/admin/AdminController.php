<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use Hash;
use App\Models\User;
use App\Models\ResComDetailModel;
use App\Models\PaymentDetails;
use App\Models\RefundModel;
use App\Models\OtpVerifyModel;
use App\Models\ProDescriptionModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpSendMail;
use App\Mail\RefundSendMail;
use App\Models\CountryModel;
use App\Models\NewslettersModel;
use App\Models\ContactUsModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\PlanModel;
use App\Models\ProFeatureMasterModel;
use App\Models\FavoriteProModel;

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

    function favoriteList(){

        $user = Auth::user();
        $data = FavoriteProModel::with('getProperty','getProperty.getMedia')->where('user_id',$user->id);
        
        $getPosts = $data->get();
        
        // with('getUser','getProType','getResComType','getResComDetails','getProFeature','getMedia','getCountry','getState','getCity','getReview');
        return view('admin.fav',compact('getPosts'));

    }

    function getChangePassword(){
        return view('admin.changepassword');
    }

    function uploadprofile(){
        return view('admin.upload');
    }

    function uploadPic(request $request){

   try{
        $user = Auth::user();
        $user = User::where('id', $user->id)->first();

        if ($request->file('profile')) {
            $filename = uniqid() . '.' . $request->file('profile')->getClientOriginalExtension();
                $path = url('pic/'.$filename);
                $uploade_path = public_path('pic');
                $request->file('profile')->move($uploade_path,$filename);
                $user->profile = url('pic/').'/'.$filename;
          }
          $user->save();

          return response()->json(['status'=> 200,'success' => 'Profile  Update successfully']);

        }catch(\Exception $e){
            return response()->json(['status'=>'400', 'message' => $e->getMessage()]); 
        }
    }
    function changePass(Request $request){

        $validator = Validator::make($request->all(), 
        [ 
        'old_pass' => 'required',
      

        'new_pass' => 'min:6|required_with:conf_pass|same:conf_pass',
        'conf_pass' => 'required|min:6'

       ]);  
        if ($validator->fails()) {  
        return response()->json(['error'=>$validator->errors()->first()], 401); 
        }  
        $user = Auth::user();
        if(\Hash::check($request->old_pass, $user->password)){
         User::where('email',$user->email)->update([
            'password'=> \Hash::make($request->new_pass)
         ]);           
         return response()->json(['status'=> 200,'success' => 'Record Update successfully']);
        }else{
            return response()->json(['status'=> 201,'error' => 'invalid password']);
        }
    }

    function verified(){
        $detail =  PaymentDetails::where('type','verified')->get();
       
        return view('admin.bluetick',compact('detail'));
    }

    function refund(){
        return view('back.refund');
    }

    function saveRefund(Request $request){
        $validator = Validator::make($request->all(), 
        [ 
        'first_name' => 'required',
        'email' => 'required|email',
        'last_name' => 'required',
        'image' => 'required|file|mimes:jpg,png,jpeg|max:2048',
        ]);  
        if ($validator->fails()) {  
        return response()->json(['error'=>$validator->errors()->first()], 401); 
        }   
        // $imagePath = $request->file('image')->store('refundScreeenShort', 'public');
        $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
        $imagePath = $request->file('image')->storeAs('refundScreeenShort', $fileName, 'public');
        $user = Auth::user();
        try{
            $userRefund = new RefundModel();
            $userRefund->first_name = $request->first_name;
            $userRefund->last_name = $request->last_name;
            
            $userRefund->email = $request->email;
            $userRefund->image = $imagePath;
            $userRefund->created_by = $user->id;
            $userRefund->save();
            $data=Mail::to('info@alphaland.in')->send(new RefundSendMail($userRefund));
            return response()->json(['status'=> 200,'success'=> 'Send Successfuly']); 
        }catch(\Exception $e){
            return response()->json(['status'=>'400', 'message' => $e->getMessage()]); 
        }
    }

}
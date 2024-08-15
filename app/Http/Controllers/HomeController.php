<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;

use App\Models\User;
use App\Models\ResComDetailModel;
use App\Models\OtpVerifyModel;
use App\Models\ProDescriptionModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpSendMail;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;

class HomeController extends Controller
{
    function index(){
        $getCountries = CountryModel::get();
        $getStates = StateModel::get();
        $getCities = CityModel::get();
         return view('front.index',compact('getCountries','getStates','getCities'));
    }

    function aboutUs(){
        return view('front.aboutus');
    }

    function showlogin(){
        return view('login');   
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
           // dd($request->all());
            $credentials = $request->only('email', 'password');
            //dd($credentials);
            
            if (Auth::attempt($credentials)) {
                // Authentication passed
                return response()->json(['status'=> 200,'success'=> 'Login Successfuly']); 
            }else{
                return response()->json(['status'=> 201, 'error'=> 'Invalid  credentials ']); 
            } 
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }

    function register(Request $request) {
        $validator = Validator::make($request->all(), 
        [ 
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@#$%&*!]).*$/', 
        'mobile' => 'required|unique:users|max:10', 
        'type' => 'required',
        'pro_type' => 'required',
        'address' => 'required',
        'pin_no' => 'required|min:6|max:8'
      ]);  
        if ($validator->fails()) {  
        return response()->json(['error'=>$validator->errors()->first()], 401); 
        }   
        try{
       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->mobile = $request->mobile;
       $user->type = $request->type;
       $user->pro_type = $request->pro_type;
       $user->address = $request->address;
       $user->pin_no = $request->pin_no;
       $user->password = bcrypt($request->password);
       $user->save();

       $credentials = $request->only('email', 'password');
            //dd($credentials);
            if (Auth::attempt($credentials)) {
                // Authentication passed
                return response()->json(['status'=> 200,'message'=> 'Login Successfuly']); 
            }else{
                return response()->json(['status'=> 201, 'message'=> 'Invalid  credentials ']); 
            }
       return response()->json(['success' => true,'message' => 'Registered successfully'], 200);
    }catch(\Exception $e){
        return response()->json(['status'=>'400', 'message' => $e->getMessage()]); 
    }
   }
 // Otp send on mail 
 public function sendMail(Request $request){
    try{
    $validator = Validator::make($request->all(), 
    [ 
    'email' => 'required|email',
    
   ]);  
    if ($validator->fails()) {  
    return response()->json(['error'=>$validator->errors()], 401); 
    }   

    $details = [
        'otp' => rand(1000,9999)  
    ];
  // $data=Mail::to($request->input('email'))->send(new OtpSendMail($details));
  $delete = OtpVerifyModel::where('email',$request->email)->delete();
    $getotp = OtpVerifyModel::insert([
        'email' => $request->input('email'),
        'otp' => $details['otp']
    ]);
    return response()->json([ 'status'=>'200', 'message' => 'OTP Send on Your Email '], 200);
}catch(\Exception $e){
    return response()->json(['status'=>'400', 'message' => $e->getMessage()]); 
}
}

 // otp verify 
 public function verifyOtp(Request $request){
    try{
        $validator = Validator::make($request->all(), 
        [ 
        'email' => 'required',
        'otp' => 'required'
        
       ]);  
        if ($validator->fails()) {  
        return response()->json(['error'=>$validator->errors()], 401); 
        }   
        
        $verify = OtpVerifyModel::where('email',$request->email)->where('otp',$request->otp)->exists();
        
       if($verify){
        $ldate = date('Y-m-d H:i:s');
        $delete = OtpVerifyModel::where('email',$request->email)->delete();
        User::where('email',$request->email)->update([
            'email_verified_at' => $ldate
        ]);
        return response()->json(['status'=>'200','message' => 'OTP Verify successfully'], 200);
       }else{
        return response()->json(['status'=>'400','message' => 'Invelid OTP']);
       }
        
    }catch(\Exception $e){
        return response()->json(['status'=>'400','message' => $e->getMessage()]); 
    }
}
    function getReletiondata($id){
       $data =  ResComDetailModel::where('real_per_code',$id)->get();
       return view('ajax.radio',compact('data'));
    }
}

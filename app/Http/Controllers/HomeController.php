<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use App\Models\ResComDetailModel;
use App\Models\OtpVerifyModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpSendMail;


class HomeController extends Controller
{
    function index(){
        return view('front.index');
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
                     'email' => 'required|email|unique:users',
                   ]);  
        if ($validator->fails()) {  
              return response()->json(['error'=>$validator->errors()], 401); 
           }   
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
       return response()->json(['success' => true,'data' => $user
       ], 200);
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
   $data=Mail::to($request->input('email'))->send(new OtpSendMail($details));
    $getotp = OtpVerifyModel::insert([
        'email' => $request->input('email'),
        'otp' => $details['otp']
    ]);
    return response()->json(['message' => 'Email sent successfully'], 200);
}catch(\Exception $e){
    return response()->json(['message' => $e->getMessage()], 400); 
}
}
    function getReletiondata($id){
       
       $data =  ResComDetailModel::where('real_per_code',$id)->get();
       return view('ajax.radio',compact('data'));
    }
}

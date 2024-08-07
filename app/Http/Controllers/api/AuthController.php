<?php

namespace App\Http\Controllers\api;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
use App\Models\RealPerameterModel;
use App\Models\ResComDetailModel;
use App\Models\OtpVerifyModel;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpSendMail;

class AuthController extends Controller
{
    public $token = true;

    public function register(Request $request)
    {
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

        if ($this->token) {
            return $this->login($request);
        }

        return response()->json([
            'success' => true,
            'data' => $user
        ], Response::HTTP_OK);
    }

    // login 
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $jwt_token = null;
       
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], Response::HTTP_UNAUTHORIZED);
        }
            return response()->json([
            'success' => true,
            'token' => $jwt_token,
           
           
        ]);
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
       Mail::to($request->input('email'))->send(new OtpSendMail($details));
        $getotp = OtpVerifyModel::insert([
            'email' => $request->input('email'),
            'otp' => $details['otp']
        ]);
        return response()->json(['message' => 'Email sent successfully'], 200);
    }catch(\Exception $e){
        return response()->json(['message' => $e->getMessage()], 400); 
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
            return response()->json(['message' => 'OTP Verify successfully'], 200);
           }else{
            return response()->json(['message' => 'Invelid OTP'], 400);
           }
            
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 400); 
        }
    }

    // change password
    public function changePassword(Request $request){
        try{
            $validator = Validator::make($request->all(), 
            [ 
            'email' => 'required|email',
            'password' => 'required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@#$%&*!]).*$/',
           ]);  
            if ($validator->fails()) {  
            return response()->json(['error'=>$validator->errors()], 401); 
            }   
            $changepass = User::where('email',$request->email)->update([
                'password' => bcrypt($request->password),
            ]);
            return response()->json(['message' => 'Password Change Successfully'], 200);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 400); 
        }
    }

    // logout 
    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
        try {
            JWTAuth::invalidate($request->token);
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // type: owner/ borcker/ customer
    public function getType(Request $request)
    {
        $type_list = RealPerameterModel::where('controle_code','TYPE')->get();
        return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $type_list]);
    }

    // Property type: sell/ rent 
    public function getProType(Request $request)
    {
        $pro_type_list = RealPerameterModel::where('controle_code','PRO_TYPE')->get();
        return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $pro_type_list]);
    }

    // Residentail Commercial Type and details List Get
    function getResComTypeDetails(request $request){
        $res_type_list = RealPerameterModel::with('getResComDetails')->where('controle_code','RES_COM_TYPE')->get();
        return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $res_type_list]);
    }
}

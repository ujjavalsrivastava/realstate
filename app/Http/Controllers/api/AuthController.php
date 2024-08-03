<?php

namespace App\Http\Controllers\api;

use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
use App\Models\RealPerameterModel;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

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
                    //   'c_password' => 'required|same:password', 
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

    public function getType(Request $request)
    {
     
        

        $type_list = RealPerameterModel::where('controle_code','TYPE')->get();
        return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $type_list]);
    }

    public function getProType(Request $request)
    {

        $pro_type_list = RealPerameterModel::where('controle_code','PRO_TYPE')->get();
        return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $pro_type_list]);
    }
}

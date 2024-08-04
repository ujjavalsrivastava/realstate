<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use App\Models\ServiceDetails;

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
 
    function serviceDetails($category , $subcategory){
        // $details =  ServiceDetails::first();
        // return view('front.servicedetails',compact('details'));
    }
}

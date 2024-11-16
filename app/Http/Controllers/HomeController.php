<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use Hash;
use App\Models\User;
use App\Models\ResComDetailModel;
use App\Models\Chats;
use App\Models\ChatPost;

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
use App\Models\ProFeatureMasterModel;
use App\Events\MessageSent;
class HomeController extends Controller
{

// chat
    function sendMsg(Request $request){

        $sender = Auth::user();  // User A (the sender)
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
    
        return ['status' => 'Message Sent!'];
    }
    function sendMsgPost(Request $request){

        $sender = Auth::user();  // User A (the sender)
        $receiver = User::find($request->receiver_id);  // User B (the receiver)
      
        $message = $request->message;

        if (!$receiver) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        ChatPost::create([
            'sender_id' => $sender->id,
            'receiver_id' => $receiver->id,
            'post_id' => $request->post_id,
            'msg' => $message,
        ]);

        // Broadcast the event to User B's private channel
       // broadcast(new MessageSent($message, $sender,$receiver))->toOthers();
       return response()->json(['status'=> 200,'message'=> 'Message Sent']); 
        //return ['status' => 'Message Sent!'];
    }

    

      // Display chat between two users
      public function showChat($userId)
      {
          $recieveDetails = User::find($userId); // Current logged-in user
          $messages = Chats::with(['sender','receiver'])->where(function ($query) use ($userId) {
              $query->where('sender_id', auth()->id())->where('receiver_id', $userId);
          })->orWhere(function ($query) use ($userId) {
              $query->where('sender_id', $userId)->where('receiver_id', auth()->id());
          });
          
          $update =  $messages->update(['view'=>1]);

          $messages = $messages->orderBy('created_at', 'asc')->get();
         
  
          return view('ajax.message', compact('messages','recieveDetails'));
      }

      public function userChatList(Request $request){
        $user = Auth::user(); 
        $chatUser = User::where('id','!=',$user->id);
        // if($user->type != 'Admin'){
            
        //     $chatUser->where('type','Admin');
        // }
        if(!empty($request->search)){
            
            $chatUser->where('name', 'like', "%$request->search%");

        }
        $chatUser = $chatUser->limit(10)->get();

        $message = view('ajax.chatuserlist', compact('chatUser'))->render();
        $selfChatCount  =  Chats::where('receiver_id', auth()->id())->where('view',0)->count();
        return response()->json(['status'=> 200,'success'=> 'fetch Successfuly','message' =>$message, 'selfChatCount' => $selfChatCount]); 
        
      }

    //   end chat

    function index()
    {
       $getPost = ProDescriptionModel::with('getUser','getProType','getResComType','getResComDetails','getProFeature','getMedia','getCountry','getState','getCity')->orderBy('plan','DESC')->orderBy('id','DESC')->limit(10)->get();
        $getCountries = CountryModel::get();
        $getStates = StateModel::get();
        $getCities = CityModel::get();
        $featureMaster = ProFeatureMasterModel::get();
        $propertyType =  ResComDetailModel::all();
        $popularPlace =  DB::select('select count(city) as cntcount,city as cityId,(select city from cities where id = cityId) cityname  from pro_description group by city limit 8');

        return view('front.index',compact('getCountries','getStates','getCities','featureMaster','popularPlace','getPost','propertyType'));
    }

    

    function aboutUs(){
        return view('back.aboutus');
    }

    function policy(){
        return view('back.policy');
    }
    
    function contactUs(){
        return view('back.contactus');
    }

    function postContactUs(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [ 
        'first_name' => 'required',
        'email' => 'required|email',
        'last_name' => 'required',
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
            return response()->json(['status'=> 200,'success'=> 'Send Successfuly']); 
            
        }catch(\Exception $e){
            return response()->json(['status'=>'400', 'message' => $e->getMessage()]); 
        }
   }

    function termsConditions()
    {
        return view('back.termsconditions');
    }

    function showForgetPass(){
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
            return response()->json(['success' => 'Password Change Successfully'], 200);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 400); 
        }
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
                user::where('email',$request->email)->update(['online' => 1,'updated_at'=>date('Y-m-d h:i:s')]);
                return response()->json(['status'=> 200,'success'=> 'Login Successfuly']); 
            }else{
                return response()->json(['status'=> 201, 'error'=> 'Invalid  credentials ']); 
            } 
    }

    function logout(){

        user::where('id',auth()->id())->update(['online' => 0,'updated_at'=>date('Y-m-d h:i:s')]);
        Auth::logout();
        return redirect('/');
    }

    function register(Request $request)
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
        'pin_no' => 'required|min:6|max:8',
        'profile' => 'required|mimes:jpg,jpeg,png|max:2048'
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
       if ($request->file('profile')) {
        $filename = uniqid() . '.' . $request->file('profile')->getClientOriginalExtension();
            $path = url('pic/'.$filename);
            $uploade_path = public_path('pic');
            $request->file('profile')->move($uploade_path,$filename);
            $user->profile = url('pic/').'/'.$filename;
      }
       $user->save();

       $credentials = $request->only('email', 'password');
            //dd($credentials);
            if (Auth::attempt($credentials)) {
                // Authentication passed
                return response()->json(['status'=> 200,'success'=> 'Login Successfuly']); 
            }else{
                return response()->json(['status'=> 201, 'success'=> 'Invalid  credentials ']); 
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
    !empty($request->type)?   [ 
        'email' => 'required|email|unique:users',
        
       ] :    [ 
        'email' => 'required|email',
        
       ]
   );  
    if ($validator->fails()) {  
    return response()->json(['error'=>$validator->errors()->first()], 401); 
    }   

    $details = [
        'otp' => rand(1000,9999)  
    ];
  $data=Mail::to($request->input('email'))->send(new OtpSendMail($details));
  $delete = OtpVerifyModel::where('email',$request->email)->delete();
    $getotp = OtpVerifyModel::insert([
        'email' => $request->input('email'),
        'otp' => $details['otp']
    ]);
    return response()->json([ 'status'=>'200', 'success' => 'OTP Send on Your Email '], 200);
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
        return response()->json(['status'=>'200','success' => 'OTP Verify successfully'], 200);
       }else{
        return response()->json(['status'=>'400','message' => 'Invelid OTP']);
       }
        
    }catch(\Exception $e){
        return response()->json(['status'=>'400','message' => $e->getMessage()]); 
    }
}

function changePassword(Request $request){

try{

    $validator = Validator::make($request->all(), 
    [ 
    'forgetemail' => 'required|email',
    'forgetpasword' => 'required|min:6',
    'cforgetpasword' => 'required_with:forgetpasword|same:forgetpasword|min:6'
    
   ]);  
    if ($validator->fails()) {  
    return response()->json(['error'=>$validator->errors()->first()], 401); 
    }

    User::where('email',$request->email)->update([
        'password' => Hash::make($request->forgetpasword)
    ]);
    return response()->json(['status'=>'200','success' => 'changed  successfully'], 200);

}catch(\Exception $e){
    return response()->json(['status'=>'400','message' => $e->getMessage()]); 
}

}

function passChange(Request $request){

    try{
        $validator = Validator::make($request->all(), 
        [ 
        'currentpass' => 'required|email',
        'newpass' => 'required|min:6',
        'cpass' => 'required_with:newpass|same:newpass|min:6'
        
       ]);  
        if ($validator->fails()) {  
        return response()->json(['error'=>$validator->errors()->first()], 401); 
        }
    
        User::where('password',$request->currentpass)->update([
            'password' => Hash::make($request->forgetpasword)
        ]);
        return response()->json(['status'=>'200','success' => 'changed  successfully'], 200);
    
    }catch(\Exception $e){
        return response()->json(['status'=>'400','message' => $e->getMessage()]); 
    }
    
    }
    function getReletiondata($id){
       $data =  ResComDetailModel::where('real_per_code',$id)->get();
       return view('ajax.radio',compact('data'));
    }

    function forget(Request $request){
        try{
          //  dd($request->all());
            if(!empty($request->type)){
                $validator = Validator::make($request->all(), 
                [ 
                'email' => 'required|email|exists:users,email',
                
               ]);

            }else{
                $validator = Validator::make($request->all(), 
                [ 
                'email' => 'required|email',
                
               ]);

            }
             
            if ($validator->fails()) {  
            return response()->json(['error'=>$validator->errors()->first()], 401); 
            }   
        
            $details = [
                'otp' => rand(1000,9999)  
            ];
           $data=Mail::to($request->input('email'))->send(new OtpSendMail($details));
          $delete = OtpVerifyModel::where('email',$request->email)->delete();
            $getotp = OtpVerifyModel::insert([
                'email' => $request->input('email'),
                'otp' => $details['otp']
            ]);
            return response()->json([ 'status'=>'200', 'success' => 'OTP Send on Your Email '], 200);
        }catch(\Exception $e){
            return response()->json(['status'=>'400', 'message' => $e->getMessage()]); 
        }

    }

    function newsSubscription(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), 
            [ 
            'email' => 'required|email',  
            ]);  
            if ($validator->fails()) {  
            return response()->json(['error'=>$validator->errors()->first()], 401); 
            }
            $user = new NewslettersModel();
            $user->email = $request->email;
            $user->save();
            return response()->json(['status'=>'200','success' => 'Add  Successfully'], 200);
        }catch(\Exception $e){
            return response()->json(['status'=>'400','message' => $e->getMessage()]); 
        }
    }

    function getEmiCalculater(){
        return view('back.emicalculater');
    }
}

<?php

namespace App\Http\Controllers\api;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
use App\Models\ProDescriptionModel;
use App\Models\ResComDetailModel;
use App\Models\OtpVerifyModel;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpSendMail;

class PostController extends Controller
{
    function UserPost()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $post = ProDescriptionModel::with('getUser','getProType','getResComType','getResComDetails','getProFeature','getMedia','getCountry','getState','getCity','getFavPro')->where('user_id',$user->id)->get();
        return response()->json(['status'=>'200','msg'=>'Fetch Successfully!','data' => $post]);
    }
}
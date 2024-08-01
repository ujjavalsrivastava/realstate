<?php

namespace App\Http\Controllers\api;

use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\CategoryModel;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

class HomeController extends Controller

{
    public function getCategroys(Request $request)
    {
      
        $validation=Validator::make($request->all(),[
            'token'=>'required',
        ]);
        $category = CategoryModel::with('getSubctegory')->where('status','Active')->get();
        return response()->json(['category' => $category]);
    }
}
<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use DB;
use Auth;
use JWTAuth;
use App\Models\ReviewModel;
use App\Models\ProDescriptionModel;
use App\Models\ReviewMediaModel;

class ReviewController extends Controller
{
    public function postReview(Request $request){
       $validator = Validator::make($request->all(), [
           'first_name' => 'required',
           'last_name' => 'required',
           'email' => 'required|email',
           'reating' => 'required',
           'review' => 'required',
           'images.*' => 'mimes:jpg,jpeg,png|max:500'
       ]);
       if ($validator->fails()) {
           return response()->json(['errors' => $validator->errors()->first()], 422);
       }
            $review = new ReviewModel();
            $review->pro_des_id = $request->pro_des_id;
            $review->first_name = $request->first_name;
            $review->last_name = $request->last_name;
            $review->email = $request->email;
            $review->reating = $request->reating;
            $review->review = $request->review;
            $review->save();
            
     // Loop through each image and store it
     if(!empty($request->file('images'))){
        foreach ($request->file('images') as $image) {
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $path = url('public/reviewimages/'.$filename);
            $uploade_path = public_path('reviewimages');
            $image->move($uploade_path,$filename);
            $imageFile = ReviewMediaModel::insert(['file_name' => $filename,'file_path' => $path,
                'review_id' => $review->id]);
            }
    }
        return response()->json(['success' => 'Review Add Successful']);
   }

   function showReviewList($id){
   $datas = ProDescriptionModel::where('id',$id)->with('getReview')->orderBy('id','DESC')->first();
    return view('ajax.reviewlist',compact('datas'));
}
}

<?php
use App\Models\FavoriteProModel;
use Auth;



function getFavirateUser($postId)
{
  $user = Auth::user();
  return FavoriteProModel::where('pro_des_id', '=', $postId)->where('user_id',$user->id)->exists();

}

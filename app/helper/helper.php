<?php
use App\Models\FavoriteProModel;


// function getFavirateUser($postId)
// {
//   $user = Auth::user();
//   return FavoriteProModel::where('pro_des_id', '=', $postId)->where('user_id',$user->id)->exists();

// }
function timeDifference($timestamp)
{
    $otherDate=$timestamp;
    $now=@date("Y-m-d H:i:s");

    $secondDifference=@strtotime($now)-@strtotime($otherDate);
    $extra="";
    if ($secondDifference == 2592000) { 
    // months 
    $difference = $secondDifference/2592000; 
    $difference = round($difference,0); 
    if ($difference>1) { $extra="s"; } 
    $difference = $difference." month".$extra." ago"; 
}else if($secondDifference > 2592000)
    {$difference=timestamp($timestamp);} 
elseif ($secondDifference >= 604800) { 
    // weeks 
    $difference = $secondDifference/604800; 
    $difference = round($difference,0); 
    if ($difference>1) { $extra="s"; } 
    $difference = $difference." week".$extra." ago"; 
} 
elseif ($secondDifference >= 86400) { 
    // days 
    $difference = $secondDifference/86400; 
    $difference = round($difference,0); 
    if ($difference>1) { $extra="s"; } 
    $difference = $difference." day".$extra." ago"; 
} 
elseif ($secondDifference >= 3600) { 
    // hours 

    $difference = $secondDifference/3600; 
    $difference = round($difference,0); 
    if ($difference>1) { $extra="s"; } 
    $difference = $difference." hour".$extra." ago"; 
} 
elseif ($secondDifference < 3600) { 
    // hours 
    // for seconds (less than minute)
    if($secondDifference<=60)
    {       
        if($secondDifference==0)
        {
            $secondDifference=1;
        }
        if ($secondDifference>1) { $extra="s"; }
        $difference = $secondDifference." second".$extra." ago"; 

    }
    else
    {

$difference = $secondDifference/60; 
        if ($difference>1) { $extra="s"; }else{$extra="";}
        $difference = round($difference,0); 
        $difference = $difference." minute".$extra." ago"; 
    }
} 

$FinalDifference = $difference; 
return $FinalDifference;
}

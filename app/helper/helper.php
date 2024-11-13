<?php
use App\Models\FavoriteProModel;
use App\Models\Chats;

// function getFavirateUser($postId)
// {
//   $user = Auth::user();
//   return FavoriteProModel::where('pro_des_id', '=', $postId)->where('user_id',$user->id)->exists();

// }
function timeDifference($timestamp)
{
    $otherDate = $timestamp;
    $now = @date("Y-m-d H:i:s");

    $secondDifference = @strtotime($now) - @strtotime($otherDate);
    $extra = "";
    
    if ($secondDifference >= 2592000) { 
        // months 
        $difference = $secondDifference / 2592000; 
        $difference = round($difference, 0); 
        if ($difference > 1) { 
            $extra = "s"; 
        }
        $difference = $difference . " month" . $extra . " ago"; 
    } else if ($secondDifference >= 604800) { 
        // weeks 
        $difference = $secondDifference / 604800; 
        $difference = round($difference, 0); 
        if ($difference > 1) { 
            $extra = "s"; 
        }
        $difference = $difference . " week" . $extra . " ago"; 
    } elseif ($secondDifference >= 86400) { 
        // days 
        $difference = $secondDifference / 86400; 
        $difference = round($difference, 0); 
        if ($difference > 1) { 
            $extra = "s"; 
        }
        $difference = $difference . " day" . $extra . " ago"; 
    } elseif ($secondDifference >= 3600) { 
        // hours 
        $difference = $secondDifference / 3600; 
        $difference = round($difference, 0); 
        if ($difference > 1) { 
            $extra = "s"; 
        }
        $difference = $difference . " hour" . $extra . " ago"; 
    } elseif ($secondDifference < 3600) { 
        // minutes and seconds
        if($secondDifference <= 60) {       
            if($secondDifference == 0) {
                $secondDifference = 1;
            }
            if ($secondDifference > 1) { 
                $extra = "s"; 
            }
            $difference = $secondDifference . " second" . $extra . " ago"; 
        } else {
            $difference = $secondDifference / 60; 
            if ($difference > 1) { 
                $extra = "s"; 
            } else {
                $extra = "";
            }
            $difference = round($difference, 0); 
            $difference = $difference . " minute" . $extra . " ago"; 
        }
    }

    return $difference;
}


function FindLatLong($addres){
//dd('https://api.opencagedata.com/geocode/v1/json?q='.$addres.'&key=495d36494a16466bb91bd5858c097051');
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.opencagedata.com/geocode/v1/json?q='.urlencode($addres).'&key=495d36494a16466bb91bd5858c097051',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    
    $res= curl_exec($curl);
    
    curl_close($curl);

    $response = json_decode($res);

    $adress =$response->results[0]->formatted;
    $lat =$response->results[0]->geometry->lat;
    $log =$response->results[0]->geometry->lng;
    return [$adress,$lat,$log];
   
}


function UserUnseenMsg($userId){
    $count = Chats::where(function ($query) use ($userId) {
    $query->where('view',0)->where('sender_id', $userId)->where('receiver_id', auth()->id());
    })->count();
    return $count;
}

function output($string, $maxLen) {
    $name = '';
    $name .= substr($string, 0, $maxLen); 
    if(strlen($string) > $maxLen){
        $name .= ' ...';
    }
    return $name;
}

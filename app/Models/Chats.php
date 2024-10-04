<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RealPerameterModel;
use App\Models\ResComDetailModel;
use App\Models\ProMediaModel;
use App\Models\User;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\ReviewModel;
use App\Models\PaymentDetails;
use JWTAuth;
use Auth;
use App\Models\ProFeatureModel;
use App\Models\FavoriteProModel;

class Chats extends Model
{
    use HasFactory;

    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'msg',
        'view',
      

    ];
   protected $table='chat';

   public function sender()
   {
       return $this->belongsTo(User::class, 'sender_id');
   }

   public function receiver()
   {
       return $this->belongsTo(User::class, 'receiver_id');
   }

}
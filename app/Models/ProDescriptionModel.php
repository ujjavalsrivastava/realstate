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
use JWTAuth;
use Auth;
use App\Models\ProFeatureModel;
use App\Models\FavoriteProModel;

class ProDescriptionModel extends Model
{
    use HasFactory;

    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'pro_title',
        'pro_description',
        'pro_type',
        'res_com_type',
        'res_com_detail',
        'room',
        'price',
        'area_sq',
        'address',
        'city',
        'state',
        'country',
        'google_map_lat',
        'google_map_log',
        'age',
        'bathroom',
        'name',
        'username',
        'email',
        'phone',
        'video'

    ];
   protected $table='pro_description';

   public function getUser()
    {
        return $this->hasMany(User::class, 'id','user_id');
    }

   public function getProType()
    {
        return $this->hasMany(RealPerameterModel::class, 'code','pro_type');
    }

    public function getResComType()
    {
        return $this->hasMany(RealPerameterModel::class, 'code','res_com_type');
    }
    public function getResComDetails()
    {
        return $this->hasMany(ResComDetailModel::class, 'real_per_code','res_com_detail');
    }
    public function getProFeature()
    {
        return $this->hasMany(ProFeatureModel::class, 'pro_des_id','id')->with('getProFeatureMaster');
    }
    public function getMedia()
    {
        return $this->hasMany(ProMediaModel::class, 'pro_des_id','id');
    }
    public function getCountry()
    {
        return $this->belongsTo(CountryModel::class, 'country','id');
    }
    public function getState()
    {
        return $this->belongsTo(StateModel::class, 'state','id');
    }
    public function getCity()
    {
        return $this->belongsTo(CityModel::class, 'city','id');
    }
    public function getFavPro()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            $userId = $user->id;
         
        } catch (\Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                $userId = null;
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                $userId = null;
            }else{
                $userId = null;
            }
        }
        
        return $this->hasOne(FavoriteProModel::class, 'pro_des_id','id')->where('user_id',@$userId);
    }

    public function getFavProAuth()
    {
        try {
            $user = Auth::user();
            $userId = $user->id;
         
        } catch (\Exception $e) {
           
                $userId = null;
            
        }
        
        return $this->hasOne(FavoriteProModel::class, 'pro_des_id','id')->where('user_id',@$userId);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RealPerameterModel;
use App\Models\ResComDetailModel;
use App\Models\ProMediaModel;
use App\Models\User;
use App\Models\ProFeatureModel;

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
        'phone'

    ];
   protected $table='pro_description';

   public function getUser()
    {
        return $this->hasMany(User::class, 'id','user_id');
    }

   public function getProType()
    {
        return $this->hasMany(RealPerameterModel::class, 'id','pro_type');
    }

    public function getResComType()
    {
        return $this->hasMany(RealPerameterModel::class, 'id','res_com_type');
    }
    public function getResComDetails()
    {
        return $this->hasMany(ResComDetailModel::class, 'id','res_com_detail');
    }
    public function getProFeature()
    {
        return $this->hasMany(ProFeatureModel::class, 'pro_des_id','id')->with('getProFeatureMaster');
    }
    public function getMedia()
    {
        return $this->hasMany(ProMediaModel::class, 'pro_des_id','id');
    }
}

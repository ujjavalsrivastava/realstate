<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProDescriptionModel;

class FavoriteProModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pro_des_id',
        'fav_pro',
        ];
    protected $table='favorite_pro';
    
    public function getProperty()
    {
        return $this->hasOne(ProDescriptionModel::class, 'id','pro_des_id');
    }
}

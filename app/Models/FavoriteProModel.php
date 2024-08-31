<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteProModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pro_des_id',
        'fav_pro',
        ];
    protected $table='favorite_pro';
}

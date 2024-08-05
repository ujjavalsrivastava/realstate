<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

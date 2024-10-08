<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ResComDetailModel;

class RealPerameterModel extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'controle_code',
        'code',
        'description'
        
    ];
   protected $table='real_perameter';

   public function getResComDetails()
    {
        return $this->hasMany(ResComDetailModel::class, 'real_per_code','code');
    }
}

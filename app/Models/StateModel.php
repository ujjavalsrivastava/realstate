<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CityModel;

class StateModel extends Model
{
    use HasFactory;

    protected $table = 'states';
    
    protected $fillable = [
        'name',
        'country_id'
        
    ];

    public function getCity()
    {
        return $this->hasMany(CityModel::class, 'state_id','id');
    }
}

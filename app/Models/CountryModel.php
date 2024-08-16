<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StateModel;

class CountryModel extends Model
{
    use HasFactory;
    protected $table = 'countries';
    
    protected $fillable = [
        'countryCode',
        'name'
        
    ];

    public function getState()
    {
        return $this->hasMany(StateModel::class, 'country_id','id')->with('getCity');
    }
}

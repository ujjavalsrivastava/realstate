<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProFeatureMasterModel;

class ProFeatureModel extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pro_des_id',
        'feature_id'
    ];
   protected $table='pro_feature';

   public function getProFeatureMaster()
    {
        return $this->hasOne(ProFeatureMasterModel::class, 'id','feature_id');
    }
}

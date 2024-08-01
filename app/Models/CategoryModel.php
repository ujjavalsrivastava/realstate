<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubcategoryModel;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'sr_applications_category';
    
    function getSubctegory() {
        return $this->hasMany(SubcategoryModel::class,'application_cat_code','application_cat_code')->where('status','Active');
    }
}

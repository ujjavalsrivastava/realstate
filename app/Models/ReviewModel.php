<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReviewMediaModel;

class ReviewModel extends Model
{
    use HasFactory;

    protected $table = 'review';
    
    protected $fillable = [
        'pro_des_id',
        'first_name',
        'email',
        'last_name',
        'review',
        'reating'
    ];

    public function getReviewMedia()
    {
        return $this->hasMany(ReviewMediaModel::class, 'review_id','id');
    }
}

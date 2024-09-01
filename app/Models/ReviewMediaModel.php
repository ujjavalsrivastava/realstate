<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewMediaModel extends Model
{
    use HasFactory;

    protected $table = 'review_media';
    
    protected $fillable = [
        'review_id',
        'file_name',
        'file_path'   
    ];
}

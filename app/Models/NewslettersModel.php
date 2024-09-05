<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewslettersModel extends Model
{
    use HasFactory;

    protected $table = 'new_sletters';
    
    protected $fillable = [
        'email'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanModel extends Model
{
    use HasFactory;

    protected $table = 'plan';

    protected $fillable = [
        'plan',
        'price',
        'description'
    ];
}

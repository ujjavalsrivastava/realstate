<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubMenu;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    
    function getSubMenu() {
        return $this->hasMany(SubMenu::class)->where('status','Active');
    }
}

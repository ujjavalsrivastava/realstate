<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProDescriptionModel;
use App\Models\User;

class PaymentDetails extends Model
{
    use HasFactory;

    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'user_id',
        'price',
        'razorpay_order_id',
        'razorpay_payment_id',
        'razorpay_signature',
        'post_id',
        'sttaus',

    ];
   protected $table='payment_details';

   public function getUser()
    {
        return $this->hasMany(User::class, 'id','user_id');
    }

   public function getProDettails()
    {
        return $this->belongsTo(ProDescriptionModel::class, 'id','post_id');
    }

  
}

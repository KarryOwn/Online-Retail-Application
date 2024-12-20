<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_price', 'status', 'shipping_address'];

    public function user()
    {
        return $this->belongsTo(User::class);
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


}

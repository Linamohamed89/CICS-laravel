<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'city',
        'phone',
        'payment_method',
        'subtotal',
        'shipping',
        'total_amount',
    ];

    // علاقة الطلب مع العناصر
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}


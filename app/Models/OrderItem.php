<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_name',
        'quantity',
        'unit_price',
        'total_amount',
        'status',
        'stripe_token',
    ];

    // علاقة العنصر مع الطلب
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

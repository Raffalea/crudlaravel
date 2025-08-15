<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesOrderItem extends Model
{
    //
    protected $fillable = [
        'sales_order_id',
        'product_id',
        'quantity',
        'price',
    ];

    // Relasi ke SalesOrder
    public function salesOrder()
    {
        return $this->belongsTo(SalesOrder::class);
    }

    // Relasi ke Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

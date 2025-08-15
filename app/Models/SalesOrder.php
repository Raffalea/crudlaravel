<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    //
    protected $guarded = [];

    // Relasi ke SalesOrderItem
    public function items()
    {
        return $this->hasMany(SalesOrderItem::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'customer_id',
        'shipping_id',
        'order_code',
        'created_at',
        'order_date',
        'order_status'
    ];
    protected $primaryKey = 'order_id';
    protected $table = 'tbl_order';
}

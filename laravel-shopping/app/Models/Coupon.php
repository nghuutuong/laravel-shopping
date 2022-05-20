<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'coupon_name',
        'coupon_code',
        'coupon_times',
        'coupon_option',
        'coupon_value',
        'coupon_start',
        'coupon_end',
        'coupon_status',
        'coupon_used'
    ];
    protected $primaryKey = 'coupon_id';
    protected $table = 'tbl_coupon';
}

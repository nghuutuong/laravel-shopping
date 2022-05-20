<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_password',
        'customer_address',
        'customer_phone',
        'active_status',
        'dark_mode',
        'messenger_color'
    ];
    protected $primaryKey = 'customer_id';
    protected $table = 'tbl_customers';
    public function wishlist(){
        return $this->hasMany('App\Models\Wishtlist');
     }
}
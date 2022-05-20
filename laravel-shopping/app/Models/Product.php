<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; 
    protected $fillable = [
        'product_name',
        'category_id',
        'brand_id',
        'product_desc',
        'product_quantity',
        'product_sold',
        'product_content',
        'product_price',
        'price_cost',
        'product_image',
        'product_tags',
        'product_status'
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';
    public function comment(){
        return $this->hasMany('App\Models\Comment');
    }
    public function category(){
        return $this->beLongsTo('App\Models\Category','category_id');
    }
    public function brand(){
        return $this->beLongsTo('App\Models\Brand','brand_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'category_name',
        'category_desc',
        'meta_keyword',
        'slug_category_product',
        'category_status',
        'category_order'
    ];
    protected $primaryKey = 'category_id';
    protected $table = 'tbl_category_product';
    public function product(){
        return $this->hasMany('App\Models\Product');
    }
}

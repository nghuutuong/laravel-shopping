<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'cate_post_id',
        'post_title',
        'post_desc',
        'post_content',
        'post_meta_desc',
        'post_status',
        'post_image'
    ];
    protected $primaryKey = 'post_id';
    protected $table = 'tbl_posts';
    public function category_post(){
        return $this->belongsTo('App\Models\CategoryPost','cate_post_id');
    }
}

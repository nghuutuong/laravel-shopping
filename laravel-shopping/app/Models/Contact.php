<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'contact_info',
        'contact_map',
        'contact_fanpage',
        'contact_image'
    ];
    protected $primaryKey = 'contact_id';
    protected $table = 'tbl_contact';
}

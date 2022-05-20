<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatbot extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'question',
        'answer'
    ];
    protected $primaryKey = 'chat_id';
    protected $table = 'tbl_chatbot';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeship extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'fee_matp',
        'fee_maqh',
        'fee_xaid',
        'fee_feeship'
    ];
    protected $primaryKey = 'fee_id';
    protected $table = 'tbl_feeship';

    public function city(){
        return $this->beLongsTo('App\Models\City','fee_matp');
    }
    public function province(){
        return $this->beLongsTo('App\Models\Province','fee_maqh');
    }
    public function Wards(){
        return $this->beLongsTo('App\Models\Wards','fee_xaid');
    }
}

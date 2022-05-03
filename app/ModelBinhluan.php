<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelBinhluan extends Model
{
    protected $table = 'binhluan';
    public $timestamps=true;
    protected $fillable=[
        'ten_users','anh_users','noidung','id_bv','id_users','id_bl'
    ];
}

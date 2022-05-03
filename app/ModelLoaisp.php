<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelLoaisp extends Model
{
    protected $table = 'loaisp';
    public $timestamps=false;
    protected $fillable=[
       'ten_loai'
    ];
}

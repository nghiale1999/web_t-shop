<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelThuonghieu extends Model
{
    protected $table='thuonghieu';
    public $timestamps=false;
    protected $fillable=[
        'tenth'
    ];
}

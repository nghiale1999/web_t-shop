<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelQuocgia extends Model
{
    protected $table='quocgia';
    public $timestamps=false;
    protected $fillable=[
        'name'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelDgsao extends Model
{
    protected $table = 'dgsao';
    public $timestamps=false;
    protected $fillable=[
        'id_users','id_bv','sosao'
    ];
}

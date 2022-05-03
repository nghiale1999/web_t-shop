<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelLichsu extends Model
{
    protected $table = 'lichsu';
    public $timestamps=true;
    protected $fillable=[
       'tensp','soluong','gia','id_user','tennguoinhan', 'diachi', 'email', 'sdt', 'created_at'
    ];
}

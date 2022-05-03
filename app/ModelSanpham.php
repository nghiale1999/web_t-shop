<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelSanpham extends Model
{
    protected $table = 'sanpham';
    public $timestamps=false;
    protected $fillable=[
        'tensp','giasp','loaisp','soluong','thuonghieu','trangthaisp','giamgia','anh','mota','id_thuonghieu','id_loaisp','id_users'
    ];
}

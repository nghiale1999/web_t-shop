<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelFogotPassword extends Model
{
    protected $table = 'fogotpassword';
    public $timestamps = false;

    protected $fillable = ['user_id', 'email', 'token', 'ngaytao', 'ngayhethan'];
}

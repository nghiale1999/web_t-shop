<?php

namespace App\Http\Form;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class validateFogotPassword
{
    /**
     * validate
     *
     * @param \Illuminate\Http\Request $request
     */
  
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>['required','email','exists:users,email'],
            
        ],[
            'email.required' => 'Email khách hàng không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'email.exists' => 'Email chưa được đăng ký',
        ]);
        return $validator->validate();
    }
}
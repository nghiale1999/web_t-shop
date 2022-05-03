<?php

namespace App\Http\Form;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class validateResetPassword
{
    /**
     * validate
     *
     * @param \Illuminate\Http\Request $request
     */
  
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>['required', 'email', 'exists:users,email'],
            'password'=>['required', 'min:8', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
            'passwordcf' => ['required', 'same:password']
        ],[ 
            'email.required' => 'Email khách hàng không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'email.exists' => 'Email chưa được đăng ký',
            'password.required' => 'Mật khẩu khách hàng không được bỏ trống',
            'password.min' => 'Mật khẩu khách hàng ít nhất 8 ký tự',
            'password.regex' => 'Mật khẩu khách hàng không đúng định dạng',
            'passwordcf.required' => 'Mật khẩu xác nhận không được bỏ trống',
            'passwordcf.same' => 'Mật khẩu xác nhận không đúng',
        ]);
        return $validator->validate();
    }
}
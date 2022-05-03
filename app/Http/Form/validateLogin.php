<?php

namespace App\Http\Form;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class validateLogin
{
    /**
     * validate
     *
     * @param \Illuminate\Http\Request $request
     */
  
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>['required','email'],
            'password'=>['required','min:8','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/']
        ],[
            'email.required' => 'Email khách hàng không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu khách hàng không được bỏ trống',
            'password.min' => 'Mật khẩu khách hàng ít nhất 8 ký tự',
            'password.regex' => 'Mật khẩu khách hàng không đúng định dạng',
        ]);
        
       
        return $validator->validate();
    }

    
}
<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Form\AdminCustomValidator;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\UsersVerify;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\ModelFogotPassword;

class MemberController extends Controller
{ 
    public function __construct(AdminCustomValidator $form)
    {
        $this->form = $form;
    }
    public function register(Request $request)
    {
        if($request->isMethod('post')){    
            $this->form->validate($request, 'validateRegister');
            $file = $request->file('file');
            $anh = $file->getClientOriginalName();
            $data = new User;        
            $data->name = $request->name;
            $data->anh = $anh;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->capdo = '0';
            if($data->save()){
                $file->move('upload', $file->getClientOriginalName());
                $rand_token = openssl_random_pseudo_bytes(16);
                $token = bin2hex($rand_token);
                UsersVerify::create([
                'user_id' => $data->id, 
                'token' => $token
                ]);
                

                Mail::send('emailVerificationEmail', ['token' => $token], function($mail) use($request){
                    $mail->from('lenghiamailtest@gmail.com', 'nghiale');
                    $mail->to($request->email, $request->name);
                    $mail->subject('Email Verification Mail');
                });
                return redirect()->back()->with('success', 'Đăng ký thành công hãy kiểm tra mail của bạn');
            }else {
                return redirect()->back()->withErrors('Đăng ký thất bại');
             }
                
            
        }
        return view('member.register');
    }

    public function verifyAccount($token)
    {
        $verifyUser = UsersVerify::where('token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
        $daydie = Carbon::now();
        $time = $daydie->diffInDays($verifyUser->created_at);
        if(!is_null($verifyUser) ){
            if($time <= 1){
                $user = $verifyUser->user;
              
                if(!$user->email_verified_at) {
                    $verifyUser->user->email_verified_at = Carbon::now();
                    $verifyUser->user->save();
                    $message = "Your e-mail is verified. You can now login.";
                } else {
                    $message = "Your e-mail is already verified. You can now login.";
                }
            }
            
        }
  
      return redirect()->route('member.login')->with('message', $message);
    }

    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $this->form->validate($request, 'validateLogin');
            if($request->remember==null){
                setcookie('login_email',$request->email,100);
                setcookie('login_pass',$request->password,100);
             }
             else{
                setcookie('login_email',$request->email,time()+60*60*24*100);
                setcookie('login_pass',$request->password,time()+60*60*24*100);
 
             }
            if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){
                $user = auth()->user();      
                return redirect('member/home');
            } 
            else {
                return redirect()->back()->withErrors('email hoac password bi sai');
            }
        }
        return view('member.login');
    }

    public function logOut(Request $request)
    {
        Auth::logout();
        return redirect('/member/login');
    }


    public function forgotPassword(Request $request)
    {
        function randomPassword($length) 
        { 
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?"; 
            $length = rand(10, 16); 
            $password = substr( str_shuffle(sha1(rand() . time()) . $chars ), 0, $length );
            return $password;
        }

        if($request->isMethod('post')){
            $this->form->validate($request, 'validateFogotPassword');
            $data = User::where('email', $request->email)->first();
            $user = new ModelFogotPassword;          
            $user->user_id = $data->id;
            $random = randomPassword(8);
            $user->token = Hash::make($random);
            $user->ngaytao = Carbon::now();
            $user->ngayhethan = Carbon::tomorrow();
            $user->email = $request->email;
            if($user->save()){
                $title = 'đổi mật khẩu';
                $content = 'doi mat khau vui long click vao link: http://127.0.0.1:8000/member/reset-password/'.$random.'';
                $mailfrom = 'lenghiamailtest@gmail.com';
                $mailname = 'nghiale';
                $mail = [
                    'tieude'=>$title,
                    'noidung'=>$content,
                    'ten'=>$mailname,
                    'mail'=>$mailfrom,
                ];
                Mail::send('mail',$mail,function($mail) use($request){
                    $mail->from('lenghiamailtest@gmail.com', 'nghiale');
                    $mail->to($request->email, 'nghiale');
                    $mail->subject($request->tieude);
                });
                return redirect()->back()->with('success', 'mật khẩu dã đc đổi kiểm tra mail của bạn');
            }
        }
        return view('member.forgotpassword');
    }

    public function resetPassword(Request $request, $token)
    {
        if($request->isMethod('post')){
            $this->form->validate($request, 'validateResetPassword');
            $data = ModelFogotPassword::where('email', $request->email)->orderBy('id', 'desc')->limit(1)->first();
            $daydie = Carbon::now();
            $time = $daydie->diffInDays($data->ngayhethan);
            if($time <= 1){  
                $id = $data->user_id;
                $user = User::findOrfail($id);
                $user->password =  bcrypt($request->password);
                
                if($user->save()){
                    
                    return redirect()->back()->with('success','thay doi password thanh cong');
                } 
                else{
                    return redirect()->back()->withErrors('thay doi password that bai');
                }
            }
            
        }
        return view('member.resetpassword', compact('token'));
    }
    
    public function thongTinCaNhan(Request $request){
        if($request->isMethod('post')){
            $this->form->validate($request, 'validateThongtincanhan');
            $user = User::findOrfail(Auth::user()->id);
            $user->name = $request->name;
            $file = $request->file('file');
            $anh = $file->getClientOriginalName();
            $user->anh = $anh;
            $user->sdt = $request->sdt;
            $user->diachi = $request->diachi;
            if($user->save()){
                $file->move('upload', $file->getClientOriginalName());
                return redirect()->back()->with('success', 'Cập nhật thành công');
            }else {
                return redirect()->back()->withErrors('Cập nhật thất bại');
            }
            
        }
        $data = Auth::user();
        return view('member.thongtincanhan', compact('data'));
    }






}

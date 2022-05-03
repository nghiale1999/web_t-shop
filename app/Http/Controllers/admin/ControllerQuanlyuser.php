<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;
class ControllerQuanlyuser extends Controller
{
    public function Quanlyuser(){
        $user = User::paginate(5);
        return view('admin.quanlyuser',compact('user'));
    }

    public function XoaUser(Request $request){
        $user_id = $request->user_id;
        if(User::where('id',$user_id)->delete()){
            return redirect()->back()->with('success','Xóa người dùng thành công');
        }else{
            return redirect()->back()->withErrors('Xóa người dùng thất bại');  
        }
    }
    
    public function KhoaUser($id){
       
        $user = User::findOrfail($id);
        $user->capdo = 2;
        if($user->save()){
            return redirect()->back()->with('success','Khóa người dùng thành công');
        }else{
            return redirect()->back()->withErrors('Khóa người dùng thất bại');  
        }
    
    }
    public function moKhoaUser($id){
       
        $user = User::findOrfail($id);
        $user->capdo = 0;
        if($user->save()){
            return redirect()->back()->with('success','Mở khóa người dùng thành công');
        }else{
            return redirect()->back()->withErrors('Mở khóa người dùng thất bại');  
        }
    
    }
    public function GetHotro($id){
        $user = User::where('id',$id)->get();
        return view('admin.hotro',compact('user'));
    }

    public function PostHotro(Request $request){
        $tieude = $request->tieude;
        $noidung = $request->noidung;
        $ten = $request->name;
        $email = $request->email;
        $data = [
            'tieude'=>$tieude,
            'noidung'=>$noidung,   
            'email'=>$email,   
            'ten'=>$ten,   
        ];
        Mail::send('admin.mail',$data,function($mail) use($request){
            $mail_from = Auth::user()->email;
            $mail_name = Auth::user()->name;
            $mail->from($mail_from,$mail_name);
            $mail->to($request->email,$request->name);
            $mail->subject($request->tieude);
        });
        return redirect()->back()->with('success','gui yeu cau thang cong');  
    }
    
    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }

    
}

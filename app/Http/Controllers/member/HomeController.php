<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModelSanpham;
use App\ModelBaiviet;
use App\ModelBinhluan;
use App\ModelDgsao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function home(Request $request){
        $data = ModelSanpham::orderBy('id','desc')->paginate(10);
        $sao = ModelDgsao::all();
        return view('member.home', compact('data', 'sao'));
    }

    public function search(Request $request){
        $search = $request->search;
        $data = ModelSanpham::where('tensp', 'like', "%{$search}%")->orderBy('id','desc')->paginate(10);
        return view('member.home', compact('data'));
    }
    public function baiViet(){
         session()->flush();
        $data = ModelBaiviet::paginate(6);
        return view('member.baiviet',compact('data'));
    }

    public function baiVietChiTiet(Request $request, $id){
        if($request->isMethod('post')){
            
            $data = new ModelBinhluan;
            $data->id_bv = $id;
            $data->id_users = Auth::user()->id;
            $data->ten_users = Auth::user()->name;
            $data->anh_users = Auth::user()->anh;
            $data->noidung = $request->comment;
            $data->id_bl = 0;
            if($request->id_cmt != ''){
                $data->id_bl = $request->id_cmt;
            }
            if($data->save()){
                return redirect()->back();
            }
        }
        $data = ModelBaiviet::findOrfail($id);
        $comment = ModelBinhluan::where('id_bv',$id)->get();
        return view('member.baiviet-chitiet', compact('data', 'comment'));

    }
    
    public function hoTro(Request $request){
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'tieude'=>['required'],
                'noidung'=>['required'],
               
            ],[    
                'tieude.required' => 'Tiêu đề không được bỏ trống',
                'noidung.required' => 'Nội dung không được bỏ trống',
            ]);
            $title = $request->tieude;
            $content = $request->noidung;
            $mailfrom = Auth::user()->email;
            $mailname = Auth::user()->name;
            $mail = [
                'tieude'=>$title,
                'noidung'=>$content,
                'ten'=>$mailname,
                'mail'=>$mailfrom,
            ];
            Mail::send('mail',$mail,function($mail) use($request){
                $mail->from(Auth::user()->email, Auth::user()->name);
                $mail->to('lenghiamailtest@gmail.com', 'admin');
                $mail->subject($request->tieude);
            });
            return redirect()->back()->with('success', 'Gửi yêu cầu thành công');
        }
        return view('member.hotro');
    }
    
}

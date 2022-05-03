<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateAdmin;
use App\ModelLichsu;
use Illuminate\Support\Facades\DB;
use App\ModelQuocgia;
use App\ModelLoaisp;
use App\ModelThuonghieu;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;

class AdController extends Controller
{
   public function GetDashboard(){
        $dtt = Carbon::now('Asia/Ho_Chi_Minh');
       $dt = $dtt->subMonth();
       $sanphamt = ModelLichsu::where('created_at', '>', $dt)->get();
       $tongthang = 0;
       foreach ($sanphamt as $key => $value) {
           $tongthang = $tongthang + $value->gia;
       }

       $dtt = Carbon::now('Asia/Ho_Chi_Minh');
       $dtn = $dtt->subYear();
       $sanphamn = ModelLichsu::where('created_at', '>', $dtn)->get();
       $tongnam = 0;
       foreach ($sanphamn as $key => $value) {
           $tongnam = $tongnam + $value->gia;
       }
       
       $dtt = Carbon::now('Asia/Ho_Chi_Minh');
       $time = $dtt->subDay();
       $sanpham = ModelLichsu::where('created_at', '>', $time)->get();
       return view('admin.dashboard',compact('tongthang', 'tongnam', 'sanpham'));
   }

   public function GetThongtincanhan(){
        $dataquocgia = ModelQuocgia::all();
        $data = Auth::user();
        return view('admin.thongtincanhan',compact('data','dataquocgia'));
   }

    public function PostThongtincanhan(UpdateAdmin $request)
    {

        
        $file = $request->file('anh');
        $password = bcrypt($request->password);
        $anh = $file->getClientOriginalName();
        $id = Auth::user()->id;

        if($password == ''){
            $password = bcrypt(Auth::user()->password);
        }
        $user = User::findOrfail($id);
        $user->name = $request->name;
        $user->diachi = $request->diachi;
        $user->password = $password;
        $user->sdt = $request->sdt;
        $user->id_quocgia = $request->quocgia;
        $user->anh = $anh;
        if($user->save()){
            $link ='admin/assets/images/users';
            
            $file->move($link, $file->getClientOriginalName());
            return redirect()->back()->with('success','Cập nhật thông tin thành công');
        }else{
            return redirect()->back()->withErrors('Cập nhật thông tin that bai');
        
        }    
        
    }


    public function GetQuocgia(){
        $data = ModelQuocgia::paginate(5);
        return view('admin.quocgia',compact('data'));
    }

    public function GetXoaquocgia($id){
        if (ModelQuocgia::where('id',$id)->delete()) {
            return redirect()->back()->with('success','Xóa thông tin quốc gia thành công');
        }else{
            return redirect()->back()->withErrors('Xóa thông tin quốc gia thất bại');
        }
    }


    public function GetThemquocgia(){
        return view('admin.themquocgia');
    }

    public function PostThemquocgia(Request $request)
    {
        $data = new ModelQuocgia;
         $data->tenqg = $request->tenqg;
         $data->save();
         if($data->save()){
             return redirect()->back()->with('success','Thêm thông tin quốc gia thành công');
         }else{
             return redirect()->back()->withErrors('Thêm thông tin quốc gia thất bại');
         }
    }

    public function GetLoaisp()
    {
        $data = ModelLoaisp::paginate(5);
        return view('admin.loai-sp', compact('data'));
    }


    public function PostThemLoaisp(Request $request)
    {
        $data = new ModelLoaisp;
         $data->ten_loai = $request->ten_loai;
         $data->save();
         if($data->save()){
             return redirect()->back()->with('success','Thêm loại sản phẩm thành công');
         }else{
             return redirect()->back()->withErrors('Thêm loại sản phẩm thất bại');
         }
    }


    public function GetThuonghieu()
    {
        $data = ModelThuonghieu::paginate(7);
        return view('admin.thuonghieu', compact('data'));
    }
    public function GetXoathuonghieu($id)
    {
        if (ModelThuonghieu::where('id',$id)->delete()) {
            return redirect()->back()->with('success','Xóa thương hiệu thành công');
        }else{
            return redirect()->back()->withErrors('Xóa thương hiệu thất bại');
        }
    }

    public function GetThemthuonghieu()
    {
        return view('admin.themthuonghieu');
    }


    public function PostThemthuonghieu(Request $request)
    {
        $data = new ModelThuonghieu;
         $data->tenth = $request->tenth;
         $data->save();
         if($data->save()){
             return redirect()->back()->with('success','Thêm loại sản phẩm thành công');
         }else{
             return redirect()->back()->withErrors('Thêm loại sản phẩm thất bại');
         }
    }

    public function PostDoimatkhau(Request $request){
        $data = User::all();
        $validatedData = $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required', 'min:8'],
            'passwordcf' => ['required', 'same:password'],
        ],[    
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'password.min' => 'Mật hàng ít nhất 8 ký tự',
            'passwordcf.required' => 'Mật khẩu xác nhận không được bỏ trống',
            'passwordcf.same' => 'Mật khẩu xác nhận không đúng',

        ]);
        foreach ($data as $key => $value) {
            if($value->email == $request->email && $value->capdo == 1){
                $user = User::findOrfail($value->id);
                $user->password = bcrypt($request->password);
                if($user->save()){
                    return redirect()->back()->with('success','Đổi mật khẩu thành công');
                }else{
                    return redirect()->back()->withErrors('Đổi mật khẩu thất bại');  
                }
            }
            
        }
    }

}

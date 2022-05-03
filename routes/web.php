<?php

use App\Http\Controllers\admin\AdController;
use App\Http\Controllers\admin\ContronllerKhuyenmai;
use App\Http\Controllers\member\GiohangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\member\MemberController;
use App\Http\Controllers\member\HomeController;
use App\Http\Controllers\member\LichsuController;
use PhpParser\Node\Name;
use App\Http\Controllers\member\SanphamController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix'=>'member',
    'namespace'=>'member',
    ],function(){
        Route::match(['get', 'post'], '/login', [MemberController::class, 'login'])->Name('member.login');
        Route::match(['get', 'post'], '/register', [MemberController::class, 'register']);
        Route::match(['get', 'post'], '/home', [HomeController::class, 'home']);
        Route::post('/logout', 'MemberController@logOut')->name('logout-member');
        Route::match(['get', 'post'], '/fogot-password', [MemberController::class, 'forgotPassword']);
        Route::match(['get', 'post'], '/reset-password/{token}', [MemberController::class, 'resetPassword']);
        Route::get('/baiviet','HomeController@baiViet');      
        Route::post('/search','HomeController@search')->name('search');
    });
Route::group([
    'prefix'=>'member',
    'namespace'=>'member',
    'middleware' => ['auth.login_member', 'is_verify_email'],    
    ],function(){        
        Route::get('/sanpham','SanphamController@sanPham');
        Route::get('/xoasanpham/{id}','SanphamController@xoaSanPham');
        Route::match(['get', 'post'], '/themsanpham', [SanphamController::class, 'themSanPham']);
        Route::match(['get', 'post'], '/suasanpham/{id}', [SanphamController::class, 'suaSanPham']);
        Route::get('/thanhtoan','GiohangController@getThanhToan');
        Route::post('/thanhtoan','GiohangController@postThanhToan'); 
        Route::match(['get', 'post'], '/giohang', [GiohangController::class, 'gioHang']);
        Route::post('/themgiohang','GiohangController@themGioHang');
        Route::post('/themgiohangct','GiohangController@themGioHangct');
        Route::post('/danhgia sao','SanphamController@danhGiaSao');
        Route::post('/xoagiohang','GiohangController@xoaGioHang');
        Route::post('/giamgiohang','GiohangController@giamGiohang');
        Route::post('/tanggiohang','GiohangController@tangGioHang');
        Route::match(['get', 'post'], '/baiviet-chitiet/{id}', [HomeController::class, 'baiVietChiTiet']);
        Route::match(['get', 'post'], '/chitiet-sanpham/{id}', [SanphamController::class, 'chiTietSanPham']);
        Route::get('/lichsu','LichsuController@lichSu');
        Route::get('/chitiet-lichsu/{id}','LichsuController@chiTietLichSu');
        Route::match(['get', 'post'], '/thongtincanhan', [MemberController::class, 'thongTinCaNhan']);
        Route::match(['get', 'post'], '/hotro', [HomeController::class, 'hoTro']);
        Route::match(['get', 'post'], '/quanlydonhang', [LichsuController::class, 'donHang']);
        Route::post('/guihang','LichsuController@guiHang');
        Route::post('/nhanhang','LichsuController@nhanHang');
        Route::get('/thongke','LichsuController@thongKe');
        Route::get('/xoa-lichsu/{id}','LichsuController@xoaLichSu');


    });

Route::get('account/verify/{token}', [MemberController::class, 'verifyAccount'])->name('user.verify');


// composer require laravel/ui:^2.4
// php artisan ui vue --auth
Auth::routes();

Route::get('admin/doimatkhau', function () {
    return view('admin.doimatkhau');
});
Route::post('admin/doimatkhau','admin\AdController@PostDoimatkhau');
Route::get('/home', 'HomeController@index')->name('home');
Route::group([
    'prefix'=>'admin',
    'namespace'=>'admin', 
    'middleware' => ['auth.login'],

    ],function(){
        // dashboard
        Route::get('/dashboard','AdController@GetDashboard');

        //thông tin cá nhân
        Route::get('/thongtincanhan','AdController@GetThongtincanhan');
        Route::post('/thongtincanhan','AdController@PostThongtincanhan');

        // chức năng quốc gia
        Route::get('/quocgia','AdController@GetQuocgia');
        Route::get('/quocgia/xoa/{id}','AdController@GetXoaquocgia');

        Route::get('/quocgia/themquocgia','AdController@GetThemquocgia');
        Route::post('/quocgia/themquocgia','AdController@PostThemquocgia');

       

        //chức năng quản lý thuong hieu
        Route::get('/thuong-hieu','AdController@GetThuonghieu');
        Route::get('/thuong-hieu/xoa/{id}','AdController@GetXoathuonghieu');
        Route::get('/thuong-hieu/themth','AdController@GetThemthuonghieu');
        Route::post('/thuong-hieu/themth','AdController@PostThemthuonghieu');
        

        //chức năng bài viết
        Route::get('/baiviet','ControllerBaiviet@GetBaiviet');
        Route::get('/baiviet/xoabaiviet/{id}','ControllerBaiviet@GetXoabaiviet');

        Route::get('/baiviet/thembaiviet','ControllerBaiviet@GetThembaiviet');
        Route::post('/baiviet/thembaiviet','ControllerBaiviet@PostThembaiviet');

        Route::get('/baiviet/suabaiviet/{id}','ControllerBaiviet@GetSuabaiviet');
        Route::post('/baiviet/suabaiviet/{id}','ControllerBaiviet@PostSuabaiviet');


        // quản lý user xóa và hỗ trợ
        Route::get('/quanlyuser','ControllerQuanlyuser@Quanlyuser');
        Route::post('/delete_user','ControllerQuanlyuser@XoaUser');
        Route::get('/khoa_user/{id}','ControllerQuanlyuser@KhoaUser');
        Route::get('/mokhoa_user/{id}','ControllerQuanlyuser@moKhoaUser');

        Route::get('/quanlyuser/hotro/{id}','ControllerQuanlyuser@GetHotro');
        Route::post('/quanlyuser/hotro/{id}','ControllerQuanlyuser@PostHotro');
        Route::post('/logout','ControllerQuanlyuser@logout');
   
   
        Route::match(['get', 'post'], '/khuyenmai', [ContronllerKhuyenmai::class, 'khuyenMai']);
        Route::get('/bokhuyenmai/{id}','ContronllerKhuyenmai@boKhuyenMai');
        
    });
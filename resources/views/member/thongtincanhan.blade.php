@extends('member.layout.app')
@section('content')
<div class="account container my-5">
    @if (session('success'))
		<div class="alert alert-success">
			<p>{{ session('success') }}</p>
		</div>
	@endif																							
    <h2 class="text-center mb-3">Quản Lý Thông Tin Cá Nhân</h2>
    <div class="row">
        <div class="col-lg-5">
            <img src="{{ asset('upload/'.$data->anh) }}" style="width: 200px; height: 200px;border-radius: 100px; margin-left: 100px;">
        </div>
        <div class="col-lg-7 edit-account">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <label>Tên khách hàng</label>
                <input type="text" value="{{Auth::user()->name}}" name="name">
                <br>
                <label>Email</label>
                <input type="text" value="{{Auth::user()->email}}" name="email" readonly>
                <br>
                <label>Ảnh đại diện</label>
                <input type="file" name="file">
                <br>
                <label>Số điện thoại</label>
                <input type="text" value="{{Auth::user()->sdt}}" name="sdt">
                <br>
                <label>Địa chỉ</label>
                <input type="text" value="{{Auth::user()->diachi}}" name="diachi">
                <br>
                <button type="submit" name="submit" class="btn btn-default update">Cập nhật</button>
            </form>
            <ul class="alert text-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
    
@endsection
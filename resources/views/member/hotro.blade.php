@extends('member.layout.app')
@section('content')
<div class="cupon_area mt-5 ml-5 mb-4">
    @if (session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif
    <form action="" method="post" class="mt-5 ml-5">
        @csrf
        <b>Tiêu đề: </b><input type="text" name="tieude" placeholder="Gửi bài quảng cáo">
        <b>Nội dung: </b><br><textarea placeholder="Tôi muốn quảng cáo cho sản phẩm của mình ...." name="noidung" class="ml-4" cols="80" rows="10"></textarea>
        <br><button type="submit" name="submit" class="btn btn-default update">Gửi yêu cầu</button>
    </form>
    <ul class="alert text-danger">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
    </ul>
    
</div>
@endsection
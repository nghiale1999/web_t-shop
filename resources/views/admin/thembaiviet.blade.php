@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if (session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
        @endif
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
           <P><b>Tiêu đề :</b></P>  <input type="text" name="tieude">
            
           <P><b>Hình    :</b></P>  <input type="file" name="file">
            
           <P><b>Nội dung:</b></P>  <textarea name="noidung" id="ckeditor1" ></textarea>
            <br>
            <input type="submit" value="Add Blog">
        </form>
        <ul class="alert text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>  CKEDITOR.replace( 'noidung', {
    filebrowserBrowseUrl: "{{ asset('ckfinder/ckfinder.html') }}",
    filebrowserImageBrowseUrl: "{{ asset('ckfinder/ckfinder.html?type=Images') }}",
    filebrowserFlashBrowseUrl: "{{ asset('ckfinder/ckfinder.html?type=Flash') }}",
    filebrowserUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}",
    filebrowserImageUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
    filebrowserFlashUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}",
} );</script>
@endsection
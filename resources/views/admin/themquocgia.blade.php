@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-4"></div>
    <div class="col-8">
        @if (session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
        @endif
        <form action="" method="POST">
            @csrf
            Tên Quốc Gia: <input type="text" name="tenqg">
            <input type="submit" value="Thêm Quốc Gia">
        </form>
    </div>
</div>

@endsection
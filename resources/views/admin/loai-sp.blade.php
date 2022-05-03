@extends('admin.layout.app')
@section('content')
<div class="row">
    
    <div class="col-3"></div>
    <div class="col-9">
    <div class="card">
        
        <div class="table-responsive">
            @if (session('success'))
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Loại</th>
                        <th scope="col">xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value) 
                    <tr class="table-active">
                        <th scope="row">{{$value->id}}</th>
                        <td>{{$value->ten_loai}}</td>
                        <td><a  class="btn btn-primary" href="{{url('admin/loai-sp/xoa/'.$value->id)}}">Xóa</a></td>
                    </tr>
                    @endforeach 
                    
                </tbody>
            </table>
           
            <a  class="btn btn-info" href="{{url('admin/loai-sp/themloai-sp')}}">Thêm Loại</a>
        </div>
        {{ $data->links() }}
    </div>
</div>
</div>
@endsection
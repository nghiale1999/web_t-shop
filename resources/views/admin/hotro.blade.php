@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
    <div class="card">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        <p>{{ session('success') }}</p>
                    </div>
                    @endif
                    <form  class="form-horizontal form-material" method="POST">
                        @csrf
                        
        
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Tên</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="name" value="{{$user[0]->name}}" readonly>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="email" value="{{$user[0]->email}}" readonly>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Tiêu đề</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="tieude"  >
                            </div>
                            
                        </div>
        
        
                        <div class="form-group">
                            <label class="col-md-12">Nội dung</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line" name="noidung"></textarea>
                            </div>
                        </div>
        
        
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success" type="submit">Gửi cảnh báo</button>
                            </div>
                        </div>
                    </form>
        
                </div>
            </div>
        </div>  
        
</div>


@endsection
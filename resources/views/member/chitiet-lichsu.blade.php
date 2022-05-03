@extends('member.layout.app')
@section('content')
<div class="lsmuahang">
    <h4 class="text-center">Chi Tiết Đơn Hàng</h4>
    <div class="row container-fluid">
        <div class="col-sm-8">
            <table class="order-detail">
                <thead>
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $ls)
                       <tr> 
                            <td>{{$ls->tensp}}</td>
                            <td>{{$ls->soluong}}</td>
                            <td>{{$ls->gia}}đ</td>
                        </tr> 
                        
                    @endforeach
                    
                </tbody>
            </table>
    
        </div>
        @foreach ($data as $ls)
        <div class="col-sm-4">
            <div class="order-content">
                <p>Tên Người Nhận Hàng</p>
                <input type="text" value="{{$ls->tennguoinhan}}">    
            </div>
            <div class="order-content">
                <p>Địa Chỉ Giao Hàng</p>
                <input type="text" value="{{$ls->diachi}}">    
            </div>
            <div class="order-content">
                <p>Email</p>
                <input type="text" value="{{$ls->email}}">    
            </div>
            <div class="order-content">
                <p>Số Điện Thoại</p>
                <input type="text" value="{{$ls->sdt}}">    
            </div>
            @if ($ls->trangthai == 'Đã gửi')
                <button id="{{$ls->id}}" class="btn btn-default update nhan-hang">Đã nhận hàng</button>
            @endif
            <a class="btn btn-default back" href="{{ url('member/lichsu') }}">Quay Về</a>
        </div>
        @endforeach
    </div>

</div>
    
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('button.nhan-hang').click(function(){
            var id = $(this).attr('id');
            console.log(id);
            var xacnhan = confirm('bạn đã nhận hàng?');
            if( xacnhan == true){
                $.ajax({
                    method: "POST",
                    url: "/member/nhanhang",
                    data: {
                            _token: '{{csrf_token()}}',
                            id_ls: id,                               
                        },
                    success: function (data){
                            alert(data);
                        }    
                });
            }  
            
        });

    })
</script>
    
@endsection
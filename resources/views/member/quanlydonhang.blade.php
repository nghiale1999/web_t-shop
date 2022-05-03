@extends('member.layout.app')
@section('content')
     

<div class="lsmuahang">
     <table class="order container">
        <h4 class="text-center">Lịch Sử Mua Hàng</h4>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Tổng giá</th>
                <th>Tên người nhận</th>
                <th>Email</th>
                <th>sdt</th>
                <th>Địa chỉ</th>
                <th>Trạng thái</th>
                <th>Gửi hàng</th>
            </tr>
            
        </thead>
        <tbody>
            @foreach ($data as $vl)
            <tr id="{{$vl->id}}" >
                <td>{{$vl->id}}</td>
                <td>{{$vl->tensp}}</td>
                <td>{{$vl->soluong}}</td>
                <td>{{$vl->gia}}</td>
                <td>{{$vl->tennguoinhan}}</td>
                <td>{{$vl->email}}</td>
                <td>{{$vl->sdt}}</td>
                <td>{{$vl->diachi}}</td>
                <td class="trangthai">{{$vl->trangthai}}</td>
                <td><a id="{{$vl->id}}" class="gui-hang">Gửi hàng</a></td>
            </tr>
            
        @endforeach
            
        </tbody>
    </table>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('a.gui-hang').click(function(){
            var id = $(this).attr('id');
            console.log(id);
            var xacnhan = confirm('bạn muốn gửi hàng?');
            if( xacnhan == true){
                $.ajax({
                    method: "POST",
                    url: "/member/guihang",
                    data: {
                            _token: '{{csrf_token()}}',
                            id_ls: id,                               
                        },
                    success: function (data){
                            alert(data);
                        }    
                });
            }  
            $('tr#'+id).find('td.trangthai').text('đã gửi');
        });

    })
</script>
    
@endsection
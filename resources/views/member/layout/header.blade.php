<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light py-4" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{url('member/home')}}">T-Shop</a>
        <form action="{{ route('search') }}" method="post" class="searchform order-sm-start ml-5 order-lg-last">
            @csrf
            <div class="form-group d-flex">
                <input type="text" class="form-control pl-3" placeholder="Search" name="search">
                <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
            </div>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="true" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="navbar-collapse collapse show ml-5" id="ftco-nav">
            <ul class="navbar-nav">
                <li class="nav-item "><a href="{{url('member/home')}}" class="nav-link">Home</a></li>
                <li class="nav-item dropdown show">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Tài khoản</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                    <a class="dropdown-item" href="{{url('member/thongtincanhan')}}">Cập Nhật Tài Khoản</a>
                    <a class="dropdown-item" href="{{url('member/login')}}">Đăng Nhập</a>
                    <a class="dropdown-item" href="{{url('member/register')}}">Đăng Ký</a>
                    <form  class="dropdown-item" action="{{ route('logout-member') }}" method="post" >
                        @csrf
                        <input type="submit"  id="" value="Đăng xuất" >
                    </form>
                    </div>
                </li>
                <li class="nav-item dropdown show">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">đơn hàng</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{url('member/lichsu')}}">Lịch Sử mua hàng</a>
                        <a class="dropdown-item" href="{{url('member/quanlydonhang')}}">Quản lý đơn hàng</a>
                        <a class="dropdown-item" href="{{url('member/thongke')}}">Thống kê đơn hàng</a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{url('member/sanpham')}}" class="nav-link">Sản phẩm</a></li>
                <li class="nav-item"><a href="{{url('member/baiviet')}}" class="nav-link">Bài viết</a></li>
                <li class="nav-item"><a href="{{url('member/hotro')}}" class="nav-link">Hỗ trợ</a></li>
                
                
            </ul>
            
        </div>
            <a href="{{url('member/giohang')}}"><i class="fa fa-shopping-cart cart"></i></a>
            
    </div>
</nav>        

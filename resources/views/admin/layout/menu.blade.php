<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('admin/dashboard')}}" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('admin/thongtincanhan')}}" aria-expanded="false">
                        <i class="mdi mdi-account-network"></i>
                        <span class="hide-menu">Thông Tin Cá Nhân</span>
                    </a>
                </li>
                 <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('admin/quanlyuser')}}" aria-expanded="false">
                        <i class="mdi mdi-arrange-bring-forward"></i>
                        <span class="hide-menu">Quản Trị Người Dùng</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('admin/quocgia')}}"aria-expanded="false">
                        <i class="mdi mdi-border-none"></i>
                        <span class="hide-menu">Quốc Gia</span>
                    </a>
                </li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('admin/thuong-hieu')}}"aria-expanded="false">
                        <i class="mdi mdi-border-none"></i>
                        <span class="hide-menu">Thương Hiệu</span>
                    </a>
                </li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('admin/baiviet')}}" aria-expanded="false">
                        <i class="mdi mdi-file"></i>
                        <span class="hide-menu">Quản Trị Bài Viết</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('admin/khuyenmai')}}" aria-expanded="false">
                        <i class="mdi mdi-file"></i>
                        <span class="hide-menu">Quản Trị Khuyến mãi</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"  aria-expanded="false">
                        <i class="mdi mdi-face"></i>
                        <span class="hide-menu"><form lass="hide-menu" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <input type="submit" name="submit"  value="logout">
                        </form>
                    </span>  
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="error-404.html" aria-expanded="false">
                        <i class="mdi mdi-alert-outline"></i>
                        <span class="hide-menu">404</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
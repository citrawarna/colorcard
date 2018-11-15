
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{asset('dist/img/logos.png')}}"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Program Color Card</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->username }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview {{ ($submenu == 1 ? 'menu-open' : '') }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-list"></i>
                        <p>
                        MASTER
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link {{ ($menu==1 ? 'active' : '') }} ">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Data Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('colorcard.index') }}" class="nav-link {{ ($menu==2 ? 'active' : '') }} ">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Data Color Card</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ ($submenu == 2 ? 'menu-open' : '') }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-cart-plus"></i>
                        <p>
                        TRANSAKSI
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('receive.index') }}" class="nav-link {{ ($menu==3 ? 'active' : '') }} ">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Terima Barang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('colorcard.index') }}" class="nav-link {{ ($menu==4 ? 'active' : '') }} ">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Kirim Barang</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
               
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
        <!-- /.sidebar -->
</aside>
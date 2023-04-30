<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Trang Chủ Website</a>
          </li>
        </ul>
    
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="{{ asset('asset/admin/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Brad Diesel
                      <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="{{ asset('asset/admin/dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      John Pierce
                      <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="{{ asset('asset/admin/dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nora Silvester
                      <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->
    
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img src="{{ asset('asset/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">
            {{ (Auth::guard('admin')->user()->id == 1) ? 'Quản Trị' : 'Nhân Viên'}}
          </span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ asset('asset/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="javascrip:void(0)" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-header">{{ TextLayoutSidebar("overview") }}</li>
              <li class="nav-item">
                <a href="{{ route('admin.home') }}" class="nav-link {{ (Route::is('admin.home')) ? 'active' : '' }} next-link__js">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    {{ TextLayoutSidebar("dashboard") }}
                  </p>
                </a>
              </li>
              <li class="nav-header">{{ TextLayoutSidebar("website_management") }}</li>
              <li class="nav-item">
                @php
                    $isRouteUser = request()->is('admin/users*');
                @endphp
                <a href="{{ route('admin.users_index') }}" class="nav-link {{ ($isRouteUser) ? 'active' : '' }} next-link__js">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    {{ TextLayoutSidebar("customer") }}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                @php
                    $isRouteUser = request()->is('admin/staffs*');
                @endphp
                <a href="{{ route('admin.staffs_index') }}" class="nav-link {{ ($isRouteUser) ? 'active' : '' }} next-link__js">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>
                    {{ TextLayoutSidebar("administrators") }}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                @php
                    $isRouteUser = request()->is('admin/categories*');
                @endphp
                <a href="{{ route('admin.category_index') }}" class="nav-link {{ ($isRouteUser) ? 'active' : '' }} next-link__js">
                  <i class="nav-icon fas fa-th-list"></i>
                  <p>
                    {{ TextLayoutSidebar("category") }}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                @php
                    $isRouteUser = request()->is('admin/products*');
                @endphp
                <a href="{{ route('admin.product_index') }}" class="nav-link {{ ($isRouteUser) ? 'active' : '' }} next-link__js">
                  <i class="nav-icon fas fa-inbox"></i>
                  <p>
                    {{ TextLayoutSidebar("product") }}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                @php
                    $isRouteUser = request()->is('admin/colors*');
                @endphp
                <a href="{{ route('admin.colors_index') }}" class="nav-link {{ ($isRouteUser) ? 'active' : '' }} next-link__js">
                  <i class="nav-icon fas fa-paint-brush"></i>
                  <p>
                    {{ TextLayoutSidebar("color") }}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                @php
                    $isRouteUser = request()->is('admin/sizes*');
                @endphp
                <a href="{{ route('admin.sizes_index') }}" class="nav-link {{ ($isRouteUser) ? 'active' : '' }} next-link__js">
                  <i class="nav-icon fas fa-tshirt"></i>
                  <p>
                    {{ TextLayoutSidebar("size") }}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                @php
                    $isRouteUser = request()->is('admin/brands*');
                @endphp
                <a href="{{ route('admin.brands_index') }}" class="nav-link {{ ($isRouteUser) ? 'active' : '' }} next-link__js">
                  <i class="nav-icon fas fa-building"></i>
                  <p>
                    {{ TextLayoutSidebar("brand") }}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                @php
                    $isRouteUser = request()->is('admin/payments*');
                @endphp
                <a href="{{ route('admin.payments_index') }}" class="nav-link {{ ($isRouteUser) ? 'active' : '' }} next-link__js">
                  <i class="nav-icon fas fa-money-check-alt"></i>
                  <p>
                    {{ TextLayoutSidebar("payment_method") }}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                @php
                    $isRouteUser = request()->is('admin/orders*');
                @endphp
                <a href="{{ route('admin.orders_index') }}" class="nav-link {{ ($isRouteUser) ? 'active' : '' }} next-link__js">
                  <i class="nav-icon fas fa-shopping-cart"></i>
                  <p>
                    {{ TextLayoutSidebar("order") }}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                @php
                    $isRouteUser = request()->is('admin/setting*');
                @endphp
                <a href="{{ route('admin.setting_index') }}" class="nav-link {{ ($isRouteUser) ? 'active' : '' }} next-link__js">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                    {{ TextLayoutSidebar("setting") }}
                  </p>
                </a>
              </li>
              <li class="nav-header">{{ TextLayoutSidebar("infomations") }}</li>
              <li class="nav-item">
                <a href="{{route('admin.profile_change-profile')}}" class="nav-link {{ (Route::is('admin.profile_change-profile')) ? 'active' : '' }} next-link__js">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    {{ TextLayoutSidebar("profile") }}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.profile_change-password')}}" class="nav-link {{ (Route::is('admin.profile_change-password')) ? 'active' : '' }} next-link__js">
                  <i class="nav-icon fas fa-key"></i>
                  <p>
                    {{ TextLayoutSidebar("change_password") }}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.logout')}}" class="nav-link next-link__js">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>
                    {{ TextLayoutSidebar("logout") }}
                  </p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
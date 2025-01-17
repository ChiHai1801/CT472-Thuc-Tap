 
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Phòng khám tư nhân</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Y TÁ</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


              <li class="nav-item">
                <a href="{{route('function/phieuthu/phieuthu')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Thu phí
                  </p>
                </a>
              </li>

              <li class="nav-header">Lập phiếu</li>
              <li class="nav-item">
                <a href="{{route('function/lapphieu/lapphieukhambenh')}}" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Lập phiếu khám bệnh</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('function/danhsach/lapdskhambenh')}}" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Lập danh sách khám bệnh</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('function/hoadon/laphoadon')}}" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Lập hóa đơn</p>
                </a>
              </li>
         
              <li class="nav-header">Thuốc</li>
              <li class="nav-item">
                <a href="{{route('function/toathuoc/xemtoathuoc')}}" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Xem toa thuốc</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('function/donthuoc/xemlsdonthuoc')}}" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Xem lịch sử đơn thuốc</p>
                </a>
              </li>  
              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
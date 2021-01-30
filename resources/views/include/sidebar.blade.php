<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;">
    <!-- Brand Logo -->
    <center>
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light"><b>Tracking Covid</b></span>
    </a>
    </center>
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
          <img src="https://img.icons8.com/nolan/25/region-code.png"/>  
              <p>
                Local
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/provinsi')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Provinsi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/kota')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/kecamatan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kecamatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/kelurahan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelurahan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/rw')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>RW</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/tracking')}}" class="nav-link">
              <img src="https://img.icons8.com/nolan/25/coronavirus.png"/>
              <p>
                Tracking
              </p>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <img src="https://img.icons8.com/nolan/25/logout-rounded-left.png"/>
        {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        </form>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  </aside>
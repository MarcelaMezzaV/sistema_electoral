    
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if(Auth::user()->avatar)
            <div class="image">
                <img src="{{url('/imgs/'.Auth::user()->avatar)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            @else
            <div class="image">
                <img src="{{ asset('user_default.png') }}" class="img-circle elevation-2" alt="User Image" style="background:#efefef">
            </div>
            @endif
          
          <div class="info">
            <a href="{{ url('users/'.Auth::user()->id) }}" class="d-block">{{Auth::user()->name}}</a>
          </div>
        </div>
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          @if (Auth::user()->hasAnyRole(['admin']))
              
          
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Usuarios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/users')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Administrar Usuarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/users')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar Usuarios</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Simple Link
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
          </ul>
          @endif
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

      
  

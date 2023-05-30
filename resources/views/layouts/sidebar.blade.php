 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <div class="brand-link">
    <span class="brand-text font-weight-light">Koffie Soft</span>
  </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('cms.home.index')}}" class="nav-link {{ request()->routeIs('cms.home.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Home</p>
              </a>
            </li>
            @if(auth()->user()->role == 'user')
            <li class="nav-item">
              <a href="{{route('cms.user.index')}}" class="nav-link {{ request()->routeIs('cms.user.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>User</p>
              </a>
            </li>
            @endif
            @if(auth()->user()->role == 'admin')
        <li class="nav-item">
          <a href="{{route('cms.admin.index')}}" class="nav-link {{ request()->routeIs('cms.admin.index') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Admin</p>
          </a>
        </li>
        @endif
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <div class="d-flex">
                <form action="{{route('logout')}}" method="post">
                @csrf
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <button type="submit" style="background: none; border:none; color:white">Logout</button>
              </form>
            </div>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
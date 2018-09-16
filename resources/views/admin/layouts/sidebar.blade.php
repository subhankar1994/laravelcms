  <aside class="main-sidebar">
 <section class="sidebar">

      <ul class="sidebar-menu" data-widget="tree">

         <!-- dashboard -->
        <li class="active treeview">
          <a href="{{ url('admin/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <!-- admin users -->
        <li class="active treeview">
          <a href="{{ route('user.index') }}">
            <i class="fa fa-user"></i> <span>Admin Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i> All Users</a></li>
            <li><a href="{{ route('user.create') }}"><i class="fa fa-circle-o"></i> Add User</a></li>
          </ul>
        </li>
      </ul>
    </section>
      </aside>
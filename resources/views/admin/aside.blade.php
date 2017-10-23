<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>

        <div class="pull-left info">
        
          <a href="#"><i class="fa fa-circle text-success"></i> {{Auth::user()->name}}</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Điều hướng chính</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Quản lí danh mục </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="{{ route('admin.list-category') }}"><i class="fa fa-circle-o"></i> Danh sách danh mục</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Quản lí sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.list-product')}}"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-sliders"></i>
            <span>Quản lý Slide</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="{{ route('admin.list-slide') }}"><i class="fa fa-sliders"></i> Danh sách slide </a></li>
          
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Quản lý người dùng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            
            <li><a href="{{route('admin.list-user')}}"><i class="fa fa-user-o"></i> Danh sách người dùng </a></li>
          
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Quản lý bài viết</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="{{ route('admin.list-news') }}"><i class="fa fa-book"></i> Danh sách bài viết </a></li>

          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
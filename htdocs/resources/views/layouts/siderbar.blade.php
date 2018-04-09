<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
       
        <div class="pull-left image">
          <img src="/{{ Auth::user()->profile_img }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info col-md-12">
          <p><a href="#">{{ Auth::user()->name }}</a></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"></li>
        
        <li>
          <a href="{{ route('home') }}">
           <i class="fa fa-home"></i><span>Inicio</span> 
          </a>
        </li>
        <li>
          <a href="{{ route('user.index') }}">
           <i class="fa fa-user"></i><span>Usuarios</span> 
          </a>
        </li>
        @if(! (Auth::user()->type=="admin"))
            <li>
            <a href="{{ route('project.index') }}">
              <i class="fa fa-folder-open-o"></i> <span>Proyectos</span> 
            </a>
          </li>
        @endif
        <li class="treeview">
          <a href="#">
            <i class="fa fa-clipboard"></i>
            <span>Reportes</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> <i class="fa fa-money"></i>Ingresos</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i><i class="fa fa-paper-plane-o"></i> Vuelos</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i><i class="fa fa-list-alt"></i> Reservas</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

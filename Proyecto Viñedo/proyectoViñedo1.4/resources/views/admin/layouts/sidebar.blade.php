<!-- Barra izquierda -->
<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{route('admin.dashboard')}}">SISTEMA VIÑEDO</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('admin.dashboard')}}">SV</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
                    <!-- <a href="{{ route('admin.dashboard') }}" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a> -->
              </li>
              
              <ul class="dropdown-menu">
                 <!--<li class=active><a class="nav-link" href="index-0.html">General Dashboard</a></li> -->
                <li> <!-- <a class="nav-link" href="index.html">Ecommerce Dashboard</a></li> -->
              </ul>
            </li>
            <li class="menu-header">Comercio</li>
            <li class="{{ request()->routeIs('admin.catalogo') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('admin.catalogo') }}"><i class="fas fa-th"></i> <span>Catálogo</span></a>
            </li>
            <li class="{{ request()->routeIs('admin.estado') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.estado') }}"><i class="fas fa-chart-line"></i> <span>Estado de Ventas</span></a>
            </li>

             <!--<li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Comercio</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.catalogo') }}">Catalogo</a></li>
                <li><a class="nav-link" href="{{ route('admin.estado') }}">Estado de Ventas</a></li>
                 <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li> -->
              <!--</ul>-->
            </li>
            <li> <!-- <a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a> --></li>
            <li class="menu-header">Clientes</li>
        </aside>
      </div>
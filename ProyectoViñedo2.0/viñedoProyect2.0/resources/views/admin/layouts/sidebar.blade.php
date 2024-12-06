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
            <li class="menu-header">Gestion de productos</li>
            <li class="{{ request()->routeIs('admin.catalogo.index') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('admin.catalogo.index') }}"><i class="fas fa-th"></i> <span>Catálogo de productos</span></a>
            </li>
            <li class="{{ request()->routeIs('admin.views.inhabilitados') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.views.inhabilitados') }}"><i class="fas fa-times-circle"></i> <span>Inhabilitados del catálogo</span></a>
          </li>
            <!-- <li class="{{ request()->routeIs('admin.jugos') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.jugos') }}"><i class="fas fa-chart-line"></i> <span>Jugos y Batidos</span></a>
            </li>-->

            <!-- <li class="{{ request()->routeIs('admin.desayunos') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.desayunos') }}"><i class="fas fa-chart-line"></i> <span>Desayunos</span></a>
            </li> -->

           <!-- <li class="{{ request()->routeIs('admin.pulpas') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.pulpas') }}"><i class="fas fa-chart-line"></i> <span>Pulpas</span></a>
            </li>-->

            <!--<li class="{{ request()->routeIs('admin.batidos') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.batidos') }}"><i class="fas fa-chart-line"></i> <span>Batidos</span></a>
            </li>-->

            </li>
            <li> <!-- <a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a> --></li>
            <li class="menu-header">Ventas</li>
            <li class="{{ request()->routeIs('admin.estado') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.estado') }}"><i class="fas fa-chart-line"></i> <span>Ventas y Estado</span></a>
            </li>
            <li class="{{ request()->routeIs('admin.views.InhabilitadoVentas') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.views.InhabilitadoVentas') }}"><i class="fas fa-times-circle"></i> <span>Ventas Canceladas</span></a>
            </li>
        </aside>
      </div>
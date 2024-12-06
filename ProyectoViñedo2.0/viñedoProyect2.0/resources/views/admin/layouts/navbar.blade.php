
<nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>       
        </form>
        <ul class="navbar-nav navbar-right">
          </li>          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset(Auth::user()->image) }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Iniciado hace 5 minutos</div>
              <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Editar Perfil
              </a>
              <div class="dropdown-divider"></div>
              <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{route('logout')}}"
                              onclick="event.preventDefault();
                              this.closest('form').submit();"
                             class="dropdown-item has-icon text-danger">
                          <i class="fas fa-sign-out-alt"></i> Cerrar Sesion
                          </a>
                        </form>
              </a>
            </div>
          </li>
        </ul>
      </nav>
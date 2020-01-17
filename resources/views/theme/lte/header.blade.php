@php
    use Carbon\Carbon;
@endphp
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contactenos</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="{{ asset("assets/$theme/dist/img/user2-160x160.jpg") }}" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline">{{session()->get('nombre_usuario') ?? 'Invitado' }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="{{ asset("assets/$theme/dist/img/user2-160x160.jpg") }}" class="img-circle elevation-2" alt="User Image">

            <p>
              {{session()->get('nombre_usuario', 'Inivitado')}} - {{session()->get('rol_nombre', 'Guest')}}
              @auth
                <small>Registrado desde {{Carbon::parse(auth()->user()->created_at)->year }}</small>
              @endauth
            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
            <div class="row">
              @if(session()->get("roles") && count(session()->get("roles")) > 1)
                <div class="col-3"></div>
                <div class="col-6 text-center">
                    <a href="#" class="cambiar-rol">Cambiar Rol</a>
                </div>
              @else
                <div class="col-12 text-center">
                  Favor Haz Login!
                </div>
              @endif
            </div>
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            @guest
              <div class="row">
                <div class="col-6 text-center">
                  <a href="{{route('login')}}" class="btn btn-default btn-flat">Login</a>
                </div>
                <div class="col-6 text-center">
                  <a href="{{route('logout')}}" class="btn btn-default btn-flat">Salir</a>
                </div>
              </div>              
            @endguest
            @auth
              <div class="row">
                <div class="col-12 text-center">
                  <a href="{{route('logout')}}" class="btn btn-default btn-flat">Salir</a>
                </div>
              </div>
            @endauth
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
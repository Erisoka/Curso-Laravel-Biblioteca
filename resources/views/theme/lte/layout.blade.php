<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('titulo', 'Biblioteca') | Erisoka Dev.</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  @yield('styles')

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/fontawesome-free/css/all.min.css") }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("assets/$theme/dist/css/adminlte.min.css") }}">

  <!-- SweetAlert2 style -->
  <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/sweetalert2/sweetalert2.min.css") }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!-- Custom style -->
  <link rel="stylesheet" href="{{ asset("assets/css/custom.css") }}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-boxed">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- INICIO HEADER -->
    @include("theme/$theme/header")
    <!-- FIN HEADER -->

    <!-- INICIO ASIDE -->
    @include("theme/$theme/aside")
    <!-- FIN ASIDE -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">

        @yield('content')

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- INICIO FOOTER -->
    @include("theme/$theme/footer")
    <!-- FIN FOOTER -->

    <!--Inicio de ventana modal para login con más de un rol -->
    @if(session()->get("roles") && count(session()->get("roles")) > 1)
    @csrf
    <div class="modal fade" id="modal-seleccionar-rol" data-rol-set="{{empty(session()->get("rol_id")) ? 'NO' : 'SI'}}"
      tabindex="-1" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Roles de Usuario</h4>
          </div>
          <div class="modal-body">
            <p>Cuentas con mas de un Rol en la plataforma, a continuación seleccione con cual de ellos desea trabajar?
            </p>
            @foreach(session()->get("roles") as $key => $rol)
            <li>
              <a href="#" class="asignar-rol" data-rolid="{{$rol['id']}}" data-rolnombre="{{$rol["nombre"]}}">
                {{$rol["nombre"]}}
              </a>
            </li>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    @endif

  </div>

  <!-- jQuery -->
  <script src="{{ asset("assets/$theme/plugins/jquery/jquery.min.js") }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset("assets/$theme/dist/js/adminlte.min.js") }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset("assets/$theme/dist/js/demo.js") }}"></script>

  <!-- jQuery Validation -->
  <script src="{{ asset("assets/js/jquery-validation/jquery.validate.min.js") }}"></script>
  <script src="{{ asset("assets/js/jquery-validation/localization/messages_es.min.js") }}"></script>

  <!-- CDN SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="{{ asset("assets/$theme/plugins/sweetalert2/sweetalert2.all.min.js") }}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <!-- Scripts Plugins -->
  @yield('scriptsPlugins')

  <!-- Mis Js para todas las vistas-->
  <script src="{{ asset("assets/js/scripts.js") }}"></script>
  <script src="{{ asset("assets/js/funciones.js") }}"></script>

  <!-- Scripts Propios desde una Vista-->
  @yield('scripts')

</body>

</html>
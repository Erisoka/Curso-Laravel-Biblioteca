<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Boxed Layout</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("assets/$theme/plugins/fontawesome-free/css/all.min.css") }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("assets/$theme/dist/css/adminlte.min.css") }}">
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
        <div class="container-fluid">

          <div class="row">
            <div class="col-12 mt-3">
              <div class="callout callout-info">
                <h5>I am an info callout!</h5>
                <p>Follow the steps to continue to payment.</p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Title</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                      <i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  Start creating your amazing application!
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>

        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- INICIO FOOTER -->
    @include("theme/$theme/footer")
    <!-- FIN FOOTER -->

  </div>

  <!-- jQuery -->
  <script src="{{ asset("assets/$theme/plugins/jquery/jquery.min.js") }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset("assets/$theme/dist/js/adminlte.min.js") }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset("assets/$theme/dist/js/demo.js") }}"></script>

</body>

</html>
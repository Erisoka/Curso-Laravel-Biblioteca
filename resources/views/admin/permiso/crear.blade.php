@extends("theme.$theme.layout")

@section('titulo')
Permisos
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline card-success mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Crear Permisos</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                              <i class="fas fa-minus"></i></button>
                          </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        Aqui va el formulario.
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

@endsection
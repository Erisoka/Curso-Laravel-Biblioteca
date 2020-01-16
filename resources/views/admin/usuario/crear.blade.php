@extends("theme.$theme.layout")

@section('titulo')
Sistema Usuario
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/usuario/crear.js")}}" type="text/javascript"></script>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-warning')
            @include('includes.mensaje')
            <div class="card card-outline card-success mt-3">
                <div class="card-header">
                    <h3 class="card-title">Crear Usuario</h3>
                    <div class="card-tools pull-right">
                        <a href="{{route('usuario')}}" class="btn btn-primary btn-sm"><i class="fas fa-reply"></i> &nbsp;
                            Listar Usuarios</a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    
                    <!-- form start -->
                    <form action="{{ route('guardar_usuario') }}" id="form-general" class="form-horizontal" method="POST"
                        autocomplete="off">
                        @csrf
                        <div class="card-body">
                            @include('admin.usuario.form')
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4">
                                    @include('includes.boton-form-crear')
                                </div>
                                <div class="col-lg-4"></div>
                            </div>
                        </div>
                        <!-- /.card-footer -->

                    </form>

                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

@endsection
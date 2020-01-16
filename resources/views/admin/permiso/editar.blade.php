@extends("theme.$theme.layout")

@section('titulo')
Sistema Permisos
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/permiso/crear.js")}}" type="text/javascript"></script>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-warning')
            @include('includes.mensaje')
            <div class="card card-outline card-warning mt-3">
                <div class="card-header">
                    <h3 class="card-title">Editar Permiso {{$permiso->nombre}}</h3>
                    <div class="card-tools pull-right">
                        <a href="{{route('permiso')}}" class="btn btn-primary btn-sm"><i class="fas fa-reply"></i> &nbsp;
                            Listar Permiso</a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    
                    <!-- form start -->
                    <form action="{{ route('actualizar_permiso', ['id' => $permiso->id])}}" id="form-general" class="form-horizontal" method="POST"
                        autocomplete="off">
                        @csrf @method("put")
                        <div class="card-body">
                            @include('admin.permiso.form')
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    @include('includes.boton-form-editar')
                                </div>
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
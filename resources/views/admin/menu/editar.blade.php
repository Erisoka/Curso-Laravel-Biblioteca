@extends("theme.$theme.layout")

@section('titulo')
Sistema Menús
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/menu/crear.js")}}" type="text/javascript"></script>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-warning')
            @include('includes.mensaje')
            <div class="card card-outline card-success mt-3">
                <div class="card-header">
                    <h3 class="card-title">Editar Menús</h3>
                    <div class="card-tools pull-right">
                        <a href="{{route('menu')}}" class="btn btn-primary btn-sm"><i class="fas fa-reply"></i> &nbsp;
                            Listar Menús</a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body p-0">
                    <!-- form start -->
                    <form action="{{route('actualizar_menu', ['id' => $data->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                        @csrf @method("put")
                        <div class="card-body">
                            @include('admin.menu.form')
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
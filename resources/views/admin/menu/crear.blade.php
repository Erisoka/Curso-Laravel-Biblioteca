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
                    <h3 class="card-title">Crear Menús</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form action="{{ route('guardar_menu') }}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        @include('admin.menu.form')
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                @include('includes.boton-form-crear')
                            </div>  
                        </div>
                    </div>
                    <!-- /.card-footer -->
                </form>

            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

@endsection
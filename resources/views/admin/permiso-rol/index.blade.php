@extends("theme.$theme.layout")

@section('titulo')
Sistema Permisos - Rol
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/permiso-rol/index.js")}}" type="text/javascript"></script>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @include('includes.mensaje')
            <div class="card card-primary card-outline mt-3">
                <div class="card-header">
                    <h3 class="card-title">Persmisos - Rol</h3>
                    <div class="card-tools pull-right">
                        <a href="{{route('crear_permiso')}}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> &nbsp; Crear Permiso</a>
                        <a href="{{route('crear_rol')}}" class="btn btn-success btn-sm"><i
                                class="fas fa-plus-circle"></i> &nbsp; Crear rol</a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    @csrf
                    <table class="table table-striped table-bordered table-hover" id="tabla-data">
                        <thead>
                            <tr>
                                <th>Permiso</th>
                                @foreach ($rols as $id => $nombre)
                                <th class="text-center">{{ $nombre }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permisos as $key => $permiso)

                                <tr>
                                    <td class="font-weight-bold">{{$permiso["nombre"]}}</td>
                                    @foreach($rols as $id => $nombre)
                                        <td class="text-center">
                                            <input type="checkbox" class="permiso_rol" name="permiso_rol[]"
                                                data-permisoid={{$permiso[ "id"]}} value="{{$id}}"
                                                {{in_array($id, array_column($permisosRols[$permiso["id"]], "id"))? "checked" : ""}}>
                                        </td>
                                    @endforeach
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

@endsection
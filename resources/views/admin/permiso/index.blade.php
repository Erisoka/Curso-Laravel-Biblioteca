@extends("theme.$theme.layout")

@section('titulo')
Sistema Permisos
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @include('includes.mensaje')
                <div class="card card-primary card-outline mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Permisos</h3>
                        <div class="card-tools">
                            <a href="{{route('crear_permiso')}}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> &nbsp; Crear Permiso</a>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                              <i class="fas fa-minus"></i></button>
                          </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-hover table-striped" id="tabla-data">
                            <thead>
                                <tr>
                                    <th class="width70">Id</th>
                                    <th>Nombre</th>
                                    <th>Slug</th>
                                    <th class="width90"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permisos as $permiso)
                                    <tr>
                                        <td>{{ $permiso->id }}</td>
                                        <td>{{ $permiso->nombre }}</td>
                                        <td>{{ $permiso->slug }}</td>
                                        <td>
                                            <a href="{{route('editar_permiso', ['id' => $permiso->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{route('eliminar_permiso', ['id' => $permiso->id])}}" class="d-inline form-eliminar" method="POST">
                                                @csrf @method("delete")
                                                <button type="submit" class="btn-accion-tabla eliminar tooltipsC">
                                                    <i class="fas fa-times-circle text-danger" title="Eliminar este registro"></i>
                                                </button>
                                            </form>
                                        </td>
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
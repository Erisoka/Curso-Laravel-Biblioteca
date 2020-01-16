@extends("theme.$theme.layout")

@section('titulo')
Sistema Usuarios
@endsection

<!-- admin/index.js se encarga de mostrar el sweet alert de eliminacion de un registro con id="tabla-data" -->
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
                        <h3 class="card-title">Usuarios</h3>
                        <div class="card-tools">
                            <a href="{{route('crear_usuario')}}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> &nbsp; Crear Usuario</a>
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
                                    <th>Usuario</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th class="width90"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->id }}</td>
                                        <td>{{ $usuario->usuario }}</td>
                                        <td>{{ $usuario->nombre }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>
                                            @foreach ($usuario->roles as $rol)
                                                {{$loop->last ? $rol->nombre : $rol->nombre . ', '}}
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{route('editar_usuario', ['id' => $usuario->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{route('eliminar_usuario', ['id' => $usuario->id])}}" class="d-inline form-eliminar" method="POST">
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
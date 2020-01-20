@extends("theme.$theme.layout")

@section('titulo')
Sistema Libros
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/libro/index.js")}}" type="text/javascript"></script>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @csrf <!-- Token hiden para las peticiones post, en este caso para el ajax que invoca al modal -->
                @include('includes.form-warning') <!-- errores de formularios (aqui creo que no se necesita)-->
                @include('includes.mensaje')
                <div class="card card-primary card-outline mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Libros</h3>
                        <div class="card-tools pull-right">
                            <a href="{{route('crear_libro')}}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> &nbsp; Crear Libro</a>
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
                                    <th>Titulo</th>
                                    <th>Cantidad</th>
                                    <th class="width90"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td class="width70">{{ $data->id }}</td>
                                        <td><a href="{{route('ver_libro', $data)}}" class="ver-libro">{{ $data->titulo }}</a></td>
                                        <td>{{$data->cantidad}}</td>
                                        <td>
                                            <a href="{{route('editar_libro', ['id' => $data->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{route('eliminar_libro', ['id' => $data->id])}}" class="d-inline form-eliminar" method="POST">
                                                @csrf @method("delete")
                                                <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                                                    <i class="fa fa-fw fa-trash text-danger"></i>
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

    <div class="modal fade" id="modal-ver-libro" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title">Libro</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                </div>

                <!-- Aqui se pinta el html respuesta del ajaxrequest --> 
                <div class="modal-body"></div> 

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
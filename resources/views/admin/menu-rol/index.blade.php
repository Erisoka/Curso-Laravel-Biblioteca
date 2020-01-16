@extends("theme.$theme.layout")

@section('titulo')
Sistema Menú - Roles
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/menu-rol/index.js")}}" type="text/javascript"></script>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @include('includes.mensaje')
            <div class="card card-primary card-outline mt-3">
                <div class="card-header">
                    <h3 class="card-title">Menú - Roles</h3>
                    <div class="card-tools pull-right">
                        <a href="{{route('crear_menu')}}" class="btn btn-success btn-sm pull-right">
                            <i class="fas fa-plus-circle"></i> &nbsp;Crear menú</a>
                        <a href="{{route('crear_rol')}}" class="btn btn-success btn-sm"><i
                                class="fas fa-plus-circle"></i> &nbsp;Crear rol</a>
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
                                <th>Menú</th>
                                @foreach ($rols as $id => $nombre)
                                <th class="text-center">{{ $nombre }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $key => $menu)

                                @if ($menu["menu_id"] != 0)
                                    @break
                                @endif

                                <tr>
                                    <td class="font-weight-bold"><i class="fa fa-arrows-alt"></i> {{$menu["nombre"]}}</td>
                                    @foreach($rols as $id => $nombre)
                                        <td class="text-center">
                                            <input type="checkbox" class="menu_rol" name="menu_rol[]"
                                                data-menuid={{$menu[ "id"]}} value="{{$id}}"
                                                {{in_array($id, array_column($menusRols[$menu["id"]], "id"))? "checked" : ""}}>
                                        </td>
                                    @endforeach
                                </tr>

                                @foreach($menu["submenu"] as $key => $hijo)
                                    <tr>
                                        <td class="pl-40"><i class="fa fa-arrow-right"></i> {{ $hijo["nombre"] }}</td>
                                        @foreach($rols as $id => $nombre)
                                            <td class="text-center">
                                                <input type="checkbox" class="menu_rol" name="menu_rol[]"
                                                    data-menuid={{$hijo[ "id"]}} value="{{$id}}"
                                                    {{in_array($id, array_column($menusRols[$hijo["id"]], "id"))? "checked" : ""}}>
                                            </td>
                                        @endforeach
                                    </tr>
                                    @foreach ($hijo["submenu"] as $key => $hijo2)
                                        <tr>
                                            <td class="pl-60"><i class="fa fa-arrow-right"></i> {{$hijo2["nombre"]}}</td>
                                            @foreach($rols as $id => $nombre)
                                                <td class="text-center">
                                                    <input type="checkbox" class="menu_rol" name="menu_rol[]"
                                                        data-menuid={{$hijo2[ "id"]}} value="{{$id}}"
                                                        {{in_array($id, array_column($menusRols[$hijo2["id"]], "id"))? "checked" : ""}}>
                                                </td>
                                            @endforeach
                                        </tr>
                                        @foreach ($hijo2["submenu"] as $key => $hijo3)
                                            <tr>
                                                <td class="pl-80"><i class="fa fa-arrow-right"></i> {{$hijo3["nombre"]}}</td>
                                                @foreach($rols as $id => $nombre)
                                                    <td class="text-center">
                                                        <input type="checkbox" class="menu_rol" name="menu_rol[]"
                                                            data-menuid={{$hijo3[ "id"]}} value="{{$id}}"
                                                            {{in_array($id, array_column($menusRols[$hijo3["id"]], "id"))? "checked" : ""}}>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endforeach

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
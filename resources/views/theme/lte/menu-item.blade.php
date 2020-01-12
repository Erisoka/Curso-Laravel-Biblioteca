@if ($item["submenu"] == [])
<li class="nav-item">
    <a href="{{url($item['url'])}}" class="{{getAnclaActivo($item["url"])}}">
      <i class="nav-icon fa {{$item["icono"]}}"></i> 
      <p>{{$item["nombre"]}}</p>
    </a>
</li>
@else
<li class="{{getMenuActivo($item["url"])}}">
    <a href="javascript:;" class="{{getAnclaActivo($item["url"])}}">
      <i class="nav-icon fa {{$item["icono"]}}"></i> 
      <p>{{$item["nombre"]}}
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
        @foreach ($item["submenu"] as $submenu)
            @include("theme.$theme.menu-item", ["item" => $submenu])
        @endforeach
    </ul>
</li>
@endif
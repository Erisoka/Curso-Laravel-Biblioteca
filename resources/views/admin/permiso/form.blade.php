<div class="form-group row">
    <label for="nombre" class="col-lg-3 col-form-label requerido">Nombre</label>
    <div class="col-lg-8">
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $permiso->nombre ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="nombre" class="col-lg-3 col-form-label requerido">Slug</label>
    <div class="col-lg-8">
        <input type="text" name="slug" id="slug" class="form-control" value="{{old('slug', $permiso->slug ?? '')}}" required/>
    </div>
</div>
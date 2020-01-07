@if ($errors->any())

    <div class="alert alert-warning alert-dismissible mt-3">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Atención!</h5>
        El formulario tiene errores: <br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>  

@endif
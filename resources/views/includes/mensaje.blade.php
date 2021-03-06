@if (session('mensaje'))

    <div class="alert alert-success alert-dismissible mt-3" data-auto-dismiss="3000">

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Mensaje Sistema Biblioteca</h5>


        <ul>
            <li>{{ session('mensaje') }}</li>
        </ul>

    </div>  

@endif

@if (session('advertencia'))

    <div class="alert alert-warning alert-dismissible mt-3" data-auto-dismiss="3000">

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Atención!</h5>


        <ul>
            <li>{{ session('advertencia') }}</li>
        </ul>

    </div>  

@endif
<?php 
use App\Models\Admin\Permission;
use Illuminate\Database\Eloquent\Builder;

if (!function_exists('getMenuActivo')) {
    function getMenuActivo($ruta)
    {
        if (request()->is($ruta) || request()->is($ruta . '/*')) {
            return 'nav-item has-treeview menu-open';
        } else {
            return 'nav-item has-treeview';
        }
    }
}
if (!function_exists('getAnclaActivo')) {
    function getAnclaActivo($ruta)
    {
        if (request()->is($ruta) || request()->is($ruta . '/*')) {
            return 'nav-link active';
        } else {
            return 'nav-link';
        }
    }
}
if (!function_exists('canUser')) {
    function can($permiso, $redirect = true)
    {
        if (session()->get('rol_nombre') == 'administrador') {
            return true;
            //return redirect()->action('HomeController@index')->with('mensaje', 'Eres Admin, tienes permiso para entrar al modulo libro')->send();
        } else {
            $rolId = session()->get('rol_id');
            $permisos = cache()->tags('permiso')->rememberForever("permiso.rolid.$rolId", function () {
                return Permission::whereHas('rol', function ($query) {
                    $query->where('rol_id', session()->get('rol_id'));
                })->get()->pluck('slug')->toArray();
            });
            //dd($permisos);
            /* 
            $permisos = Permission::whereHas('rol', function ($query) {
                $query->where('rol_id', session()->get('rol_id'));
                })->get()->pluck('slug')->toArray();

            dd($permisos);
            */
            if (!in_array($permiso, $permisos)) {
                if ($redirect) {
                    if (!request()->ajax())                        
                        return redirect()->route('inicio')->with('mensaje', 'No tienes permisos para entrar en este modulo')->send();
                    abort(403, 'No tiene permiso');
                } else {
                    return false;
                }
            }
            return true;
        }
    }
}
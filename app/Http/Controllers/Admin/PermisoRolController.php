<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Permission;
use App\Models\Admin\Rol;

class PermisoRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        $permisos = Permission::get();
        $permisosRols = Permission::with('rol')->get()->pluck('rol', 'id')->toArray();
        return view('admin.permiso-rol.index', compact('rols', 'permisos', 'permisosRols'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        if ($request->ajax()) {
            cache()->tags('permiso')->flush();
            $permisos = new Permission();
            if ($request->input('estado') == 1) {
                $permisos->find($request->input('permiso_id'))->rol()->attach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El rol se asigno correctamente',
                'tipo' => 1
                ]);
            } else {
                $permisos->find($request->input('permiso_id'))->rol()->detach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El rol se elimino correctamente',
                'tipo' => 0
                ]);
            }
        } else {
            abort(404);
        }
    }
}
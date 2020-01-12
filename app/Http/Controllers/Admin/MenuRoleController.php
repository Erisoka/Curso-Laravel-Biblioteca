<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Admin\Rol;
use Illuminate\Http\Request;

class MenuRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        $menus = Menu::getMenu();
        //$menusRols = Menu::with('rol')->get()->pluck('roles', 'id')->toArray();
        $menusRols = Menu::with('rol')->get()->pluck('rol', 'id')->toArray();
        return view('admin.menu-rol.index', compact('rols', 'menus', 'menusRols'));
        //dd($rols);
        //dd($menus);
        //dd($menusRols);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $menus = new Menu();
            if ($request->input('estado') == 1) {
                $menus->find($request->input('menu_id'))->rol()->attach($request->input('rol_id'));
                return response()->json([
                    'respuesta' => 'El rol se asigno correctamente',
                    'tipo' => 1
                ]);
            } else {
                $menus->find($request->input('menu_id'))->rol()->detach($request->input('rol_id'));
                return response()->json([
                    'respuesta' => 'El rol se elimino correctamente',
                    'tipo' => 0
                ]);
            }
        } else {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

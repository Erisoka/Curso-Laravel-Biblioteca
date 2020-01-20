<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionLibro;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Cache::put('prueba', 'Esto es un dato en cache');
        //dd(Cache::get('prueba'));
        //can('listar-libros');
        //dd(session()->all());

        /* PRUEBAS REDIS */
        //Cache::put('prueba', 'Esto es un dato en cache');
        //dd(Cache::get('prueba'));
        //Cache::tags(['permiso'])->put('persmiso.admin', ['listar-libros', 'crear-libros']);
        //dd(Cache::tags('permiso')->get('persmiso.admin'));
        //Cache::tags(['permiso'])->flush();

        can('listar-libros');
        $datas = Libro::orderBy('id')->get();
        return view('libro.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('crear-libros');
        return view('libro.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionLibro $request)
    {
        //dd($request->all());
        if ($foto = Libro::setCaratula($request->foto_up))
            $request->request->add(['foto' => $foto]);
        Libro::create($request->all());
        return redirect()->route('libro')->with('mensaje', 'El libro se creo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ver(Request $request, Libro $libro)
    {
        //dd($libro);
        /*
            para que el libro se pueda ver en el modal
            se pregunta si el request es ajax, ya que la vista no esta
            preparada para verse en una ventana de blade, sino en un modal invocado por ajax
            ademas, como la imagen de la caratula no esta en la carpeta publica, sino en storage
            hay que ejecutar previamente un comando artisan
            php artisan storage:link
            que creara un link simbolico de la carpeta public/storage a storage/app/public
            que es donde realmente se estan almacenando las caratulas
        */
        if ($request->ajax()) {
            return view('libro.ver', compact('libro'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $data = Libro::findOrFail($id);
        return view('libro.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionLibro $request, $id)
    {
        $libro = Libro::findOrFail($id);
        if ($foto = Libro::setCaratula($request->foto_up, $libro->foto))
            $request->request->add(['foto' => $foto]);
        $libro->update($request->all());
        return redirect()->route('libro')->with('mensaje', 'El libro se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {   /*
        if ($request->ajax()) {
            $libro = Libro::findOrFail($id);
            if (Libro::destroy($id)) {
                Storage::disk('public')->delete("imagenes/caratulas/$libro->foto");
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
        */
    }
}

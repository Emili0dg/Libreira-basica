<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Rules\SinCaracteresEspeciales;
use Illuminate\Http\Request;

class LibrosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $libros = Libro::paginate(2);
        $data = [
            'libro'=>$libros
        ];

        return view('LIBROS.index', $data);
    }
    
    public function create()
    {
        return view('LIBROS.create');
    }

    public function store(Request $request)
    {
        $libros = new Libro();
        $libros->id = $request->id;
        $libros->nombre_libro = $request->nombre_libro;
        $libros->precio_libro = $request->precio_libro;
        $libros->sinopsis_libro = $request->sinopsis_libro;
        if ($request->hasFile('imglibro')) {
            $filename = time().'.'.$request->imglibro->getClientOriginalName();
            $request->imglibro->move(public_path('images/admin'), $filename);
            $libros->imglibro = $filename;
        }
        $libros->save();
        return redirect()->route('libros.index');
    }

    public function edit($id)
    {
        $libros = Libro::find($id);
        $data = [
            'libros'=>$libros
        ];
        return view('LIBROS.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $libros = Libro::find($id);
        $libros->id = $request->id;
        $libros->nombre_libro = $request->nombre_libro;
        $libros->precio_libro = $request->precio_libro;
        $libros->sinopsis_libro = $request->sinopsis_libro;
        if ($request->hasFile('imglibro')) {
            $filename = time().'.'.$request->imglibro->getClientOriginalName();
            $request->imglibro->move(public_path('images/admin'), $filename);
            $libros->imglibro = $filename;
        }
        $libros->save();
        return redirect()->route('libros.index');
    }

    public function destroy($id)
    {
        $eliminar = Libro::find($id);
        $eliminar->delete();
        return redirect()->route('libros.index');
    }
}

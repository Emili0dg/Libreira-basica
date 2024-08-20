<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function index()
    {
        $carrito = Carrito::all();
        $data = [
            'carrito' => $carrito
        ];

        return view('CARRITO.index', $data);
    }

    public function add(Request $request)
    {
        $libros = new Carrito();
        $libros->id = $request->id;
        $libros->nombre_libro = $request->nombre_libro;
        $libros->precio_libro = $request->precio_libro;
        $libros->imglibro = $request->imglibro;
        $libros->quantity = $request->quantity;
        $libros->save();
        return response()->json([
            'message' => 'Producto añadido al carrito exitosamente',
            'libro' => $libros
        ], 200);
    }

    public function remove($id)
    {
        $eliminar = Carrito::find($id);
        $eliminar->delete();
        return redirect()->route('carrito.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $libros = Libro::where('nombre_libro','LIKE','%'.$busqueda.'%')
                        ->latest('id')
                        ->get();

        $sliders = Slider::all();

        return view('index', ['libro' => $libros, 'slider' => $sliders,]);
    }

    public function wishlist()
    {
        return view('wishlist');
    }

    public function view($id)
    {
        $libro = Libro::find($id);
        $data = [
            'libro'=>$libro
        ];
        return view('view', $data);
    }
}

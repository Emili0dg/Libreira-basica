<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class NuevosController extends Controller
{
    public function index()
    {
        $libros = Libro::paginate(3);

        return view('NUEVOS.nuevo', ['libro' => $libros]);
    }
}

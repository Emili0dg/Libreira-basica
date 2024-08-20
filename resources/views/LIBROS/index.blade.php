@extends('adminlte::page')

@section('title', 'Libros')

@section('content_header')
    <h1 class="m-0 text-dark">Creación de Libros</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-6">
                            <hr>
                                <h3>IMPORTANTE: Siempre tener 4 o mas productos activos</h3>
                                <a href="{{route('libros.create')}}">Crear publicación de un Libro</a>
                            <hr>
                        
                            <table class="table">
                                <thead>
                                    <th>id</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>sinopsis</th>
                                    <th>img</th>
                                </thead>
                                <tbody>
                                    @foreach ($libro as $libros)
                                        <tr>
                                            <td>{{$libros->id}}</td>
                                            <td>{{$libros->nombre_libro}}</td>
                                            <td>${{$libros->precio_libro}} MXN</td>
                                            <td>{{$libros->sinopsis_libro}}</td>
                                            <td style="width: 10%">
                                                <img class="w-100" src="{{asset('images/admin/' . $libros->imglibro)}}" alt="">
                                            </td>
                                            <td>
                                                <a href="{{route('libros.edit', $libros->id)}}" class="btn btn-primary">Editar</a>
                                                <form action="{{route('libros.destroy', $libros->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="Eliminar" class="btn btn-danger">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">{{$libro->links()}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop
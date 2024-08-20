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
                        <div class="col-lg-12 col-12">
                            <form action="{{route('libros.update', $libros->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <label for="">Nombre del Libro</label>
                                    <input class="form-control" type="text" name="nombre_libro" placeholder="Escriba aquí" value="{{$libros->nombre_libro}}" required>
                                </div>
                                <div>
                                    <label for="">Precio del Libro</label>
                                    <input class="form-control" type="text" name="precio_libro" placeholder="Escriba aquí" value="{{$libros->precio_libro}}" required>
                                </div>
                                <div>
                                    <label for="">Sinopsis del Libro</label>
                                    <input class="form-control" type="text" name="sinopsis_libro" placeholder="Escriba aquí" value="{{$libros->sinopsis_libro}}" required>
                                </div>
                                <div>
                                    <label for="">img del Libro</label>
                                    <input class="form-control" type="file" name="imglibro" value="{{$libros->imglibro}}">
                                </div>
                                <div>
                                    <input class="form-control btn btn-success" type="submit" value="Enviar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop
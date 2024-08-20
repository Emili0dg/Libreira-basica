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
                                        @if ($libros->isNew())
                                        <tr>
                                            <td>{{$libros->id}}</td>
                                            <td>{{$libros->nombre_libro}}</td>
                                            <td>{{$libros->precio_libro}}</td>
                                            <td>{{$libros->sinopsis_libro}}</td>
                                            <td style="width: 10%">
                                                <img class="w-100" src="{{asset('images/admin/' . $libros->imglibro)}}" alt="">
                                            </td>
                                        </tr>
                                        @endif
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
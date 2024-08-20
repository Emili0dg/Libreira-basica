@extends('adminlte::page')

@section('title', 'Libros')

@section('content_header')
    <h1 class="m-0 text-dark">Creación de Slider</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <section class="content">
                <div class="container-fluid">
                    <hr>
                        <h3>IMPORTANTE: Siempre tener 4 o mas productos activos</h3>    
                        <a href="{{route('slider.create')}}">Crear slider de un Libro</a>
                    <hr>
                    <div class="row">
                        @foreach ($slider as $sliders)    
                            <div class="col-lg-4 col-6">
                                <table class="table">
                                    <thead>
                                        <th>id</th>
                                        <th>Imagen</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$sliders->id}}</td>
                                            <td style="width: 10%">
                                                <img class="w-100" src="{{asset('images/slider/' . $sliders->imgslider)}}" alt="">
                                            </td>
                                            <td>
                                                <a href="{{route('slider.edit', $sliders->id)}}" class="btn btn-primary">Editar</a>
                                                <form action="{{route('slider.destroy', $sliders->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="Eliminar" class="btn btn-danger">
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop
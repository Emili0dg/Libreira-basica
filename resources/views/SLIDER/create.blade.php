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
                            <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <label for="">img del Libro</label>
                                    <input class="form-control" type="file" name="imgslider" required>
                                </div>
                                <div>
                                    <hr>
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
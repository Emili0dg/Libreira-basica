@extends('adminlte::page')

@section('title', 'Administrador')

@section('content_header')
    <h1 class="m-0 text-dark">Admin</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                            <div class="inner">
                                <h3 class="text-white">Slider Libros</h3>

                                <p class="text-white">Slider de libros</p>
                            </div>
                            <div class="icon">
                                <i class="icon fas fa-edit"></i>
                            </div>
                            <a href="{{url('/admin/slider')}}" class="small-box-footer" style="color:white !important;">Ir <i class="fas fa-arrow-circle-right text-white"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                            <div class="inner">
                                <h3 class="text-white">Libros</h3>

                                <p class="text-white">Creación de libros</p>
                            </div>
                            <div class="icon">
                                <i class="icon fas fa-book"></i>
                            </div>
                            <a href="{{url('/admin/libros')}}" class="small-box-footer" style="color:white !important;">Ir <i class="fas fa-arrow-circle-right text-white"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                            <div class="inner">
                                <h3 class="text-white">Nuevos Libros</h3>

                                <p class="text-white">Creación de Nuevos libros</p>
                            </div>
                            <div class="icon">
                                <i class="icon fas fa-plus"></i>
                            </div>
                            <a href="{{url('/admin/nuevos')}}" class="small-box-footer" style="color:white !important;">Ir <i class="fas fa-arrow-circle-right text-white"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop

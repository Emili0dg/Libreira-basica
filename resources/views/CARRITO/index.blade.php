<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <!--=============== FAVICON ===============-->
      <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">

      <!--=============== SWIPER CSS ===============-->
      <link rel="stylesheet" href="css/swiper-bundle.min.css">

      <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="css/styles.css">

      <link rel="stylesheet" href="css/carrito.css">
      
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

      <title>Book Hub | Carrito</title>
   </head>
   <body>
      <!--==================== HEADER ====================-->
      <header class="header" id="header">
         <nav class="nav container">
            <a href="/" class="nav__logo m-0">
                <i class="ri-book-3-line"></i> Book Hub
            </a>

            <div class="nav__menu">
                <ul class="nav__list m-0">
                    <li class="nav__item">
                        <a href="/#home" class="nav__link">
                            <i class="ri-home-line"></i>
                            <span>Inicio</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="/#featured" class="nav__link">
                            <i class="ri-book-3-line"></i>
                            <span>Novedades</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="/#discount" class="nav__link">
                            <i class="ri-price-tag-3-line"></i>
                            <span>Descuentos</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="/#new" class="nav__link">
                            <i class="ri-bookmark-line"></i>
                            <span>Nuevos</span>
                        </a>
                    </li>
            </div>

            <div class="nav__actions">
                <i class="ri-search-line search-button" id="search-button" ></i>
 
                <!--a href=""><i class="ri-heart-3-line"></i></a-->
 
                <a class="navbar-brand" href="{{ url('/carrito') }}" id="cart-icon"><i class="fi fi-rr-shopping-cart"></i></a>
            </div>
         </nav>
      </header>

      <!--==================== SEARCH ====================-->
      <div class="search" id="search-content">
        <form action="" class="search__form">
            <i class="ri-search-line search__icon"></i>
            <input type="search" placeholder="Ej. Juguemos a leer" class="search__input">
        </form>

        <i class="ri-close-line search__close" id="search-close"></i>
      </div>

      <!--==================== MAIN ====================-->
        <main class="main"> 
            <section class="home section h-100" id="home">
            <div class="container">
                <h1 class="home__title">Carrito de Compras</h1>
                <div class="row">
                        <div class="col-8">
                            <div class="row">
                                @foreach ($carrito as $carritos)
                                    <div class="col-12 carrito-contenido">
                                        <img src="{{asset('images/admin/' . $carritos->imglibro)}}" alt="image" class="featured__img m-0">
                                        <div class="carrito-info">
                                            <h4>{{$carritos->nombre_libro}}</h4>
                                            <p>${{$carritos->precio_libro}} MXN</p>
                                            <p>Cantidad: {{$carritos->quantity}}</p>
                                            <form action="{{ route('carrito.remove', $carritos->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button><i class="fi fi-rr-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    <div class="col-4">
                        <h1>Resumen</h1>
                        @php
                            $totalGeneral = 0;
                        @endphp
                        @foreach ($carrito as $carritos)
                            @php
                                $precio = floatval($carritos->precio_libro);
                                $cantidad = intval($carritos->quantity);
                        
                                $subtotal = $precio * $cantidad;
                        
                                $totalGeneral += $subtotal;
                            @endphp
                        @endforeach
                        <div class="carrito-pagar">
                            <p>Subtotal</p>
                            <p>{{$totalGeneral}} MXN</p>
                        </div>
                        <div class="carrito-pagar">
                            <p>Gastos de envío y gestión estimados</p>
                            <p>Gratis</p>
                        </div>
                        <hr>
                        <div class="carrito-pagar">
                            <p>Total</p>
                            <p>{{$totalGeneral}} MXN</p>
                        </div>
                        <input class="btn-comprar" type="submit" value="Comprar">
                    </div>
                </div>
            </div>
            </section>
        </main>
   </body>
</html>

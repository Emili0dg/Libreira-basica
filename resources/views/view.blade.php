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
      <link rel="stylesheet" href="/css/swiper-bundle.min.css">

      <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="/css/styles.css">

      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <title>Book Hub</title>
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

      <!--==================== MAIN ====================-->
      <main class="main">
        <!--==================== FEATURED ====================-->
        <section>
            <div style="display:flex;height:100vh;align-items:center;justify-content:center;">
                <div style="width: 50%">
                    <img src="{{asset('images/admin/' . $libro->imglibro)}}" alt="image" class="featured__img m-0" style="width: 50%">
                </div>
                <div style="width: 50%;padding-right:5%;">
                    <h3 class="home__title">{{$libro->nombre_libro}}</h3>
                    <p>{{$libro->sinopsis_libro}}</p>
                    <hr>
                    <p>Precio: ${{$libro->precio_libro}}</p>

                    <form id="carritoForm-{{ $libro }}" action="{{ route('carrito.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="nombre_libro" value="{{ $libro->nombre_libro }}">
                        <input type="hidden" name="precio_libro" value="{{ $libro->precio_libro }}">
                        <input type="hidden" name="imglibro" value="{{$libro->imglibro}}">
                        <div>
                            <label for="">Cantidad: </label>
                            <input type="number" name="quantity" value="1" min="1" style="background-color: transparent; text-align:center; width:50%; margin-bottom:1vh;">
                        </div>
                        <button class="button" type="submit">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </section>
      </main>

      <!--=============== SWIPER JS ===============-->
      <script src="/js/swiper-bundle.min.js"></script>

      <!--=============== MAIN JS ===============-->
      <script src="/s/main.js"></script>

      <!--=============== Agregar al carrito ===============-->
      <script>
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('form[id^="carritoForm-"]');

            forms.forEach(form => {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();

                    const formData = new FormData(form);

                    fetch('{{ route('carrito.add') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Respuesta recibida:', data);
                        if (data.message) {
                            Swal.fire({
                                icon: 'success',
                                title: '¡Éxito!',
                                text: data.message
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Error al agregar el producto al carrito'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Hubo un problema al procesar la solicitud'
                        });
                    });
                });
            });
        });
      </script>
        

   </body>
</html>
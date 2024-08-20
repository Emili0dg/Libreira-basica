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

      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <title>Book Hub</title>
   </head>
   <body>
      <!--==================== HEADER ====================-->
      <header class="header" id="header">
         <nav class="nav container">
            <a href="/" class="nav__logo">
                <i class="ri-book-3-line"></i> Book Hub
            </a>

            <div class="nav__menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link">
                            <i class="ri-home-line"></i>
                            <span>Inicio</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="#featured" class="nav__link">
                            <i class="ri-book-3-line"></i>
                            <span>Novedades</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="#discount" class="nav__link">
                            <i class="ri-price-tag-3-line"></i>
                            <span>Descuentos</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="#new" class="nav__link">
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
        <form action="{{route('pagina.index')}}" class="search__form" method="GET">
            <i class="ri-search-line search__icon"></i>
            <input type="search" name="busqueda" placeholder="Ej. Juguemos a leer" class="search__input">
        </form>

        <i class="ri-close-line search__close" id="search-close"></i>
      </div>

      <!--==================== LOGIN ====================-->
      <div class="login grid" id="login-content">
         <form action="" class="login__form grid">
            <h3 class="login__title">Iniciar Sesión</h3>
            <div class="login__group grid">
                <div>
                    <label for="login-email" class="login__label">Correo</label>
                    <input type="email" placeholder="ejemplo@gmail.com" id="login-email" class="login__input">
                </div>

                <div>
                    <label for="login-pass" class="login__label">Contraseña</label>
                    <input type="password" id="login-pass" class="login__input">
                </div>
            </div>

            <div>
                <span class="login__signup">
                    ¿No tienes una cuenta? <a href="#">Registrate</a>
                </span>
                <a href="#" class="login__forgot">
                    ¿Olvidaste tu contraseña?
                </a>

                <button type="submit" class="login__button button">Iniciar Sesión</button>
            </div>
         </form>

         <i class="ri-close-line login__close" id="login-close"></i>
      </div>

      <!--==================== MAIN ====================-->
      <main class="main">
         <!--==================== HOME ====================-->
         <section class="home section" id="home">
            <div class="home__container container grid">
                <div class="home__data">
                    <h1 class="home__title">
                        Buscar & <br>
                        Selecionar libros
                    </h1>

                    <p class="home__description">Encuentre los mejores libros de manera digital
                        para sus hijos y poder ayudarlos a crecer y desarrollarse como unos Book Hub.
                    </p>

                    <a href="#featured" class="button">Explore aquí</a>
                </div>

                <div class="home__images">
                    <div class="home__swiper swiper">
                        <div class="swiper-wrapper">
                            @foreach ($slider as $sliders)
                                <article class="home__article swiper-slide">
                                    <img src="{{asset('images/slider/' . $sliders->imgslider)}}" alt="image" class="home__img" style="padding: .5vh">
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
                </div>
            </div>
         </section>

         <!--==================== SERVICES ====================-->
         <section class="services section">
            <div class="services__container container grid">
                <article class="services__card">
                    <i class="ri-truck-line"></i>
                    <h3 class="services__title">Envios gratis</h3>
                    <p class="services__description">En pedidos mayores a $1000 MXN</p>
                </article>

                <article class="services__card">
                    <i class="ri-lock-2-line"></i>
                    <h3 class="services__title">Pagos seguros</h3>
                    <p class="services__description">Metodos de pago confiables y garantizados</p>
                </article>

                <article class="services__card">
                    <i class="ri-customer-service-2-line"></i>
                    <h3 class="services__title">Soporte 24/7</h3>
                    <p class="services__description">Puede comunicarse cuando guste</p>
                </article>
                </div>
            </div>
         </section>

         <!--==================== FEATURED ====================-->
         <section class="featured section" id="featured">
            <h2 class="section__title">
                Novedades
            </h2>

            <div class="featured__container container">
                <div class="featured__swipper swiper">
                    <div class="swiper-wrapper">
                        @foreach ($libro as $index => $libros)
                        <article class="featured__card swiper-slide">
                            <img src="{{asset('images/admin/' . $libros->imglibro)}}" alt="image" class="featured__img">

                            <h2 class="featured__title">{{$libros->nombre_libro}}</h2>
                            <div class="featured__prices">
                                <span class="featured__discount">{{$libros->precio_libro}} MXN</span>
                            </div>

                            <form id="carritoForm-{{ $index }}" action="{{ route('carrito.add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="nombre_libro" value="{{ $libros->nombre_libro }}">
                                <input type="hidden" name="precio_libro" value="{{ $libros->precio_libro }}">
                                <input type="hidden" name="imglibro" value="{{$libros->imglibro}}">
                                <div>
                                    <label for="">Cantidad: </label>
                                    <input type="number" name="quantity" value="1" min="1" style="background-color: transparent; text-align:center; width:50%; margin-bottom:1vh;">
                                </div>
                                <button class="button" type="submit">Agregar al carrito</button>
                            </form>

                            <div class="featured__actions">
                                <button><a href="/view/{{$libros->id}}"><i class="ri-eye-line"></i></a></button>
                            </div>
                        </article>
                        @endforeach
                    </div>

                    <div class="swiper-button-prev">
                        <i class="ri-arrow-left-s-line"></i>
                    </div>

                    <div class="swiper-button-next">
                        <i class="ri-arrow-right-s-line"></i>
                    </div>
                </div>
            </div>
         </section>

         <!--==================== DISCOUNT ====================-->
         <section class="discount section" id="discount">
            <div class="discount__container container grid">
                <div class="discount__data">
                    <h2 class="discount__tittle section__title">
                        Hata 50% de descuento
                    </h2>
                    
                    <p class="discount__description">
                        Aprovecha los días de descuento que tenemos para ti, compra libros de tus escritores favoritos, mientras más compres más descuentos tenemos para ti.
                    </p>

                    <a href="#featured" class="button">Shop Now</a>
                </div>

                <div class="discount__images">
                    <img src="images/discount-book-1.png" alt="" class="discount__img-1">
                    <img src="images/discount-book-2.png" alt="" class="discount__img-2">
                </div>
            </div>
         </section>

         <!--==================== NEW BOOKS ====================-->
         <section class="new section" id="new">
            <h2 class="section__title">
                Nuevos Libros
            </h2>

            <div class="new__container container">
                <div class="new__swiper swiper">
                    <div class="swiper-wrapper">
                        @foreach ($libro as $libros)
                            @if ($libros->isNew())
                                <a href="/view/{{$libros->id}}" class="new__card swiper-slide">
                                    <img src="{{asset('images/admin/' . $libros->imglibro)}}" alt="" class="mew__img">

                                    <div>
                                        <h2 class="new__title">{{$libros->nombre_libro}}</h2>
                                        <div class="new__prices">
                                            <span class="new__discount">{{$libros->precio_libro}}</span>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>            
         </section>

         <!--==================== JOIN ====================-->
         <!--section class="join section">
            <div class="join__container">
                <img src="images/join-bg.jpg" alt="" class="join__bg">

                <div class="join__data container grid">
                    <h2 class="join__title section__title">
                        Suscríbete para recibir <br> las últimas actualizaciones
                    </h2>

                    <form action="" class="join__form">
                        <input type="email" placeholder="Ingresa tu correo" class="join__input">
                        <button type="submit" class="join__button button">Suscribete</button>
                    </form>
                </div>
            </div>
         </section-->
      </main>

      <!--==================== FOOTER ====================-->
      <!--footer class="footer">
         <div class="footer__container container grid">
            <div>
                <a href="#" class="footer__logo">
                    <i class="ri-book-3-line"></i> E-Book
                </a>

                <p class="footer__description">
                    Encuentra y explora los mejores <br>
                    Libros electrónicos de todos tus <br>
                    escritores favoritos.
                </p>
            </div>

            <div class="footer__data grid">
                <div>
                    <h3 class="footer__tittle">Sobre</h3>

                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link">Premios</a>
                        </li>

                        <li>
                            <a href="#" class="footer__link">FAQs</a>
                        </li>

                        <li>
                            <a href="#" class="footer__link">Politica de privacidad</a>
                        </li>

                        <li>
                            <a href="#" class="footer__link">Terminos de servicios</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="footer__tittle">Compañia</h3>

                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link">Blogs</a>
                        </li>

                        <li>
                            <a href="#" class="footer__link">Comunidad</a>
                        </li>

                        <li>
                            <a href="#" class="footer__link">Nuestro equipo</a>
                        </li>

                        <li>
                            <a href="#" class="footer__link">Centro de ayuda</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="footer__tittle">Contacto</h3>

                    <ul class="footer__links">
                        <li>
                            <address class="footer__info">
                                Av. Alfonso Reyes <br> San Nicolas De Los Garza, <br> Nuevo Leon
                            </address>
                        </li>

                        <li>
                            <address class="footer__info">
                                contactouni@uanl.mx <br>
                                81 8329 4000
                            </address>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="footer__tittle">Social</h3>

                    <div class="footer__social">
                        <a href="https://es-la.facebook.com/" targer="_blank" class="footer__social-link">
                            <i class="ri-facebook-circle-line"></i>
                        </a>

                        <a href="https://www.instagram.com/" targer="_blank" class="footer__social-link">
                            <i class="ri-instagram-line"></i>
                        </a>

                        <a href="https://twitter.com/" targer="_blank" class="footer__social-link">
                            <i class="ri-twitter-x-line"></i>
                        </a>
                    </div>
                </div>
            </div>
         </div>

         <span class="footer__copy">
            &#169; IHC Equipo PIA
         </span>
      </footer-->

      <!--========== SCROLL UP ==========-->
      

      <!--=============== SCROLLREVEAL ===============-->
      <script src=""></script>

      <!--=============== SWIPER JS ===============-->
      <script src="js/swiper-bundle.min.js"></script>

      <!--=============== MAIN JS ===============-->
      <script src="js/main.js"></script>

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
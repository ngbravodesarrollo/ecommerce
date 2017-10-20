<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Noray Joyas</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/flexslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mogra" rel="stylesheet">
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    <script src="https://use.fontawesome.com/d583f2e849.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgbidnz4FMNYwb5k9q0rwaJzSX4vt4Xp8&callback=initMap">
    </script>
    <script type="text/javascript" src="{{asset('js/jquery.flexslider-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/animations.js')}} "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Cuando uso esto me sirve para agregar scripts desde cualquie plantilla a traves del nombre "scripts" -->

    @stack('scripts')
</head>
<body>
<div class="container-fluid">
<nav class="row">       
    <div class="logo">
        <a href="/"><img alt="Noray Joyas"></img></a>          
    </div>              
    <ul  class="nav">                           
        <li>
            <a href="">Lo Nuevo</a>
        </li>
        <li class="item-menu last">
            <a href="">Lo mas buscado</a>
        </li>
        <li >                               
            <a href="">Colecciones</a>
            <div class="mega-menu" >
                <!-- class shell shell-teritary short -->
                <div class="nav-column">
                    <ul class="nav-column-options">
                            <li class="">
                                <a href="#">Acero</a>
                            </li>
                            <li class="">
                                <a href="#">Acero Blanco</a>
                            </li>
                            <li class="">
                                <a href="#">Oro</a>
                            </li>
                            <li class="">
                                <a href="#">Plata</a>
                            </li>
                            <li class="">
                                <a href="#">Linea religiosa</a>
                            </li>
                    </ul>
                </div><!-- /.menu-dropdown-content menu-dropdown-content-teritary -->
                <div class="nav-column">
                    <div class="slider-top">    
                    <!-- esto es dinamico -->   
                        <div class="flexslider content-slider-top">
                            <div class="slider-menu">
                                <ul class="slides">
                                    <li>
                                        <a href="#">
                                            <img src="./img/sliderMenu/dije4.jpg">                                      
                                            <div class="flex-caption">
                                                <p class="description">Nombre del Producto</p>
                                                <p class="description">$Precio</p>
                                            </div>
                                            </a>
                                        <div class="flex-caption">
                                            <button class="btn-comprar"><span class="fa fa-shopping-cart"></span>Comprar</button>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="./img/sliderMenu/dije5.jpg">
                                            <div class="flex-caption">
                                                <p class="description">Nombre del Producto</p>
                                                <p class="description">$Precio</p>
                                            </div>
                                            </a>
                                        <div class="flex-caption">
                                            <button class="btn-comprar"><span class="fa fa-shopping-cart"></span>Comprar</button>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="./img/sliderMenu/dije4.jpg">
                                            <div class="flex-caption">
                                                <p class="description">Nombre del Producto</p>
                                                <p class="description">$Precio</p>
                                            </div>
                                            </a>
                                        <div class="flex-caption">
                                            <button class="btn-comprar"><span class="fa fa-shopping-cart"></span>Comprar</button>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="./img/sliderMenu/dije6.jpg">
                                            <div class="flex-caption">
                                                <p class="description">Nombre del Producto</p>
                                                <p class="description">$Precio</p>
                                            </div>
                                            </a>
                                        <div class="flex-caption">
                                            <button class="btn-comprar"><span class="fa fa-shopping-cart"></span>Comprar</button>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="./img/sliderMenu/dije5.jpg">
                                            <div class="flex-caption">
                                                <p class="description">Nombre del Producto</p>
                                                <p class="description">$Precio</p>
                                            </div>
                                            </a>
                                        <div class="flex-caption">
                                            <button class="btn-comprar"><span class="fa fa-shopping-cart"></span>Comprar</button>
                                        </div>
                                    </li>
                                </ul>       
                            </div><!-- /.slider-menu -->                    
                        </div><!-- /.flexlider -->
                    </div>
                </div><!-- /.menu-dropdown-aside -->
            </div><!-- /.top-menu-dropdown.top-menu-dropdown-secondary -->
        </li>                       
        <li>                                
            <a href="">Productos</a>
            <div class="mega-menu" >
                <!-- class shell shell-teritary short -->
                <div class="nav-column">
                    <ul class="nav-column-options">
                            <li class="">
                                <a href="#">Anillos</a>
                            </li>
                            <li class="">
                                <a href="#">Aros</a>
                            </li>
                            <li class="">
                                <a href="#">Cadenas</a>
                            </li>                           
                            <li class="">
                                <a href="#">Dijes</a>
                            </li>
                            <li class="">
                                <a href="#">Donas</a>
                            </li>
                            <li class="">
                                <a href="#">Esclavas</a>
                            </li>
                            <li class="">
                                <a href="#">Pulseras</a>
                            </li>
                            <li class="">
                                <a href="#">Tobilleras</a>
                            </li>
                    </ul>
                </div><!-- /.menu-dropdown-content menu-dropdown-content-teritary -->
                <div class="nav-column">
                    <div class="slider-top">
                        <div class="flexslider content-slider-top">
                            <!-- esto es dinamico -->
                            <div class="slider-menu">
                                <ul class="slides">
                                    <li>
                                        <a href="#">
                                            <img src="./img/sliderMenu/dije4.jpg">
                                            <div class="flex-caption">
                                                <p class="description">Nombre del Producto</p>
                                                <p class="description">$Precio</p>
                                            </div>
                                            </a>
                                        <div class="flex-caption">
                                            <button class="btn-comprar"><span class="fa fa-shopping-cart"></span>Comprar</button>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="./img/sliderMenu/dije5.jpg">
                                            <div class="flex-caption">
                                                <p class="description">Nombre del Producto</p>
                                                <p class="description">$Precio</p>
                                            </div>
                                            </a>
                                        <div class="flex-caption">
                                            <button class="btn-comprar"><span class="fa fa-shopping-cart"></span>Comprar</button>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="./img/sliderMenu/dije6.jpg">
                                            <div class="flex-caption">
                                                <p class="description">Nombre del Producto</p>
                                                <p class="description">$Precio</p>
                                            </div>
                                            </a>
                                        <div class="flex-caption">
                                            <button class="btn-comprar"><span class="fa fa-shopping-cart"></span>Comprar</button>
                                        </div>
                                    </li>
                                </ul>       
                            </div><!-- /.slider-actions -->                         
                        </div>  
                    </div>          
                </div><!-- /.menu-dropdown-aside -->
            </div><!-- /.top-menu-dropdown.top-menu-dropdown-secondary -->
        </li>
        <li>                                
            <a href="">Inicio</a>
        </li>           
        <li>
            <a href="/">Tienda</a>
        </li>        
    </ul>
    <div class="login">
    @auth
        <a href="{{ url('datos/personales') }}">{{ Auth::user()->email }}</a>
        <i class="fa fa-shopping-cart">0</i>
    @endauth
    @guest
        <a href="{{ route('login') }}">Iniciar sesión</a>/<a href="{{ route('register') }}">Registrase</a>
        <i class="fa fa-shopping-cart">0</i>
    @endguest

    </div>
</nav>
<main class="row" >
    @yield('content')
</main>
<footer class="row">
    <div class="col1 row1">
        <form>
            <h2 class="form-flex-item">Contactenos</h2>
            <input class="form-flex-item" placeholder="Nombre" type="text" name="nombre">
            <input class="form-flex-item" placeholder="Mail" type="text" name="email">
            <textarea placeholder="Mensaje" rows="4" class="form-flex-item textarea"  id="mensaje"></textarea>
            <button class="form-flex-item btn-enviar" id="Enviar mail">Enviar</button>
        </form>
    </div>
    <div class="col2 row1">
        <img src="img/Logo-blanco-01.png">
    </div>
    <div class="col3 row1">
        <h2>Libertad y Av. Corrientes</h2>
        <div id="map" style="width:90%; height: 70%">
        </div>
    </div>
    <div class="col1 row2 redes">
        <i class="fa fa-facebook" aria-hidden="true"></i>
        <i class="fa fa-instagram" aria-hidden="true"></i>
        <i class="fa fa-twitter" aria-hidden="true"></i>
    </div>
    <div class="col2 row2">
        logo afip
    </div>
    <div class="col3 row2">
        logo mercado pago
    </div>
</footer>
</div>
</body>
</html>
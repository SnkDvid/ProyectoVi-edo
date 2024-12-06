<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>Viñedo</title>
    <link rel="icon" type="image/png" href="{{  asset('backend/assets/img/viñedoLogo.png') }}">
    <link rel="stylesheet" href=" {{asset('frontend/css/all.min.css')}} ">
    <link rel="stylesheet" href=" {{asset('frontend/css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href=" {{asset('frontend/css/select2.min.css')}} ">
    <link rel="stylesheet" href=" {{asset('frontend/css/slick.css')}} ">
    <link rel="stylesheet" href=" {{asset('frontend/css/jquery.nice-number.min.css')}} ">
    <link rel="stylesheet" href=" {{asset('frontend/css/jquery.calendar.css')}} ">
    <link rel="stylesheet" href=" {{asset('frontend/css/add_row_custon.css')}} ">
    <link rel="stylesheet" href=" {{asset('frontend/css/mobile_menu.css')}} ">
    <link rel="stylesheet" href=" {{asset('frontend/css/jquery.exzoom.css')}} ">
    <link rel="stylesheet" href=" {{asset('frontend/css/multiple-image-video.css')}} ">
    <link rel="stylesheet" href=" {{asset('frontend/css/ranger_style.css')}} ">
    <link rel="stylesheet" href=" {{asset('frontend/css/jquery.classycountdown.css')}} ">
    <link rel="stylesheet" href=" {{asset('frontend/css/venobox.min.css')}} ">

    <link rel="stylesheet" href=" {{asset('frontend/css/style.css')}} ">
    <link rel="stylesheet" href=" {{asset('frontend/css/responsive.css')}} ">
    <!-- <link rel="stylesheet" href="css/rtl.css"> -->
</head>
<body>

<header>
        <div class="container">
            <div class="row">
                <div class="col-2 col-md-1 d-lg-none">
                    
                </div>
                <div class="col-xl-2 col-7 col-md-8 col-lg-2">
                    <div class="wsus_logo_area">
                        <a class="wsus__header_logo" href="{{route('users.index')}}">
                        <img src="{{ asset('frontend/images/viñedoLogo.png') }}" alt="logo" class="img-fluid w-50 rounded-circle">
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 col-md-6 col-lg-4 d-none d-lg-block">
                </div>
                <div class="col-xl-5 col-3 col-md-3 col-lg-6">
                    <div class="wsus__call_icon_area">
                        <div class="wsus__call_area">
                            <div class="wsus__call">
                                <i class="fas fa-user-headset"></i>
                            </div>
                            <div class="wsus__call_text">
                                <p>ViñedoEmpresa@gmail.com</p>
                                <p>3451234312</p>
                            </div>
                        </div>
                        <ul class="wsus__icon_area">
                            <li><a class="wsus__cart_icon" href="{{ route('checkout') }}"><i
                                        class="fal fa-shopping-bag"></i><span>{{\Cart::count()}}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <nav class="wsus__main_menu d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="relative_contect d-flex">
                        <ul class="wsus__menu_item">
                            <li><a class="active">Estas en tu carrito de compras</a></li>
                            <li><a href="{{route('users.index')}}">Volver a atras</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <section class="section">
    <div class="section-header">
        <center><h1>Carrito de compras</h1></center>
        <br>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    @if (Cart::count())
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Cantidad</th>
                                    <th>$ Und</th>
                                    <th>Total</th>
                                    <th>Quitar</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach (Cart::content() as $item)
                            <tr class="align-middle">
                                <td><img src="{{ asset($item->options->image) }}" width="35" alt="imagen del producto"></td>
                                <td>{{$item->name }}</td>
                                <td>{{$item->options->category}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{number_format($item->price, 0, ',', '.')}}</td>
                                <td>{{ number_format($item->qty * $item->price, 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{route('removeitem')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$item->rowId}}">
                                        <center><input type="submit" name="btn" class="btn btn-danger btn-sm" value="x"></center>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr class="fw-bolder">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td colsapan="3"></td>
                                <td class="text-end">Valor Final:</td>
                                <td class="text-end">{{number_format((Cart::Subtotal()),0, ',', '.')}}</td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <a href="{{route('clear')}}" class="text-center"><button class="btn btn-danger">Vaciar Carrito</button></a>
                    @else
                    <div class="jumbotron">
                        <h1 class="display-4">Hola.</h1>
                        <p class="lead">Parce que no tienes ningun producto en tu carrito de compras.</p>
                        <hr class="my-4">
                        <p>Deleitate mirando nuestros productos y escoge el que mas te guste, son extremadamente deliciosos</p>
                        <p class="lead">
                            <a class="btn btn-primary" href="/" role="button">Ir a comprar</a>
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="border p-4">
            <h1>Datos del cliente.</h1>
            <p>Por favor, ingresa tus datos personales para el envio de tus productos.</p>
            <form action="{{ route('confirmarCompra') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6 mb-2">
                    <label for="nombreCompleto">Nombre completo.</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo" required>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <label for="telefono">Telefono.</label>
                    <input type="number" name="telefono" class="form-control" placeholder="Numero de telefono" required>
                </div>
                <div class="form-group col-md-5 mb-3">
                    <label for="correo">Correo Electronico.</label>
                    <input type="email" name="correo" class="form-control" placeholder="Correo Electronico" required>
                </div>
                <div class="form-group col-md-3 mb-3">
                    <label for="direccion">Direccion De Envio.</label>
                    <input type="text" name="direccion" class="form-control" placeholder="Direccion" required>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label for="barrio">Barrio donde esta ubicado.</label>
                    <input type="text" name="barrio" class="form-control" placeholder="Barrio" required>
                </div>
                <button class="btn btn-success">Confirmar Compra</button>
            </div>
        </form>
        <br>
            <a href="/" class="text-center">
            <button class="btn btn-primary mb-2">Ir a atrás</button>
            </a>
        </div>
    </div>
</section>

@include('frontend.home.layouts.footer')

<!--jquery library js-->
<script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('frontend/js/Font-Awesome.js') }}"></script>
    <!--select2 js-->
    <script src="{{ asset('frontend/js/select2.min.js') }}"></script>
    <!--slick slider js-->
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <!--simplyCountdown js-->
    <script src="{{ asset('frontend/js/simplyCountdown.js') }}"></script>
    <!--product zoomer js-->
    <script src="{{ asset('frontend/js/jquery.exzoom.js') }}"></script>
    <!--nice-number js-->
    <script src="{{ asset('frontend/js/jquery.nice-number.min.js') }}"></script>
    <!--counter js-->
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.countup.min.js') }}"></script>
    <!--add row js-->
    <script src="{{ asset('frontend/js/add_row_custon.js') }}"></script>
    <!--multiple-image-video js-->
    <script src="{{ asset('frontend/js/multiple-image-video.js') }}"></script>
    <!--sticky sidebar js-->
    <script src="{{ asset('frontend/js/sticky_sidebar.js') }}"></script>
    <!--price ranger js-->
    <script src="{{ asset('frontend/js/ranger_jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/ranger_slider.js') }}"></script>
    <!--isotope js-->
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <!--venobox js-->
    <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
    <!--classycountdown js-->
    <script src="{{ asset('frontend/js/jquery.classycountdown.js') }}"></script>

    <!--main/custom js-->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>

       <nav class="wsus__main_menu d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="relative_contect d-flex">
                        <ul class="wsus__menu_item">
                            <li><a class="active" href="{{route('users.index')}}">Inicio</a></li>
                            <li><a href="#wsus__single_banner">Nosotros</a></li>
                            <li><a href="#wsus__electronic">Productos</a></li>
                        </ul>
                        <ul class="wsus__menu_item wsus__menu_item_right">
                            <li><a href="#footer">contactanos</a></li>
                            <li><a href="{{route('admin.login')}}">Iniciar Sesion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--============================
        MAIN MENU END
    ==============================-->


    <!--============================
        MOBILE MENU START
    ==============================-->
    <section id="wsus__mobile_menu">
        <span class="wsus__mobile_menu_close"><i class="fal fa-times"></i></span>
        <br><br>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    role="tab" aria-controls="pills-home" aria-selected="true">Categorias</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                    role="tab" aria-controls="pills-profile" aria-selected="false">Inicio</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="wsus__mobile_menu_main_menu">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <ul class="wsus_mobile_menu_category">
                            <li><a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThreew" aria-expanded="false"
                                    aria-controls="flush-collapseThreew"><i class="fal fa-glass-whiskey"></i>Jugos</a>
                                <div id="flush-collapseThreew" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                        @foreach($jugos->take(4) as $jugo)
                                            <li><a href="{{ route('users.index') }}#wsus__electronic">{{ $jugo->id_nombre_producto }}</a></li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li><a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThreer" aria-expanded="false"
                                    aria-controls="flush-collapseThreer"><i class="fas fa-croissant"></i> Desayunos</a>
                                <div id="flush-collapseThreer" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                        @foreach($desayunos->take(4) as $desayuno)
                                            <li><a href="{{ route('users.index') }}#wsus__electronic">{{ $desayuno->id_nombre_producto }}</a></li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li><a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThreerrp" aria-expanded="false"
                                    aria-controls="flush-collapseThreerrp"><i class="fas fa-blender"></i>
                                    Batidos</a>
                                <div id="flush-collapseThreerrp" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                        @foreach($batidos->take(4) as $batido)
                                            <li><a href="{{ route('users.index') }}#wsus__electronic">{{ $batido->id_nombre_producto }}</a></li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li><a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThreerrw" aria-expanded="false"
                                    aria-controls="flush-collapseThreerrw"><i class="fal fa-apple-alt"></i>Pulpas
                                    </a>
                                <div id="flush-collapseThreerrw" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                        @foreach($pulpas->take(4) as $pulpa)
                                            <li><a href="{{ route('users.index') }}#wsus__electronic">{{ $pulpa->id_nombre_producto }}</a></li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>                               
                            </li>
                            <!--<li><a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThreerrws" aria-expanded="false"
                                    aria-controls="flush-collapseThreerrws"><i class="fal fa-mobile"></i>verduras
                                    </a>
                                <div id="flush-collapseThreerrws" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="#">Papa sellada al vacio</a></li>
                                            <li><a href="#">cebollas sellada al vacio</a></li>
                                            <li><a href="#">tomate sellada al vacio</a></li>
                                            <li><a href="#">yuca sellada al vacio</a></li>
                                            <li><a href="#">Ver mas</a></li>
                                        </ul>
                                    </div>
                                </div>                               
                            </li>-->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="wsus__mobile_menu_main_menu">
                    <div class="accordion accordion-flush" id="accordionFlushExample2">
                        <ul>
                            <li><a href="{{route('admin.login')}}">Iniciar Sesion</a></li>
                            <li><a href="{{route('users.index')}}#wsus__single_banner">Nosotros</a></li>
                            <li><a href="{{route('users.index')}}#wsus__electronic">Productos</a></li>
                            <li><a href="{{route('users.index')}}#footer">Contacto</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
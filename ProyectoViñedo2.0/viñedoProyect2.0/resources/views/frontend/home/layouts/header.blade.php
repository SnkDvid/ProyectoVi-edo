<header>
        <div class="container">
            <div class="row">
                <div class="col-2 col-md-1 d-lg-none">
                    <div class="wsus__mobile_menu_area">
                        <span class="wsus__mobile_menu_icon"><i class="fal fa-bars"></i></span>
                    </div>
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
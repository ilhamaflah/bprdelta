<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="PT.BPR Delta Lamongan">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PT.BPR DELTA LAMONGAN</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/financial_custom.js') }}"></script>
    @yield('customscript')
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
    
    <link href="{{ asset('styles/app.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/base.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('styles/index_responsive.css') }}" rel="stylesheet">

    <link rel="icon" href="{{ asset('images/logo_bpr.png') }}">
    @yield('customcss')

</head>
<body>
    <div class="super_container">
        <div class="home {{ Request::is('login') || Request::is('register') || Request::is('registeruser') ? 'relog' : '' }}">
            @yield('banner')
            @yield('slider')
            
            <header class="header">

                <!-- Top Bar -->
                <div class="top_bar">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="top_bar_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="logo_container">
                                        <div class="logo">
                                            <a href="{{ url('/') }}">
                                                <!-- <div class="logo_line_1"><span>BPR</span>Delta</div> -->
                                                <!-- <div class="logo_line_2">Enliven your budget planning!</div> -->
                                                <div class="logo_img"><img src="{{ asset('images/logodannama.png') }}" alt=""></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="top_bar_content ml-auto">
                                        <div class="register_login">

                                            <!-- Authentication Links -->
                                            @if (Auth::guest())
                                            <div class="login"><a href="{{ route('login') }}">login</a></div>
                                            @else
                                            <div class="register"><a href="{{ url('profile') }}">{{ Auth::user()->name }}</a></div>
                                            <div class="login"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></div>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="burger">
                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>

                <!-- Main Menu -->
                <div class="main_menu">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="main_menu_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="main_menu_content">
                                        <ul class="main_menu_list">
                                            
                                            <li class="@if(Request::is('/')) {{ 'active' }} @endif"><a href="{{ url('/') }}">Beranda</a></li>
                                            <li class="@if(Request::is('berita')) {{ 'active' }} @endif"><a href="{{ url('/berita') }}">Berita</a></li>
                                            <li class="@if(Request::is('tabungan')) {{ 'active' }} @endif"><a href="{{ url('/tabungan') }}">Tabungan</a></li>
                                            <li class="@if(Request::is('deposito')) {{ 'active' }} @endif"><a href="{{ url('/deposito') }}">Deposito</a></li>
                                            <li class="@if(Request::is('kredit')) {{ 'active' }} @endif"><a href="{{ url('/kredit') }}">Kredit</a></li>
                                            <li class="@if(Request::is('tentang')) {{ 'active' }} @endif"><a href="{{ url('/tentang') }}">Tentang Kami</a></li>
                                            @if (Auth::user())
                                            @if (Auth::user()->role == 0)
                                            <li class="@if(Request::is('dokumen')) {{ 'active' }} @endif"><a href="{{ url('/dokumen') }}">Kirim Dokumen</a></li>
                                            @endif
                                            @if (Auth::user()->role == 1)
                                            <li>
                                                <a href="{{ url('/admin') }}">Administrasi</a>
<!--                                                 <ul>
                                                    <li><a href="{{ url('home/1/edit') }}">Ubah Banner Beranda</a></li>
                                                    <li><a href="{{ url('tabungan/1/edit') }}">Ubah Halaman Tabungan</a></li>
                                                    <li><a href="{{ url('typetabungan/1/edit') }}">Ubah Tipe Tabungan</a></li>
                                                    <li><a href="{{ url('deposito/1/edit') }}">Ubah Halaman Deposito</a></li>
                                                    <li><a href="{{ url('kredit/1/edit') }}">Ubah Halaman Kredit</a></li>
                                                    <li><a href="{{ url('typekredit/1/edit') }}">Ubah Tipe Kredit</a></li>
                                                    <li><a href="{{ url('tentang/1/edit') }}">Ubah Halaman Tentang Kami</a></li>
                                                </ul> -->
                                            </li>
                                            @endif
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Menu -->

                <div class="menu">
                    <div class="menu_register_login">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="menu_register_login_content d-flex flex-row align-items-center justify-content-end">
                                        @if (Auth::guest())
                                        <div class="register"><a href="{{ route('register') }}">register</a></div>
                                        <div class="login"><a href="{{ route('login') }}">login</a></div>
                                        @else
                                        <div class="register"><a href="{{ url('profile') }}">{{ Auth::user()->name }}</a></div>
                                        <div class="login"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>

                    <ul class="menu_list">
                        <li class="menu_item">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ url('/') }}">Beranda</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu_item">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ url('/berita') }}">Berita</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu_item">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ url('/tabungan') }}">Tabungan</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu_item">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ url('/deposito') }}">Deposito</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu_item">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ url('/kredit') }}">Kredit</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu_item">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ url('/tentang') }}">Tentang Kami</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @if (Auth::user())
                        @if (Auth::user()->role == 0)
                        <li class="menu_item">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ url('/dokumen') }}">Kirim Dokumen</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @if (Auth::user()->role == 1)
                        <li class="menu_item">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ url('/dokumen') }}">Administrasi</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endif
                    </ul>

                </div>
            </header>
        </div>

            @yield('content')


        <!-- Footer -->

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 footer_col">
                        <div class="footer_about">
                            <div class="logo_container footer_logo">
                                <div class="logo">
                                    <a href="#">
                                        <!-- <div class="logo_line_1"><span>in</span>vest</div>
                                        <div class="logo_line_2">Blockchain</div> -->
                                        <div class="logo_img"><img src="{{ asset('images/logodannama.png') }}" alt=""></div>
                                    </a>
                                </div>
                            </div>
                            <p class="footer_about_text">
                                <div class="logo_line_1_footer"><h4>Kantor Pusat</h4></div>
                                <div class="logo_line_2_footer">Jl. Raya Jombang nomor 59</div>
                                <div class="logo_line_2_footer">Kabupaten Lamongan</div>
                                <div class="logo_line_2_footer">Nomor Telepon : 0322-451322</div>
                                <div class="logo_line_2_footer">Nomor Fax : 0322-455600</div>
                                <div class="logo_line_2_footer">Email : bprdeltabbt@yahoo.co.id</div>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 footer_col">
                        <div class="footer_about">
                            <div class="logo_container footer_logo">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="logo_ojklps">
                                            <a href="#">
                                                <!-- <div class="logo_line_1"><span>in</span>vest</div>
                                                <div class="logo_line_2">Blockchain</div> -->
                                                <div class="logo_img_ojk"><img src="{{ asset('images/logo_ojk.png') }}" alt=""></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="logo_ojklps">
                                            <a href="#">
                                                <!-- <div class="logo_line_1"><span>in</span>vest</div>
                                                <div class="logo_line_2">Blockchain</div> -->
                                                <div class="logo_img_ojk"><img src="{{ asset('images/logo_lps.png') }}" alt=""></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>                      
                        </div>
                    </div>

                    <!-- Footer Column -->
                    <!-- <div class="col-6">
                        <div class="footer_about">
                            <div class="logo_container footer_logo">
                                <div class="logo">
                                    <a href="{{ url('/') }}">
                                        <div class="logo_line_1"><span>BPR</span>Delta</div>
                                        <div class="logo_line_2">Enliven your budget planning!</div>
                                        <div class="logo_img_bpr"><img src="{{ asset('images/logodannama.png') }}" alt=""></div>
                                    </a>
                                </div>
                            </div>
                            <p class="footer_about_text">
                                <div class="logo_line_1_footer"><h4>Kantor Pusat</h4></div>
                                <div class="logo_line_2_footer">Jl. Raya Jombang nomor 59</div>
                                <div class="logo_line_2_footer">Kabupaten Lamongan</div>
                                <div class="logo_line_2_footer">Nomor Telepon : 0322-451322</div>
                                <div class="logo_line_2_footer">Nomor Fax : 0322-455600</div>
                                <div class="logo_line_2_footer">Email : bprdeltabbt@yahoo.co.id</div>
                            </p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="footer_about">
                            <div class="logo_container">
                                <div class="logo">
                                    <a href="ojk.go.id">
                                        <div class="logo_img_ojk"><img src="{{ asset('images/logo_ojk.png') }}" alt=""></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="footer_about">
                            <div class="logo_container">
                                <div class="logo">
                                    <a href="ojk.go.id">
                                        <div class="logo_img_ojk"><img src="{{ asset('images/logo_lps.png') }}" alt=""></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>

            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 order-md-1 order-2">
                            <div class="copyright_content d-flex flex-row align-items-center justify-content-start">
                                <div class="cr"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </footer>
    </div>

    <script src="{{ asset('styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('plugins/parallax-js-master/parallax.min.js') }}"></script>

    @yield('customjs') 
</body>
</html>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- META ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />

    <!-- DESCRIPTION -->
    <meta name="description" content="Tutor Daring UNIMA" />

    <!-- OG -->
    <meta property="og:title" content="Tutor Daring UNIMA" />
    <meta property="og:description" content="Tutor Daring UNIMA" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">

    <!-- FAVICONS ICON ============================================= -->
    <link rel="icon" href="{{ asset('assets/home/images/favicon.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/home/images/favicon.png') }}" />

    <!-- PAGE TITLE HERE ============================================= -->
    <title>Webinar UNIMA </title>

    <!-- MOBILE SPECIFIC ============================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->

    <!-- All PLUGINS CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/assets.css') }}">

    <!-- TYPOGRAPHY ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/typography.css') }}">

    <!-- SHORTCODES ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/shortcodes/shortcodes.css') }}">

    <!-- STYLESHEETS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/style.css') }}">
    <link class="skin" rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/color/color-1.css') }}">

    <!-- REVOLUTION SLIDER CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/vendors/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/vendors/revolution/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/vendors/revolution/css/navigation.css') }}">
    <!-- REVOLUTION SLIDER END -->
</head>

<body id="bg">
    <div class="page-wraper">
        <div id="loading-icon-bx"></div>
        <!-- Header Top ==== -->
        <header class="header rs-nav">
            <div class="sticky-header navbar-expand-lg">
                <div class="menu-bar clearfix">
                    <div class="container clearfix">
                        <!-- Header Logo ==== -->
                        <div class="menu-logo">
                            <a href="index.html">Webinar UNIMA</a>
                        </div>
                        <!-- Mobile Nav Button ==== -->
                        <button class="navbar-toggler collapsed menuicon justify-content-end" type="button"
                            data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <!-- Navigation Menu ==== -->
                        <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
                            <div class="menu-logo">
                                <a href="#"><img src="{{ asset('assets/home/images/logo.png') }}" alt=""></a>
                            </div>
                            <ul class="nav navbar-nav">
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li class="active"><a href="javascript:;">Kelas Webinar<i class="fa fa-chevron-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="#coming">Webinar Yang Akan Datang</a></li>
                                        <li><a href="#exp">Webinar Yang Telah Selesai</a></li>
                                    </ul>
                                </li>
                                <li class="active"><a href="javascript:;">Tentang <i class="fa fa-chevron-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="#pendaftaran">Cara Pendaftaran Webinar</a></li>
                                        <li><a href="#">Tentang Aplikasi</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- Navigation Menu END ==== -->
                    </div>
                </div>
            </div>
        </header>
        <!-- Header Top END ==== -->
        <!-- Content -->
        <div class="page-content bg-white">
            @yield('content')
        </div>
        <!-- Content END-->
        <!-- Footer ==== -->
        <footer>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">Copyright &copy; 2020 <a
                                href="https://unima.ac.id">Universitas Negeri Manado</a> All rights reserved.</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer END ==== -->
        <button class="back-to-top fa fa-chevron-up"></button>
    </div>

    <!-- External JavaScripts -->
    <script src="{{ asset('assets/home/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/home/vendors/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/home/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/home/vendors/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/home/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('assets/home/vendors/magnific-popup/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/home/vendors/counter/waypoints-min.js') }}"></script>
    <script src="{{ asset('assets/home/vendors/counter/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/home/vendors/imagesloaded/imagesloaded.js') }}"></script>
    <script src="{{ asset('assets/home/vendors/masonry/masonry.js') }}"></script>
    <script src="{{ asset('assets/home/vendors/masonry/filter.js') }}"></script>
    <script src="{{ asset('assets/home/vendors/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/home/js/functions.js') }}"></script>
    <script src="{{ asset('assets/home/js/contact.js') }}"></script>
    <script src="{{ asset('assets/home/vendors/switcher/switcher.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
    @yield('js')
</body>

</html>

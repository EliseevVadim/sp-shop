<!doctype html>
<html lang="en">
<script lang="{{ str_replace('_', '-', app()->getLocale()) }}"></script>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>
        @yield('title')
    </title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">

    <!--== Bootstrap CSS ==-->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <!--== Headroom CSS ==-->
    <link href="{{asset('css/headroom.css')}}" rel="stylesheet" />
    <!--== Animate CSS ==-->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet" />
    <!--== Font Awesome Icon CSS ==-->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <!--== Bardy Icon CSS ==-->
    <link href="{{asset('css/bardy.icon.css')}}" rel="stylesheet" />
    <!--== Swiper CSS ==-->
    <link href="{{asset('css/swiper.min.css')}}" rel="stylesheet" />
    <!--== Fancybox Min CSS ==-->
    <link href="{{asset('css/fancybox.min.css')}}" rel="stylesheet" />
    <!--== Slicknav Min CSS ==-->
    <link href="{{asset('css/slicknav.css')}}" rel="stylesheet" />
    <!--== Aos Min CSS ==-->
    <link href="{{asset('css/aos.min.css')}}" rel="stylesheet" />

    <!--== Main Style CSS ==-->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="app">
        <div class="wrapper">
            <div class="preloader-wrap">
                <div class="preloader">
                    <span class="dot"></span>
                    <div class="dots">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <header class="header-area header-default sticky-header">
                <div class="container">
                    <div class="row align-items-center justify-content-between position-relative">
                        <div class="col">
                            <div class="header-logo-area">
                                <a href="/">
                                    <img class="logo-main" src="{{asset('img/logo.png')}}" alt="Logo" />
                                    <img class="logo d-none" src="{{asset('img/logo-light.png')}}" alt="Logo" />
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="header-navigation-area">
                                <ul class="main-menu nav">
                                    <li class="has-submenu"><a href="#/"><span>Главная</span></a></li>
                                    <li class="has-submenu"><a href="#/"><span>Категории</span></a>
                                        <ul class="submenu-nav">
                                            <li><a href="shop-single-new.html">New and sale badge product</a></li>
                                            <li><a href="shop-single-badge.html">New badge product</a></li>
                                            <li><a href="shop-single.html">Variable product</a></li>
                                            <li><a href="shop-single-soldout.html">Soldout product</a></li>
                                            <li><a href="shop-single-simple.html">Simple product</a></li>
                                            <li><a href="shop-single-variable-soldout.html">Variable with soldout product</a></li>
                                            <li><a href="shop-single-affiliate.html">Sample affiliate product</a></li>
                                            <li><a href="shop-single-countdown.html">Countdown product</a></li>
                                            <li><a href="shop-single-shortcode.html">Without shortcode product</a></li>
                                            <li><a href="shop-single-video.html">Product with video</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/contacts"><span>Контакты</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="header-action-area">
                                <div class="header-action">
                                    <search-form></search-form>
                                </div>
                                <div class="header-action">
                                    <cart></cart>
                                </div>
                                <div class="header-action d-block d-lg-none text-end">
                                    <button class="btn-menu" type="button"><i class="zmdi zmdi-menu"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <main class="main-content">
                @yield('content')
            </main>
        </div>
    </div>
</body>
<script src="{{asset('js/app.js')}}"></script>
@yield('scripts')
</html>

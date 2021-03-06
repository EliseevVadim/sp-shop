@extends('layouts.app')

@section('title')
    Главная
@endsection

@section('content')
    <section class="home-slider-area">
        <div class="swiper-container swiper-slide-gap home-slider-container default-slider-container">
            <div class="swiper-wrapper home-slider-wrapper slider-default">
                <div class="swiper-slide">
                    <div class="slider-content-area" data-bg-img="{{asset('img/slide_bg_1920x1200.jpg')}}">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="slider-content text-center">
                                        <h5 class="sub-title">Lorem ipsum dolor.</h5>
                                        <h2 class="title">Lorem ipsum dolor sit. <br>Lorem ipsum.</h2>
                                        <a class="btn-slider" href="/#goods">К товарам</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-content-area" data-bg-img="{{asset('img/slide_bg_1920x1200.jpg')}}">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="slider-content text-end">
                                        <h5 class="sub-title">Lorem ipsum dolor.</h5>
                                        <h2 class="title">Lorem ipsum dolor sit.
                                            <br>
                                            Lorem ipsum.
                                        </h2>
                                        <a class="btn-slider" href="/#goods">К товарам</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== Add Swiper Arrows ==-->
            <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
            <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
        </div>
    </section>
    <!--== End Hero Area Wrapper ==-->

    <section id="goods" class="product-area product-grid-list-area">
        <div class="container">
            <div class="row">
                <h2 class="text-center">Наши товары</h2>
                <products-list></products-list>
            </div>
        </div>
    </section>
    <!--== End Product Area Wrapper ==-->
<!--    &lt;!&ndash;== Start Divider Area Wrapper ==&ndash;&gt;
    <section class="divider-area divider-offer-area bg-color-222">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="divider-style-wrap text-center">
                        <div class="divider-content">
                            <h4 class="sub-title">Special <span>Offers</span> for Subscription</h4>
                            <h4 class="title">GET INSTANT DISCOUNT FOR MEMBERSHIP</h4>
                            <p>Subscribe our newsletter and get all latest news abot our latest <br>products, promotions, offers and discount</p>
                            <div class="newsletter-content-wrap">
                                <div class="newsletter-form">
                                    <form action="#">
                                        <input type="email" class="form-control" placeholder="Enter your email here">
                                        <button class="btn-submit" type="button">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    &lt;!&ndash;== End Divider Area Wrapper ==&ndash;&gt;

    &lt;!&ndash;== Start Blog Area Wrapper ==&ndash;&gt;
    <section class="blog-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 m-auto">
                    <div class="section-title text-center">
                        <h2 class="title">Latest Blog</h2>
                        <div class="desc">
                            <p>Some of our customers say that they trust us and buy our product without any hesitation because they believe us and always happy to buy our product.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container swiper-nav swiper-slide-gap post-slider-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                &lt;!&ndash;== Start Blog Item ==&ndash;&gt;
                                <div class="post-item">
                                    <div class="inner-content">
                                        <div class="thumb">
                                            <a href="single-blog.html">
                                                <img class="w-100" src="assets/img/blog/1.jpg" alt="Image-HasTech">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h4 class="title"><a href="single-blog.html">Standard dummy text ever since</a></h4>
                                            <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,...</p>
                                            <a class="btn-link" href="single-blog.html">Read More</a>
                                            <ul class="meta-info">
                                                <li><span>By - </span><a class="author" href="blog.html">Diana Demo Admin</a></li>
                                                <li><span>01 February, 2021</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                &lt;!&ndash;== End Blog Item ==&ndash;&gt;
                            </div>
                            <div class="swiper-slide">
                                &lt;!&ndash;== Start Blog Item ==&ndash;&gt;
                                <div class="post-item">
                                    <div class="inner-content">
                                        <div class="thumb">
                                            <a href="single-blog.html">
                                                <img class="w-100" src="assets/img/blog/2.jpg" alt="Image-HasTech">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h4 class="title"><a href="single-blog.html">Make a type specimen book</a></h4>
                                            <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,...</p>
                                            <a class="btn-link" href="single-blog.html">Read More</a>
                                            <ul class="meta-info">
                                                <li><span>By - </span><a class="author" href="blog.html">Diana Demo Admin</a></li>
                                                <li><span>01 February, 2021</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                &lt;!&ndash;== End Blog Item ==&ndash;&gt;
                            </div>
                            <div class="swiper-slide">
                                &lt;!&ndash;== Start Blog Item ==&ndash;&gt;
                                <div class="post-item">
                                    <div class="inner-content">
                                        <div class="thumb">
                                            <a href="single-blog.html">
                                                <img class="w-100" src="assets/img/blog/3.jpg" alt="Image-HasTech">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h4 class="title"><a href="single-blog.html">Lorem Ipsum is simply dummy</a></h4>
                                            <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,...</p>
                                            <a class="btn-link" href="single-blog.html">Read More</a>
                                            <ul class="meta-info">
                                                <li><span>By - </span><a class="author" href="blog.html">Diana Demo Admin</a></li>
                                                <li><span>01 February, 2021</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                &lt;!&ndash;== End Blog Item ==&ndash;&gt;
                            </div>
                            <div class="swiper-slide">
                                &lt;!&ndash;== Start Blog Item ==&ndash;&gt;
                                <div class="post-item">
                                    <div class="inner-content">
                                        <div class="thumb">
                                            <a href="single-blog.html">
                                                <img class="w-100" src="assets/img/blog/4.jpg" alt="Image-HasTech">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h4 class="title"><a href="single-blog.html">It is a long established</a></h4>
                                            <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,...</p>
                                            <a class="btn-link" href="single-blog.html">Read More</a>
                                            <ul class="meta-info">
                                                <li><span>By - </span><a class="author" href="blog.html">Diana Demo Admin</a></li>
                                                <li><span>01 February, 2021</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                &lt;!&ndash;== End Blog Item ==&ndash;&gt;
                            </div>
                            <div class="swiper-slide">
                                &lt;!&ndash;== Start Blog Item ==&ndash;&gt;
                                <div class="post-item">
                                    <div class="inner-content">
                                        <div class="thumb">
                                            <a href="single-blog.html">
                                                <img class="w-100" src="assets/img/blog/5.jpg" alt="Image-HasTech">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h4 class="title"><a href="single-blog.html">Sed quia non numquam</a></h4>
                                            <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,...</p>
                                            <a class="btn-link" href="single-blog.html">Read More</a>
                                            <ul class="meta-info">
                                                <li><span>By - </span><a class="author" href="blog.html">Diana Demo Admin</a></li>
                                                <li><span>01 February, 2021</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                &lt;!&ndash;== End Blog Item ==&ndash;&gt;
                            </div>
                            <div class="swiper-slide">
                                &lt;!&ndash;== Start Blog Item ==&ndash;&gt;
                                <div class="post-item">
                                    <div class="inner-content">
                                        <div class="thumb">
                                            <a href="single-blog.html">
                                                <img class="w-100" src="assets/img/blog/6.jpg" alt="Image-HasTech">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h4 class="title"><a href="single-blog.html">Ratione voluptatem sequi nesciunt</a></h4>
                                            <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,...</p>
                                            <a class="btn-link" href="single-blog.html">Read More</a>
                                            <ul class="meta-info">
                                                <li><span>By - </span><a class="author" href="blog.html">Diana Demo Admin</a></li>
                                                <li><span>01 February, 2021</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                &lt;!&ndash;== End Blog Item ==&ndash;&gt;
                            </div>
                        </div>

                        &lt;!&ndash;== Add Swiper navigation Buttons ==&ndash;&gt;
                        <div class="swiper-button swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                        <div class="swiper-button swiper-button-next"><i class="fa fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    &lt;!&ndash;== End Blog Area Wrapper ==&ndash;&gt;

    &lt;!&ndash;== Start Feature Area Wrapper ==&ndash;&gt;
    <section class="feature-area">
        <div class="feature-container">
            <div class="row no-gutter">
                <div class="feature-col col-xl-3 col-md-6 col-12">
                    <div class="feature-icon-box">
                        <div class="inner-content">
                            <div class="icon-box" data-bg-img="assets/img/icons/1.jpg"></div>
                            <div class="content">
                                <h3 class="title">Free home delivery</h3>
                                <p>Provide free home delivery for all product over $100</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feature-col col-xl-3 col-md-6 col-12">
                    <div class="feature-icon-box">
                        <div class="inner-content">
                            <div class="icon-box" data-bg-img="assets/img/icons/1.jpg"></div>
                            <div class="content">
                                <h3 class="title">Quality Products</h3>
                                <p>We ensure the product quality that is our main goal</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feature-col col-xl-3 col-md-6 col-12">
                    <div class="feature-icon-box">
                        <div class="inner-content">
                            <div class="icon-box" data-bg-img="assets/img/icons/1.jpg"></div>
                            <div class="content">
                                <h3 class="title">3 Days Return</h3>
                                <p>Return product within 3 days for any product you buy</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feature-col col-xl-3 col-md-6 col-12">
                    <div class="feature-icon-box">
                        <div class="inner-content">
                            <div class="icon-box" data-bg-img="assets/img/icons/1.jpg"></div>
                            <div class="content">
                                <h3 class="title">Online Support</h3>
                                <p>We ensure the product quality that you can trust easily</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!--== End Feature Area Wrapper ==-->
@endsection

@section('scripts')
    <!--=== jQuery Modernizr Min Js ===-->
    <script src="{{asset('js/modernizr.js')}}"></script>
    <!--=== jQuery Min Js ===-->
    <script src="{{asset('js/jquery-main.js')}}"></script>
    <!--=== jQuery Migration Min Js ===-->
    <script src="{{asset('js/jquery-migrate.js')}}"></script>
    <!--=== jQuery Popper Min Js ===-->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!--=== jQuery Bootstrap Min Js ===-->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!--=== jQuery Appear Js ===-->
    <script src="{{asset('js/jquery.appear.js')}}"></script>
    <!--=== jQuery Headroom Min Js ===-->
    <script src="{{asset('js/headroom.min.js')}}"></script>
    <!--=== jQuery Swiper Min Js ===-->
    <script src="{{asset('js/swiper.min.js')}}"></script>
    <!--=== jQuery Fancybox Min Js ===-->
    <script src="{{asset('js/fancybox.min.js')}}"></script>
    <!--=== jQuery Slick Nav Js ===-->
    <script src="{{asset('js/slicknav.js')}}"></script>
    <!--=== jQuery Waypoint Js ===-->
    <script src="{{asset('js/waypoint.js')}}"></script>
    <!--=== jQuery Parallax Min Js ===-->
    <script src="{{asset('js/parallax.min.js')}}"></script>
    <!--=== jQuery Aos Min Js ===-->
    <script src="{{asset('js/aos.min.js')}}"></script>
    <!--=== jQuery Countdown Js ===-->
    <script src="{{asset('js/countdown.js')}}"></script>
    <!--=== jQuery Custom Js ===-->
    <script src="{{asset('js/custom.js')}}"></script>
@endsection

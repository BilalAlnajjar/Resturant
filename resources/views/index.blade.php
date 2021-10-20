@extends('layouts.home')
@section('content')
<!-- Content -->
<div id="content">

    <!-- Section - Main -->
    <section class="section section-main section-main-1 bg-light" id="sectionOne">

        <div class="container dark">
            <div class="slide-container">
                <div  id="section-main-1-carousel-image" class="image inner-controls">
                    @foreach ($slids as $slid)
                    <div class="slide">
                        <div class="bg-image"><img src="{{asset($slid->image)}}" alt=""></div>
                    </div>
                    @endforeach
                </div>
                <div class="content dark">
                    <div id="section-main-1-carousel-content">

                        @foreach ($slids as $slid)

                        <div class="content-inner">
                            <h1>{{$slid->title}}</h1>
                            <h4 class="text-muted">{{$slid->sub_title}}</h4>
                            <div class="btn-group">
                                <a href="{{route('user.products')}}" data-toggle="modal"
                                    class="btn btn-outline-primary btn-lg"><span>Go To Menu</span></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <nav class="content-nav">
                        <a class="prev" href="#"><i class="ti-arrow-left"></i></a>
                        <a class="next" href="#"><i class="ti-arrow-right"></i></a>
                    </nav>
                </div>
            </div>
        </div>

    </section>

    <section class="section bg-light">

        <div class="container">
            <h1 class="text-center mb-6">Special offers</h1>
            <div class="carousel" data-slick='{"dots": true}'>
                @foreach ($offers as $offer)
                <!-- Special Offer -->
                <div class="special-offer">
                    <img src="{{asset($offer->image)}}" alt="" class="special-offer-image">
                    <div class="special-offer-content">
                        <h2 class="mb-2">{{$offer->name}}</h2>
                        <b>{!! $offer->description !!}</b>
                    </div>
                </div>
                @endforeach
                <!-- Special Offer -->
                <!-- Special Offer -->
            </div>
        </div>

    </section>

    <!-- Section - Steps -->
    <section class="section section-extended right dark">

        <div class="container bg-dark">
            <div class="row">
                @foreach ($steps as $step)
                    <div class="col-md-4">
                        <!-- Step -->
                        <div class="feature feature-1 mb-md-0">
                            <div class="feature-icon icon icon-primary"><img src="{{asset($step->image)}}" alt=""></div>
                            <div class="feature-content">
                                <h4 class="mb-2">{{$step->title}}</h4>
                                {!! $step->description!!}
                            </div>
                        </div>
                    </div>
                @endforeach
{{--
                <div class="col-md-4">
                    <!-- Step -->
                    <div class="feature feature-1 mb-md-0">
                        <div class="feature-icon icon icon-primary"><i class="ti ti-wallet"></i></div>
                        <div class="feature-content">
                            <h4 class="mb-2">Make a payment</h4>
                            <p class="text-muted mb-0">Vivamus volutpat leo dictum risus ullamcorper condimentum.</p>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-4">
                    <!-- Step -->
                    <div class="feature feature-1 mb-md-0">
                        <div class="feature-icon icon icon-primary"><i class="ti ti-package"></i></div>
                        <div class="feature-content">
                            <h4 class="mb-2">Recieve your food!</h4>
                            <p class="text-muted mb-3">Vivamus volutpat leo dictum risus ullamcorper condimentum.</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

    </section>

    <section class="section pb-0 protrude">

        <div class="container">
            <h1 class="mb-6">Our menu</h1>
        </div>

        <div class="menu-sample-carousel carousel inner-controls" data-slick='{
            "dots": true,
            "slidesToShow": 3,
            "slidesToScroll": 1,
            "infinite": true,
            "responsive": [
                {
                    "breakpoint": 991,
                    "settings": {
                        "slidesToShow": 2,
                        "slidesToScroll": 1
                    }
                },
                {
                    "breakpoint": 690,
                    "settings": {
                        "slidesToShow": 1,
                        "slidesToScroll": 1
                    }
                }
            ]
        }'>
            <!-- Menu Sample -->
            @foreach ($categories as $category)

            <div class="menu-sample">
                <a href="{{route('user.products')}}">
                    <img src="{{asset($category->image)}}" alt="" class="image">
                    <h3 class="title">{{$category->name}}</h3>
                </a>
            </div>

            @endforeach
            <!-- Menu Sample -->
        </div>

    </section>

    @if($item)
    {!! $item->item !!}
    @endif

    @if($sectionOne)
    {!! $sectionOne->item !!}
    @endif

    @if($sectionTwo)
    {!! $sectionTwo->item !!}
    @endif
    <!-- Section - About -->
    {{-- <section class="section section-bg-edge">

        <div class="image right col-md-6 push-md-6">
            <div class="bg-image"><img src="assets/img/photos/bg-food.jpg" alt=""></div>
        </div>

        <div class="container">
            <div class="col-lg-5 col-md-9">
                <div class="rate mb-5 rate-lg"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i
                        class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                <h1>The best food in London!</h1>
                <p class="lead text-muted mb-5">Donec a eros metus. Vivamus volutpat leo dictum risus ullamcorper
                    condimentum. Cras sollicitudin varius condimentum. Praesent a dolor sem....</p>
                <div class="blockquotes">
                    <!-- Blockquote -->
                    <blockquote class="blockquote light animated" data-animation="fadeInLeft">
                        <div class="blockquote-content">
                            <div class="rate rate-sm mb-3"><i class="fa fa-star active"></i><i
                                    class="fa fa-star active"></i><i class="fa fa-star active"></i><i
                                    class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                            <p>It’ was amazing feeling for may belly!</p>
                        </div>
                        <footer>
                            <img src="assets/img/avatars/avatar02.jpg" alt="">
                            <span class="name">Mark Johnson<span class="text-muted">, Google</span></span>
                        </footer>
                    </blockquote>
                    <!-- Blockquote -->
                    <blockquote class="blockquote animated" data-animation="fadeInRight" data-animation-delay="300">
                        <div class="blockquote-content dark">
                            <div class="rate rate-sm mb-3"><i class="fa fa-star active"></i><i
                                    class="fa fa-star active"></i><i class="fa fa-star active"></i><i
                                    class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                            <p>Great food and great atmosphere!</p>
                        </div>
                        <footer>
                            <img src="assets/img/avatars/avatar01.jpg" alt="">
                            <span class="name">Kate Hudson<span class="text-muted">, LinkedIn</span></span>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>

    </section> --}}
    <!-- Section -->
    <section class="section section-lg dark bg-dark">

        <!-- BG Image -->
        @if($video)
        <div class="bg-image bg-parallax"><img src="{{asset($video->image)}}" alt=""></div>

        <div class="container text-center">
            <div class="col-lg-8 push-lg-2">
                <h2 class="mb-3">Check our promo video!</h2>
                <h5 class="text-muted">Book a table even right now or make an online order!</h5>
                <button class="btn-play" data-toggle="video-modal" data-target="#modalVideo"
                    data-video="{{$video->link}}"></button>
            </div>
        </div>
        @endif

    </section>
</div>

 <!-- Back To Top -->
<!-- Section - Offers -->
{{-- <!-- Content -->
        <div id="content">

            <!-- Section - Main -->
            <section class="section section-main section-main-1 bg-light">

                <div class="container dark">
                    <div class="slide-container">
                        <div id="section-main-1-carousel-image" class="image inner-controls">
                            @foreach($slids as $slid)
                            <div class="slide"><div class="bg-image"><img src="{{$slid->image}}" alt=""></div>
</div>
@endforeach
</div>
<div class="content dark">
    <div id="section-main-1-carousel-content">
        @foreach($slids as $slid)
        <div class="content-inner">
            <h4 class="text-muted">{{$slid->title}}</h4>
            <h1>{{$slid->sub_title}}</h1>
        </div>
        @endforeach
    </div>
    <nav class="content-nav">
        <a class="prev" href="#"><i class="ti-arrow-left"></i></a>
        <a class="next" href="#"><i class="ti-arrow-right"></i></a>
    </nav>
</div>
</div>
</div>

</section>
<!-- Section - Offers -->
<section class="section bg-light">

    <div class="container">
        <h1 class="text-center mb-6">Special offers</h1>
        <div class="carousel" data-slick='{"dots": true}'>
            <!-- Special Offer -->
            <div class="special-offer">
                <img src="assets/img/photos/special-burger.jpg" alt="" class="special-offer-image">
                <div class="special-offer-content">
                    <h2 class="mb-2">Free Burger</h2>
                    <h5 class="text-muted mb-5">Get free burger from orders higher that $40!</h5>
                    <ul class="list-check text-lg mb-0">
                        <li>Only on Tuesdays</li>
                        <li class="false">Order higher that $40</li>
                        <li>Unless one burger ordered</li>
                    </ul>
                </div>
            </div>
            <!-- Special Offer -->
            <div class="special-offer">
                <img src="assets/img/photos/special-pizza.jpg" alt="" class="special-offer-image">
                <div class="special-offer-content">
                    <h2 class="mb-2">Free Small Pizza</h2>
                    <h5 class="text-muted mb-5">Get free burger from orders higher that $40!</h5>
                    <ul class="list-check text-lg mb-0">
                        <li>Only on Weekends</li>
                        <li class="false">Order higher that $40</li>
                    </ul>
                </div>
            </div>
            <!-- Special Offer -->
            <div class="special-offer">
                <img src="assets/img/photos/special-dish.jpg" alt="" class="special-offer-image">
                <div class="special-offer-content">
                    <h2 class="mb-2">Chip Friday</h2>
                    <h5 class="text-muted mb-5">10% Off for all dishes!</h5>
                    <ul class="list-check text-lg mb-0">
                        <li>Only on Friday</li>
                        <li>All products</li>
                        <li>Online order</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Section - Steps -->
<section class="section section-extended right dark">

    <div class="container bg-dark">
        <div class="row">
            <div class="col-md-4">
                <!-- Step -->
                <div class="feature feature-1 mb-md-0">
                    <div class="feature-icon icon icon-primary"><i class="ti ti-shopping-cart"></i></div>
                    <div class="feature-content">
                        <h4 class="mb-2"><a href="menu-list-collapse.html">Pick a dish</a></h4>
                        <p class="text-muted mb-0">Vivamus volutpat leo dictum risus ullamcorper condimentum.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Step -->
                <div class="feature feature-1 mb-md-0">
                    <div class="feature-icon icon icon-primary"><i class="ti ti-wallet"></i></div>
                    <div class="feature-content">
                        <h4 class="mb-2">Make a payment</h4>
                        <p class="text-muted mb-0">Vivamus volutpat leo dictum risus ullamcorper condimentum.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Step -->
                <div class="feature feature-1 mb-md-0">
                    <div class="feature-icon icon icon-primary"><i class="ti ti-package"></i></div>
                    <div class="feature-content">
                        <h4 class="mb-2">Recieve your food!</h4>
                        <p class="text-muted mb-3">Vivamus volutpat leo dictum risus ullamcorper condimentum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Section - Menu -->
<section class="section pb-0 protrude">

    <div class="container">
        <h1 class="mb-6">Our menu</h1>
    </div>

    <div class="menu-sample-carousel carousel inner-controls" data-slick='{
                    "dots": true,
                    "slidesToShow": 3,
                    "slidesToScroll": 1,
                    "infinite": true,
                    "responsive": [
                        {
                            "breakpoint": 991,
                            "settings": {
                                "slidesToShow": 2,
                                "slidesToScroll": 1
                            }
                        },
                        {
                            "breakpoint": 690,
                            "settings": {
                                "slidesToShow": 1,
                                "slidesToScroll": 1
                            }
                        }
                    ]
                }'>
        <!-- Menu Sample -->
        <div class="menu-sample">
            <a href="menu-list-navigation.html#Burgers">
                <img src="assets/img/photos/menu-sample-burgers.jpg" alt="" class="image">
                <h3 class="title">Waffle</h3>
            </a>
        </div>
        <!-- Menu Sample -->
        <div class="menu-sample">
            <a href="menu-list-navigation.html#Pizza">
                <img src="assets/img/photos/menu-sample-pizza.jpg" alt="" class="image">
                <h3 class="title">crepes</h3>
            </a>
        </div>
        <!-- Menu Sample -->
        <div class="menu-sample">
            <a href="menu-list-navigation.html#Sushi">
                <img src="assets/img/photos/menu-sample-sushi.jpg" alt="" class="image">
                <h3 class="title">Milkshak</h3>
            </a>
        </div>
        <!-- Menu Sample -->
        <div class="menu-sample">
            <a href="menu-list-navigation.html#Pasta">
                <img src="assets/img/photos/menu-sample-pasta.jpg" alt="" class="image">
                <h3 class="title">Pasta</h3>
            </a>
        </div>
        <!-- Menu Sample -->
        <div class="menu-sample">
            <a href="menu-list-navigation.html#Desserts">
                <img src="assets/img/photos/menu-sample-dessert.jpg" alt="" class="image">
                <h3 class="title">Desserts</h3>
            </a>
        </div>
        <!-- Menu Sample -->
        <div class="menu-sample">
            <a href="menu-list-navigation.html#Drinks">
                <img src="assets/img/photos/menu-sample-drinks.jpg" alt="" class="image">
                <h3 class="title">Drinks</h3>
            </a>
        </div>
    </div>

</section>

<!-- Section - About -->
<section class="section section-bg-edge">

    <div class="image right col-md-6 push-md-6">
        <div class="bg-image"><img src="assets/img/photos/bg-food.jpg" alt=""></div>
    </div>

    <div class="container">
        <div class="col-lg-5 col-md-9">
            <div class="rate mb-5 rate-lg"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i
                    class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
            <h1>The best food in London!</h1>
            <p class="lead text-muted mb-5">Donec a eros metus. Vivamus volutpat leo dictum risus ullamcorper
                condimentum. Cras sollicitudin varius condimentum. Praesent a dolor sem....</p>
            <div class="blockquotes">
                <!-- Blockquote -->
                <blockquote class="blockquote light animated" data-animation="fadeInLeft">
                    <div class="blockquote-content">
                        <div class="rate rate-sm mb-3"><i class="fa fa-star active"></i><i
                                class="fa fa-star active"></i><i class="fa fa-star active"></i><i
                                class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                        <p>It’ was amazing feeling for may belly!</p>
                    </div>
                    <footer>
                        <img src="assets/img/avatars/avatar02.jpg" alt="">
                        <span class="name">Mark Johnson<span class="text-muted">, Google</span></span>
                    </footer>
                </blockquote>
                <!-- Blockquote -->
                <blockquote class="blockquote animated" data-animation="fadeInRight" data-animation-delay="300">
                    <div class="blockquote-content dark">
                        <div class="rate rate-sm mb-3"><i class="fa fa-star active"></i><i
                                class="fa fa-star active"></i><i class="fa fa-star active"></i><i
                                class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                        <p>Great food and great atmosphere!</p>
                    </div>
                    <footer>
                        <img src="assets/img/avatars/avatar01.jpg" alt="">
                        <span class="name">Kate Hudson<span class="text-muted">, LinkedIn</span></span>
                    </footer>
                </blockquote>
            </div>
        </div>
    </div>

</section>
<!-- Section -->
<section class="section section-lg dark bg-dark">

    <!-- BG Image -->
    <div class="bg-image bg-parallax"><img src="assets/img/photos/bg-croissant.jpg" alt=""></div>

    <div class="container text-center">
        <div class="col-lg-8 push-lg-2">
            <h2 class="mb-3">Check our promo video!</h2>
            <h5 class="text-muted">Book a table even right now or make an online order!</h5>
            <button class="btn-play" data-toggle="video-modal" data-target="#modalVideo"
                data-video="https://www.youtube.com/embed/5mvUtk7sPlM"></button>
        </div>
    </div>

</section>
</div>

<!-- Footer -->
<footer id="footer" class="bg-dark dark">

    <div class="container">
        <!-- Footer 1st Row -->
        <div class="footer-first-row row">
            <div class="col-lg-3 text-center">
                <a href="index.html"><img src="assets/img/logo-light.png" alt="" width="115" class="mt-5 mb-5"></a>
            </div>
            <div class="col-lg-4 col-md-6">
                <h5 class="text-muted">Latest news</h5>
                <ul class="list-posts">
                    <li>
                        <a href="#" class="title">How to create effective webdeisign?</a>
                        <span class="date">February 14, 2021</span>
                    </li>
                    <li>
                        <a href="#" class="title">Awesome weekend in Polish mountains!</a>
                        <span class="date">February 14, 2021</span>
                    </li>
                    <li>
                        <a href="#" class="title">How to create effective webdeisign?</a>
                        <span class="date">February 14, 2021</span>
                    </li>
                </ul>
            </div>
            <div class="col-lg-5 col-md-6">
                <h5 class="text-muted">Subscribe Us!</h5>
                <!-- MailChimp Form -->
                <form
                    action="//foxytech.net.us12.list-manage.com/subscribe/post-json?u=ed47dbfe167d906f2bc46a01b&amp;id=24ac8a22ad"
                    id="sign-up-form" class="sign-up-form validate-form mb-3" method="POST">
                    <div class="input-group">
                        <input name="EMAIL" id="mce-EMAIL" type="email" class="form-control"
                            placeholder="Tap your e-mail..." required>
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-submit" type="submit">
                                <span class="description">Subscribe</span>
                                <span class="success">
                                    <svg x="0px" y="0px" viewBox="0 0 32 32">
                                        <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none"
                                            stroke="#FFFFFF" stroke-width="2" stroke-linecap="square"
                                            stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
                                        </svg>
                                </span>
                                <span class="error">Try again...</span>
                            </button>
                        </span>
                    </div>
                </form>
                <h5 class="text-muted mb-3">Social Media</h5>
                <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i
                        class="fa fa-facebook"></i></a>
                <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
                <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
                <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i
                        class="fa fa-instagram"></i></a>
            </div>
        </div>
        <!-- Footer 2nd Row -->
        <div class="footer-second-row">
            <span class="text-muted">Copyright SWEETZ2021©. Made with love by foxytech.net.</span>
        </div>
    </div>

    <!-- Back To Top -->
    <a href="#" id="back-to-top"><i class="ti ti-angle-up"></i></a>

</footer>
<!-- Footer / End -->
<!-- Content / End -->

<!-- Body Overlay -->
<div id="body-overlay"></div>

<!-- Modal / Product -->
<div class="modal fade" id="productModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-lg dark bg-dark">
                <div class="bg-image"><img src="assets/img/photos/modal-add.jpg" alt=""></div>
                <h4 class="modal-title">Specify your dish</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                        class="ti-close"></i></button>
            </div>
            <div class="modal-product-details">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h6 class="mb-0">Boscaiola Pasta</h6>
                        <span class="text-muted">Pasta, Cheese, Tomatoes, Olives</span>
                    </div>
                    <div class="col-3 text-lg text-right">$9.00</div>
                </div>
            </div>
            <div class="modal-body panel-details-container">
                <!-- Panel Details / Size -->
                <div class="panel-details">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_size" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panelDetailsSize" data-toggle="collapse">Size</a>
                    </h5>
                    <div id="panelDetailsSize" class="collapse show">
                        <div class="panel-details-content">
                            <div class="form-group">
                                <label class="custom-control custom-radio">
                                    <input name="radio_size" type="radio" class="custom-control-input" checked>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Small - 100g ($9.99)</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="custom-control custom-radio">
                                    <input name="radio_size" type="radio" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Medium - 200g ($14.99)</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="custom-control custom-radio">
                                    <input name="radio_size" type="radio" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Large - 350g ($21.99)</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Additions -->
                <div class="panel-details">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_additions" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panelDetailsAdditions" data-toggle="collapse">Additions</a>
                    </h5>
                    <div id="panelDetailsAdditions" class="collapse">
                        <div class="panel-details-content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Tomato ($1.29)</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Ham ($1.29)</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Chicken ($1.29)</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Cheese($1.29)</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Bacon ($1.29)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Other -->
                <div class="panel-details">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_other" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panelDetailsOther" data-toggle="collapse">Other</a>
                    </h5>
                    <div id="panelDetailsOther" class="collapse">
                        <textarea cols="30" rows="4" class="form-control"
                            placeholder="Put this any other informations..."></textarea>
                    </div>
                </div>
            </div>
            <button type="button" class="modal-btn btn btn-secondary btn-block btn-lg" data-dismiss="modal"><span>Add to
                    Cart</span></button>
        </div>
    </div>
</div>

<!-- Video Modal / Demo -->
<div class="modal modal-video fade" id="modalVideo" role="dialog">
    <button class="close" data-dismiss="modal"><i class="ti-close"></i></button>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <iframe height="500"></iframe>
        </div>
    </div>
</div>
--}}

@endsection

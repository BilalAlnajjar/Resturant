<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<meta name="keywords" content="sweetz, ice cream, gelato, sundae, milkshake, waffles, belgian waffles, crepes, glasgow">
<meta name="description" content="Sweetz offers over 30 flavours of ice cream, premium milkshakes and mouthwatering sundaes. Barista coffee made with love. Buy fresh waffle & crepe instore. Visit our Glasgow Southside city store.">
<meta name="page_type" content="np-template-header-footer-from-plugin">

<!-- Title -->
<title>{{$web ? $web->name : 'Web Title'}}</title>

<!-- Favicons -->
@if($web)
<link rel="shortcut icon" href="{{asset($web->fivicon)}}">
@endif
<link rel="apple-touch-icon" href="/assets/img/favicon_60x60.png">
<link rel="apple-touch-icon" sizes="76x76" href="/assets/img/favicon_76x76.png">
<link rel="apple-touch-icon" sizes="120x120" href="/assets/img/favicon_120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="/assets/img/favicon_152x152.png">

<!-- CSS Plugins -->
<link rel="stylesheet" href="/assets/plugins/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="/assets/plugins/slick-carousel/slick/slick.css" />
<link rel="stylesheet" href="/assets/plugins/animate.css/animate.min.css" />
<link rel="stylesheet" href="/assets/plugins/animsition/dist/css/animsition.min.css" />
<link href="/assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet" />
<!-- CSS Icons -->
<link rel="stylesheet" href="/assets/css/themify-icons.css" />
<link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.min.css" />

<script src="https://my.forms.app/static/feedback.js" type="text/javascript">  FormsAppFeedbackButton({ formId: "60e35e4e2ca34f5aa4a349b6", buttonText: "Contact Us", buttonTextColor: "#FFFFFF", buttonBackground: "#11c4e0", verticalAlligment: "middle", horizontalAlligment: "left", width: 500,height: 400}); </script>
<!-- CSS Theme -->
<link id="theme" rel="stylesheet" href="assets/css/themes/theme-beige.min.css" />

</head>

<body>

<!-- Body Wrapper -->
<div id="body-wrapper" class="animsition">

    <!-- Header -->
    <header id="header" class="light">

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- Logo -->
                    <div class="module module-logo dark">
                        <a href="{{route('index')}}">
                            @if($web)
                            <img src="{{asset($web->logo)}}" alt="" width="100%">
                            @endif
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <!-- Navigation -->
                    <nav class="module module-navigation left mr-4">
                        <ul id="nav-main" class="nav nav-main">
                                                        <li><a href="{{route('index')}}">HOME</a></li>
                                                         <li><a href="{{route('user.products')}}">MENU</a></li>
                            <li><a href="{{route('user.offers')}}">Offers</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>

                        </ul>
                    </nav>
                    <div class="module left">
                        <a href="{{route('user.products')}}" class="btn btn-outline-secondary"><span>Order</span></a>
                    </div>
                </div>
            </div>
        </div>

    </header>





    <!-- Header / End -->

    <!-- Header -->
    <header id="header-mobile" class="light">

        <div class="module module-nav-toggle">
            <a href="#" id="nav-toggle" data-toggle="panel-mobile"><span></span><span></span><span></span><span></span></a>
        </div>

        <div class="module module-logo">
            <a href="index.html">
                <img src="assets/img/logo-horizontal-dark.svg" alt="">
            </a>
        </div>

        <a href="#" class="module module-cart" data-toggle="panel-cart">
            <i class="ti ti-shopping-cart"></i>
            <span class="notification">2</span>
        </a>

</header>
    <!-- Content -->
    <div id="content">

        <!-- Page Title -->
        <div class="page-title bg-dark dark">
            <!-- BG Image -->
            <div class="bg-image bg-parallax"><img src="assets/img/photos/bg-croissant.jpg" alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4">
                        <h1 class="mb-0">Order Confirmation</h1>
                        <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                    </div>
                </div>
            </div>
        </div>

        <section class="section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-4">
                        <span class="icon icon-xl icon-success"><i class="ti ti-check-box"></i></span>
                        <h1 class="mb-2">Thank you for your order!</h1>
                        <h4 class=" mb-5 ">Your Order Number: <span class="font-weight-bold"> {{$address->order()->first()->number}}</span></h4>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section -->
        <section class="section bg-light">

            <div class="container">
                <div class="row">
                    <!--<div class="col-xl-12 push-xl-12 col-lg-12 push-lg-12">-->
                    <!--    <div class="shadow bg-white stick-to-content mb-4">-->
                            <!--<div class="bg-dark dark p-4"><h5 class="mb-0">You order</h5></div>-->
                            <!--<table class="table-cart">-->
                            <!--    <tr>-->
                            <!--        <td class="title">-->
                            <!--            <span class="name"><a href="#productModal" data-toggle="modal">Pizza Chicked BBQ</a></span>-->
                            <!--            <span class="caption text-muted">26”, deep-pan, thin-crust</span>-->
                            <!--        </td>-->
                            <!--        <td class="price">$9.82</td>-->
                            <!--        <td class="actions">-->
                            <!--            <a href="#productModal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>-->
                            <!--            <a href="#" class="action-icon"><i class="ti ti-close"></i></a>-->
                            <!--        </td>-->
                            <!--    </tr>-->
                            <!--    <tr>-->
                            <!--        <td class="title">-->
                            <!--            <span class="name"><a href="#productModal" data-toggle="modal">Beef Burger</a></span>-->
                            <!--            <span class="caption text-muted">Large (500g)</span>-->
                            <!--        </td>-->
                            <!--        <td class="price">$9.82</td>-->
                            <!--        <td class="actions">-->
                            <!--            <a href="#productModal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>-->
                            <!--            <a href="#" class="action-icon"><i class="ti ti-close"></i></a>-->
                            <!--        </td>-->
                            <!--    </tr>-->
                            <!--    <tr>-->
                            <!--        <td class="title">-->
                            <!--            <span class="name"><a href="#productModal" data-toggle="modal">Extra Burger</a></span>-->
                            <!--            <span class="caption text-muted">Small (200g)</span>-->
                            <!--        </td>-->
                            <!--        <td class="price text-success">$0.00</td>-->
                            <!--        <td class="actions">-->
                            <!--            <a href="#productModal" data-toggle="modal" class="action-icon"><i class="ti ti-pencil"></i></a>-->
                            <!--            <a href="#" class="action-icon"><i class="ti ti-close"></i></a>-->
                            <!--        </td>-->
                            <!--    </tr>-->
                            <!--    <tr>-->
                            <!--        <td class="title">-->
                            <!--            <span class="name">Weekend 20% OFF</span>-->
                            <!--        </td>-->
                            <!--        <td class="price text-success">-$8.22</td>-->
                            <!--        <td class="actions"></td>-->
                            <!--    </tr>-->
                            <!--</table>-->
                            <!--<div class="cart-summary">-->
                                <!--<div class="row">-->
                                <!--    <div class="col-7 text-right text-muted">Order total:</div>-->
                                <!--    <div class="col-5"><strong>$21.02</strong></div>-->
                                <!--</div>-->
                                <!--<div class="row">-->
                                <!--    <div class="col-7 text-right text-muted">Devliery:</div>-->
                                <!--    <div class="col-5"><strong>$3.99</strong></div>-->
                                <!--</div>-->
                                <!--<hr class="hr-sm">-->
                                <!--<div class="row text-md">-->
                                <!--    <div class="col-7 text-right text-muted">Total:</div>-->
                                <!--    <div class="col-5"><strong>$24.21</strong></div>-->
                                <!--</div>-->
                        <!--    </div>-->
                        <!--</div>-->

{{--
                        @if($order->products()->get() != [])
                        @foreach ($order->products()->get() as $product)
                            <div class="bg-success text-white m-3" style="font-weight: bold;">{{$product->name}} ({{$product->pivot->quantity}})</div>
                            @if($product->sub_additions()->get() != [])
                                @foreach ($product->sub_additions()->where('order_id',$order->id)->get() as $sub_addition)
                                <span class="badge bg-light text-dark">{{$sub_addition->name}}</span>
                                @endforeach
                            @endif
                        @endforeach
                    @endif

                    @if($order->offers()->get() != [])
                        @foreach ($order->offers()->get() as $offer)
                            <div class="bg-success text-white m-3" style="font-weight: bold;">{{$offer->name}}</div>
                            @if($offer->sub_additions()->get() != [])
                                @foreach ($offer->sub_additions()->where('order_id',$order->id)->get() as $sub_addition)
                                <span class="badge bg-light text-dark">{{$sub_addition->name}}</span>
                                @endforeach
                            @endif
                        @endforeach
                    @endif --}}

                    </div>
                        <div class="bg-white p-4 p-md-5 mb-4">
                            <h4 class="border-bottom pb-4"><i class="ti ti-user mr-3 text-primary"></i>Basic informations</h4>
                            <div class="row mb-5">
                                <div class="form-group col-sm-6">
                                    <label>Name:</label>
                                    <h4 class="mb-0">{{$address->name}} </h4>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Surename:</label>
                                     <h4 class="mb-0">{{$address->surename}}</h4>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Postcode:</label>
                                    <h4 class="mb-0">{{$address->postcode}}</h4>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Address 1:</label>
                                     <h4 class="mb-0">{{$address->address1}}</h4>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Address 2:</label>
                                     <h4 class="mb-0">{{$address->address2}}</h4>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Town:</label>
                                     <h4 class="mb-0">{{$address->town}}</h4>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Phone number:</label>
                                    <h4 class="mb-0">{{$address->mobile}}</h4>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>E-mail address:</label>
                                    <h4 class="mb-0">{{$address->email}}</h4>
                                </div>
                            </div>

                            <h4 class="border-bottom pb-4"><i class="ti ti-package mr-3 text-primary"></i>Order Review</h4>
                            <div class="row mb-5">
                                <div class="form-group col-sm-12">


                        <div class="panel-cart-content">
                <table class="table-cart">
                    @if($order->offers()->get() != [])
                    @foreach ($order->offers()->get() as $offer)
                    <tr>
                        <td class="title">
                            <span class="name"><a href="#productModal" data-toggle="modal">{{$offer->name}}</a></span>
                            <span class="caption text-muted">{!! $offer->description !!}</span>
                        </td>
                        <td class="price">£{{number_format($offer->price,2)}}</td>
                        {{-- <td class="price">{{$cart->quantity}}</td> --}}
                        <td class="actions">

                            <a href="" class="action-icon" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="ti ti-close"></i></a>

                            <form id="logout-form" action="{{ route('cart.delete',$cart->id) }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </td>
                    </tr>
                    @if($offer->sub_additions()->get() != [])
                        @foreach ($offer->sub_additions()->where('order_id',$order->id)->get() as $sub_addition)
                        <tr class="title">
                            <td>{{$sub_addition->name}}</td>
                            <td>£{{$sub_addition->price}}</td>
                        </tr>
                        @endforeach
                    @endif
                    @endforeach
                    @endif
                    @if($order->products()->get() != [])
                    @foreach ($order->products()->get() as $product)
                    <tr>
                        <td class="title">
                            <span class="name"><a href="#productModal" data-toggle="modal">{{$product->name}}</a></span>
                            <span class="caption text-muted">{!!$product->description!!}</span>
                        </td>
                        <td class="price">£{{number_format($product->price,2)}}</td>
                        {{-- <td class="price">{{$address->order()->first()->quantity}}</td> --}}
                        {{-- <td class="actions">
                            <a href="" class="action-icon" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="ti ti-close"></i></a>

                                <form id="logout-form" action="{{ route('cart.delete',$cart->id) }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </td> --}}
                    </tr>

                    @if($product->sub_additions()->get() != [])
                        @foreach ($product->sub_additions()->where('order_id',$order->id)->get() as $sub_addition)
                        <tr class="title">
                            <td>{{$sub_addition->name}}</td>
                            <td>£{{number_format($sub_addition->price,2)}}</td>
                            <td class="price">{{App\Models\SubAdditionProducts::where('addition_sub_id',$sub_addition->id)->where('product_id',$product->id)->first()->count}}</td>
                        </tr>
                        @endforeach
                    @endif
                @endforeach
                    @endif
                </table>
                <div class="row justify-content-end my-3 font-weight-bold" style="margin-right: 56px;">
                    <div class="custom-control-description mx-3">Service Fee:</div>
                    <label class="font-weight-bold">£{{number_format(App\Models\General::first()->delivery_price,2)}}</label>
                </div>

                @if($order->delivery != 'pickup')
                <div class="row justify-content-end my-3 font-weight-bold" style="margin-right: 56px;">
                    <div class="custom-control-description mx-3">Devliery:</div>
                    <div class="font-weight-bold"><strong>£{{number_format($delivery_price,2)}}</strong></div>
                </div>
                @endif


            <hr class="hr-sm">
            <div class="row cart-summary justify-content-end mr-5">
                <div class="row text-lg ">
                    <div class="col-7 text-right text-muted">Total:</div>
                    <div class="col-5"><strong>£{{number_format($order->price,2)}}</strong></div>
                </div>
            </div>
            </div>


                                <!-- <div class="row">-->
                                <!--    <div class="col-5 text-right text-muted">Order total:</div>-->
                                <!--    <div class="col-5"><strong>$21.02</strong></div>-->
                                <!--</div>-->

                                 </div>
                            </div>
                    </div>
                </div>
            </div>

        </section>

<!-- Footer -->
<footer id="footer" class="bg-dark dark">

    <div class="container">
        <!-- Footer 1st Row -->
        <div class="footer-first-row row">
            <div class="col-lg-3 text-center">
                @if($web)
                <a href="{{route('index')}}"><img src="{{asset($web->logo)}}" alt="" width="115" class="mt-5 mb-5"></a>
                @endif
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
                    action="{{route('email.store')}}"
                                            method="POST">
                    <div class="input-group">
                        <input name="email" type="email" class="form-control"
                            placeholder="Tap your e-mail..." required>
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-submit" type="submit">
                                Subscribe
                                {{-- <span class="description">Subscribe</span> --}}
                                {{-- <span class="success">
                                    <svg x="0px" y="0px" viewBox="0 0 32 32">
                                        <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79"
                                            fill="none" stroke="#FFFFFF" stroke-width="2"
                                            stroke-linecap="square" stroke-miterlimit="10"
                                            d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" /></svg>
                                </span> --}}
                                {{-- <span class="error">Try again...</span> --}}
                            </button>
                        </span>
                    </div>
                </form>
                <!-- MailChimp Form -->
                @if($social != null)
                <h5 class="text-muted mb-3">Social Media</h5>
                <a href="{{$social->facebook}}" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
                <a href="{{$social->twitter}}" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
                <a href="{{$social->youtube}}" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
                <a href="{{$social->instagram}}" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
                @endif
            </div>
        </div>
        <!-- Footer 2nd Row -->
    </div>

    <!-- Back To Top -->
    <a href="#" id="back-to-top"><i class="ti ti-angle-up"></i></a>

</footer>
<!-- Footer / End -->

</div>
<!-- Content / End -->

{{-- <!-- Panel Cart -->
<div id="panel-cart">
<div class="panel-cart-container">
    <div class="panel-cart-title">
        <h5 class="title">Your Cart</h5>
        <button class="close" data-toggle="panel-cart"><i class="ti ti-close"></i></button>
    </div>
    <div class="panel-cart-content">
        <table class="table-cart">
            @foreach ($carts as $cart)
            @if($cart->offers()->get() != [])
            @foreach ($cart->offers()->get() as $offer)
            <tr>
                <td class="title">
                    <span class="name"><a href="#productModal" data-toggle="modal">{{$offer->name}}</a></span>
                    <span class="caption text-muted">{!! $offer->description !!}</span>
                </td>
                <td class="price">£{{number_format($offer->price,2)}}</td>
                <td class="price">{{$cart->quantity}}</td>
                <td class="actions">

                    <a href="" class="action-icon" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="ti ti-close"></i></a>

                    <form id="logout-form" action="{{ route('cart.delete',$cart->id) }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </td>
            </tr>
                @foreach ($cart->additions as $addition)
                    <tr class="title">
                        <td>{{$addition->name}}</td>
                        <td>£{{number_format($addition->price,2)}}</td>
                    </tr>
                @endforeach
            @endforeach
            @endif
            @if($cart->products()->get() != [])
            @foreach ($cart->products()->get() as $product)
            <tr>
                <td class="title">
                    <span class="name"><a href="#productModal" data-toggle="modal">{{$product->name}}</a></span>
                    <span class="caption text-muted">{!!$product->description!!}</span>
                </td>
                <td class="price">£{{number_format($product->price,2)}}</td>
                <td class="price">{{$cart->quantity}}</td>
                <td class="actions">
                    <a href="" class="action-icon" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="ti ti-close"></i></a>

                        <form id="logout-form" action="{{ route('cart.delete',$cart->id) }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </td>
            </tr>

            @foreach ($cart->additions as $addition)
            <tr class="title">
                <td>{{$addition->name}}</td>
                <td>£{{number_format($addition->price,2)}}</td>
            </tr>
        @endforeach
            @endforeach
            @endif
            @endforeach
        </table>
        <form method="POST" action="{{route('address.index')}}">

            <div class="row justify-content-around my-3 font-weight-bold" style="margin-right: 56px;">
                <div class="custom-control-description">Service Fee:</div>
                <label class="font-weight-bold">£{{number_format(App\Models\General::first()->delivery_price,2)}}</label>
            </div>

            @if($devliery != 0)
            <div class="row justify-content-around my-3 font-weight-bold" style="margin-right: 56px;">
                <div class="custom-control-description">Devliery:</div>
                <div class="font-weight-bold"><strong>£{{number_format($devliery,2)}}</strong></div>
            </div>
            @endif

            <div class="row justify-content-center my-3">
                <label class="custom-control custom-radio font-weight-bold">
                    <input type="radio" name="delivary" value="true" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Delivery</span>
                </label>
                <label class="custom-control custom-radio font-weight-bold">
                    <input type="radio" name="delivary" value="false" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Pick up</span>
                </label>
            </div>


        <hr class="hr-sm">
        <div class="cart-summary">
            <div class="row text-lg">
                <div class="col-7 text-right text-muted">Total:</div>
                <div class="col-5"><strong>£{{number_format($total,2)}}</strong></div>
            </div>
        </div>

    </div>
</div>
<button type="submit" class="panel-cart-action btn btn-secondary btn-block btn-lg"><span>Go to checkout</span></button>
</form>
</div> --}}

<!-- Panel Mobile -->
<nav id="panel-mobile">
<div class="module module-logo bg-dark dark">
    <a href="#">
        <img src="assets/img/logo-light.png" alt="" width="115">
    </a>
    <button class="close" data-toggle="panel-mobile"><i class="ti ti-close"></i></button>
</div>
<nav class="module module-navigation"></nav>
<div class="module module-social">
    <h6 class="text-sm mb-3">Follow Us!</h6>
    @if($social != null)

    <a href="{{$social->facebook}}" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
    <a href="{{$social->twitter}}" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
    <a href="{{$social->youtube}}" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
    <a href="{{$social->instagram}}" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
    @endif
</div>
</nav>

<!-- Body Overlay -->
<div id="body-overlay"></div>

</div>



<script>
    var timeLater = document.getElementById('timeLater');
    timeLater.style.display = "none";

    var lat = document.getElementById('lat');


    function myfunction(){


            var x = document.getElementById('time').value;

            console.log(x);

                if( x == 1){
                    timeLater.style.display = "none";
                    lat.removeAttribute("name");
                }

                if(x == 2){

                    timeLater.style.display = "block";
                    lat.setAttribute("name","timeLater");
                }
            }
    </script>

    <script>
        $('#postcode_lookup').lookupPostcodeForm({
            api_key: '4XwviRLKwHfqsVe1XFi3gWPivf8AtBjx', // Change to your API key
            output_fields:{
                line_1: '#line1',
                line_2: '#line2',
                line_3: '#line3',
                post_town: '#town',
                postcode: '#postcode'
            }
        });
        </script>

    <script src="/assets/js/jquery-3.4.1.min.js"></script>
    <script src="/assets/js/jquery.postcode.min.js"></script>

<!-- JS Plugins -->
<script src="/assets/plugins/jquery/dist/jquery.min.js"></script>
<script src="/assets/plugins/tether/dist/js/tether.min.js"></script>
<script src="/assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/assets/plugins/slick-carousel/slick/slick.min.js"></script>
<script src="/assets/plugins/jquery.appear/jquery.appear.js"></script>
<script src="/assets/plugins/jquery.scrollto/jquery.scrollTo.min.js"></script>
<script src="/assets/plugins/jquery.localscroll/jquery.localScroll.min.js"></script>
<script src="/assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/assets/plugins/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.min.js"></script>
<script src="/assets/plugins/twitter-fetcher/js/twitterFetcher_min.js"></script>
<script src="/assets/plugins/skrollr/dist/skrollr.min.js"></script>
<script src="/assets/plugins/animsition/dist/js/animsition.min.js"></script>

<!-- JS Core -->
<script src="/assets/js/core.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>

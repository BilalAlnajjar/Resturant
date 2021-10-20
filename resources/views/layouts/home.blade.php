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
                <div class="col-md-2">
                    <a class="module module-cart right" data-toggle="panel-cart">
                        <span class="cart-icon">
                            <i class="ti ti-shopping-cart"></i>
                            <span class="notification">{{count($carts)}}</span>
                        </span>
                        <span class="cart-value">£{{number_format($total,2)}}</span>
                    </a>
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
            @if($web)
            <img src="{{asset($web->logo)}}" alt="">
            @endif
        </div>

        <a href="#" class="module module-cart" data-toggle="panel-cart">
            <i class="ti ti-shopping-cart"></i>
            <span class="notification">{{count($carts)}}</span>
        </a>
</div>
</div>

    </header>
    <!-- Header / End -->
        @yield('content')
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
        <a href="#header" id="back-to-top"><i class="ti ti-angle-up"></i></a>

</footer>
<!-- Footer / End -->

</div>
<!-- Content / End -->

<!-- Panel Cart -->
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
                    <small>{{$addition->category_addition()->first()->name}}</small>
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
                <td>{{$addition->name}} <br>  <small> {{$addition->category_addition()->first()->name}} </small></td>
                <td>£{{number_format($addition->price,2)}}</td>
                <td class="price">{{App\Models\CartAdditions::where('addition_sub_id',$addition->id)->where('cart_id',$cart->id)->first()->count}}</td>
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
</div>

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

@if(session('result') == 'success')
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{session('message')}}",
    })
</script>
@endif

@if(session('result') == 'oops')
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text:  "{{session('message')}}",
        footer: '<a href>Why do I have this issue?</a>'
    })
</script>
@endif

@if(session('result') == 'faile')
<script>
   const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 9000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'error',
  title: "{{session('message')}}"
})
</script>
@endif

@if(session('result') == 'sucsses-order'|| session('result') == 'sacssesChechout')
<script>
   const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 9000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: "{{session('message')}}"
})
</script>
@endif

</body>

</html>

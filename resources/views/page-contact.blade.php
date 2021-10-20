@extends('layouts.home')
@section('content')
    <!-- Content -->
    <div id="content">

        <!-- Page Title -->
        <div class="page-title bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4">
                        <h1 class="mb-0">Contact Us</h1>
                        <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section -->
        <section class="section">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 push-lg-1 col-md-6">
                        <a href="{{route('index')}}">
                            @if($web)
                            <img src="{{asset($web->logo)}}" alt="" width="100%">
                            @endif
                        </a>
                        <h4 class="mb-0">{{$web ? $web->name : 'Web Title'}}</h4>
                        {{-- <span class="text-muted">Green Street 22, New York</span> --}}
                        <hr class="hr-md">
                        <div class="row">
                            @if($contact)
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <h6 class="mb-1 text-muted">Phone:</h6>
                                {{$contact->phone}}
                            </div>
                            <div class="col-sm-6">
                                <h6 class="mb-1 text-muted">E-mail:</h6>
                                {{$contact->email}}
                            </div>
                            @endif
                        </div>
                        @if($social != null)
                        <hr class="hr-md">
                        <h6 class="mb-3 text-muted">Follow Us!</h6>
                        <a href="{{$social->facebook}}" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
                        <a href="{{$social->twitter}}" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
                        <a href="{{$social->youtube}}" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
                        <a href="{{$social->instagram}}" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
                        @endif
                    </div>
                    <div class="col-lg-5 push-lg-2 col-md-6">
                        <div id="google-map" class="h-500 shadow">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m8!1m3!1d2240.5003117175306!2d-4.270113!3d55.836632!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d55.8366322!2d-4.2701129!5e0!3m2!1sen!2suk!4v1625730689751!5m2!1sen!2suk" width="445" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </section>
@endsection

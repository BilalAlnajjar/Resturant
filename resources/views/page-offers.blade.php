@extends('layouts.home')
@section('content')
<!-- Content -->
<div id="content">

    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 push-lg-4">
                    <h1 class="mb-0">Offers</h1>
                    <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-content">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-10 push-md-1" role="tablist">
                    @foreach ($categories as $category)
                    <!-- Menu Category / Burgers -->
                    @php
                    $arr = explode(' ',$category->name)
                    @endphp
                    <div id="Burgers" class="menu-category">
                        <div class="menu-category-title collapse-toggle" role="tab" data-target="#{{$category->name}}"
                            data-toggle="collapse" aria-expanded="true">
                            <div class="bg-image"><img src="{{asset($category->image)}}" alt=""></div>
                            <h2 class="title">{{$category->name}}</h2>
                            <div class="fw-light" style="z-index: 1;position: absolute;
                            bottom: 1rem;
                            left: 4rem;
                            font-size: 18px;
                            font-weight:400;
                            ">{!!$category->sub_title!!}</div>
                        </div>
                        <div id="" class="menu-category-content padded collapse show">
                            <div class="row gutters-sm">
                                @foreach ($category->offers()->get() as $offer)
                                <div class="col-lg-4 col-6">
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-grid-item">
                                        <img class="mb-4" src="assets/img/products/product-burger.jpg" alt="">
                                        <h6 class="mb-0">{{$offer->name}}</h6>
                                        <span class="text-muted text-sm">{!! $offer->description !!}</span>
                                        <div class="row align-items-center mt-4">
                                            <div class="col-sm-6"><span class="text-md mr-4"><span
                                                        class="text-muted">from</span> £{{number_format($offer->price,2)}}</span></div>
                                            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button
                                                    class="btn btn-outline-secondary btn-sm" data-target="#{{$arr[0]}}"
                                                    data-toggle="modal"><span>Add to cart</span></button></div>
                                        </div>
                                    </div>

                                    <!-- Modal / Product -->
                                    <div class="modal fade" id="{{$arr[0]}}" role="dialog">
                                        <form method="POST" action="{{route('cartOffer.store',$offer->id)}}">
                                            @csrf
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-header-lg dark bg-dark">
                                                        <div class="bg-image"><img src="assets/img/photos/modal-add.jpg"
                                                                alt=""></div>
                                                        <h4 class="modal-title">Specify your dish</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><i class="ti-close"></i></button>
                                                    </div>
                                                    <div class="modal-product-details">
                                                        <div class="row align-items-center">
                                                            <div class="col-6">
                                                                <h6 class="mb-0">{{$offer->name}}</h6>
                                                                <span class="text-muted">{!! $offer->description
                                                                    !!}</span>
                                                            </div>
                                                            <div class="col-3 text-lg text-right">£{{number_format($offer->price,2)}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body panel-details-container">
                                                        <!-- Panel Details / Additions -->
                                                        @foreach ($offer->additions()->get() as $addition)

                                                        @php
                                                        $arr = explode(' ',$addition->name)
                                                        @endphp
                                                        <div class="panel-details">
                                                            <h5 class="panel-details-title">
                                                                <label class="custom-control custom-radio">
                                                                    <input name="radio_title_additions" type="radio"
                                                                        class="custom-control-input">
                                                                    <span class="custom-control-indicator"></span>
                                                                </label>
                                                                <a href="#{{$arr[0]}}"
                                                                    data-toggle="collapse">{{$addition->name}}</a>
                                                            </h5>
                                                            <div id='{{$arr[0]}}' class="collapse">
                                                                <div class="panel-details-content">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            @foreach ($addition->sub_additions as
                                                                            $sub_addition)

                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        value="{{$sub_addition->id}}"
                                                                                        name="{{$sub_addition->id}}">
                                                                                    <span
                                                                                        class="custom-control-indicator"></span>
                                                                                    <span
                                                                                        class="custom-control-description">{{$sub_addition->name}}
                                                                                        (£{{number_format($sub_addition->price,2)}}(</span>
                                                                                </label>
                                                                            </div>
                                                                            @endforeach

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        @endforeach
                                                        <div class="row" style="background: #25282A;">
                                                            <div class="col-6 form-group text-center d-flex align-items-baseline justify-content-around mx-auto my-2">
                                                               <input style="max-height: 40px;" type="number" class=" mx-2 form-control input-qty form-control-lg" value="1" name="quantity">
                                                           </div>
                                                           <button type="submit" class="col-6 modal-btn btn btn-secondary btn-block btn-lg"
                                                           ><span>Add to Cart</span></button>
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>

            </div>

        </div>
    </div>
</div>
</div>
<!-- Content / End --

@endsection

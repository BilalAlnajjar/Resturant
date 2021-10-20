@extends('layouts.home')
@section('content')

<!-- Content -->
<div id="content">

    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 push-lg-4">
                    <h1 class="mb-0">Menu List</h1>
                    <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-content">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-3">
                    <!-- Menu Navigation -->
                    <nav id="menu-navigation" class="stick-to-content" data-local-scroll>
                        <ul class="nav nav-menu bg-dark dark">
                            @foreach ($categories as $category)

                            <li><a href="#{{$category->id}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div class="col-md-9">
                    <!-- Menu Category / Burgers -->
                    @foreach ($categories as $category)
                    <div id="{{$category->id}}" class="menu-category">
                        <div class="menu-category-title">
                            <div class="bg-image"><img src="{{asset($category->image)}}" alt=""></div>
                            <h2 class="title">{{$category->name}}</h2>
                            <div class="fw-light" style="z-index: 1;position: absolute;
                            bottom: 1rem;
                            left: 4rem;
                            font-size: 18px;
                            font-weight:400;
                            ">{!!$category->sub_title!!}</div>
                        </div>
                        <div class="menu-category-content">
                            @foreach ($category->products()->get() as $product)

                            <!-- Menu Item -->
                            <div class="menu-item menu-list-item">
                                <div class="row align-items-center">
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <h6 class="mb-0">{{$product->name}}</h6>
                                        <span class="text-muted text-sm">{{$product->description}}</span>
                                    </div>
                                    <div class="col-sm-6 text-sm-right">
                                        <span class="text-md mr-4"><span class="text-muted">from</span>
                                        £{{number_format($product->price,2)}}</span>
                                        <button class="btn btn-outline-secondary btn-sm" data-target="#{{$product->id}}product"
                                            data-toggle="modal"><span>Add to cart</span></button>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal / Product -->
                            <div class="modal fade" id="{{$product->id}}product" role="dialog">
                                <form  method="POST" action="{{route('cartProduct.store',$product->id)}}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header modal-header-lg dark bg-dark">
                                            <div class="bg-image"><img src="assets/img/photos/modal-add.jpg" alt="">
                                            </div>
                                            <h4 class="modal-title">Specify your dish</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><i class="ti-close"></i></button>
                                        </div>
                                        <div class="modal-product-details">
                                            <div class="row align-items-center">
                                                <div class="col-9">
                                                    <h6 class="mb-0">{{$product->name}}</h6>
                                                    <span class="text-muted">{{$product->description}}</span>
                                                </div>
                                                <div class="col-3 text-lg text-right">£{{number_format($product->price,2)}}</div>
                                            </div>
                                        </div>
                                        <div class="modal-body panel-details-container">
                                            @foreach ($product->additions as $addition)

                                            <!-- Panel Details / Size -->
                                            <div class="panel-details">
                                                <h5 class="panel-details-title">
                                                    <label class="custom-control custom-radio">
                                                        <input name="radio_title_size" type="radio"
                                                            class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                    </label>
                                                    <a href="#{{$addition->id}}" data-toggle="collapse">{{$addition->name}}</a>
                                                </h5>
                                                <div id="{{$addition->name}}" class="collapse show">

                                                    <div class="panel-details-content">
                                                        @foreach ($addition->sub_additions as $sub_addition)
                                                        <div class="col-sm-12 row justify-content-between">
                                                            <div class="form-group col-10 ">
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox" value="{{$sub_addition->id}}" name="sub_addition[]" class="custom-control-input">
                                                                    <span class="custom-control-indicator"><svg class="icon" x="0px" y="0px" viewBox="0 0 32 32"><path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="4" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"></path></svg></span>
                                                                    <span class="custom-control-description">{{$sub_addition->name}}</span><span class="ml-3">(£{{number_format($sub_addition->price,2)}})</span></span>
                                                                </label>
                                                            </div>
                                                            @if($sub_addition->count == "on")
                                                            @php
                                                                $name = $sub_addition->name;
                                                                $firstWord = explode(" ",$name);
                                                                $length = count($firstWord) -1;
                                                            @endphp
                                                            <div class="col-2">
                                                                <input type="number" name="{{"$firstWord[0].$firstWord[$length]"}}" style="width:180%;" value="1">
                                                            </div>
                                                            @endif
                                                        </div>
                                                        @endforeach
                                                        </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="row" style="background: #25282A;">
                                            <div class="col-6 form-group text-center d-flex align-items-baseline justify-content-around mx-auto my-2">
                                               <input style="max-height: 40px;" type="number" class=" mx-2 form-control input-qty form-control-lg" value="1" name="quantity">
                                           </div>
                                           <button type="submit" class="col-6 modal-btn btn btn-secondary btn-block btn-lg"
                                           ><span>Add to Cart</span></button>
                                       </div>

                                    </div>
                                </div>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

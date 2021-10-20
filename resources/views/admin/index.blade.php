@extends('layouts.dashboard')
@section('content')


                    <div class="row" style="padding-top: 20px;">
                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card bg-success img-card box-success-shadow x-box-cards">
                                <div class="card-body card-taps">
                                    <a href="{{route('orders.index')}}"></a>
                                    <div class="d-flex">
                                        <div class="text-white">
                                            <h2 class="mb-0 number-font">{{$orders_count}}</h2>
                                            <p class="mb-0 number-font custom-number">Total older</p>
                                            <div class="progress h-2" style="margin-top:20px">
                                                <div class="progress-bar w-50" role="progressbar"
                                                    style="background-color: #24dcc2"></div>
                                            </div>
                                        </div>
                                        <div class="ml-auto custom-icon"> <i
                                                class="fa fa-cutlery text-white fs-30 mr-2 mt-2"
                                                style="transform: translateY(32px);font-size: 24px !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- COL END -->

                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card bg-secondary img-card box-secondary-shadow x-box-cards">
                                <div class="card-body card-taps">
                                    <a href="{{route('product.index')}}"></a>
                                    <div class="d-flex">
                                        <div class="text-white">
                                            <h2 class="mb-0 number-font">{{$product_count}}</h2>
                                            <p class="mb-0 number-font custom-number">Total Products</p>
                                            <div class="progress h-2" style="margin-top:20px">
                                                <div class="progress-bar w-50" role="progressbar"
                                                    style="background-color: #24dcc2"></div>
                                            </div>
                                        </div>
                                        <div class="ml-auto custom-icon"> <i
                                                class="fa fa-shopping-bag text-white fs-30 mr-2 mt-2"
                                                style="transform: translateY(32px);font-size: 24px !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- COL END -->

                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card bg-info img-card box-info-shadow x-box-cards">
                                <div class="card-body card-taps">
                                    <a href="{{route('customers')}}"></a>
                                    <div class="d-flex">
                                        <div class="text-white">
                                            <h2 class="mb-0 number-font">{{$online_visitor}}</h2>
                                            <p class="mb-0 number-font custom-number">Total Customers</p>
                                            <div class="progress h-2" style="margin-top:20px">
                                                <div class="progress-bar w-50" role="progressbar"
                                                    style="background-color: #24dcc2"></div>
                                            </div>
                                        </div>
                                        <div class="ml-auto custom-icon"> <i
                                                class="fe fe-users text-white fs-30 mr-2 mt-2"
                                                style="transform: translateY(32px);font-size: 24px !important;display: block"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- COL END -->

                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                            <div class="card bg-primary img-card box-primary-shadow x-box-cards">
                                <div class="card-body card-taps">
                                    <a href="{{route('offer.index')}}"></a>
                                    <div class="d-flex">
                                        <div class="text-white">
                                            <h2 class="mb-0 number-font">{{$offer_count}}</h2>
                                            <p class="mb-0 number-font custom-number">Total offers</p>
                                            <div class="progress h-2" style="margin-top:20px">
                                                <div class="progress-bar w-50" role="progressbar"
                                                    style="background-color: #24dcc2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- COL END -->
                    </div>

                    <!-- ROW-2 OPEN -->
                    <div class="row">
                        <div class="" style="display: none">
                            <div class="card overflow-hidden bg-white work-progress">
                                <canvas id="deals" class="chart-dropshadow-success"></canvas>
                            </div>
                        </div><!-- COL END -->
                        <!-- COL END -->
                    </div>
                    <!-- ROW-2 CLOSED -->

                    <!-- ROW-3 CLOSED -->
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Order Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                    </div>
                                    <div class="table-responsive">
                                        <div class="filter-custom">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                            <thead>
                                                <tr>

                                                    <th class="wd-15p">ID</th>
                                                    <th class="wd-15p">Customer Details</th>

                                                    {{-- <th class="wd-15p">Street</th>
                                                    <th class="wd-15p">City</th>
                                                    <th class="wd-15p">Telnumber</th>
                                                    <th class="wd-15p">Email</th> --}}

                                                    {{-- <th class="wd-15p">Order Type</th> --}}
                                                    {{-- <th class="wd-15p">offer</th>

                                                    <th class="wd-15p">product</th> --}}
                                                    <th class="wd-15p">Additions products</th>

                                                    <th class="wd-10p">Price</th>
                                                    <th class="wd-10p">Time</th>
                                                    {{-- <th class="wd-10p">At</th> --}}
                                                    <th class="wd-10p">Payment</th>



                                                    <th class="wd-10p">Date</th>
                                                    <th class="wd-15p">Status</th>
                                                    <th class="wd-10p">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $order)
                                                <tr>
                                                    <td> {{$order->number}}</td>
                                                    <td>
                                                        <div class="d-flex flex-column align-items-baseline">
                                                            @if($order->address)
                                                            <div class="m-0" style="max-height:20px"><strong style="font-weight:bold;"></strong>{{$order->address()->first()->name}}</div>


                                                            <div class="m-0" style="max-height:20px"><strong  style="font-weight:bold;">Postcode: </strong> {{$order->address()->first()->postcode}}</div>
                                                            <div class="m-0" style="max-height:20px"><strong  style="font-weight:bold;">Address 1: </strong> {{$order->address()->first()->address1}}</div>
                                                            <div class="m-0" style="max-height:20px"><strong  style="font-weight:bold;">Address 2: </strong> {{$order->address()->first()->address2}}</div>
                                                            <div class="m-0" style="max-height:20px"><strong  style="font-weight:bold;">Company: </strong> {{$order->address()->first()->company}}</div>
                                                            <div class="m-0" style="max-height:20px"><strong  style="font-weight:bold;">Town: </strong> {{$order->address()->first()->town}}</div>

                                                            <div class="m-0" style="max-height:20px"><strong  style="font-weight:bold;"></strong>{{$order->address()->first()->mobile}}</div>

                                                            <div class="m-0" style="max-height:20px"><strong  style="font-weight:bold;"></strong> {{$order->address()->first()->email}}</div>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    {{-- <td>
                                                        @if($order->address)
                                                       {{$order->address()->first()->street}}
                                                       @endif
                                                    </td>
                                                    <td>
                                                        @if($order->address)
                                                        {{$order->address()->first()->city}}
                                                        @endif
                                                     </td>
                                                     <td>
                                                        @if($order->address)
                                                        {{$order->address()->first()->mobile}}
                                                        @endif
                                                     </td>
                                                     <td>
                                                        @if($order->address)
                                                        {{$order->address()->first()->email}}
                                                        @endif
                                                     </td> --}}
                                                    {{-- <td>
                                                        {{$order->products()->first() ? "Products" : ''}} {{$order->offers()->first() ? "Offers" : ''}}
                                                    </td> --}}

                                                    {{-- <td>
                                                        @if($order->offers()->first())
                                                        @foreach ($order->offers()->get() as $offer)
                                                        <div>
                                                            {{$offer->name}}
                                                          </div>
                                                        @endforeach
                                                        @endif
                                                    </td> --}}

                                                    {{-- <td>
                                                        @if($order->products()->first())
                                                        @foreach ($order->products()->get() as $product)
                                                        <div>
                                                            {{$product->name}}
                                                          </div>
                                                        @endforeach
                                                        @endif
                                                    </td> --}}
                                                    <td>

                                                        @if($order->products()->get() != [])
                                                            @foreach ($order->products()->get() as $product)
                                                                <div class="bg-success text-white m-3" style="font-weight: bold;">{{$product->name}} ({{$product->pivot->quantity}})</div>
                                                                @if($product->sub_additions()->get() != [])
                                                                    @foreach ($product->sub_additions()->where('order_id',$order->id)->get() as $sub_addition)
                                                                    <span class="badge bg-light text-dark">{{$sub_addition->name}}
                                                                        @php
                                                                        $count = App\Models\SubAdditionProducts::where('order_id',$order->id)->where('addition_sub_id',$sub_addition->id)->first()->count;
                                                                        @endphp
                                                                        @if($count != 1 && $count != null )
                                                                        <span class="ml-3">({{App\Models\SubAdditionProducts::where('order_id',$order->id)->where('addition_sub_id',$sub_addition->id)->first()->count}})</span>
                                                                        @endif
                                                                    </span>
                                                                    <br>
                                                                    <small class="d-block">({{$sub_addition->category_addition()->first()->name}})</small>
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
                                                                    <br>
                                                                    <small>({{$sub_addition->category_addition()->first()->name}})</small>
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                        </td>
                                                    <td>£{{number_format($order->price,2)}}</td>
                                                    <td>

                                                        {{ucwords($order->time)}}
                                                        <br>
                                                        {{-- @if($order->time == 'later') --}}
                                                            {{$order->timeLater}}
                                                        {{-- @endif --}}

                                                    </td>
                                                    {{-- <td>{{$order->timeLater}}</td> --}}
                                                    <td>{{ucwords($order->payment_type)}}</td>


                                                    <td>
                                                        @php
                                                            $date = DateTime::createFromFormat("Y-m-d H:i:s",$order->created_at)->format('d-m-Y');
                                                            $hour = DateTime::createFromFormat("Y-m-d H:i:s",$order->created_at)->format('H:i')
                                                        @endphp
                                                        {{$hour}}
                                                        <br>
                                                        {!!
                                                           $date

                                                        !!}
                                                    </td>
                                                    <td class="row border-0 justify-content-center" style="min-width:11rem;">
                                                        <div class="col-12">{{ucwords($order->status)}}</div>
                                                        <br>
                                                        <form class="col-3" id="order-complete" action="{{ route('order.statuscomplete',$order->id) }}" method="POST" class="d-none">
                                                            @csrf
                                                            <button type="submit" class="btn btn-icon  btn-success"><i class="side-menu__icon fa fa-check"></i></button>
                                                        </form>
                                                        <form class="col-3" id="order-consle" action="{{ route('order.statusconsle',$order->id) }}" method="POST" class="d-none">
                                                            @csrf
                                                            <button type="submit" class="btn btn-icon  btn-danger"><i class="side-menu__icon fa fa-remove"></i></button>
                                                        </form>

                                                    </td>
                                                        {{-- <form id="order-update" action="{{ route('order.update',$order->id) }}" method="POST">
                                                            @csrf
                                                                <select class="form-control select2 custom-select" data-placeholder="Choose one" name="status" >
                                                                    <option label="Choose one">
                                                                    </option>
                                                                    <option @if($order->status == "pending") selected @endif value="pending">Pending</option>
                                                                    <option @if($order->status == "processing") selected @endif  value="processing">Processing </option>
                                                                    <option @if($order->status == "shipping") selected @endif  value="shipping">Shipping </option>
                                                                    <option @if($order->status == "completed") selected @endif value="completed">Completed </option>
                                                                    <option @if($order->status == "declined") selected @endif value="declined">Declined  </option>

                                                                </select>

                                                        </form> --}}
                                                        {{-- @if($order->status != 'completed' && $order->status != 'declined')
                                                        <div href="#" class="btn btn-warning btn-sm">{{$order->status}}</div>
                                                        @endif
                                                        @if($order->status == 'completed')
                                                        <div href="#" class="btn btn-success btn-sm">{{$order->status}}</div>
                                                        @endif
                                                        @if($order->status == 'declined')
                                                        <div href="#" class="btn btn-danger btn-sm">{{$order->status}}</div>
                                                        @endif --}}
                                                    </td>

                                                    <td>

                                                        <form id="order-delete" action="{{ route('order.delete',$order->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                                        </form>




                                                    </td>

                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- TABLE WRAPPER -->
                            </div>
                            <!-- SECTION WRAPPER -->
                        </div>
                    </div>
                    <!-- ROW-1 CLOSED -->

                </div>
                <!-- CONTAINER CLOSED -->
            </div>

            <!-- SIDE-BAR -->
            <div class="sidebar sidebar-right sidebar-animate">
                <div class="p-4 border-bottom">
                    <span class="fs-17">Notifications</span>
                    <a href="#" class="sidebar-icon text-right float-right" data-toggle="sidebar-right"
                        data-target=".sidebar-right"><i class="fe fe-x"></i></a>
                </div>
                <div class="list d-flex align-items-center border-bottom p-4">
                    <div class="">
                        <span class="avatar bg-primary brround avatar-md">CH</span>
                    </div>
                    <div class="wrapper w-100 ml-3">
                        <p class="mb-0 d-flex">
                            <b>New Websites is Created</b>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-clock text-muted mr-1"></i>
                                <small class="text-muted ml-auto">30 mins ago</small>
                                <p class="mb-0"></p>
                            </div>
                        </div>
                    </div>
                </div><!-- LIST END -->
                <div class="list d-flex align-items-center border-bottom p-4">
                    <div class="">
                        <span class="avatar bg-danger brround avatar-md">N</span>
                    </div>
                    <div class="wrapper w-100 ml-3">
                        <p class="mb-0 d-flex">
                            <b>Prepare For the Next Project</b>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-clock text-muted mr-1"></i>
                                <small class="text-muted ml-auto">2 hours ago</small>
                                <p class="mb-0"></p>
                            </div>
                        </div>
                    </div>
                </div><!-- LIST END -->
                <div class="list d-flex align-items-center border-bottom p-4">
                    <div class="">
                        <span class="avatar bg-info brround avatar-md">S</span>
                    </div>
                    <div class="wrapper w-100 ml-3">
                        <p class="mb-0 d-flex">
                            <b>Decide the live Discussion Time</b>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-clock text-muted mr-1"></i>
                                <small class="text-muted ml-auto">3 hours ago</small>
                                <p class="mb-0"></p>
                            </div>
                        </div>
                    </div>
                </div><!-- LIST END -->
                <div class="list d-flex align-items-center border-bottom p-4">
                    <div class="">
                        <span class="avatar bg-warning brround avatar-md">K</span>
                    </div>
                    <div class="wrapper w-100 ml-3">
                        <p class="mb-0 d-flex">
                            <b>Team Review meeting</b>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-clock text-muted mr-1"></i>
                                <small class="text-muted ml-auto">4 hours ago</small>
                                <p class="mb-0"></p>
                            </div>
                        </div>
                    </div>
                </div><!-- LIST END -->
                <div class="list d-flex align-items-center border-bottom p-4">
                    <div class="">
                        <span class="avatar bg-success brround avatar-md">R</span>
                    </div>
                    <div class="wrapper w-100 ml-3">
                        <p class="mb-0 d-flex">
                            <b>Prepare for Presentation</b>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-clock text-muted mr-1"></i>
                                <small class="text-muted ml-auto">1 days ago</small>
                                <p class="mb-0"></p>
                            </div>
                        </div>
                    </div>
                </div><!-- LIST END -->
                <div class="list d-flex align-items-center border-bottom p-4">
                    <div class="">
                        <span class="avatar bg-pink brround avatar-md">MS</span>
                    </div>
                    <div class="wrapper w-100 ml-3">
                        <p class="mb-0 d-flex">
                            <b>Prepare for Presentation</b>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-clock text-muted mr-1"></i>
                                <small class="text-muted ml-auto">1 days ago</small>
                                <p class="mb-0"></p>
                            </div>
                        </div>
                    </div>
                </div><!-- LIST END -->
                <div class="list d-flex align-items-center border-bottom p-4">
                    <div class="">
                        <span class="avatar bg-purple brround avatar-md">L</span>
                    </div>
                    <div class="wrapper w-100 ml-3">
                        <p class="mb-0 d-flex">
                            <b>Prepare for Presentation</b>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-clock text-muted mr-1"></i>
                                <small class="text-muted ml-auto">1 day ago</small>
                                <p class="mb-0"></p>
                            </div>
                        </div>
                    </div>
                </div><!-- LIST END -->
                <div class="list d-flex align-items-center border-bottom p-4">
                    <div class="">
                        <span class="avatar bg-warning brround avatar-md">L</span>
                    </div>
                    <div class="wrapper w-100 ml-3">
                        <p class="mb-0 d-flex">
                            <b>Prepare for Presentation</b>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-clock text-muted mr-1"></i>
                                <small class="text-muted ml-auto">1 day ago</small>
                                <p class="mb-0"></p>
                            </div>
                        </div>
                    </div>
                </div><!-- LIST END -->
                <div class="list d-flex align-items-center p-4">
                    <div class="">
                        <span class="avatar bg-blue brround avatar-md">U</span>
                    </div>
                    <div class="wrapper w-100 ml-3">
                        <p class="mb-0 d-flex">
                            <b>Prepare for Presentation</b>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-clock text-muted mr-1"></i>
                                <small class="text-muted ml-auto">2 days ago</small>
                                <p class="mb-0"></p>
                            </div>
                        </div>
                    </div>
                </div><!-- LIST END -->
            </div>
            <!-- SIDE-BAR CLOSED -->
@endsection

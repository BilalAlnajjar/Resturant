@extends('layouts.dashboard')
@section('content')
				<!-- ============== START CONTENT ==============  -->
				<div class="row">
                    <div class="card">
                        <div class="card-header border-bottom-0 p-4">
                            <h2 class="card-title">1 - 30 of 546 </h2>
                            <div class="page-options d-flex float-right">

                            </div>
                        </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <div class="filter-custom" style="left: 36%;">
                                        <div class="row">
                                            <div class="col-lg-6">

                                            </div>
                                        </div>
                                    </div>
                                    <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p">ID</th>
                                                {{-- <th class="wd-15p">Product Picture</th> --}}
                                                <th class="wd-15p">Name Customer</th>
                                                <th class="wd-15p">Surename</th>
                                                {{-- <th class="wd-15p">Product Info</th> --}}
                                                <th class="wd-25p">Phone</th>
                                                <th class="wd-25p">Email</th>
                                                <th class="wd-25p">Street</th>
                                                <th class="wd-25p">City</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customers as $customer)
                                          <tr>
                                                <td>{{$customer->id}}</td>
                                                {{-- <td><img src="{{asset($product->image)}}" width="40"></td> --}}
                                                <td><a href="{{route('orders.customer',$customer->id)}}"> {{$customer->name}}</a></td>
                                                {{-- <td>{{$product->description}}</td> --}}
                                                <td>{{$customer->surename}}</td>
                                                <td>{{$customer->mobile}}</td>
                                                <td>{{$customer->email}}</td>
                                                <td>{{$customer->street}}</td>
                                                <td>{{$customer->city}}</td>

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
@endsection

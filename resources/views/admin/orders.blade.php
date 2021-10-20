@extends('layouts.dashboard')
@section('content')
				<!-- /Top Header Full -->
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
										<h3 class="card-title">All Orders</h3>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-4">

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


                                                                {{-- <div class="m-0" style="max-height:20px"><strong  style="font-weight:bold;"></strong>{{$order->address()->first()->city}}</div> --}}

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
                                                                        <span class="badge bg-light text-dark" style="font-weight: bold;">{{$sub_addition->name}}
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
				<!-- ============== END CONTENT ==============  -->

@endsection

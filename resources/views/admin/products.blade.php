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
                            <div class="btn-list">
                                <a href="{{route('product.create')}}"><button class="btn btn-primary"><i class="fe fe-plus mr-2"></i>Add Product</button></a>
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
                                                <th class="wd-15p">Name Product</th>
                                                {{-- <th class="wd-15p">Product Info</th> --}}
                                                <th class="wd-15p">Price</th>
                                                <th class="wd-25p">Menu Category</th>
                                                <th class="wd-10p">Settings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)

                                            <tr>
                                                <td>{{$product->id}}</td>
                                                {{-- <td><img src="{{asset($product->image)}}" width="40"></td> --}}
                                                <td>{{$product->name}}</td>
                                                {{-- <td>{{$product->description}}</td> --}}
                                                <td>£{{number_format($product->price,2)}}</td>
                                                <td>
                                                    @foreach ($product->categories()->get() as $category)
                                                    <span class="badge bg-light text-dark">{{$category->name}}</span>
                                                    @endforeach
                                                </td>

                                                <td>
                                                    <form action="{{route('product.destroy',$product->id)}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <a class="btn btn-sm btn-primary" href="{{route('product.edit',$product->id)}}"><i class="fa fa-edit"></i> Edit</a>
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
@endsection

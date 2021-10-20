
@extends('layouts.dashboard')
@section('content')
<!-- ============== START CONTENT ==============  -->

<form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Product</h3>
            </div>
            <div class="card-body">
                <!-- <div class="form-group">
                                    <label class="form-label">Restaurant</label>
                                    <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)">
                                        <optgroup label="Categories">
                                            <option value="AZ">Restaurant 1</option>
                                            <option value="CO">Restaurant 2</option>
                                            <option value="ID">Restaurant 3</option>
                                            <option value="MT">Restaurant 4</option>
                                            <option value="NM">Restaurant 5</option>
                                        </optgroup>
                                    </select>
                                </div> -->

                <div class="form-group">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label mt-0">Category</label>
                            <select class="form-control select2 custom-select" data-placeholder="Choose one" name="category_id" id="category_id">
                                <option label="Choose one">
                                </option>
                                <option value="{{$product->categories()->first()->id}}" selected>{{$product->categories()->first()->name}}</option>
                                @foreach ($categories as $category)
                                    @if($product->categories()->first()->name != $category->name)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach

                            </select>
                            @error('category_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Product Name" value="{{$product->name}}">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                </div>

                <div class="form-group">
                    <label class="form-label">Product Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"
                        placeholder="Enter Description here ...">{{$product->description}}</textarea>

                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" placeholder="Enter Price" value="{{number_format($product->price,2)}}">
                    @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                </div>

                <div class="col-md-6">
                    <img src="{{asset($product->image)}}" alt="">
                </div>
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Upload Sub Category image</h3>
                        </div>
                        <div class="card-body">
                            <input type="file" class="dropify" name="image" id="image" data-max-file-size="1M" />
                        </div>
                    </div>
                </div><!-- COL END -->

                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="form-group">

                    <label>Add Aditions</label>
                    <br>
                        @foreach ($product->additions()->get() as $addition )
                            <span class="badge bg-light text-dark my-3">{{$addition->name}}</span>
                        @endforeach
                    <br>
                    <select multiple="multiple my-4" class="filter-multi" name="additions[]">

                        @foreach ($additions as $addition)
                            <option value="{{$addition->id}}">{{$addition->name}}</option>
                        @endforeach

                    </select>
                    @error('additions')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

        </div>
    </div>
</div>

<!-- COL END -->
{{--
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 card-title">add </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="input" placeholder="Enter the name
">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="input" placeholder="Enter the name
">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="input" placeholder="Enter the name
">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="input" placeholder="Enter the name
">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="input" placeholder="Enter the name
">
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="input" placeholder="Enter the price
">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="input" placeholder="Enter the price
">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="input" placeholder="Enter the price
">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="input" placeholder="Enter the price
">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="input" placeholder="Enter the price
">
                        </div>

                    </div>

                </div>

            </div>

        </div> --}}
        <div class="btn-list text-center">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <a href="{{route('product.index')}}" class="btn btn-danger">Cancel</a>
        </div>
        <div class="btn-list text-center">
        </div>

    </div>

</div>
</div>
</form>
<!--ROW END-->
<!-- ============== END CONTENT ==============  -->
@endsection

@extends('layouts.dashboard')
@section('content')
<!-- ============== START CONTENT ==============  -->
<form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data"action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create|Edit Category</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Title Category</label>
                    <input type="text" class="form-control" name="name"
                        placeholder="Enter Title Category">
                </div>
                <div class="form-group">
                    <label class="form-label">Sub Title</label>
                    <textarea class="content" name="sub_title"></textarea>
                    @error('sub_title')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- COL END -->
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

        </div>
    </div><!-- COL END -->

    <div class="card-footer">
        <button type="submit" class="btn btn-success mt-1">SAVE</button>
    </div>
</div>
<form>
<!--ROW END-->
<!-- ============== END CONTENT ==============  -->

@endsection

@extends('layouts.dashboard')
@section('content')

<form action="{{route('step.store')}}" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">SAVE</h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label class="form-label">Title Section</label>
									<input type="text" class="form-control" name="title" placeholder="Enter Title Section">
                                    @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
								<div class="form-group">
									<textarea class="content" name="description"></textarea>
                                    @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
								</div>
								<div class="col-lg-12">
                                    <div class="card shadow">
                                        <div class="card-header">
                                            <h3 class="mb-0 card-title">Upload Image</h3>
                                        </div>
                                        <div class="card-body">
                                            <input type="file" class="dropify" name="image" data-height="300" />
                                        </div>
                                    </div>
                                </div><!-- COL END -->
							</div>
						</div>
					</div><!-- COL END -->
                    @error('image')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                		<div class="card-footer">
					</div>
				</div>
				<div class="btn-list text-center">
	<button type="submit" class="btn btn-primary">Save </button>
	<a href="{{route('step.index')}}" class="btn btn-danger">Cancel</a>

</div>
</form>

@endsection

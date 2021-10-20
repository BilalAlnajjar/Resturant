@extends('layouts.dashboard')
@section('content')

				<!-- ============== START CONTENT ==============  -->
				<div class="row">
					<div class="col-md-12">
                        <form method="POST" @if ($general) action="{{route('general.update')}}" @endif @if (!$general) action="{{route('general.store')}}" @endif enctype="multipart/form-data">
                            @csrf
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">General Settings</h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label class="form-label">Site's Name</label>
									<input type="text" class="form-control" name="name" placeholder="Name your site!"  @if($general) value="{{$general->name}}" @endif>
								</div>
								<div class="form-group">
                                	<label class="form-label">Footer Text</label>
								    <textarea name="footer" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Footer Text ...">  @if($general) {{$general->footer}} @endif</textarea>
                                </div>

                                <div class="form-group">
									<label class="form-label">Phone</label>
									<input type="tel" class="form-control" name="phone" placeholder="Phone Number!"  @if($contact) value="{{$contact->phone}}" @endif>
								</div>

                                <div class="form-group">
									<label class="form-label">Email</label>
									<input type="email" class="form-control" name="email" placeholder="Email!"  @if($contact) value="{{$contact->email}}" @endif>
								</div>

                                <div class="form-group">
									<label class="form-label">Delivery Price</label>
									<input type="text" class="form-control" name="delivery_price" placeholder="Price"  @if($general) value="{{$general->delivery_price}}" @endif>
								</div>

								<div class="row">
                                    @if($general)
                                    <div class="col-lg-6">
                                        <img src="{{asset($general->logo)}}" alt="">
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="{{asset($general->fivicon)}}" alt="">
                                    </div>
                                    @endif
									<div class="col-lg-6">
										<div class="card shadow">
											<div class="card-header">
												<h3 class="mb-0 card-title">Logo upload</h3>
											</div>
											<div class="card-body">
												<input type="file" name="logo" class="dropify" data-height="300" />
											</div>
										</div>
									</div><!-- COL END -->
									<div class="col-lg-6">
										<div class="card shadow">
											<div class="card-header">
												<h3 class="mb-0 card-title">Favicon upload</h3>
											</div>
											<div class="card-body">
												<input type="file" name="fivicon" class="dropify" data-height="300" />
											</div>
										</div>
									</div><!-- COL END -->
								</div>

                                <div class="card-header">
                                    <h3 class="card-title">Work Hours</h3>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">From</label>
                                            <input type="time" id="hour_from" name="hour_from"
                                            style="width:80%" @if($general) value="{{$general->hour_from}}" @endif>
                                            @error('hour_from')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">To</label>
                                            <input type="time" id="hour_to" name="hour_to"
                                             style="width:80%" @if($general) value="{{$general->hour_to}}" @endif>
                                            @error('hour_to')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
                        <button type="submit" class="btn btn-success mt-1">Save</button>
                    </form>
					</div><!-- COL END -->
					<div class="card-footer">

					</div>
				</div><!--ROW END-->
				<!-- ============== END CONTENT ==============  -->

@endsection

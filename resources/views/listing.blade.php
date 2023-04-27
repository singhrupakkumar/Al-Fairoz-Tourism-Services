@extends('layouts.app')

@section('content')
			<!--Inner Banner Section Start-->
	    	<div class="tj-inner-banner">
	    		<div class="container">
	    			<h2>Car Fleet List</h2>
	    		</div>
	    	</div>
			<!--Inner Banner Section End-->
			
			<!--Breadcrumb Section Start-->
	    	<div class="tj-breadcrumb">
				<div class="container">
					<ul class="breadcrumb-list">
						<li><a href="home-1.html">Home</a></li>
						<li class="active">Car Fleet List</li>
					</ul>
				</div>
	    	</div>
			<!--Breadcrumb Section End-->
			
			<!--Fleet Section Start-->
			<section class="car-fleet">
				<div class="container">
					<div class="row">
						<!--Fleet Column Start-->

						<div class="col-md-12 col-sm-12">
							<div class="fleet-nav-outer">
								<div class="row">
									<!--Fleet Result Count Column Start-->
									<div class="col-md-8 col-sm-8">
										<div class="result-count">
											<span>Showing 1–12 of 28 results</span>
										</div>
									</div>
									<!--Fleet Result Count Column End-->
									<!--Fleet Nav Column Start-->
									<div class="col-md-4 col-sm-4">
										<div class="car-tabs">
											<ul class="nav nav-tabs">
												<li data-tab="grid"><a href="#car-grid" data-toggle="tab"><i class="fas fa-th"></i></a></li>
												<li class="active" data-tab="list"><a href="#car-list" data-toggle="tab"><i class="fas fa-list"></i></a></li>
											</ul>
										</div>
									</div>
									<!--Fleet Nav Column End-->
								</div>
							</div>
							@if(session()->has('message'))
							    <div class="alert alert-success">
							        {{ session()->get('message') }}
							    </div>
							@endif
							<div class="car-filter-holder">
								<div class="row">
									<!-- <form name="add" method="post" action="add.php?action=add" enctype="multipart/form-data"> -->
									<!--Fleet Categories Column Start-->
									<div class="col-md-3 col-sm-3">
										<div class="car-filter">
											<span>From</span>
											<div class="select-list">
												<select id="from_location_id" name="from_location_id" class="selectpicker">
													<option value="">Select a Location</option>
													@foreach($finalresult as $val)
													<option value="{{ $val->id }}">{{$val->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
									<p class="fillterError"></p>
									</div>
									<!--Fleet Categories Column End-->
									<!--Fleet Brand Column Start-->
									<div class="col-md-3 col-sm-3">
										<div class="car-filter">
											<span>To</span>
											<div class="select-list">
												<div class="select-list">
												<select id="to_location_id" name="to_location_id" class="selectpicker">
													<option value="">Select a Location</option>
													@foreach($finalresult as $val)
													<option value="{{ $val->id }}">{{$val->name}}</option>
													@endforeach
												</select>
											</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-3">
										<div class="car-filter">
											<span>Adults Capacity</span>
											<div class="select-list">
												<select id="adults_capacity" name="adults_capacity" class="selectpicker">
													<option value="">Select Adults</option>
													<option value="1">1 Seater</option>
													<option value="2">2 Seater</option>
													<option value="3">3 Seater</option>
													<option value="4">4 Seater</option>
													<option value="5">5 Seater</option>
													<option value="6">6 Seater</option>
													<option value="7">7 Seater</option>
													<option value="8">8 Seater</option>
													<option value="9">9 Seater</option>
													<option value="10">10 Seater</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-3">
										<div class="car-filter">
											<span>Children Capacity</span>
											<div class="select-list">
												<select id="children_capacity" name="children_capacity" class="selectpicker">
													<option value="">Select Children</option>
													<option value="1">1 Seater</option>
													<option value="2">2 Seater</option>
													<option value="3">3 Seater</option>
													<option value="4">4 Seater</option>
													<option value="5">5 Seater</option>
													<option value="6">6 Seater</option>
													<option value="7">7 Seater</option>
													<option value="8">8 Seater</option>
													<option value="9">9 Seater</option>
													<option value="10">10 Seater</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-3">
										<button data-url="{{route('get-filter-cabs') }}" id="search_cabs" class="search-btn">Search Cabs <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>	
									</div>
									
								<!-- </form> -->
									<!--Fleet Seats Column End-->
									<!--Fleet Price Filter Column Start-->
									<!-- <div class="col-md-3 col-sm-3">
										<div class="car-price-filter">
											<form method="POST" class="price-filter">
												<div class="text-left">
													<span>Filter Price</span>
												</div>
												<div class="text-right">
													<input type="text" id="amount">
												</div>
												<div id="price-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 15%; width: 45%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 15%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 60%;"></span></div>
											</form>
										</div>
									</div> -->
									<!--Fleet Fleet Price Filter Column End-->
								</div>
							</div>
							<!--Tab Content Start-->
							<div class="tab-content">
								<!--Fleet Grid Tab Content Start-->
								<div class="tab-pane" id="car-grid">
									<!--Fleet Grid Box Wrapper Start-->
									<div class="fleet-grid">
										<div class="row carFilterGetData">
											
											<!--Fleet Grid Box Start-->
											@forelse($finalresult as $val)
											<div class="col-md-6 col-sm-6">
												<div class="fleet-grid-box">
													<!--Fleet Grid Thumb Start-->
													<figure class="fleet-thumb">
														<img src="{{ asset('storage/upload_image/'.$val->image) }}" alt="">
														<figcaption class="fleet-caption">
															<div class="price-box">
																<strong>${{$val->price}} <span>/ day</span></strong>
															</div>
														</figcaption>
													</figure>
													<!--Fleet Grid Thumb End-->
													<!--Fleet Grid Text Start-->
													<div class="fleet-info-box">
														<div class="fleet-info">
															<h3>{{$val->name}}</h3>
															<span class="fas fa-star"></span>
															<span class="fas fa-star"></span>
															<span class="fas fa-star"></span>
															<span class="fas fa-star"></span>
															<span class="fas fa-star"></span>
															<ul class="fleet-meta">
																<li><i class="fas fa-taxi"></i>{{$val->type}}</li>
																<li><i class="fas fa-user-circle"></i>{{ ($val->adults_capacity) ? $val->adults_capacity : '0' }} Adult, {{ ($val->children_capacity) ? $val->children_capacity : '0'}} Child</li>
															</ul>
														</div>
														<a href="{{route('home.booknow'). '/'. \App\Helpers::encrypt($val->id) }}" class="tj-btn">Book Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
													</div>
													<!--Fleet Grid Text End-->
												</div>
											</div>
											@empty
											<p>Result not found</p>
											@endforelse
											
										</div>
									</div>
									<!--Fleet Grid Box Wrapper End-->
								</div>
								<!--Fleet Grid Tab Content End-->
								
								<!--Fleet List Tab Content Start-->
								<div class="tab-pane active" id="car-list">
								<!--Fleet List Box Wrapper Start-->
									<div class="fleet-list">
										<div class="row carFilterGetDataList">
											<!--Fleet List Box Start-->
											@forelse($finalresult as $val)
											<div class="col-md-12 col-sm-12">
												<div class="fleet-list-box">
													<!--Fleet List Thumb Start-->
													<figure class="fleet-thumb">
														<img src="{{ asset('storage/upload_image/'.$val->image) }}" alt="">
													</figure>
													<!--Fleet List Thumb End-->
													<!--Fleet List Text Start-->
													<div class="fleet-text">
														<div class="price-box">
															<span class="rated">Top Rated</span>
															<strong>${{$val->price}} <span>/ day </span></strong>
														</div>
														<h3>{{$val->name}}</h3>
														<ul class="fleet-meta">
															<li><i class="fas fa-taxi"></i>{{$val->type}}</li>
															<li><i class="fas fa-user-circle"></i>{{ ($val->adults_capacity) ? $val->adults_capacity : '0' }} Adult, {{ ($val->children_capacity) ? $val->children_capacity : '0'}} Child</li>
															
														</ul>
														<span class="fas fa-star"></span>
														<span class="fas fa-star"></span>
														<span class="fas fa-star"></span>
														<span class="fas fa-star"></span>
														<span class="fas fa-star"></span>
														<p>{{$val->description}}</p>
														<a href="{{route('home.booknow'). '/'. \App\Helpers::encrypt($val->id) }}" class="tj-btn">Book Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
													</div>
													<!--Fleet List Text Start-->
												</div>
											</div>
											@empty
											<p>Result not found</p>
											@endforelse
											<!--Fleet List Box End-->
											
											
											<!--Fleet List Box End-->
										</div>
									</div>
									<!--Fleet List Box Wrapper End-->
								</div>
								<!--Fleet List Tab Content End-->
							</div>
							<!--Tab Content End-->
							<!--Pagination Section Start-->
							<!-- <div class="pagination-box">
								<nav aria-label="navigation">
									<ul class="pagination">
										<li>
										  <a href="#" aria-label="Previous">
											<i class="fas fa-angle-double-left"></i>
										  </a>
										</li>
										<li><a href="#">1</a></li>
										<li class="active"><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li>
										  <a href="#" aria-label="Next">
											<i class="fas fa-angle-double-right"></i>
										  </a>
										</li>
									</ul>
								</nav>
							</div> -->
							<!--Pagination Section End-->
						</div>
						<!--Fleet Column End-->
					</div>
				</div>
			</section>
			<!--Fleet Section End-->
		
			
			<!--Call To Action Content Start-->
			<section class="tj-cal-to-action">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="cta-box">
								<img src="{{url('/')}}/prime-cab/images/cta-icon1.png" alt="">
								<div class="cta-text">
									<strong>Best Price Guaranteed</strong>
									<p>A more recently with desktop softy  like aldus page maker.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="cta-box">
								<img src="{{url('/')}}/prime-cab/images/cta-icon2.png" alt="">
								<div class="cta-text">
									<strong>24/7 Customer Care</strong>
									<p>A more recently with desktop softy  like aldus page maker.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="cta-box">
								<img src="{{url('/')}}/prime-cab/images/cta-icon3.png" alt="">
								<div class="cta-text">
									<strong>Easy Bookings</strong>
									<p>A more recently with desktop softy  like aldus page maker.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--Call To Action Content End-->


					@endsection

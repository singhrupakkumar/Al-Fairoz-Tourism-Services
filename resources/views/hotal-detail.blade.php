@extends('layouts.app')

@section('content')
			<!--Inner Banner Section Start-->
	    	<div class="tj-inner-banner">
	    		<div class="container">
	    			<h2>Hotal</h2>
	    		</div>
	    	</div>
			<!--Inner Banner Section End-->
			
			<!--Breadcrumb Section Start-->
	    	<div class="tj-breadcrumb">
				<div class="container">
					<ul class="breadcrumb-list">
						<li><a href="home-1.html">Home</a></li>
						<li class="active">Hotal Detail</li>
					</ul>
				</div>
	    	</div>
			<!--Breadcrumb Section End-->

			
			<section class="fleet-detail">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-8">
							<div class="tj-post-holder">
								<div class="text-box">

									<div class="detail-img"><img src="{{ asset('storage/upload_image/'.$results->image) }}"/></div>
									<h3>{{ $results->hotal_name}}</h3>
									<p>{{ $results->description}}</p>
								</div>
							</div>
						</div>
						
						<div class="col-md-4 col-sm-4">
								<div class="tj-sidebar-outer">
									<div class="fleet-features widget">
										<ul>
											<li><i class="fas fa-map-marker-alt"></i><span>City :</span> {{ $results->city}}</li>
											<li><i class="fas fa-phone"></i><span>Phone :</span> {{ $results->phone_number}}</li>
											<li><i class="fas fa-tachometer-alt"></i><span>Price :</span> ${{ $results->price}}</li>
											<li><i class="fa fa-home"></i><span>Address :</span> {{ $results->address}}</li>
											<li><i class="fas fa-user"></i><span>Adults :</span> {{ $results->adults}}</li>
											<li><i class="fas fa-child"></i><span>Children :</span> {{ $results->children}}</li>
											<li><i class="fas fa-hotel"></i><span>Available Rooms :</span> {{ $results->available_rooms}}</li>
										</ul>
										<div class="book_fleet">
											<form action="{{ route('home.booknow') . '/' . \App\Helpers::encrypt($results->id)}}" >
													<input type="hidden" name="waytype" value="{{$type}}">
													<input type="hidden" name="hotal_id" value="{{\App\Helpers::encrypt($results->id)}}">
												<button type="submit" class="book-btn">Book Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
											</form>
											<!-- <a href="https://themesjungle.net/html/prime-cab/booking-form.html">Book Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a> -->
										</div>
									</div>
									
								</div>
							</div>
					
					</div>
					
				</div>
			</section>
			
				@endsection
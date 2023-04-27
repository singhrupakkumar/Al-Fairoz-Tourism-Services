@extends('layouts.app')

@section('content')
		<!--Inner Banner Section Start-->
	    	<div class="tj-inner-banner">
	    		<div class="container">
	    			
					<div class="search-location-box">
					<h4 class="text-white">Search for tour</h4>
					
						<div class="row">
							<div class="col-md-4 col-sm-5 col-xs-12">
								<div class="field-outer">
									<select id="hotal_id" name="hotal_id" class="selectpicker">
										<option value="">Select a Tour</option>
										@foreach($tour as $val)
										<option value="{{ $val->id }}">{{$val->hotal_name}}</option>
										@endforeach
									</select>
								</div>
								<p class="fillterError"></p> 
							</div>
							<div class="col-md-4 col-sm-5 col-xs-12">
								<div class="field-outer">
									<select id="location_id" name="location_id" class="selectpicker">
										<option value="">Select a Location</option>
										@foreach($location as $val)
										<option value="{{ $val->id }}">{{$val->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-4 col-sm-2 col-xs-12">
								<button id="search_hotal"  data-url="{{route('get-filter-hotals')}}" class="search-btn">Search Cabs <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>	
							</div>
						</div>
					
					</div>
	    		</div>
	    	</div>
			
			<!--Inner Banner Section End-->
			
			<!--Breadcrumb Section Start-->
	    	<div class="tj-breadcrumb">
				<div class="container">
					<ul class="breadcrumb-list">
						<li><a href="home-1.html">Home</a></li>
						<li class="active">Tour Fleet List</li>
					</ul>
				</div>
	    	</div>
			<!--Breadcrumb Section End-->
			
			<!--Fleet Section Start-->
			<section class="loaction-list">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-12">
							<div class="filter-sidebar">
								<h4>FILTER BY</h4>
								<input type="hidden" name="tour_type" value="multi-day-tour" id="tour_type">
								<div class="accordion-contianer">
									<button class="accordion-btn">Filter Price</button>
									<div class="accordion-panel">
										<div class="range-slider">
										  <span class="rangeValues">$1 - $250</span>
										  <input value="1" min="1" max="250" step="2" type="range">
										  <input value="250" min="1" max="250" step="2" type="range">
										</div>
									</div>
								</div>
								
								<div class="accordion-contianer">
									<button class="accordion-btn">Tour Type</button>
									<div class="accordion-panel">
									  <div class="item-content">
										<ul>
											<li>
												<div class="bravo-checkbox">
													<label>
														<input name="cat_id[]" type="checkbox" value="1" checked disabled>  One Day Tour
														<span class="checkmark"></span>
													</label>
												</div>
											</li>
										</ul>
										<button type="button" class="btn btn-link btn-more-item">More <i class="fa fa-caret-down"></i></button>
									</div>
									</div>
								</div>
								
								<div class="accordion-contianer">
									<button class="accordion-btn">Section 1</button>
									<div class="accordion-panel">
									  <p>Lorem ipsum...</p>
									</div>
								</div>
								
							</div>
						</div>
						<div class="col-md-9 col-sm-12">
							<div class="search-list-sec">
								<div class="search-list-sec-header">
									<h4 class="countResult">{{ count($results) }} tours found</h4>
									<div class="sortby">
										Sort by:
										<div class="select-list">
											<select name="car-brand" class="selectpicker">
												<option>Recommended</option>
												<option value="porsche">Price (Low to high)</option>
												<option value="ferrari">Price (High to low)</option>
												<option value="audi">Rating (High to low)</option>
											</select>
											
										</div>
									</div>
								</div>
								
								<div class="row hotalFilterGetData">
									@forelse($results as $val)
									<div class="col-md-4 col-sm-6 col-xs-12">
										<div class="tour-item-box">
											<a class="tour-item-box-img" href="{{ route('home.tour-detail') . '/multi-day-tour/'. \App\Helpers::encrypt($val->id) }}">
												<img src="{{ asset('storage/upload_image/'.$val->image) }}"/>
											</a>
											<div class="tour-item-box-text">
												<span><i class="fa fa-location-arrow"></i> {{ $val->city}} </span>
												<a href="{{ route('home.tour-detail') . '/multi-day-tour/'. \App\Helpers::encrypt($val->id) }}">{{ $val->hotal_name}}</a>
												<div class="price-hr">
													<!-- <h6><i class="fa fa-clock"></i> 8H</h6> -->
													<h6>From <span>${{ $val->price}}</span></h6>
												</div>
											</div>
										</div>
									</div>
									@empty
									<p> No result found.</p>
									@endforelse
								
									
								</div>
								
								
								
							</div>
						
						</div>
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
								<img src="{{url('/')}}/prime-cab/images/{{url('/')}}/prime-cab/cta-icon1.png" alt="">
								<div class="cta-text">
									<strong>Best Price Guaranteed</strong>
									<p>A more recently with desktop softy  like aldus page maker.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="cta-box">
								<img src="{{url('/')}}/prime-cab/images/{{url('/')}}/prime-cab/cta-icon2.png" alt="">
								<div class="cta-text">
									<strong>24/7 Customer Care</strong>
									<p>A more recently with desktop softy  like aldus page maker.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="cta-box">
								<img src="{{url('/')}}/prime-cab/images/{{url('/')}}/prime-cab/cta-icon3.png" alt="">
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
	<style>
		// doesnt work funnly on firefox or edge, need to fix

.range-slider {
  width: 300px;
  text-align: center;
  position: relative;
  .rangeValues {
    display: block;
  }
}

input[type=range] {
    -webkit-appearance: none;
    border: 1px solid white;
    width: 73%;
    position: absolute;
    left: 29px;
    /* margin-bottom: 17px; */
}

input[type=range]::-webkit-slider-runnable-track {
  width: 300px;
  height: 5px;
  background: #ddd;
  border: none;
  border-radius: 3px;

}

input[type=range]::-webkit-slider-thumb {
  -webkit-appearance: none;
  border: none;
  height: 16px;
  width: 16px;
  border-radius: 50%;
  background: #21c1ff;
  margin-top: -4px;
    cursor: pointer;
      position: relative;
    z-index: 1;
}

input[type=range]:focus {
  outline: none;
}

input[type=range]:focus::-webkit-slider-runnable-track {
  background: #ccc;
}

input[type=range]::-moz-range-track {
  width: 300px;
  height: 5px;
  background: #ddd;
  border: none;
  border-radius: 3px;
}

input[type=range]::-moz-range-thumb {
  border: none;
  height: 16px;
  width: 16px;
  border-radius: 50%;
  background: #21c1ff;
  
}


/*hide the outline behind the border*/

input[type=range]:-moz-focusring {
  outline: 1px solid white;
  outline-offset: -1px;
}

input[type=range]::-ms-track {
  width: 300px;
  height: 5px;
  /*remove bg colour from the track, we'll use ms-fill-lower and ms-fill-upper instead */
  background: transparent;
  /*leave room for the larger thumb to overflow with a transparent border */
  border-color: transparent;
  border-width: 6px 0;
  /*remove default tick marks*/
  color: transparent;
    z-index: -4;

}

input[type=range]::-ms-fill-lower {
  background: #777;
  border-radius: 10px;
}

input[type=range]::-ms-fill-upper {
  background: #ddd;
  border-radius: 10px;
}

input[type=range]::-ms-thumb {
  border: none;
  height: 16px;
  width: 16px;
  border-radius: 50%;
  background: #21c1ff;
}

input[type=range]:focus::-ms-fill-lower {
  background: #888;
}

input[type=range]:focus::-ms-fill-upper {
  background: #ccc;
}

	</style>	
	<script>

	</script>	
				@endsection
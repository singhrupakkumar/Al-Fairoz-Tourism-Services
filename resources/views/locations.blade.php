@extends('layouts.app')

@section('content')
			<!--Inner Banner Section Start-->
	    	<div class="tj-inner-banner">
	    		<div class="container">
	    			<h2>Locations</h2>
	    		</div>
	    	</div>
			<!--Inner Banner Section End-->
			
			<!--Breadcrumb Section Start-->
	    	<div class="tj-breadcrumb">
				<div class="container">
					<ul class="breadcrumb-list">
						<li><a href="home-1.html">Home</a></li>
						<li class="active">Locations</li>
					</ul>
				</div>
	    	</div>
			<!--Breadcrumb Section End-->
			
		<section class="top-location">
				<div class="container">
						<h3 class="top-location-heading">Top Locations</h3>
					<div class="row">
						@foreach($locations as $val)
						<div class="col-12 col-md-4">
							<a href="javascript:void(0)" class="destination-item">
								<img class="img-fluid" src="{{ asset('storage/upload_image/'.$val->image) }}"/>
								<span>{{$val->name}}</span>
								<!-- <ul>
									<li>2 Spaces</li>
									<li>5 Hotels</li>
									<li>3 Events</li>
									<li>7 Cars</li>
									<li>3 Boats</li>
								</ul> -->
							</a>
						</div>
						@endforeach
						
					</div>
				</div>
			</section>
			
				@endsection
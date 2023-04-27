<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Al Fairoz Tourism Services</title>
	<link rel="icon" type="image/png" sizes="32x32" href="{{url('/')}}/assets/images/favicon-32x32.png">
		<meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Css Files Start -->
		<link href="{{url('/')}}/prime-cab/css/bootstrap.css" rel="stylesheet">
		<link href="{{url('/')}}/prime-cab/css/style.css" rel="stylesheet">
		<link href="{{url('/')}}/prime-cab/css/custom.css" rel="stylesheet">
		<link href="{{url('/')}}/prime-cab/css/fontawesome-all.min.css" rel="stylesheet">
		<link id="switcher" href="{{url('/')}}/prime-cab/css/color.css" rel="stylesheet">
		<link href="{{url('/')}}/prime-cab/css/color-switcher.css" rel="stylesheet">
		<link href="{{url('/')}}/prime-cab/css/owl.carousel.css" rel="stylesheet">
		<link href="{{url('/')}}/prime-cab/css/responsive.css" rel="stylesheet">
		<link href="{{url('/')}}/prime-cab/css/icomoon.css" rel="stylesheet">
		<link href="{{url('/')}}/prime-cab/css/animate.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">
		<!-- Css Files End -->
		
		<!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	<style>
		.accept-error, .error{
			color:red;
		}
		button.book-btn {
    display: block;
    color: #fff;
    width: 150px;
    text-align: center;
    padding: 15px 0;
    font-family: 'Montserrat', sans-serif;
    font-weight: 500;
    background-color: #dd3751;
    margin: 15px auto 0;
    border: #fff;
}
		span.fa.fa-star.checked {
    color: #ccc500;
		}
button#search_cabs, #search_hotal {
    float: left;
    display: block;
    width: 170px;
    text-align: center;
    padding: 18px 0;
    color: #fff;
    font-weight: 500;
    text-transform: capitalize;
    font-family: 'Montserrat', sans-serif;
    color: #fff;
    background: #DD3751;
    border: #fff;
}
p.fillterError {
    color: red;
}
		</style>
		
		<script>
// $.ajaxSetup({
// headers: {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// }
// });
</script>
    </head>
	<body>
    <body class="antialiased">
 
		<!--Wrapper Content Start-->
		<div class="tj-wrapper">
			<div class="loader-outer" style="display: none;">
				<div class="tj-loader" style="display: none;">
					<img src="{{url('/')}}/prime-cab/images/pre-loader.gif" alt="">
					<h2>Loading...</h2>
				</div>
			</div>
 			@include('flash-message')
	
			@component('common.header')
   		 	@endcomponent
			
			@yield('content') 
			
			@component('common.footer')
			@endcomponent  
		
		</div>
		<!--Wrapper Content End-->
		
		<!-- Js Files Start --> 
		<script src="{{url('/')}}/prime-cab/js/jquery-1.12.5.min.js"></script>
		<script src="{{url('/')}}/prime-cab/js/bootstrap.min.js"></script> 
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
		<script src="{{url('/')}}/prime-cab/js/migrate.js"></script>  
		<script src="{{url('/')}}/prime-cab/js/owl.carousel.min.js"></script>	
		<script src="{{url('/')}}/prime-cab/js/color-switcher.js"></script>	
		<script src="{{url('/')}}/prime-cab/js/jquery.counterup.min.js"></script>	
		<script src="{{url('/')}}/prime-cab/js/waypoints.min.js"></script>
		<script src="{{url('/')}}/prime-cab/js/tweetie.js"></script>
		<script src="https://kit.fontawesome.com/6913f488ad.js" crossorigin="anonymous"></script>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
		<script src="{{url('/')}}/prime-cab/js/custom.js"></script>
		
		<!-- Js Files End --> 
<script>
	$('#tourFilterLowToHigh').on('change', function() {
    console.log("send req.....");
    var orderBy = $('option:selected', this).val();
    var url = $('#search_hotal').attr('data-url');
    var tourType = $('#tour_type').val();
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        "url":  url,
        "type": "GET",
        "data": {
            _token: csrf_token,
            orderBy: orderBy,
            tourType: tourType,
        },
        success: function (result) {
           $('.hotalFilterGetData').html(result.output);
           $('.countResult').html(result.countResult);
        },
    });
});
</script>
        </div>
    </body>
</html>

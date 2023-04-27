


$('input[type="range"]').on('click', function(){
function getVals(){
  // Get slider values
  let parent = this.parentNode;
  let slides = parent.getElementsByTagName("input");
    let slide1 = parseFloat( slides[0].value );
    let slide2 = parseFloat( slides[1].value );
  // Neither slider will clip the other, so make sure we determine which is larger
  if( slide1 > slide2 ){ let tmp = slide2; slide2 = slide1; slide1 = tmp; }
  
  let displayElement = parent.getElementsByClassName("rangeValues")[0];
      displayElement.innerHTML = "$" + slide1 + " - $" + slide2;
      var fromPrice = slide1;
      var toPrice = slide2;
      var url = $('#search_hotal').attr('data-url');
      var tourType = $('#tour_type').val();
      var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            "url":  url,
            "type": "GET",
            "data": {
                _token: csrf_token,
                fromPrice: fromPrice,
                tourType: tourType,
                toPrice: toPrice
            },
            success: function (result) {
               $('.hotalFilterGetData').html(result.output);
               $('.countResult').html(result.countResult);
            },
        });
  console.log('from',slide1 , 'to', slide2 );
}


  // Initialize Sliders
  let sliderSections = document.getElementsByClassName("range-slider");
      for( let x = 0; x < sliderSections.length; x++ ){
        let sliders = sliderSections[x].getElementsByTagName("input");
        for( let y = 0; y < sliders.length; y++ ){
          if( sliders[y].type ==="range" ){
            sliders[y].oninput = getVals;
            // Manually trigger event first time to display values
            sliders[y].oninput();
          }
        }
      }

});

$(document).ready(function() {
    "use strict";



 $('#search_hotal').on('click', function(e) {
    var url = $(this).attr('data-url');
    var listingType = $('.nav.nav-tabs li.active').attr('data-tab');
    var hotal_id = $('#hotal_id').find(":selected").val();
    var location_id = $('#location_id').find(":selected").val();
   
    if(hotal_id == '' &&  location_id == ''){
        $('.fillterError').html('Please select atleast one option');
    }else{
         $('.fillterError').html('');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            "url":  url,
            "type": "GET",
            "data": {
                _token: csrf_token,
                hotal_id: hotal_id,
                location_id: location_id
            },
            success: function (result) {
               $('.hotalFilterGetData').html(result.output);
               $('.countResult').html(result.countResult);
            },
        });
    }
 }); 

 $('#search_cabs').on('click', function(e) {
    var url = $(this).attr('data-url');
    var listingType = $('.nav.nav-tabs li.active').attr('data-tab');
    var fromLoc = $('#from_location_id').find(":selected").val();
    var toLoc = $('#to_location_id').find(":selected").val();
    var adults = $('#adults_capacity').find(":selected").val();
    var children = $('#children_capacity').find(":selected").val();
    if(fromLoc == '' &&  toLoc == '' && adults == '' && children == '' ){
        $('.fillterError').html('Please select atleast one option');
    }else{
         $('.fillterError').html('');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            "url":  url,
            "type": "GET",
            "data": {
                _token: csrf_token,
                fromLoc: fromLoc,
                toLoc: toLoc,
                adults: adults,
                children: children,
            },
            success: function (result) {
               $('.carFilterGetData').html(result.output);
               $('.carFilterGetDataList').html(result.outputList);
            },
        });
    }
 });

$("#basicDate").flatpickr({
    format: 'MM/DD/YYYY',
});
$("#basic_pick_time").flatpickr({
    enableTime: true,
    noCalendar: true,
    format: 'h:mm a',
});
$("#two_way_time").flatpickr({
    format: 'MM/DD/YYYY',
});
$("#departure_time").flatpickr({
    format: 'MM/DD/YYYY',
});
$("#drop_basicDate").flatpickr({
    format: 'MM/DD/YYYY',
});
$("#dropp_basic_time").flatpickr({
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i:S",
});

 $('#basicDate').change(function() {
    var fromDate = $(this).val();
    $('.pick_date').html(fromDate);
});
$('#basic_pick_time').change(function() {
    var pickupBasicTime = $(this).val();
    $('.pick_time').html(pickupBasicTime);
});
 $('#drop_basicDate').change(function() {
    var dropBasicDate = $(this).val();
    $('.drop_date').html(dropBasicDate);
});
$('#dropp_basic_time').change(function() {
    var droppBasicTime = $(this).val();
    $('.drop_time').html(droppBasicTime);
});
$('#car_list').on('change', function() {
  var selectCar = $('option:selected', this).attr('data-car');
  $('.ride_car').html(selectCar);
});
$('#pickup_start_loc').on('change', function() {
  var pickupLocations = $('option:selected', this).attr('data-pickup');
  $('.startup_loc_s').html(pickupLocations);
});
$('#pickup_end_loc').on('change', function() {
  var endLocations = $('option:selected', this).attr('data-pickup');
  $('.end_loc_s').html(endLocations);
});
$('#select_hotal').on('change', function() {
  var selectHotal = $('option:selected', this).attr('data-hotal');
  $('.select_hotal').html(selectHotal);
});
$('#select_hotal_loc').on('change', function() {
  var selectHotalLoc = $('option:selected', this).attr('data-hotalLoc');
  $('.select_hotal_loc').html(selectHotalLoc);
});
$('.rooms_avaible').on('keyup', function(){
    var roomsAvb = $(this).val();
    $('.selected_rooms').html(roomsAvb);
})
$('#vehicle_type a').on('click', function(){
    $('.vehicle-booking').css('display', 'block');
    $('.vehicle-booking-summary').css('display', 'block');
    $('.hotal-booking').css('display', 'none');
    $('.hotal-booking-summary').css('display', 'none');
})
$('#hotal_type a').on('click', function(){
    $('.vehicle-booking').css('display', 'none');
    $('.hotal-booking-summary').css('display', 'none');
    $('.hotal-booking').css('display', 'block');
    $('.vehicle-booking-summary').css('display', 'none');
});
$('#two_way_time').change(function() {
    var arrivaltime = $(this).val();
    $('.arrivaltimeHotal').html(arrivaltime);
});
$('#departure_time').change(function() {
    var departuretime = $(this).val();
    $('.departuretimeHotal').html(departuretime);
});
$('.adult_capacity').on('keyup', function(){
    var adult = $(this).val();
    $('.hotal_adults').html(adult);
})
$('.child_capacity').on('keyup', function(){
    var chid = $(this).val();
    $('.hotal_child').html(chid);
})
setTimeout(function() {
    $('.alert-success').fadeOut('slow');
}, 3000);



  /* Contact us form validation
    ======================================================*/

 $('#contactus-form').validate({
      rules: {
        name: {
          required: true,
        },
        email: {
          required: true,
          email: true,
        },
        subject: {
          required: true,
        },
        message: {
          required: true,
        },
         
      },
      messages: {
        email: {
          required: "The email field is required."
        },
        
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });

$('#ride-hotal-booking-form').validate({
      rules: {
        hotal_id: {
          required: true,
        },
        hotal_location: {
          required: true,
        },
        rooms: {
          required: true,
        },
        arrivaltime: {
          required: true,
        },
         adult_capacity: {
          required: true,
        },
         child_capacity: {
          required: true,
        },
         
      },
     
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  /* Customize form validation
    ======================================================*/

 $('#customize-booking-form').validate({
      rules: {
        name: {
          required: true,
        },
        email: {
          required: true,
          email: true,
        },
        phone: {
        required: true,
        minlength: 6,
        maxlength: 12,
        number: true
        },
        country: {
          required: true,
        },
         duration_days: {
          required: true,
          number: true
        },
         no_of_travellers: {
          required: true,
          number: true
        }, 
      },
      messages: {
        email: {
          required: "The email field is required."
        },
        
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
 $('#ride-booking-form').validate({
       rules: {
                car_name: {
                    required: true
                },
                pickup_loc: "required",
                pickup_date: "required",
                pickup_time: "required",
                dropoff_loc: "required",
                dropoff_date: "required",
                book_terms: "required",
                dropoff_time: "required"
            },
            messages: {
                pickup_loc: "This field is required",
                pickup_date: "This field is required",
                pickup_time: "This field is required",
                dropoff_loc: "This field is required",
                dropoff_date: "This field is required",
                book_terms: "This field is required",
                dropoff_time: "This field is required",
            },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
 $('#ride-confirm-booking-form').validate({
        rules: {
               
                first_name: {
                  required: true,
                },
                last_name: {
                  required: true,
                },
                email: {
                  required: true,
                  email: true,
                },
                phone: {
                required: true,
                minlength: 6,
                maxlength: 12,
                number: true
                },
            },
            
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });

    /* Preloader Script
    ======================================================*/

    $(".tj-loader").delay(800).slideUp(1600);
    $(".loader-outer").delay(800).slideUp(1600);



    /* Sticky Navigation
    ======================================================*/
    if ($('.tj-nav-row').length) {
        var stickyNavTop = $('.tj-nav-row').offset().top;
        var stickyNav = function() {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > 500) {
                $('.tj-nav-row').addClass('sticky');
            } else {
                $('.tj-nav-row').removeClass('sticky');
            }
        };
        stickyNav();
        $(window).scroll(function() {
            stickyNav();
        });
    }


    /* Owl Slider For Partners
    ======================================================*/
    if ($('.partners-list').length) {
        $('.partners-list').owlCarousel({
            loop: true,
            dots: false,
            nav: false,
            navText: '',
            items: 5,
            autoplay: false,
            smartSpeed: 2000,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                992: {
                    items: 4,
                },
                1199: {
                    items: 5,
                }
            }
        });
    }

    /* Owl Slider For Testimonial 1
    ======================================================*/
    if ($('#testimonial-slider').length) {
        $('#testimonial-slider').owlCarousel({
            loop: true,
            dots: false,
            nav: true,
            navText: '',
            items: 2,
            margin: 30,
            autoplay: true,
            smartSpeed: 1000,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 2,
                },
                1199: {
                    items: 2,
                }
            }
        });
    }


    /* Owl Slider For Testimonial 2
    ======================================================*/
    if ($('#testimonial-slider2').length) {
        $('#testimonial-slider2').owlCarousel({
            loop: true,
            dots: false,
            nav: false,
            navText: '',
            items: 1,
            autoplay: true,
            smartSpeed: 1200,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                992: {
                    items: 1,
                },
                1199: {
                    items: 1,
                }
            }
        });
    }


    /* Owl Slider For Home 2 Cab Slider
    ======================================================*/
    if ($('#cab-slider').length) {
        $('#cab-slider').owlCarousel({
            loop: true,
            dots: false,
            nav: true,
            navText: '',
            items: 1,
            autoplay: true,
            smartSpeed: 1000,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false,
                    dots: true,
                },
                768: {
                    items: 1,
                },
                992: {
                    items: 1,
                },
                1199: {
                    items: 1,
                }
            }
        });
    }

    /* Blog Slider
    ======================================================*/
    if ($('#blog-slider').length) {
        $('#blog-slider').owlCarousel({
            loop: true,
            dots: false,
            nav: true,
            navText: '',
            autoplay: true,
            items: 3,
            smartSpeed: 1000,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                992: {
                    items: 1,
                },
                1199: {
                    items: 1,
                }
            }
        });
    }


    /* Counter Script
    ======================================================*/
    if ($('.fact-counter').length) {
        $('.fact-counter').counterUp({
            delay: 50,
            time: 3000
        });
    }

    if ($('.fact-count').length) {
        $('.fact-count').counterUp({
            delay: 70,
            time: 2000
        });
    }
    if ($('.fact-num').length) {
        $('.fact-num').counterUp({
            delay: 70,
            time: 2000
        });
    }


    /* Car Price Range Filter
    ======================================================*/
    if ($("#price-range").length) {
        $("#price-range").slider({
            range: true,
            min: 0,
            max: 500,
            values: [75, 300],
            slide: function(event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#amount").val("$" + $("#price-range").slider("values", 0) +
            " - $" + $("#price-range").slider("values", 1));
    }


    /* Owl Slider For Fleet Carousel
    ======================================================*/
    if ($('#cab-carousel').length) {
        $('#cab-carousel').owlCarousel({
            loop: true,
            dots: false,
            nav: true,
            navText: '',
            items: 3,
            margin: 150,
            center: true,
            autoplay: true,
            smartSpeed: 1000,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 2,
                },
                1199: {
                    items: 3,
                }
            }
        });
    }


    /* Cab Filter Isotope Script
    ======================================================*/
    if ($('.cab-filter').length) {
        var $container = $('.cab-filter').imagesLoaded(function() {
            $container.isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false,
                }
            });
            $('.cab-filter-nav a').on("click", function() {
                $('.cab-filter-nav .current').removeClass('current');
                $(this).addClass('current');

                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false,
                    }
                });
                return false;
            });
        });
    }

    /* Twitter Feed Script
    ======================================================*/
    if ($('.tj-tweets').length) {
        $('.tj-tweets').twittie({
            username: 'sameersattar13',
            dateFormat: '%b, %d, %Y',
            template: '{{tweet}}} <div class="date">{{date}}</div>',
            count: 2,
            loadingText: 'Loading!'
        });
    }


    /* Gallery Carousel Script
    ======================================================*/

    if ($(".gallery-thumb").length && $(".gallery").length) {
        var right = $(".right-outer");
        var gal_thumb = $(".gallery-thumb");
        var gal = $(".gallery");

        gal_thumb.slick({
            rows: 0,
            slidesToShow: 2,
            draggable: false,
            useTransform: false,
            mobileFirst: true,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 1023,
                    settings: {
                        slidesToShow: 1,
                        vertical: true
                    }
                }
            ]
        });

        gal.slick({
            rows: 0,
            useTransform: false,
            arrows: true,
            fade: true,
            autoplay: true,
            speed: 600,
            cssEase: 'ease-in-out',
            asNavFor: gal_thumb,

        });
        $(".gallery-thumb .item").on("click", function() {
            var index = $(this).attr("data-slick-index");
            gal.slick("slickGoTo", index);
        });
    }

    function getCarouselHeight() {
        if ($(".gallery-thumb").length && $(".gallery").length) {
            if (window.matchMedia("(min-width: 1024px)").matches) {
                var galHeight = $(".gallery").height();
                right.css("height", galHeight);
            } else {
                right.css("height", "auto");
            }
        } else {
            return;
        }
    }

    $(window).on("load", function() {
        getCarouselHeight();
    });


    /* Contact Form Validation/Ajax Call
    ======================================================*/
    if ($('#contact-form').length) {
        $("#contact-form").validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                subject: "required",
                message: "required"
            },
            messages: {
                name: "Please enter your name",
                email: "Please enter a valid email address",
                subject: "It is a required field",
                message: "It is a required field",
            },
            submitHandler: function(form) {
                $.ajax({
                    type: 'POST',
                    url: 'contact/process.php',
                    data: {
                        "formData": $(form).serialize()
                    },
                    beforeSend: function() {
                        $("#frm_submit_btn").text("Sending..").addClass('wait');
                        $("#frm_submit_btn").attr('disabled', 'disabled');
                    },
                    success: function(result) {
                        if (result == 1) {
                            alert("Thank you for contacting. We will get in touch with you soon!");
                            $("#frm_submit_btn").text("Email Sent").addClass('success');
                            $("#frm_submit_btn").removeAttr('disabled');
                            $("#frm_submit_btn").removeClass('wait');
                            $('#contact-form')[0].reset();
                        } else {
                            alert("Something went wrong. Please check your entries and try again");
                            $("#frm_submit_btn").text("Email Failed").addClass('fail');
                            $("#frm_submit_btn").removeAttr('disabled');
                            $("#frm_submit_btn").removeClass('wait');
                        }
                    }
                });

                return false;
            }
        });
    }




    /* Booking Form Script
    ======================================================*/

    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

    if ($('.booking-frm #pickup_date').length) {
        $('.booking-frm #pickup_date').datetimepicker({
            format: 'MM/DD/YYYY',
            minDate: today
        });
    }

    if ($('.booking-frm #pickup_time').length) {
        $('.booking-frm #pickup_time').datetimepicker({
            format: 'h:mm a',
        });
    }

    if ($('.booking-frm #dropoff_date').length) {
        $('.booking-frm #dropoff_date').datetimepicker({
            format: 'MM/DD/YYYY',
            minDate: today
        });
    }

    if ($('.booking-frm #dropoff_time').length) {
        $('.booking-frm #dropoff_time').datetimepicker({
            format: 'h:mm a'
        });
    }

    //On Load Condition
    var service_type = $(".booking-frm input[name='service_type']:checked").val();
    var booking_ref = Math.floor(Math.random() * 90000) + 10000;
        $('.booking_reference').val(booking_ref);
    if (service_type !== null) {
        $('.booking-summary .service_type').text(service_type);
    }
    if (booking_ref !== null) {
        $('.booking-summary .book-ref').text(booking_ref);
    }

    //On Load Condition 
    var method_type = $('input[type=radio][name=payment_type]:checked').val();
    if (method_type === 'PayPal') {
        $('.booking-frm .select-list').slideDown(700);
        $('#rate_list option:selected').attr("selected", false);
    } else {
        $('.booking-frm .select-list').slideUp(700);
    }

    //On Change Condition
    $('input[type=radio][name=payment_type]').change(function() {
        if (this.value === 'PayPal') {
            $('.booking-frm .select-list').slideDown(700);
            $('#rate_list option:selected').attr("selected", false);

            var car_hr_rate = $('#car_list').find('option:selected').data('hrrate');
            var car_day_rate = $('#car_list').find('option:selected').data('dayrate');
            var method_type = $('input[type=radio][name=payment_type]:checked').val();
            if (typeof(car_hr_rate) === 'undefined' && typeof(car_day_rate) === 'undefined') {
                $('#rate_list')
                    .empty().
                append('<option value="default">Select Rate</option>');
            } else {
                $('#rate_list')
                    .empty()
                    .append('<option value="default">Select Rate</option>')
                    .append('<option class="hr_rate" value="' + car_hr_rate + '">$' + car_hr_rate + ' hourly rate</option>')
                    .append('<option class="day_rate" value="' + car_day_rate + '">$' + car_day_rate + ' day rate</option>');
            }

        } else {
            $('.booking-frm .select-list').slideUp(700);
        }
    });

    //Display Saved Local Storage Ride Booking Data
    var book_ref = sessionStorage.getItem('book_ref');
    var start_loc = sessionStorage.getItem('start_loc');
    var end_loc = sessionStorage.getItem('end_loc');
    var pickup_date = sessionStorage.getItem('pickup_date');
    var pickup_time = sessionStorage.getItem('pickup_time');
    var dropoff_date = sessionStorage.getItem('dropoff_date');
    var dropoff_time = sessionStorage.getItem('dropoff_time');
    var service_type = sessionStorage.getItem('service_type');
    var trip_time = sessionStorage.getItem('trip_time');
    var trip_cost = sessionStorage.getItem('trip_cost');
    var payment_type = sessionStorage.getItem('method_type');
    var trip_rate = sessionStorage.getItem('trip_rate');
    var ride_car = sessionStorage.getItem('selected_car');

    if (ride_car !== null) {
        $('#car_list option[value="' + ride_car + '"]').attr('selected', 'selected');
    }

    if (payment_type !== null && payment_type === 'PayPal') {
        $('.booking-frm #pay_online').val(payment_type).prop('checked', true);
        $('.booking-frm .select-list').slideDown(700);
        var car_hr_rate = $('#car_list').find('option:selected').data('hrrate');
        var car_day_rate = $('#car_list').find('option:selected').data('dayrate');
        var method_type = $('input[type=radio][name=payment_type]:checked').val();
        if (typeof(car_hr_rate) === 'undefined' && typeof(car_day_rate) === 'undefined') {
            $('#rate_list')
                .empty().
            append('<option value="default">Select Rate</option>');
        } else {
            $('#rate_list')
                .empty()
                .append('<option value="default">Select Rate</option>')
                .append('<option class="hr_rate" value="' + car_hr_rate + '">$' + car_hr_rate + ' hourly rate</option>')
                .append('<option class="day_rate" value="' + car_day_rate + '">$' + car_day_rate + ' day rate</option>');
        }

    } else {
        $('.booking-frm #off_online').val(payment_type).prop('checked', true);
        $('.fare-box .est-cost').css('display', 'none');
        $('.fare-box .curr').text('');
        $('.booking-summary #trip_cost').text('');
        $('.fare-box #ride_popup').css('display', 'none');

    }
    if (trip_rate !== null) {
        $('#rate_list option[value="' + trip_rate + '"]').attr('selected', 'selected');
    }

    if (trip_cost !== null && payment_type === 'PayPal') {
        $('.booking-summary #trip_cost').text(parseInt(trip_cost).toFixed(2));
        //Set default total currency symbol
        $('.fare-box .curr').text('$');
    }
    if (book_ref !== null) {
        $('.booking-summary .book-ref').text(book_ref);
    }
    if (ride_car !== null) {
        $('.booking-summary .ride_car').text(ride_car);
    }
    if(ride_car == 'undefined'){
        $('.booking-summary .ride_car').text('Select Ride Car');
    }
    if (service_type !== null) {
        $('.booking-summary .service_type').text(service_type);
        if (service_type === 'One Way Journey') {
            $(".booking-frm #one_way").prop('checked', true);
        } else {
            $(".booking-frm #two_way").prop('checked', true);
        }
    }
    if (start_loc !== null) {
        $('.booking-summary .startup_loc').text(start_loc);
        $('.booking-frm  #point_start_loc').val(start_loc);
    }
    if (end_loc !== null) {
        $('.booking-summary .end_loc').text(end_loc);
        $('.booking-frm #point_end_loc').val(end_loc);
    }
 
    if (pickup_date !== null) {
        $('.booking-summary .pick_date').text(pickup_date);
        $('.booking-frm #pickup_date').val(pickup_date);
    }

    if(pickup_date == 'undefined'){
        $('.booking-summary .pick_date').text('Enter Pickup Date');
    }
   
   
  

    if (pickup_time !== null) {
        $('.booking-summary .pick_time').text(pickup_time);
        $('.booking-frm #pickup_time').val(pickup_time);
    }
     if(pickup_time == 'undefined'){
        $('.booking-summary .pick_time').text("Enter Pickup Time");
    }
    if (dropoff_date !== null) {
        $('.booking-summary .drop_date').text(dropoff_date);
        $('.booking-frm #dropoff_date').val(dropoff_date);
    }
     if(dropoff_date == 'undefined'){
        $('.booking-summary .drop_date').html('Enter Dropoff Date');
    }
    if (dropoff_time !== null) {
        $('.booking-summary .drop_time').text(dropoff_time);
        $('.booking-frm #dropoff_time').val(dropoff_time);
    }

   
  
    if(dropoff_time == 'undefined'){
        $('.booking-summary .drop_time').html('Enter Dropoff Time');
    }
    if (trip_time !== null) {
        $('.booking-summary .trip_est').text(trip_time);
    }

    //On Change Keypress Blur Keyup Condition
    $('.booking-frm #point_start_loc,.booking-frm input[name="service_type"],.booking-frm #point_end_loc,.booking-frm #pickup_date,.booking-frm #dropoff_date,.booking-frm #pickup_time,.booking-frm #dropoff_time,.booking-frm #car_list').on('keyup keypress blur change', function(event) {
        //Get Values
        var booking_field_val = $(this).val();
        var booking_field_id = $(this).attr('id');
        var service_type = $(".booking-frm input[name='service_type']:checked").val();
        $('.booking-summary .service_type').text(service_type);
        if (booking_field_val.length > 0) {
            if (booking_field_id == 'point_start_loc') {
                $('.booking-summary .startup_loc').text(booking_field_val);
            } else if (booking_field_id == 'point_end_loc') {
                $('.booking-summary .end_loc').text(booking_field_val);
            } else if (booking_field_id == 'pickup_date') {
                $('.booking-summary .pick_date').text(booking_field_val);
            } else if (booking_field_id == 'dropoff_date') {
                $('.booking-summary .drop_date').text(booking_field_val);
            } else if (booking_field_id == 'pickup_time') {
                $('.booking-summary .pick_time').text(booking_field_val);
            } else if (booking_field_id == 'dropoff_time') {
                $('.booking-summary .drop_time').text(booking_field_val);
            } else if (booking_field_id == 'car_list') {
                $('.booking-summary .ride_car').text(booking_field_val);
            }
        } else {
            if (booking_field_id == 'point_start_loc') {
                $('.booking-summary .startup_loc').text('Enter Startup Location');
            } else if (booking_field_id == 'point_end_loc') {
                $('.booking-summary .end_loc').text('Enter Destination');
            } else if (booking_field_id == 'pickup_date') {
                $('.booking-summary .pick_date').text('Enter Pickup Date');
            } else if (booking_field_id == 'pickup_time') {
                $('.booking-summary .pick_time').text('Enter Pickup Time');
            } else if (booking_field_id == 'dropoff_date') {
                $('.booking-summary .drop_date').text('Enter Dropoff Date');
            } else if (booking_field_id == 'dropoff_time') {
                $('.booking-summary .drop_time').text('Enter Dropoff Time');
            } else if (booking_field_id == 'car_list') {
                $('.booking-summary .ride_car').text('Select Ride Car');
            }
        }
    });


    //On Change event for setting hourly and day rates of cars in rate dropdown list
    $('#car_list').on('change', function() {
        var car_hr_rate = $(this).find(':selected').data('hrrate');
        var car_day_rate = $(this).find(':selected').data('dayrate');
        var method_type = $('input[type=radio][name=payment_type]:checked').val();
        //if( method_type=== 'PayPal' ){
        if (typeof(car_hr_rate) === 'undefined' && typeof(car_day_rate) === 'undefined') {
            $('#rate_list')
                .empty().
            append('<option value="default">Select Rate</option>');
        } else {
            $('#rate_list')
                .empty()
                .append('<option value="default">Select Rate</option>')
                .append('<option class="hr_rate" value="' + car_hr_rate + '">$' + car_hr_rate + ' hourly rate</option>')
                .append('<option class="day_rate" value="' + car_day_rate + '">$' + car_day_rate + ' day rate</option>');
        }

        //}

    });


    if ($('#ride-bform').length) {
        $('#ride-bform').validate({
            rules: {
                car_name: {
                    required: true
                },
                pickup_loc: "required",
                pickup_date: "required",
                pickup_time: "required",
                dropoff_loc: "required",
                dropoff_date: "required",
                book_terms: "required",
                dropoff_time: "required"
            },
            messages: {
                pickup_loc: "This field is required",
                pickup_date: "This field is required",
                pickup_time: "This field is required",
                dropoff_loc: "This field is required",
                dropoff_date: "This field is required",
                book_terms: "This field is required",
                dropoff_time: "This field is required",
            },
            submitHandler: function(form) {
                //Fetch Form Submission Values
                var service_type = $(".booking-frm input[name='service_type']:checked").val();
                var start_loc = $('.booking-frm #point_start_loc').val();
                var end_loc = $('.booking-frm #point_end_loc').val();
                var pickup_date = $('.booking-frm #pickup_date').val();
                var pickup_time = $('.booking-frm #pickup_time').val();
                var dropoff_date = $('.booking-frm #dropoff_date').val();
                var dropoff_time = $('.booking-frm #dropoff_time').val();
                var book_ref = $('.booking-summary .book-ref').text();
                var sel_rate = $('#rate_list option:selected').val();
                var sel_car = $('#car_list option:selected').val();
                var sel_rate_class = $('#rate_list option:selected').attr('class');
                var method_type = $('input[type=radio][name=payment_type]:checked').val();

                //Save Form Values Inside Local Storage
                sessionStorage.setItem('service_type', service_type);
                sessionStorage.setItem('start_loc', start_loc);
                sessionStorage.setItem('end_loc', end_loc);
                sessionStorage.setItem('book_ref', book_ref);
                sessionStorage.setItem('pickup_date', pickup_date);
                sessionStorage.setItem('pickup_time', pickup_time);
                sessionStorage.setItem('dropoff_date', dropoff_date);
                sessionStorage.setItem('dropoff_time', dropoff_time);
                sessionStorage.setItem('method_type', method_type);
                sessionStorage.setItem('trip_rate', sel_rate);
                sessionStorage.setItem('selected_car', sel_car);

                var tripTime = '';
                var tripCost = '';
                var summary_html = '';
                var list_html = '';
                var half_hr_rate = '';
                var hour_rate = '';
                var day_rate = '';
                var date1 = new Date(pickup_date + " " + pickup_time).getTime();
                var date2 = new Date(dropoff_date + " " + dropoff_time).getTime();
                var msec = date2 - date1;
                var mins = Math.floor(msec / 60000);
                var hrs = Math.floor(mins / 60);
                var days = Math.floor(hrs / 24);
                mins = mins % 60;
                hrs = hrs % 24;
                //Validation and ride rate calculation PayPal
                if (days === 0 && hrs === 0 && mins === 0) {
                    alert("Journey starting and ending time cannot be same. Please check and try again!");
                    return false;
                } else if (method_type === 'PayPal' && sel_rate === 'default') {
                    alert("Please select rate based on your trip duration");
                    return false;
                } else if (days === 0 && hrs === 0 && mins < 30) {
                    alert("Ride of less than 30 minutes cannot be booked!");
                    return false;
                } else {
                    if (days >= 0 && hrs >= 0 && mins >= 0) {
                        if (method_type === 'PayPal') {
                            tripTime = days + " days, " + hrs + " hours, " + mins + " minutes";
                            sessionStorage.setItem('trip_time', tripTime);
                            summary_html += '<div class="ride-time">';
                            summary_html += '<span>Trip Duration</span>';
                            summary_html += '<strong>' + tripTime + '</strong>';
                            summary_html += '</div>';

                            if (sel_rate_class === 'hr_rate') {
                                if (hrs > 0) {
                                    tripCost = sel_rate * hrs;
                                    list_html += '<li>' + hrs + ' hour x $' + sel_rate + ' per hour<span>$' + (sel_rate * hrs).toFixed(2) + '</span></li>';
                                }
                                if (mins >= 30 && mins <= 59) {
                                    tripCost = tripCost + parseInt(sel_rate);
                                    list_html += '<li>' + mins + ' minutes (' + ' 30 mins to 59 mins rate ' + ')<span>$' + parseInt(sel_rate).toFixed(2) + '</span></li>';
                                } else if (mins > 0 && mins <= 29) {
                                    half_hr_rate = Math.floor(sel_rate / 2);
                                    tripCost = tripCost + half_hr_rate;
                                    list_html += '<li>' + mins + ' minutes rate (' + sel_rate + '/' + 2 + ')<span>$' + half_hr_rate.toFixed(2) + '</span></li>';
                                }
                                if (days > 0) {
                                    day_rate = $('#rate_list .day_rate').val();
                                    tripCost = parseInt(tripCost) + parseInt(day_rate * days);
                                    list_html += '<li>' + days + ' day x $' + day_rate + ' per day<span>$' + (day_rate * days).toFixed(2) + '</span></li>';
                                }
                            } else if (sel_rate_class === 'day_rate') {
                                if (days > 0) {
                                    hour_rate = $('#rate_list .hr_rate').val();
                                    tripCost = sel_rate * days;
                                    list_html += '<li>' + days + ' day x $' + sel_rate + ' per day<span>$' + (sel_rate * days).toFixed(2) + '</span></li>';
                                    if (hrs > 0) {
                                        tripCost = tripCost + (hour_rate * hrs);
                                        list_html += '<li>' + hrs + ' hour x $' + hour_rate + ' per hour<span>$' + (hour_rate * hrs).toFixed(2) + '</span></li>';
                                    }
                                    if (mins >= 30 && mins <= 59) {
                                        tripCost = parseInt(tripCost) + parseInt(hour_rate);
                                        list_html += '<li>' + mins + ' minutes (' + ' 30 mins to 59 mins rate ' + ')<span>$' + parseInt(hour_rate).toFixed(2) + '</span></li>';

                                    } else if (mins > 0 && mins <= 29) {
                                        console.log("Rate:" + hour_rate);
                                        half_hr_rate = Math.floor(hour_rate / 2);
                                        tripCost = tripCost + half_hr_rate;
                                        list_html += '<li>' + mins + ' minutes rate (' + hour_rate + '/' + 2 + ')<span>$' + half_hr_rate.toFixed(2) + '</span></li>';
                                    }
                                } else {
                                    if (days === 0) {
                                        alert("You have selected day rate. Select atleast 1 day duration for ride booking!");
                                        return false;
                                    }
                                }
                            }
                            sessionStorage.setItem('trip_cost', tripCost);
                            //Set ride order summary
                            summary_html += '<ul class="summary-list">';
                            summary_html += list_html;
                            summary_html += '</ul>';
                            summary_html += '<div class="ride-total">';
                            summary_html += '<strong>Total <span>$' + parseInt(tripCost).toFixed(2) + '</span></strong>';
                            summary_html += '</div>';

                            $.cookie("order_summary", summary_html);
                            //Redirect Form to another page for booking confirmation
                            window.location.href = "confirm-booking.php";

                        } else {
                            //Remove ride order summary in case of offline method
                            var ride_info = $.cookie("order_summary", summary_html);
                            if (ride_info !== null) {
                                $.removeCookie('order_summary');
                            }
                            tripTime = days + " days, " + hrs + " hours, " + mins + " minutes";
                            sessionStorage.setItem('trip_time', tripTime);
                            //Redirect Form to another page for booking confirmation
                            window.location.href = "confirm-booking.php";
                        }
                    } else {
                        alert("Wrong Time or Date Selected. Please check and try again!");
                        return false;
                    }
                }

            }
        });
    }

    //Show ride order summary on clicking pricing breakdown button
    $('#ride_popup').on('click', function() {
        var order_summary = $.cookie('order_summary');
        $('.order-summary').html(order_summary)
    });

    if ($('#rider-info').length) {
        $('#rider-info').validate({
            rules: {
                fname: "required",
                lname: "required",
                phone_num: "required",
                email_id: "required",
            },
            messages: {
                fname: "This field is required",
                lname: "This field is required",
                phone_num: "This field is required",
                email_id: "This field is required",
            },
            submitHandler: function(form) {
                //Fetch Ride Booking Values And Set In Cookie For Server Side Processing
                $.cookie("book_ref", sessionStorage.getItem('book_ref'));
                $.cookie("start_loc", sessionStorage.getItem('start_loc'));
                $.cookie("end_loc", sessionStorage.getItem('end_loc'));
                $.cookie("pickup_date", sessionStorage.getItem('pickup_date'));
                $.cookie("pickup_time", sessionStorage.getItem('pickup_time'));
                $.cookie("dropoff_date", sessionStorage.getItem('dropoff_date'));
                $.cookie("dropoff_time", sessionStorage.getItem('dropoff_time'));
                $.cookie("service_type", sessionStorage.getItem('service_type'));
                $.cookie("trip_time", sessionStorage.getItem('trip_time'));
                $.cookie("trip_cost", sessionStorage.getItem('trip_cost'));
                $.cookie("selected_car", sessionStorage.getItem('selected_car'));
                //Fetch Ride Booking Values From Cookie
                var book_ref = $.cookie("book_ref");
                var start_loc = $.cookie("start_loc");
                var end_loc = $.cookie("end_loc");
                var pickup_date = $.cookie("pickup_date");
                var pickup_time = $.cookie("pickup_time");
                var dropoff_date = $.cookie("dropoff_date");
                var dropoff_time = $.cookie("dropoff_time");
                var service_type = $.cookie("service_type");
                var trip_cost = $.cookie('trip_cost');
                var ride_car = $.cookie('selected_car');
                var method_type = sessionStorage.getItem('method_type');

                if (start_loc !== null && end_loc !== null && pickup_date !== null && pickup_time !== null && dropoff_date !== null && dropoff_time !== null && service_type !== null && ride_car !== null) {
                    if (method_type === 'Offline') {
                        $.ajax({
                            type: 'POST',
                            url: 'contact/ride-booking.php',
                            data: {
                                "formData": $(form).serialize(),
                                "book_ref": sessionStorage.getItem('book_ref'),
                                "start_loc": sessionStorage.getItem('start_loc'),
                                "end_loc": sessionStorage.getItem('end_loc'),
                                "pickup_date": sessionStorage.getItem('pickup_date'),
                                "pickup_time": sessionStorage.getItem('pickup_time'),
                                "dropoff_date": sessionStorage.getItem('dropoff_date'),
                                "dropoff_time": sessionStorage.getItem('dropoff_time'),
                                "service_type": sessionStorage.getItem('service_type'),
                                "trip_time": sessionStorage.getItem('trip_time'),
                                "selected_car": sessionStorage.getItem('selected_car'),

                            },
                            beforeSend: function() {
                                $("#ride-bbtn").text("Sending..").addClass('wait');
                                $("#ride-bbtn").attr('disabled', 'disabled');
                            },
                            success: function(result) {
                                if (result == 1) {
                                    alert("Thank you for booking. We will get in touch with you soon!");
                                    $("#ride-bbtn").text("Email Sent").addClass('success');
                                    $("#ride-bbtn").removeAttr('disabled');
                                    $("#ride-bbtn").removeClass('wait');
                                    $('#rider-info')[0].reset();
                                    //Delete Booking Saved Data From Local Storage
                                    sessionStorage.removeItem("book_ref");
                                    sessionStorage.removeItem("start_loc");
                                    sessionStorage.removeItem("end_loc");
                                    sessionStorage.removeItem("pickup_date");
                                    sessionStorage.removeItem("pickup_time");
                                    sessionStorage.removeItem("dropoff_date");
                                    sessionStorage.removeItem("dropoff_date");
                                    sessionStorage.removeItem("dropoff_time");
                                    sessionStorage.removeItem("service_type");
                                    sessionStorage.removeItem("trip_time");
                                    sessionStorage.removeItem("selected_car");

                                    //Set default values for booking form fields
                                    $('.booking-summary .book-ref').text('Not Available');
                                    $('.booking-summary .service_type').text('Not Available');
                                    $('.booking-summary .startup_loc').text('Not Available');
                                    $('.booking-summary .end_loc').text('Not Available');
                                    $('.booking-summary .pick_date').text('Not Available');
                                    $('.booking-summary .pick_time').text('Not Available');
                                    $('.booking-summary .drop_date').text('Not Available');
                                    $('.booking-summary .drop_time').text('Not Available');
                                    $('.booking-summary .trip_est').text('Not Available');
                                    $('.booking-summary .ride_car').text('Not Available');
                                } else {
                                    alert("Something went wrong. Please check your entries and try again");
                                    $("#ride-bbtn").text("Email Failed").addClass('fail');
                                    $("#ride-bbtn").removeAttr('disabled');
                                    $("#ride-bbtn").removeClass('wait');
                                }
                            }
                        });

                    } else if (method_type === 'PayPal') {
                        //Declare variables
                        var ride_booking_info = '';
                        var booking_info = '';
                        //Change PayPal Mode(Sandbox URL https://www.sandbox.paypal.com/ or Live URL https://www.paypal.com/)
                        var action = "https://www.sandbox.paypal.com/";

                        //Delete Booking Saved Data From Local Storage
                        sessionStorage.removeItem("book_ref");
                        sessionStorage.removeItem("start_loc");
                        sessionStorage.removeItem("end_loc");
                        sessionStorage.removeItem("pickup_date");
                        sessionStorage.removeItem("pickup_time");
                        sessionStorage.removeItem("dropoff_date");
                        sessionStorage.removeItem("dropoff_date");
                        sessionStorage.removeItem("dropoff_time");
                        sessionStorage.removeItem("service_type");
                        sessionStorage.removeItem("trip_time");
                        sessionStorage.removeItem("selected_car");

                        //Set merchant business email change it accordingly
                        var merchant_business_email = 'sb-l6r7o592684@business.example.com';
                        //Fetch buyer email address
                        var email_add = $('#rider-info input[name="email_id"]').val();
                        var fname = $('#rider-info input[name="fname"]').val();
                        var lname = $('#rider-info input[name="lname"]').val();
                        var email = $('#rider-info input[name="email_id"]').val();
                        var phone_num = $('#rider-info input[name="phone_num"]').val();
                        ride_booking_info = service_type + " " + start_loc + " " + pickup_date + " " + pickup_time + " " + end_loc + " " + dropoff_date + " " + dropoff_time;
                        //Passing complete booking info for invoice and sending email
                        booking_info = 'Ride booked from ' + start_loc + " on " + pickup_date + " at " + pickup_time + " to " + end_loc + ", ends at " + dropoff_date + " on " + dropoff_time;
                        //Set rider and booking info in PayPal form hidden input fields
                        $('#paypal_frm input[name="business"]').val(merchant_business_email);
                        $('#paypal_frm input[name="item_name"]').val(ride_booking_info);
                        $('#paypal_frm input[name="item_number"]').val(book_ref);
                        $('#paypal_frm input[name="amount"]').val(trip_cost);
                        $('#paypal_frm input[name="custom"]').val(booking_info);
                        $('#paypal_frm input[name="os0"]').val(fname + " " + lname);
                        $('#paypal_frm input[name="os1"]').val(email);
                        $('#paypal_frm input[name="os2"]').val(phone_num);
                        $('#paypal_frm input[name="os3"]').val(trip_time);
                        $('#paypal_frm input[name="os4"]').val(ride_car);
                        $('#paypal_frm').attr('action', action).submit();

                    }
                }

                return false;
            }
        });
    }

});
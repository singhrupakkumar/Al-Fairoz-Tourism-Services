<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use App\Models\{Destination, Vehicle, Page, ContactUs, BookTour, CustomizeTour, User, Hotal};

class HomeController extends Controller
{
    /**
     * Display the user's profile form.
     */
	 public function index(Request $request): View
    {
		$city = Destination::select('id','name')->get();
        $results = Vehicle::select('id','type','name','make','model','description','price','image','adults_capacity','children_capacity')->get();
        $tour = Hotal::select('id','hotal_name','price','image')->take(3)->get();
        return view('welcome',compact('city','results','tour'));
    } 
	 
    public function listing(Request $request): View
    {
		$data = $request->all();

       if(isset($data['waytype']) == 'two-way'){
            $results = Hotal::select('id','hotal_name','city','image','price','adults','price','children','available_rooms','location_id');
            if ($request->location_id) {
                $results->where('location_id', $request->location_id);
            }
            if ($request->rooms) {
                $results->where('available_rooms', $request->rooms);
            }
            if ($request->adults) {
                $results->where('adults', $request->adult_capacity);
            }
            if ($request->children) {
                $results->where('children', $request->child_capacity);
            }
            $results = $results->get();

            Session::put('user_hotal_booking', ['location' => $request->location_id, 'rooms' => $request->rooms, 'adults' => $request->adults, 'children' => $request->children]);
            $location = Destination::get();
            return view('tour', compact('results','location'));
        }else{
            
            $results = Vehicle::select('id','type','name','make','model','description','price','image','adults_capacity','children_capacity');
            if ($request->pick_loc) {
                $results->where('from_location_id', $request->pick_loc);
            }
            if ($request->drop_loc) {
                $results->where('to_location_id', $request->drop_loc);
            }
            if ($request->pick_date) {
                $results->where('trip_date', $request->pick_date);
            }
            if ($request->pick_time) {
                $results->where('trip_time', $request->pick_time);
            }
            if ($request->adult_capacity) {
                $results->where('adults_capacity', $request->adult_capacity);
            }
            if ($request->child_capacity) {
                $results->where('children_capacity', $request->child_capacity);
            }
            $finalresult = $results->get();
// dd( $finalresult);
            if(isset($request->pick_loc)){
                $formLoc = Destination::find($request->pick_loc);
                $formLoc = isset($formLoc['name']) ? $formLoc['name'] : '';
            }else{
                $formLoc = '';
            }
            if(isset($request->drop_loc)){
                $toLoc = Destination::find($request->drop_loc);
                $toLoc = isset($toLoc['name']) ? $toLoc['name'] : '';
            }else{
                $toLoc = '';
            }
            $formLoc = Destination::find($request->pick_loc);
            $toLoc = Destination::find($request->drop_loc);
            $location = Destination::get();

            Session::put('user_booking', ['from_location_id' => $request->pick_loc, 'to_location_id' => $request->drop_loc, 'trip_date' => $request->pick_date, 'trip_time' => $request->pick_time, 'adults_capacity' => $request->adult_capacity, 'children_capacity' => $request->child_capacity,'formLoc' =>  $formLoc,'toLoc' => $toLoc]);

            return view('listing', compact('finalresult','location'));
        }
    
		

		// $result = Vehicle::where(['from_location_id',$request->from_location_id]);
		 //if($request->to_location_id !==null){
			//$result  = $result->where('to_location_id',$request->to_location_id); 
		// }
		 //$result = $result->get();
    }

    public function tourListing(Request $request): View
    {
        $data = $request->all();

        $results = Hotal::select('id','hotal_name','city','image','price','adults','price','children','available_rooms','location_id');
        if ($request->location_id) {
            $results->where('location_id', $request->location_id);
        }
        if ($request->rooms) {
            $results->where('available_rooms', $request->rooms);
        }
        if ($request->adults) {
            $results->where('adults', $request->adult_capacity);
        }
        if ($request->children) {
            $results->where('children', $request->child_capacity);
        }
        $results = $results->get();

        $tour = Hotal::get();

        Session::put('user_hotal_booking', ['location' => $request->location_id, 'rooms' => $request->rooms, 'adults' => $request->adults, 'children' => $request->children]);
        $location = Destination::get();
        return view('tour-listing', compact('results','location','tour'));
    
    }
	
	public function booknow(Request $request, $id = ''): View
    {

        $hotals = Hotal::select('id','hotal_name')->get();
        if($request['waytype'] == 'one-day-tour' || $request['waytype'] == 'multi-day-tour' ){
            $city = Destination::select('id','name')->get();
            $vehicleName = Vehicle::select('id','name')->get();
            $hotal_id = \App\Helpers::decrypt($id);
            $results = Hotal::select('id','hotal_name','city','image','price','adults','price','children','available_rooms','location_id')->where('id', \App\Helpers::decrypt($id))->first();
            $type = "hotal";
            $tour_type = $request['waytype'];
            return view('booknow', compact('vehicleName','results','city','type','hotals','hotal_id','tour_type'));
        }else{
            $bookingInfo = Session::get('user_booking');
                $city = '';
                $formLoc = '';
                $toLoc = '';
                $pick_date = '';
                $pick_time = '';
                $adult_capacity = '';
                $children_capacity = '';
                $vehicle_id = '';
                $vehicleName = '';
                $type = '';
                $city = Destination::select('id','name')->get();
                $vehicleName = Vehicle::select('id','name')->get();
                $type = "vehicle";
            if($bookingInfo != null){
                $formLoc = Destination::find($bookingInfo['from_location_id']);
                $toLoc = Destination::find($bookingInfo['to_location_id']);
                $pick_date = isset($bookingInfo['trip_date']) ? $bookingInfo['trip_date'] : '';
                $pick_time = $bookingInfo['trip_time'];
                $adult_capacity = $bookingInfo['adults_capacity'];
                $children_capacity = $bookingInfo['children_capacity'];
                $vehicle_id = \App\Helpers::decrypt($id);
                $type = "vehicle";
            }
            
            return view('booknow', compact('formLoc','toLoc','pick_date','pick_time','adult_capacity','children_capacity','vehicle_id','vehicleName','city','type','hotals'));
        }
		
    }

    public function getPage(Request $request, $slug){
    	$getPageData = Page::select('name','description','slug')->where('slug', $slug)->first();
    	return view('page', compact('getPageData'));
    }

    public function contactStore(Request $request){
    	$contactsInfo = array(
    		'name' => $request->name,
    		'email' => $request->email,
    		'subject' => $request->subject,
    		'message' => $request->message,
    	);
    	ContactUs::insert($contactsInfo);
                $subject = $request->subject;
                $adminemail = "info@mailinator.com";
                $name = $request->name;
                $emaildata = \DB::table('email_templates')->where('id', '1')->first();     
                $sortcut_code = ['{Name}','{Email}','{Message}'];
                $replace_with = [$name,$request->email,$request->message];     
                $body = str_replace($sortcut_code, $replace_with,  $emaildata->description);  

               /* \App\Helpers::getMailTemplate(1, $request->email,$adminemail, $body,$subject);*/

    	return redirect()->back()->with('message', 'Your request successfully submit.');
    }

    public function confirmBooking(Request $request){
      //dd($request->all());

        if($request->bookingType == 'one-day-tour' || $request->bookingType == 'multi-day-tour' || $request->bookingType == 'tour'){
            $bookingType  = $request->bookingType;
            $hotalLocation = Destination::find($request->hotal_location);
            $hotalName = Hotal::find($request->hotal_id);
             Session::put('user_hotal_booking', ['service_type' => $bookingType, 'hotal_location' => $request->hotal_location, 'check_in' => $request->arrivaltime, 'check_out' => $request->departure_time, 'adult_capacity' => $request->adult_capacity, 'child_capacity' => $request->child_capacity,'type'=>'tour','hotal_id'=> $request->hotal_id,'rooms'=> $request->rooms,'hotalLocation'=> $hotalLocation['name'],'hotalName'=> $hotalName['hotal_name']]);
             return view('confirm-booking', compact('bookingType'));
        }else if($request->bookingType == 'vehicle'){
            $user_id  = 1;
            $tour_id  = $request->vehicle_id;
            $vehicle_id  = $request->vehicle_id;
            $bookingType  = 'vehicle';
            $servie_type  = $request->service_type;
            $pickup_loc  = $request->pickup_loc;
            $pickup_date  = $request->pickup_date;
            $pickup_time = $request->pickup_time;
            $dropoff_date  = $request->dropoff_date;
            $dropoff_loc  = $request->dropoff_loc;
            $dropoff_time  = $request->dropoff_time;
            $formLoc = Destination::find($request->pickup_loc);
            $toLoc = Destination::find($request->dropoff_loc);
            Session::put('user_booking_first_step', ['service_type' => $request->service_type, 'pickup_loc' => $request->pickup_loc, 'pickup_date' => $request->pickup_date, 'pickup_time' => $request->pickup_time, 'dropoff_loc' => $request->dropoff_loc, 'dropoff_date' => $request->dropoff_date,'dropoff_time' => $request->dropoff_time,'vehicle_id' => $request->vehicle_id ,'tour_id' => $request->tour_id,'type'=>'vehicle']);
            return view('confirm-booking', compact('tour_id','vehicle_id','bookingType','servie_type','formLoc','pickup_date','pickup_time','dropoff_date','toLoc','dropoff_time'));
        }
    		
    }

    public function saveTripBooking(Request $request){
       // dd($request->all());
       $checkUser = User::where('email', $request->email)->first();
        if(!empty($checkUser)){
            $userId = $checkUser['id'];
            $addNewUser = array(
             'name' => $request->first_name,
            'email' => $request->email,
            );
            $user = User::where('id', $userId)->update($addNewUser);
        }else{
             $addNewUser = array(
             'name' => $request->first_name,
            'email' => $request->email,
            'password' => Hash::make('123456789'),
            );
            $user = User::create($addNewUser);
            $userId = $user['id'];
        }
     // dd($request->booking_type == 'vehicle');
        if($request->booking_type == 'multi-day-tour' || $request->booking_type == 'one-day-tour' || $request->booking_type == 'tour'){
        $hotalBookingInfo = Session::get('user_hotal_booking');
            $confirmBooking = array(
            'user_id' => $userId,
            'tour_id' => '0',
            'type' => 'Tour',
            'service_type' =>$request->booking_type,
            'pickup_date' =>$hotalBookingInfo['check_in'],
            'dropoff_date' =>$hotalBookingInfo['check_out'],
            'adult_capacity' =>$hotalBookingInfo['adult_capacity'],
            'child_capacity' =>$hotalBookingInfo['child_capacity'],
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'hotal_location' => $hotalBookingInfo['hotal_location'],
            'hotal_id' => $hotalBookingInfo['hotal_id'],
            'booking_reference' => $request->booking_reference,
        );
        }elseif($request->booking_type == 'vehicle'){
            $bookingInfo = Session::get('user_booking_first_step');
            $confirmBooking = array(
            'user_id' => $userId,
            'tour_id' => $bookingInfo['vehicle_id'],
            'vehicle_id' => $bookingInfo['vehicle_id'],
            'type' => $bookingInfo['type'],
            'pickup_loc' =>$bookingInfo['pickup_loc'],
            'dropoff_loc' =>$bookingInfo['dropoff_loc'],
            'pickup_date' =>$bookingInfo['pickup_date'],
            'pickup_time' =>$bookingInfo['pickup_time'],
            'dropoff_date' =>$bookingInfo['dropoff_date'],
            'dropoff_time' =>$bookingInfo['dropoff_time'],
            'service_type' =>$bookingInfo['service_type'],
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'booking_reference' => $request->booking_reference,
        );
        }


        // \DB::table('booking_tours')->insert($confirmBooking);
        BookTour::insert($confirmBooking);
        return redirect()->route('home')->with('success', 'Your booking successfully submit.');
       
    }

    public function customizeTour(Request $request){
        return view('customize-tour');
    }

    public function tour(Request $request){
        $results = Hotal::select('id','hotal_name','city','image','price','adults','price','children','available_rooms','location_id')->where('tour_type', 'multi-day-tour')->whereNull('deleted_at')->get();
        $location = Destination::get();
        // dd($location);
        return view('tour', compact('results','location'));
    }
	
	public function onedaytour(Request $request){
        $results = Hotal::select('id','hotal_name','city','image','price','adults','price','children','available_rooms','location_id')->where('tour_type', 'one-day-tour')->get();
        $location = Destination::get();
        return view('oneday-tour', compact('results','location'));
    }

    public function hotalDetail(Request $request,$type, $id){
        
        $results = Hotal::where('id', \App\Helpers::decrypt($id))->first();
        
        return view('hotal-detail', compact('results','type'));
    }

    public function customizeTourStore(Request $request){
        $customizeTour = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'duration_days' => $request->duration_days,
            'no_of_travellers' => $request->no_of_travellers,
            'date_of_arrival' => $request->date_of_arrival,
            'date_of_departure' => $request->date_of_departure,
            'date_arrival' => $request->date_arrival,
            'place_one' => $request->place_one,
        );
        CustomizeTour::insert($customizeTour);
        return redirect()->back()->with('message', 'Your tour request successfully submit.');
    }

    public function locations(Request $request){
        $locations = Destination::select('id','name','image')->get();
        return view('locations', compact('locations'));
    }

    public function filterCabs(Request $request){
        $results = Vehicle::select('id','type','name','make','model','description','price','image','adults_capacity','children_capacity');
            if ($request->fromLoc) {
                $results->where('from_location_id', $request->fromLoc);
            }
            if ($request->toLoc) {
                $results->where('to_location_id', $request->toLoc);
            }
            if ($request->adults) {
                $results->where('adults_capacity', $request->adults);
            }
            if ($request->children) {
                $results->where('children_capacity', $request->children);
            }
            $finalresult = $results->get();

            $output = '';
            $outputList = '';
                if($finalresult->isNotEmpty()){
                    foreach($finalresult as $val){
                        $output .= '<div class="col-md-6 col-sm-6">
                        <div class="fleet-grid-box">
                            <!--Fleet Grid Thumb Start-->
                            <figure class="fleet-thumb">
                                <img src=" '. asset('storage/upload_image/'.$val->image) .' " alt="">
                                <figcaption class="fleet-caption">
                                    <div class="price-box">
                                        <strong>'. '$'. $val->price .' <span>/ day</span></strong>
                                    </div>
                                </figcaption>
                            </figure>
                            <!--Fleet Grid Thumb End-->
                            <!--Fleet Grid Text Start-->
                            <div class="fleet-info-box">
                                <div class="fleet-info">
                                    <h3>' . $val->name .'</h3>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <ul class="fleet-meta">
                                        <li><i class="fas fa-taxi"></i>' . $val->type .'</li>
                                        <li><i class="fas fa-user-circle"></i>'. $val->adults_capacity .' Adult, ' . $val->children_capacity .' Child</li>
                                    </ul>
                                </div>
                                <a href="' . route('home.booknow'). '/'. \App\Helpers::encrypt($val->id) . ' " class="tj-btn">Book Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                            </div>
                            <!--Fleet Grid Text End-->
                        </div>
                        </div>';
                        $outputList .= '<div class="col-md-12 col-sm-12">
                        <div class="fleet-list-box">
                            <!--Fleet List Thumb Start-->
                            <figure class="fleet-thumb">
                                <img src=" '. asset('storage/upload_image/'.$val->image) .' " alt="">
                            </figure>
                            <!--Fleet List Thumb End-->
                            <!--Fleet List Text Start-->
                            <div class="fleet-text">
                                <div class="price-box">
                                    <span class="rated">Top Rated</span>
                                    <strong>'. '$'. $val->price .' <span>/ day </span></strong>
                                </div>
                                <h3>' . $val->name .'</h3>
                                <ul class="fleet-meta">
                                    <li><i class="fas fa-taxi"></i>' . $val->type .'</li>
                                    <li><i class="fas fa-user-circle"></i>'. $val->adults_capacity .' Adult, ' . $val->children_capacity .'  Child</li>
                                    
                                </ul>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <p>' . $val->description .' </p>
                                <a href="' . route('home.booknow'). '/'. \App\Helpers::encrypt($val->id) . ' " class="tj-btn">Book Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                            </div>
                            <!--Fleet List Text Start-->
                        </div>
                        </div>';
                    }
                }else{
                    $output .= '<p>Result not found</p>';
                }
                return response()->json(['output' => $output,'outputList' => $outputList]);
    }

    public function filterHotals(Request $request){

         $results = Hotal::select('id','hotal_name','city','image','price','adults','price','children','available_rooms','location_id');
                    if($request->hotal_id){
                        $results->where('id', $request->hotal_id);
                    }
                    if($request->location_id){
                        $results->where('location_id', $request->location_id);
                    }
                    if($request->tourType){
                        $results->where('tour_type', $request->tourType);
                    }
                    if($request->orderBy){
                        $results->orderBy('price', $request->orderBy);
                    }
                    if($request->fromPrice){
                        $results->where('price', '>=', $request->fromPrice);
                        $results->where('price', '<=', $request->toPrice);
                    }   
                    $getResult = $results->get();
        if($request->tourType == 'multi-day-tour'){
            $tourTypeUrl = 'multi-day-tour';
        }else if($request->tourType == 'one-day-tour'){
            $tourTypeUrl = 'one-day-tour';
        }else{
            $tourTypeUrl = 'multi-day-tour';
        }
        $output = '';
            if($getResult->isNotEmpty()){
                foreach($getResult as $val){
                    $output .= '<div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="tour-item-box">
                        <a class="tour-item-box-img" href="' . route('home.tour-detail') . '/'.$tourTypeUrl.'/'. \App\Helpers::encrypt($val->id) .'">
                            <img src="'. asset('storage/upload_image/'.$val->image) .'"/>
                        </a>
                        <div class="tour-item-box-text">
                            <span><i class="fa fa-location-arrow"></i> ' . $val->city .'</span>
                            <a href="'. route('home.tour-detail') . '/'.$tourTypeUrl.'/'. \App\Helpers::encrypt($val->id) .'">'. $val->hotal_name.'</a>
                            <div class="price-hr">
                                
                                <h6>From <span>$'. $val->price .'</span></h6>
                            </div>
                        </div>
                    </div>
                    </div>';
                } 
            }else{
                $output .= '<p>Result not found</p>';
            }  
            $countResult = count($getResult) . ' tours found';
            return response()->json(['output' => $output,'countResult' => $countResult]);           
    }
}

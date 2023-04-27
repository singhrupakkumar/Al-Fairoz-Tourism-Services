<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DestinationsController;
use App\Http\Controllers\Admin\TourCustomizationsController;
use App\Http\Controllers\Admin\ToursController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\{UsersController, ContactRequestController, HotalController, VehicleTourBookingController, VehiclesController, SettingsController, ProfilesController, MultiDayTourController};
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/sendmail', function () {
    // $name = 'Admin';
    // $message = 'sdf s sdf sdf';

    //   $adminemail = "info@mailinator.com";
    //             //$adminemail = "ramwindows@mailinator.com";
    //             $name = 'Admin';
    //             $emaildata = \DB::table('email_templates')->where('id', '1')->first();     
    //             $sortcut_code = ['{Name}','{Message}'];
    //             $replace_with = [$name,$message];     
    //             $body = str_replace($sortcut_code, $replace_with,  $emaildata->description);  

    //             \App\Helpers::getMailTemplate(1, $adminemail,$adminemail, $body,$message);
    //   echo "Email Sent with attachment. Check your inbox.";
});
// Admin Route
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    //Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    //Users Route
    Route::get('/users', [UsersController::class, 'index'])->name('admin.users.index');
    
    //Tours Route
    Route::get('/tours', [ToursController::class, 'index'])->name('admin.tours.index');
    Route::get('/tours/add-tours', [ToursController::class, 'create'])->name('admin.tours.add');
    Route::post('/tours/store-tour', [ToursController::class, 'store'])->name('admin.tours.store');
    Route::get('/tours/{tour}/edit', [ToursController::class, 'edit'])->name('admin.tours.edit');
    Route::put('/tours/{tour}', [ToursController::class, 'update'])->name('admin.tours.update');
    Route::get('/tours/{tour}', [ToursController::class, 'show'])->name('admin.tours.show');
    Route::post('/tours/destroy/', [ToursController::class, 'destroy'])->name('admin.tours.destroy');
    //Contacts Request Route
    Route::get('/contact/requests', [ContactRequestController::class, 'index'])->name('admin.contacts.index');
    Route::get('/contact/request/view/{id?}', [ContactRequestController::class, 'show'])->name('admin.contacts.show');
    //Pages Route
    Route::get('/pages', [PagesController::class, 'index'])->name('admin.pages.index');
    //One day tour Route
    Route::get('/one-day-tour', [HotalController::class, 'index'])->name('admin.onedaytour.index');
    Route::get('/add-tours', [HotalController::class, 'create'])->name('admin.hotal.add');
    Route::post('/store-onedaytour', [HotalController::class, 'store'])->name('admin.hotal.store');
    Route::get('/show-onedaytour/{id?}', [HotalController::class, 'show'])->name('admin.hotal.show');
    Route::get('/edit-onedaytour/{id?}', [HotalController::class, 'edit'])->name('admin.hotal.edit');
    Route::post('/update-onedaytour/{id?}', [HotalController::class, 'update'])->name('admin.hotal.update');
    Route::post('/onedaytour/destroy/', [HotalController::class, 'destroy'])->name('admin.hotal.destroy');
     //Multi Day Tour Route
    Route::get('/multi-day-tour', [MultiDayTourController::class, 'index'])->name('admin.multidaytour.index');
    Route::get('/add-multi-day-tour', [MultiDayTourController::class, 'create'])->name('admin.multidaytour.add');
    Route::post('/store-multi-day-tour', [MultiDayTourController::class, 'store'])->name('admin.multidaytour.store');
    Route::get('/show-multi-day-tour/{id?}', [MultiDayTourController::class, 'show'])->name('admin.multidaytour.show');
    Route::get('/edit-multi-day-tour/{id?}', [MultiDayTourController::class, 'edit'])->name('admin.multidaytour.edit');
    Route::post('/update-multi-day-tour/{id?}', [MultiDayTourController::class, 'update'])->name('admin.multidaytour.update');
    Route::post('/multi-day-tour/destroy/', [MultiDayTourController::class, 'destroy'])->name('admin.multidaytour.destroy');
     //Vehicle & Tour Route
    Route::get('/vehicle-tour', [VehicleTourBookingController::class, 'index'])->name('admin.vehicle-tour.index');
    Route::get('/vehicle-tour-detail/{id?}', [VehicleTourBookingController::class, 'show'])->name('admin.vehicle-tour.show');
     //Hotal Route
    Route::get('/vehicles', [VehiclesController::class, 'index'])->name('admin.vehicles.index');
    Route::get('/add-vehicles', [VehiclesController::class, 'create'])->name('admin.vehicles.add');
    Route::post('/store-vehicles', [VehiclesController::class, 'store'])->name('admin.vehicles.store');
    Route::get('/show-vehicles/{id?}', [VehiclesController::class, 'show'])->name('admin.vehicles.show');
    Route::get('/edit-vehicles/{id?}', [VehiclesController::class, 'edit'])->name('admin.vehicles.edit');
    Route::post('/update-vehicles/{id?}', [VehiclesController::class, 'update'])->name('admin.vehicles.update');
    Route::post('/vehicles/destroy/', [VehiclesController::class, 'destroy'])->name('admin.vehicles.destroy');
    //Setting Route
    Route::get('/setting', [SettingsController::class, 'index'])->name('admin.setting');
    Route::post('/setting/store', [SettingsController::class, 'store'])->name('admin.setting.store');
    //Profile Route
    Route::get('/profile', [ProfilesController::class, 'index'])->name('admin.profile');
    Route::post('/profile/store', [ProfilesController::class, 'store'])->name('admin.profile.store');

    //Destinations Route
    Route::get('/destination', [DestinationsController::class, 'index'])->name('admin.destinations.index');
    Route::get('/add-destination', [DestinationsController::class, 'create'])->name('admin.destinations.add');
    Route::post('/store-destination', [DestinationsController::class, 'store'])->name('admin.destination.store');
    Route::get('/show-destination/{id?}', [DestinationsController::class, 'show'])->name('admin.destination.show');
    Route::get('/edit-destination/{id?}', [DestinationsController::class, 'edit'])->name('admin.destination.edit');
    Route::post('/update-destination/{id?}', [DestinationsController::class, 'update'])->name('admin.destination.update');
    Route::post('/destination/destroy/', [DestinationsController::class, 'destroy'])->name('admin.destination.destroy');
    //Custom Tours Route
    Route::get('/custom', [TourCustomizationsController::class, 'index'])->name('admin.customtours.index');
    // Other routes for user management
});


Route::get('/', [HomeController::class, 'index'])->name('home'); 
Route::get('/listing', [HomeController::class, 'listing'])->name('home.listing');
Route::get('/tour-listing', [HomeController::class, 'tourListing'])->name('home.tour-listing');
Route::get('/tour', [HomeController::class, 'tour'])->name('home.tour');
Route::get('/onedaytour', [HomeController::class, 'onedaytour'])->name('home.onedaytour');
Route::get('/tour/tour-detail/{type?}/{id?}', [HomeController::class, 'hotalDetail'])->name('home.tour-detail');
Route::any('/booknow/{id?}', [HomeController::class, 'booknow'])->name('home.booknow');
Route::post('/confirm_booking', [HomeController::class, 'confirmBooking'])->name('home.confirm_booking');
Route::any('/save_trip_booking', [HomeController::class, 'saveTripBooking'])->name('home.save_trip_booking');
Route::post('/trip-booking', [HomeController::class, 'tripBooking'])->name('home.trip-booking');
Route::get('/page/{slug?}', [HomeController::class, 'getPage'])->name('home.page');
Route::post('/contact/store', [HomeController::class, 'contactStore'])->name('contact.store');
Route::any('/customize-tour', [HomeController::class, 'customizeTour'])->name('customizeTour'); 
Route::any('/customize-tour/store', [HomeController::class, 'customizeTourStore'])->name('customizeTourstore'); 
Route::get('/locations', [HomeController::class, 'locations'])->name('locations'); 
Route::get('/get-filter-cabs', [HomeController::class, 'filterCabs'])->name('get-filter-cabs'); 
Route::get('/get-filter-hotals', [HomeController::class, 'filterHotals'])->name('get-filter-hotals'); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
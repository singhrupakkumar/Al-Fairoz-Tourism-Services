<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{BookTour, Destination};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;


class VehicleTourBookingController extends Controller
{
    public function index(Request $request){

        if ($request->ajax()) {
            $data = BookTour::select('id','first_name','last_name','phone','email','booking_reference','service_type','type',)
                    ->get();
            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    return $row->id ? $row->id  : 'N/A';
                })
                ->addColumn('first_name', function ($row) {
                    return $row->first_name ? ucfirst($row->first_name) . ' ' . ucfirst($row->last_name) : 'N/A';
                })
                ->addColumn('phone', function ($row) {
                    return $row->phone ? $row->phone : 'N/A';
                })
                ->addColumn('email', function ($row) {
                    return $row->email ? $row->email : 'N/A';
                })
                ->addColumn('booking_reference', function ($row) {
                    return $row->booking_reference ? $row->booking_reference : 'N/A';
                })
                ->addColumn('service_type', function ($row) {
                    return $row->service_type ? ucwords( str_replace('-', ' ', $row->service_type)) : 'N/A';
                })
                ->addColumn('type', function ($row) {
                    return $row->type ? ucfirst($row->type) : 'N/A';
                })

                ->addColumn('action', function ($row) {
                    $btn = '<a href=" ' . route('admin.vehicle-tour.show') .'/' .  \App\Helpers::encrypt($row->id) . ' " class="btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.vehicle-tour.index');
    }

    public function show($id){
        
       $bookingTour = BookTour::find(\App\Helpers::decrypt($id));

      
       if($bookingTour->type == 'vehicle'){
            $vehicleBooking = BookTour::select('booking_tours.*', 'vehicles.name', 'vehicles.price', 'vehicles.image')
                        ->join('vehicles','booking_tours.vehicle_id','=','vehicles.id')
                        ->where('booking_tours.id', \App\Helpers::decrypt($id))
                        ->first();
            return view('admin.vehicle-tour.show', compact('vehicleBooking'));        
       }else{
            $hotalBooking = BookTour::select('booking_tours.*', 'hotels.hotal_name', 'hotels.city', 'hotels.phone_number', 'hotels.price', 'hotels.address', 'hotels.adults', 'hotels.children', 'hotels.available_rooms', 'hotels.adults')
                        ->join('hotels','booking_tours.hotal_id','=','hotels.id')
                        ->join('locations','hotels.location_id','=','locations.id')
                        ->where('booking_tours.id', \App\Helpers::decrypt($id))
                        ->first();
                       
            return view('admin.vehicle-tour.show-hotal-detail', compact('hotalBooking')); 
       }

    }
}
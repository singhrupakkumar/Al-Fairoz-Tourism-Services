<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Hotal, Destination};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;


class HotalController extends Controller{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Hotal::select('hotels.*','locations.name')
                    ->join('locations','hotels.location_id','=','locations.id')
                    ->where('hotels.tour_type', '=', 'one-day-tour')
                    ->get();
            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    return $row->id ? $row->id : 'N/A';
                })
                ->addColumn('hotal_name', function ($row) {
                    return $row->hotal_name ? $row->hotal_name : 'N/A';
                })
                ->addColumn('phone_number', function ($row) {
                    return $row->phone_number ? $row->phone_number : 'N/A';
                })
                ->addColumn('locations_name', function ($row) {
                    return $row->name ? $row->name : 'N/A';
                })
                ->addColumn('address', function ($row) {
                    return $row->address ? $row->address : 'N/A';
                })
                ->addColumn('price', function ($row) {
                    return $row->price ? $row->price : 'N/A';
                })
                ->addColumn('available_rooms', function ($row) {
                    return $row->available_rooms ? $row->available_rooms : 'N/A';
                })
                ->addColumn('action', function ($row) {
                    $url =  route('admin.hotal.destroy');
                    $btn = '<a href=" ' . route('admin.hotal.show') .'/' .  \App\Helpers::encrypt($row->id) . ' " class="btn btn-primary btn-sm">View</a>
                            <a href="' . route('admin.hotal.edit', \App\Helpers::encrypt($row->id)) . '" class="btn btn-warning" title="Edit"><i class="mdi mdi-pencil"></i></a>
                            <a onclick="deleteHotalItems(this)" data-url ="'.$url.'" data-id="'.\App\Helpers::encrypt($row->id).'" class="btn btn-danger" title="Delete"><i class="mdi mdi-delete"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.hotals.index');
    }

    public function create(){
        $locations = Destination::all();
        return view('admin.hotals.create', compact('locations'));
    }

    public function store(Request $request){
        $input = $request->all();
    
        $validatedData = $request->validate([
            'hotal_name' => 'required',
            'price' => 'required',
            'phone_number' => 'required|numeric|digits_between:2,12',
            'city' => 'required',
            'address' => 'required',
            'adults' => 'required',
            'children' => 'required',
            'available_rooms' => 'required',
            'location_id' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:10000',
        ]);
       
        if ($request->hasFile('image')) {

            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/upload_image', $fileNameToStore);
        }
       
        $input['hotal_name'] = $input['hotal_name'];
        $input['image'] = @$fileNameToStore;
        $input['price'] = strip_tags($input['price']);
        $input['city'] = strip_tags($input['city']);
        $input['address'] = strip_tags($input['address']);
        $input['phone_number'] = strip_tags($input['phone_number']);
        $input['adults'] = strip_tags($input['adults']);
        $input['children'] = strip_tags($input['children']);
        $input['tour_type'] = 'one-day-tour';
        $input['available_rooms'] = strip_tags($input['available_rooms']);
        $input['location_id'] = strip_tags($input['location_id']);
        $input['description'] = strip_tags($input['description']);
        $hotal = Hotal::create($input);
        
        return redirect()->route('admin.onedaytour.index')->with('success', 'Hotal added successfully.');
    }

    public function show($id){
        $hotalDetail =Hotal::select('hotels.*','locations.name')
                    ->join('locations','hotels.location_id','=','locations.id')
                    ->where('hotels.id', \App\Helpers::decrypt($id))
                    ->first();
        return view('admin.hotals.show', compact('hotalDetail'));
    }

    public function edit($id){

        $locations = Destination::all();
        $hotalDetail =Hotal::select('hotels.*','locations.name')
                    ->join('locations','hotels.location_id','=','locations.id')
                    ->where('hotels.id', \App\Helpers::decrypt($id))
                    ->first();
        return view('admin.hotals.edit', compact('hotalDetail','id','locations'));
    }

    public function update(Request $request, $id){
       $input = $request->all();
        $validatedData = $request->validate([
            'hotal_name' => 'required',
            'price' => 'required',
            'phone_number' => 'required|numeric|digits_between:2,12',
            'city' => 'required',
            'address' => 'required',
            'adults' => 'required',
            'children' => 'required',
            'available_rooms' => 'required',
            'location_id' => 'required',
            'description' => 'required',
        ]);
      
        if ($request->hasFile('image')) {

            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/upload_image', $fileNameToStore);
        }
        if($request->hasFile('image') != null){
            $hotalImg = $fileNameToStore;
        }else{
            $hotalImg = $request->oldHotalImg;
        }

        $updateHotalInfo = array(
            'hotal_name' => $input['hotal_name'],
            'phone_number' => $input['phone_number'],
            'price' => $input['price'],
            'city' => $input['city'],
            'address' => $input['address'],
            'adults' => $input['adults'],
            'children' => $input['children'],
            'tour_type' => 'one-day-tour',
            'available_rooms' => $input['available_rooms'],
            'location_id' => $input['location_id'],
            'description' => $input['description'],
            'image' => isset($fileNameToStore) ? $fileNameToStore : $input['oldHotalImg'],
        );
        Hotal::where('id', \App\Helpers::decrypt($id))->update($updateHotalInfo);
       
          return redirect()->route('admin.onedaytour.index')
            ->with('message', 'Hotal Information Updated Successfully!!');
    }

    public function destroy(Request $request){
        $hotal = Hotal::find(\App\Helpers::decrypt($request->id));
        if (!$hotal) {
            return redirect()->back()->with('error', 'Hotal not found.');
        }
        $hotal->delete();
        return redirect()->route('admin.onedaytour.index')->with('message', 'Hotal deleted successfully.');
    }
}
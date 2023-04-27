<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Hotal, Vehicle, Destination};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;


class VehiclesController extends Controller{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Vehicle::get();
            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    return $row->id ? $row->id : 'N/A';
                })
                ->addColumn('name', function ($row) {
                    return $row->name ? $row->name : 'N/A';
                })
                ->addColumn('type', function ($row) {
                    return $row->type ? $row->type : 'N/A';
                })
                ->addColumn('model', function ($row) {
                    return $row->model ? $row->model : 'N/A';
                })
                ->addColumn('price', function ($row) {
                    return $row->price ? '$'.$row->price : 'N/A';
                })
                ->addColumn('action', function ($row) {
                    $url =  route('admin.vehicles.destroy');
                    $btn = '<a href=" ' . route('admin.vehicles.show') .'/' .  \App\Helpers::encrypt($row->id) . ' " class="btn btn-primary btn-sm">View</a>
                            <a href="' . route('admin.vehicles.edit', \App\Helpers::encrypt($row->id)) . '" class="btn btn-warning" title="Edit"><i class="mdi mdi-pencil"></i></a>
                            <a onclick="deleteVehicleItems(this)" data-url ="'.$url.'" data-id="'.\App\Helpers::encrypt($row->id).'" class="btn btn-danger" title="Delete"><i class="mdi mdi-delete"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.vehicles.index');
    }

    public function create(){
        $locations = Destination::all();
        return view('admin.vehicles.create', compact('locations'));
    }

    public function store(Request $request){
        $input = $request->all();
        
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'make' => 'required',
            'model' => 'required',
            'description' => 'required',
            'adults_capacity' => 'required',
            'children_capacity' => 'required',
            'from_location_id' => 'required',
            'to_location_id' => 'required',
            'price' => 'required',
            'trip_date' => 'required',
            'trip_time' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:10000',
        ]);
       
        if ($request->hasFile('image')) {

            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/upload_image', $fileNameToStore);
        }
       
        $input['name'] = $input['name'];
        $input['image'] = @$fileNameToStore;
        $input['type'] = strip_tags($input['type']);
        $input['make'] = strip_tags($input['make']);
        $input['model'] = strip_tags($input['model']);
        $input['description'] = strip_tags($input['description']);
        $input['adults_capacity'] = strip_tags($input['adults_capacity']);
        $input['children_capacity'] = strip_tags($input['children_capacity']);
        $input['from_location_id'] = strip_tags($input['from_location_id']);
        $input['to_location_id'] = strip_tags($input['to_location_id']);
        $input['price'] = strip_tags($input['price']);
        $input['trip_date'] = strip_tags($input['trip_date']);
        $input['trip_time'] = strip_tags($input['trip_time']);
        $hotal = Vehicle::create($input);
        
        return redirect()->route('admin.vehicles.index')->with('success', 'Vehicles added successfully.');
    }

    public function show($id){
        $vehiclesDetail = \DB::table('vehicles')->select('vehicles.*','from_loc.name as from_loc_name','to_loc.name as to_loc_name')
                    ->join('locations as from_loc','vehicles.from_location_id','=','from_loc.id')
                    ->join('locations as to_loc','vehicles.to_location_id','=','to_loc.id')
                    ->where('vehicles.id', \App\Helpers::decrypt($id))
                    ->first();
                   
        return view('admin.vehicles.show', compact('vehiclesDetail'));
    }

    public function edit($id){

        $locations = Destination::all();
        $vehiclesDetail = \DB::table('vehicles')->where('id', \App\Helpers::decrypt($id))->first();
        return view('admin.vehicles.edit', compact('vehiclesDetail','id','locations'));
    }

    public function update(Request $request, $id){
       $input = $request->all();
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'make' => 'required',
            'model' => 'required',
            'description' => 'required',
            'adults_capacity' => 'required',
            'children_capacity' => 'required',
            'from_location_id' => 'required',
            'to_location_id' => 'required',
            'price' => 'required',
            'trip_date' => 'required',
            'trip_time' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:10000',
        ]);
      
        if ($request->hasFile('image')) {

            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/upload_image', $fileNameToStore);
        }
        if($request->hasFile('image') != null){
            $vehiclesImg = $fileNameToStore;
        }else{
            $vehiclesImg = $request->oldVehicleImg;
        }


        $updateHotalInfo = array(
            'name' => $input['name'],
            'type' => $input['type'],
            'make' => $input['make'],
            'model' => $input['model'],
            'description' => $input['description'],
            'adults_capacity' => $input['adults_capacity'],
            'children_capacity' => $input['children_capacity'],
            'from_location_id' => $input['from_location_id'],
            'to_location_id' => $input['to_location_id'],
            'price' => $input['price'],
            'trip_date' => $input['trip_date'],
            'trip_time' => $input['trip_time'],
            'image' => isset($fileNameToStore) ? $fileNameToStore : $input['oldVehicleImg'],
        );
        Vehicle::where('id', \App\Helpers::decrypt($id))->update($updateHotalInfo);
       
          return redirect()->route('admin.vehicles.index')
            ->with('message', 'Vehicle Information Updated Successfully!!');
    }

    public function destroy(Request $request){
        $hotal = Vehicle::find(\App\Helpers::decrypt($request->id));
        if (!$hotal) {
            return redirect()->back()->with('error', 'Hotal not found.');
        }
        $hotal->delete();
        return redirect()->route('admin.vehicles.index')->with('message', 'Vehicles deleted successfully.');
    }
}
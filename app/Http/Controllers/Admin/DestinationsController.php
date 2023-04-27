<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DestinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Destination::all();
            return DataTables::of($data)
                ->addColumn('name', function ($row) {
                    return $row->name ? $row->name : 'N/A';
                })
                ->addColumn('description', function ($row) {
                    return $row->description ? $row->description : 'N/A';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at ? $row->created_at->format('m/d/Y') : 'N/A';
                })
                ->addColumn('action', function ($row) {
                    $url =  route('admin.destination.destroy');
                    $btn = '<a href=" ' . route('admin.destination.show') .'/' .  \App\Helpers::encrypt($row->id) . ' " class="btn btn-primary btn-sm">View</a><a href="' . route('admin.destination.edit', \App\Helpers::encrypt($row->id)) . '" class="btn btn-warning" title="Edit"><i class="mdi mdi-pencil"></i></a>
                    <a onclick="deleteDestinationItems(this)" data-url ="'.$url.'" data-id="'.\App\Helpers::encrypt($row->id).'" class="btn btn-danger" title="Delete"><i class="mdi mdi-delete"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.destinations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.destinations.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $input = $request->all();
    
        $validatedData = $request->validate([
            'name' => 'required',
            'city' => 'required',
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
       
        $input['name'] = $input['name'];
        $input['city'] = $input['city'];
        $input['image'] = @$fileNameToStore;
        $input['description'] = strip_tags($input['description']);
         Destination::create($input);
        
        return redirect()->route('admin.destinations.index')->with('success', 'Location added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

         $locDetail =Destination::where('id', \App\Helpers::decrypt($id))
                    ->first();
        return view('admin.destinations.show', compact('locDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $locDetail =Destination::where('id', \App\Helpers::decrypt($id))
                    ->first();
        return view('admin.destinations.edit', compact('locDetail','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validatedData = $request->validate([
            'name' => 'required',
            'city' => 'required',
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
            'name' => $input['name'],
            'city' => $input['city'],
            'description' => $input['description'],
            'image' => isset($fileNameToStore) ? $fileNameToStore : $input['oldHotalImg'],
        );
        Destination::where('id', \App\Helpers::decrypt($id))->update($updateHotalInfo);
       
          return redirect()->route('admin.destinations.index')
            ->with('message', 'Destinations Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
        $hotal = Destination::find(\App\Helpers::decrypt($request->id));
        if (!$hotal) {
            return redirect()->back()->with('error', 'Destination not found.');
        }
        $hotal->delete();
        return redirect()->route('admin.destinations.index')->with('message', 'Destination deleted successfully.');
    }
}
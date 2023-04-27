<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\TourCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class ToursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Tour::all();
            return DataTables::of($data)
                ->addColumn('name', function ($row) {
                    return $row->name ? $row->name : 'N/A';
                })
                ->addColumn('price', function ($row) {
                    return $row->price ? $row->price : 'N/A';
                })
                ->addColumn('tour_type', function ($row) {
                    return $row->tour_type ? $row->tour_type : 'N/A';
                })
                ->addColumn('duration', function ($row) {
                    return $row->duration ? $row->duration : 'N/A';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at ? $row->created_at->format('m/d/Y') : 'N/A';
                })
                ->addColumn('action', function ($row) {
                    $id = $row->id;
                    $url =  route('admin.tours.destroy');
                    return '
        <a href="' . route('admin.tours.show', $row->id) . '" class="btn btn-primary" title="View">
            <i class="mdi mdi-eye"></i>
        </a>
        <a href="' . route('admin.tours.edit', $row->id) . '" class="btn btn-warning" title="Edit">
            <i class="mdi mdi-pencil"></i>
        </a>
        <a onclick="deleteTourRecord(this)" data-url ="' . $url . '" data-id="' . $id . '" class="btn btn-danger" title="Delete">
            <i class="mdi mdi-delete"></i>
        </a>
    ';
                })

                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.tours.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = TourCategory::all();
        return view('admin.tours.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'tour_type' => 'required|in:day,night,custom',
            'tour_category_id' => 'required|exists:tour_categories,id'
        ]);

        // Create new Tour object with validated data
        $tour = new Tour([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'duration' => $validatedData['duration'],
            'price' => $validatedData['price'],
            'tour_type' => $validatedData['tour_type'],
            'tour_category_id' => $validatedData['tour_category_id']
        ]);

        // Save Tour object to database
        $tour->save();

        // Redirect to index page with success message
        return redirect()->route('admin.tours.index')->with('success', 'Tour added successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tour = Tour::findOrFail($id);
        $categories = TourCategory::all();
        return view('admin.tours.edit', compact('tour', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'tour_category_id' => 'required|exists:tour_categories,id',
        ]);

        $tour->update($validatedData);

        return redirect()->route('admin.tours.index', $tour->id)->with('success', 'Tour updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $tour = Tour::find($id);

        if (!$tour) {
            return redirect()->back()->with('error', 'Tour not found.');
        }

        $tour->delete();

        return redirect()->route('admin.tours.index')->with('success', 'Tour deleted successfully.');
    }
}
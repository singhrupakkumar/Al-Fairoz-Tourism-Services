<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomizeTour;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TourCustomizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CustomizeTour::all();
            return DataTables::of($data)
                ->addColumn('name', function ($row) {
                    return $row->name ? $row->name : 'N/A';
                })
                ->addColumn('email', function ($row) {
                    return $row->email ? $row->email : 'N/A';
                })
                ->addColumn('phone', function ($row) {
                    return $row->phone ? $row->phone : 'N/A';
                })
                ->addColumn('country', function ($row) {
                    return $row->country ? $row->country : 'N/A';
                })
                ->addColumn('duration', function ($row) {
                    return $row->duration ? $row->duration : 'N/A';
                })
                ->addColumn('travellers', function ($row) {
                    return $row->travellers ? $row->travellers : 'N/A';
                })
                ->addColumn('arrival_date', function ($row) {
                    return $row->arrival_date ? $row->arrival_date->format('m/d/Y') : 'N/A';
                })
                ->addColumn('departure_date', function ($row) {
                    return $row->departure_date ? $row->departure_date->format('m/d/Y') : 'N/A';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.tour_customize.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
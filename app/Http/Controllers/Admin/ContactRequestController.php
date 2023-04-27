<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;


class ContactRequestController extends Controller
{
    public function index(Request $request){

        if ($request->ajax()) {
            $data = ContactUs::select('id', 'name', 'email','subject','seen_status')
                ->get();
            return DataTables::of($data)
                ->addColumn('name', function ($row) {
                    return $row->name ? $row->name : 'N/A';
                })
                ->addColumn('email', function ($row) {
                    return $row->email ? $row->email : 'N/A';
                })
                ->addColumn('subject', function ($row) {
                    return $row->subject ? $row->subject : 'N/A';
                })
                ->addColumn('seen_status', function ($row) {
                    if($row->seen_status == 0)
                        $status = 'Unseen';
                    else
                        $status = 'Seen';

                    return $status;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href=" ' . route('admin.contacts.show') .'/' .  \App\Helpers::encrypt($row->id) . ' " class="btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.contact_request.index');
    }

    public function show($id){
        ContactUs::where('id', \App\Helpers::decrypt($id))->update(['seen_status' => 1]);
        $contactReqDetail = ContactUs::find(\App\Helpers::decrypt($id));
        return view('admin.contact_request.show', compact('contactReqDetail'));

    }
}
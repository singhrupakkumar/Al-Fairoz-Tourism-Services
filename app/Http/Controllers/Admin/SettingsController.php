<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;


class SettingsController extends Controller{
    public function index(Request $request){
       $setting = Setting::first();
       return view('admin.setting', compact('setting'));
    }

    public function store(Request $request){
        $input = $request->all();
    
        $validatedData = $request->validate([
            'email' => 'required',
            'phone' => 'required|numeric|digits_between:2,12',
            'address' => 'required',
            'logo' => 'mimes:jpeg,jpg,png|max:10000',
        ]);
       
        if ($request->hasFile('logo')) {

            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            $path = $request->file('logo')->storeAs('public/upload_image', $fileNameToStore);
        }

        // if($request->hasFile('logo')){
        //     $hotalImg = $request->oldLogoImg;
        // }else{
        //     $hotalImg = $fileNameToStore;
        // }
       
        
        $settinUpdate = array(
            'email' => $input['email'],
            'logo' => isset($fileNameToStore) ? $fileNameToStore : $request->oldLogoImg,
            'phone' => $input['phone'],
            'address' => $input['address'],
        );
        $hotal = Setting::where('id', '1')->update($settinUpdate);
        
        return redirect()->route('admin.setting')->with('success', 'Setting successfully updated.');
    }

  
}
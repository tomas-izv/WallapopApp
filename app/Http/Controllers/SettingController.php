<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        return view('adminLayouts.settingLayouts.index', ['setting' => $setting]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminLayouts.settingLayouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = Setting::create([
            'name' => $request->name,
            'maxImages' => $request->maxImages,
        ]);
        if($result != null){
            return redirect()->route('setting.index')->with(['message' => 'The setting has been created.']);
        }else{
            return redirect()->route('setting.create')->withError(['error' => 'Something went wrong...']);
        }


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $result = $setting->update($request->all());
        if($result != null){
            return redirect()->route('setting.index')->with(['message' => 'The setting has been updated.']);
        }else{
            return redirect()->route('setting.index')->with(['message' => 'Something went wrong...']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function show(Setting $setting)
    {

    }
}

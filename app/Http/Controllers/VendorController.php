<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::all();
        return view('vendor.index-vendor',compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendor.create-vendor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Vendor::create([
            'name_vendor' => $request->name_vendor,
            'telp' => $request->telp,
            'address_vendor' => $request->address_vendor,
            'contact_person' => $request->contact_person,
        ]);

        return redirect()->route('vendor');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vendor = Vendor::find($id);
        return view('vendor.edit-vendor',compact('vendor'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vendor = Vendor::find($id);
        $vendor->update([
            'name_vendor' => $request->name_vendor,
            'telp' => $request->telp,
            'address_vendor' => $request->address_vendor,
            'contact_person' => $request->contact_person,
        ]);

        return redirect()->route('vendor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vendor = Vendor::find($id);
        $vendor->delete();

        return redirect()->route('vendor.index');
    }
}

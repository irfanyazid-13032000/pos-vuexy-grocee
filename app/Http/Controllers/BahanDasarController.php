<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BahanDasarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bahan_dasars = DB::table('bahan_dasars')->get();
        return view('bahan_dasar.index-bahan-dasar',compact('bahan_dasars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bahan_dasar.create-bahan-dasar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('bahan_dasars')->insert([
            'nama_bahan' => $request->nama_bahan,
            'harga_satuan' => $request->harga_satuan,
        ]);

        return redirect()->route('bahan.dasar.index');
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
        $bahan_dasar = DB::table('bahan_dasars')->where('id',$id)->get()->first();
        return view('bahan_dasar.edit-bahan-dasar',compact('bahan_dasar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('bahan_dasars')->where('id',$id)->update([
            'nama_bahan' => $request->nama_bahan,
            'harga_satuan' => $request->harga_satuan,
        ]);

        return redirect()->route('bahan.dasar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('bahan_dasars')->where('id',$id)->delete();

        return redirect()->route('bahan.dasar.index');
    }
}

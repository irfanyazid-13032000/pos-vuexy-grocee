<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriBahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori_bahans = DB::table('kategori_bahan')->get();
        return view('kategori_bahan.index-kategori-bahan',compact('kategori_bahans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori_bahan.create-kategori-bahan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('kategori_bahan')->insert(['nama_kategori_bahan'=>$request->nama_kategori_bahan]);

        return redirect()->route('kategori.bahan.index');
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
        $kategori_bahan = DB::table('kategori_bahan')->where('id',$id)->get()->first();
        return view('kategori_bahan.edit-kategori-bahan',compact('kategori_bahan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('kategori_bahan')->where('id',$id)->update(['nama_kategori_bahan'=>$request->nama_kategori_bahan]);
        return redirect()->route('kategori.bahan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('kategori_bahan')->where('id',$id)->delete();
        return redirect()->route('kategori.bahan.index');
    }
}

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
        $bahan_dasars = DB::table('bahan_dasars')
                                ->join('satuan','bahan_dasars.satuan_id','=','satuan.id')
                                ->join('kategori_bahan','bahan_dasars.kategori_bahan_id','=','kategori_bahan.id')
                                ->select('bahan_dasars.*','satuan.nama_satuan','kategori_bahan.nama_kategori_bahan')
                                ->get();
        return view('bahan_dasar.index-bahan-dasar',compact('bahan_dasars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $satuans = DB::table('satuan')->get();
        $kategori_bahans = DB::table('kategori_bahan')->get();
        return view('bahan_dasar.create-bahan-dasar',compact('satuans','kategori_bahans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // return $request;

        DB::table('bahan_dasars')->insert([
            'nama_bahan' => $request->nama_bahan,
            'harga_satuan' => $request->harga_satuan,
            'satuan_id' => $request->satuan_id,
            'kategori_bahan_id' => $request->kategori_bahan_id,
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
        $kategori_bahans = DB::table('kategori_bahan')->get();
        $satuans = DB::table('satuan')->get();
        return view('bahan_dasar.edit-bahan-dasar',compact('bahan_dasar','kategori_bahans','satuans'));
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


    public function dataBahanDasar($id)
    {
        return DB::table('bahan_dasars')->where('id',$id)->get()->first();
    }

    public function option($id)
    {
        $bahans = DB::table('bahan_dan_kategori')->where('kategori_bahan_id',$id)->get();

        $html = view('bahan_dasar.option-bahan-dasar-by-kategori',compact('bahans'))->render();

        return $html;
    }
}

<?php

namespace App\Http\Controllers;

use DateTimeZone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BahanTambahanProduksi;

class BahanTambahanProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bahan_tambahan_produksis = BahanTambahanProduksi::join('bahan_dasars','bahan_tambahan_produksi.nama_bahan_tambahan_produksi','=','bahan_dasars.id')
                                                ->select('bahan_tambahan_produksi.*','bahan_dasars.nama_bahan')
                                                ->get();
        // return $bahan_tambahan_produksis;
        return view('bahan_tambahan_produksi.index-bahan-tambahan-produksi',compact('bahan_tambahan_produksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bahan_dasars = DB::table('bahan_dasars')->get();
        return view('bahan_tambahan_produksi.create-bahan-tambahan-produksi',compact('bahan_dasars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        BahanTambahanProduksi::create([
            'nama_bahan_tambahan_produksi' => $request->nama_bahan_tambahan_produksi,
            'harga_satuan' => $request->harga_satuan,
            'qty' => $request->qty,
            'jumlah_harga' => $request->jumlah_harga,
            'start_pemakaian' => Carbon::now(new DateTimeZone('Asia/Jakarta')),
            'created_at' => Carbon::now(new DateTimeZone('Asia/Jakarta')),
        ]);

        return redirect()->route('bahan.tambahan.produksi.index');
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
        $bahan_dasars = DB::table('bahan_dasars')->get();
        $bahan_tambahan_produksi = BahanTambahanProduksi::find($id);
        return view('bahan_tambahan_produksi.edit-bahan-tambahan-produksi',compact('bahan_tambahan_produksi','bahan_dasars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        BahanTambahanProduksi::find($id)->update([
            'nama_bahan_tambahan_produksi' => $request->nama_bahan_tambahan_produksi,
            'harga_satuan' => $request->harga_satuan,
            'qty' => $request->qty,
            'jumlah_harga' => $request->jumlah_harga,
        ]);


        return redirect()->route('bahan.tambahan.produksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BahanTambahanProduksi::find($id)->delete();

        return redirect()->route('bahan.tambahan.produksi.index');
    }
}

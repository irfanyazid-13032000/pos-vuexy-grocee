<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::join('warehouses','purchases.warehouse_id','=','warehouses.id')
                                    ->join('kategori_bahan','purchases.kategori_bahan_id','=','kategori_bahan.id')
                                    ->join('bahan_dasars','purchases.bahan_dasar_id','=','bahan_dasars.id')
                                    ->join('satuan','purchases.satuan_id','=','satuan.id')
                                    ->join('vendors','purchases.vendor_id','=','vendors.id')
                                    ->select('purchases.*','warehouses.name_warehouse','kategori_bahan.nama_kategori_bahan','bahan_dasars.nama_bahan','satuan.nama_satuan','vendors.name_vendor')
                                    ->get();
        // return $purchases;
        return view('purchase.index-purchase',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

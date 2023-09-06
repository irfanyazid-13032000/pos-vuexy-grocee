<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransferBahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records_transfer_bahan = DB::table('record_transfer_bahan')
                                                ->join('bahan_dasars','record_transfer_bahan.bahan_dasar_id','=','bahan_dasars.id')
                                                ->join('warehouses','record_transfer_bahan.warehouse_id','=','warehouses.id')
                                                ->join('outlets','record_transfer_bahan.outlet_id','=','outlets.id')
                                                ->select('record_transfer_bahan.*','bahan_dasars.nama_bahan','warehouses.name_warehouse','outlets.name_outlet')
                                                ->get();
        return view('transfer_bahan.index-transfer-bahan',compact('records_transfer_bahan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'create transfer bahan';
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

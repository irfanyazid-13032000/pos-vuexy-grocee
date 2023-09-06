<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Warehouse;
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
        $warehouses = Warehouse::all();
        $outlets = Outlet::all();
        $bahan_dasars = DB::table('bahan_dasars')->get();
        return view('transfer_bahan.create-transfer-bahan',compact('warehouses','outlets','bahan_dasars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request;
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

    public function stockWarehouseSelect($warehouse_id)
    {
        $bahan_dasar_in_warehouse = DB::table('warehouse_stock')
                                    ->join('bahan_dasars','warehouse_stock.bahan_dasar_id','=','bahan_dasars.id')
                                    ->join('satuan','bahan_dasars.satuan_id','=','satuan.id')
                                    ->select('warehouse_stock.*','bahan_dasars.nama_bahan','bahan_dasars.satuan_id','satuan.nama_satuan')
                                    ->where('warehouse_id',$warehouse_id)->get();
        return view('transfer_bahan.select-bahan-dasar-warehouse-stock',compact('bahan_dasar_in_warehouse'));
    }

    public function stockWarehouseData($warehouse_id, $bahan_dasar_id)
    {
        return DB::table('warehouse_stock')->join('bahan_dasars','warehouse_stock.bahan_dasar_id','=','bahan_dasars.id')
                                           ->join('satuan','bahan_dasars.satuan_id','=','satuan.id')
                                           ->select('warehouse_stock.*','bahan_dasars.satuan_id','satuan.nama_satuan')
                                           ->where('warehouse_stock.warehouse_id',$warehouse_id)
                                           ->where('warehouse_stock.bahan_dasar_id',$bahan_dasar_id)
                                           ->first();
    }
}

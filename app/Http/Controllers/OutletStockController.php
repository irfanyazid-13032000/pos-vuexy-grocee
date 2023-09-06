<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutletStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($outlet_id)
    {

        $outlet = Outlet::find($outlet_id);
        
        $outlet_stocks = DB::table('outlet_stock')
                        ->join('bahan_dasars','outlet_stock.bahan_dasar_id','=','bahan_dasars.id')
                        ->select('outlet_stock.*','bahan_dasars.nama_bahan','bahan_dasars.satuan_id')
                        ->where('outlet_id',$outlet_id)->get();
        return view('stock-outlet.index-stock-outlet',compact('outlet_stocks','outlet'));
        // return DB::table('outlet_stock')->where('outlet_id',$outlet_id)->get();
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

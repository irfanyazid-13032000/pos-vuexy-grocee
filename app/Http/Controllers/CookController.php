<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'cook controller';
    }

    public function cookRecord()
    {
        return view('cook.record-cook');
    }

    public function cookProcess()
    {
        return view('cook.process-cook');
        // return 'process';
    }

    public function rawToSemi()
    {
        $raw_foods = DB::table('bahan_baku')->where('status','mentah')->get();
        $warehouses = Warehouse::all();
        // return $warehouses;
        // return $raw_foods;
        return view('cook.cook-process.raw-to-semi',compact('raw_foods','warehouses'));
    }

    public function rawToSemiStore(Request $request)
    {
        // return $request;
        $raws = $request->raw;
        $qtys = $request->qty;

        // untuk pengecekan apakah data yang dientri ada di warehouse
        for ($i=0; $i < count($raws); $i++) { 
            $bahan = DB::table('raw')->where('kode_bahan',$raws['mentah'.$i])
                                     ->where('warehouse_id',$request->warehouse_id)
                                     ->get()->first();
            if (!$bahan) {
            $error = "Data tidak ditemukan untuk kode_bahan: " . $raws['mentah' . $i];
            return response()->json(['error' => $error], 404);
        }

    }
    
    // untuk update data pada table qty
    for ($i=0; $i < count($raws); $i++) { 
        $bahan = DB::table('raw')->where('kode_bahan',$raws['mentah'.$i])
                                     ->where('warehouse_id',$request->warehouse_id)
                                     ->get()->first();
        
        
            DB::table('raw')->where('kode_bahan',$raws['mentah'.$i])
                            ->where('warehouse_id',$request->warehouse_id)
                            ->update([
                'qty'=> $bahan->qty - $qtys['mentah'.$i]
            ]);
    }

}

    public function selectRaw($i)
    {
        $raw_foods = DB::table('bahan_baku')->where('status','mentah')->get();
        $html = view('cook.select-option.raw-select',compact('i','raw_foods'))->render();

        return response()->json($html);
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

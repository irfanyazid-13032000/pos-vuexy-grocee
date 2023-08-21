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
        $raw_foods = DB::table('raw')
                                ->join('bahan_baku','raw.kode_bahan','=','bahan_baku.kode_bahan')
                                ->where('raw.warehouse_id',1)
                                ->get();
        $half_cooked_foods = DB::table('bahan_baku')->where('status','setengah-matang')->get();

        $warehouses = Warehouse::all();
        return view('cook.cook-process.raw-to-semi',compact('raw_foods','warehouses','half_cooked_foods'));
    }

    public function rawToSemiStore(Request $request)
    {
        // return $request;
        $raws = $request->raw;
        $qty_mentah = $request->qtyMentah;
        $prices_mentah = $request->priceMentah;
        $total_price_mentah = $request->totalpriceMentah;

        // setengah matang

        $halfCookeds = $request->halfCooked;
        $qty_setengah_matang = $request->qtySetengahMatang;

        // untuk pengecekan apakah data raw yang dientri ada di warehouse
        for ($i=0; $i < count($raws); $i++) { 
            $bahan = DB::table('raw')->where('kode_bahan',$raws['mentah'.$i])
                                     ->where('warehouse_id',$request->warehouse_id)
                                     ->get()->first();
            
            if (!$bahan) {
            $error = "Data tidak ditemukan untuk kode_bahan: " . $raws['mentah' . $i];
            return response()->json(['error' => $error], 404);
        }

    }

    $total_price_raw = 0;
    
    // untuk update data (dengan syarat : data di warehouse ada semua)
    for ($i=0; $i < count($raws); $i++) { 
        $bahan = DB::table('raw')->where('kode_bahan',$raws['mentah'.$i])
                                     ->where('warehouse_id',$request->warehouse_id)
                                     ->get()->first();
        
        
            DB::table('raw')->where('kode_bahan',$raws['mentah'.$i])
                            ->where('warehouse_id',$request->warehouse_id)
                            ->update([
                'qty'=> $bahan->qty - $qty_mentah['mentah'.$i]
            ]);

            $total_price_raw = $total_price_raw + $bahan->price * $qty_mentah['mentah'.$i];
    }


   

     for ($i=0; $i < count($halfCookeds); $i++) { 
            $bahan = DB::table('half_cooked')->where('kode_bahan',$halfCookeds['setengah_matang'.$i])
                                     ->where('warehouse_id',$request->warehouse_id)
                                     ->get()->first();
            if (!$bahan) {
            $error = "Data tidak ditemukan untuk kode_bahan: " . $halfCookeds['setengah_matang'.$i];
            return response()->json(['error' => $error], 404);
        }
    }


    // untuk update data (dengan syarat : data di warehouse ada semua)
    for ($i=0; $i < count($halfCookeds); $i++) { 
        $bahan = DB::table('half_cooked')->where('kode_bahan',$halfCookeds['setengah_matang'.$i])
                                     ->where('warehouse_id',$request->warehouse_id)
                                     ->get()->first();
        
        
            DB::table('half_cooked')->where('kode_bahan',$halfCookeds['setengah_matang'.$i])
                            ->where('warehouse_id',$request->warehouse_id)
                            ->update([
                'qty'=> $bahan->qty + $qty_setengah_matang['setengah_matang'.$i]
            ]);
    }

    

    DB::table('cooks')->insert([
        'no_reference_cook' => $request->no_reference_cook,
        'chef' => $request->chef,
        'status' => 'raw-to-semi',
        'price' => $total_price_raw
    ]);

    for ($i=0; $i < count($raws); $i++) { 
            DB::table('cook_details')
                    ->insert([
                        'no_reference_cook' => $request->no_reference_cook,
                        'kode_bahan' => $raws['mentah'.$i],
                        'qty' => $qty_mentah['mentah'.$i],
                        'price' => $prices_mentah['mentah'.$i],
                        'total_price' => $total_price_mentah['mentah'.$i],
                        'status' => 'mentah'
                    ]);
    }


    for ($i=0; $i < count($halfCookeds); $i++) { 
            DB::table('cook_details')
                    ->insert([
                        'no_reference_cook' => $request->no_reference_cook,
                        'kode_bahan' => $halfCookeds['setengah_matang'.$i],
                        'qty' => $qty_setengah_matang['setengah_matang'.$i],
                        'price' => 0,
                        'total_price' => 0,
                        'status' => 'setengah-matang'
                    ]);
    }






}

public function dataRaw($code,$warehouse_id)
{
    return DB::table('raw')->where('kode_bahan',$code)->where('warehouse_id',$warehouse_id)->get()->first();
}

    public function selectRaw($i)
    {
        $raw_foods = DB::table('raw')
                        ->join('bahan_baku','raw.kode_bahan','=','bahan_baku.kode_bahan')
                        ->where('warehouse_id',1)
                        ->get();
        // return $raw_foods;
        $html = view('cook.select-option.raw-select',compact('i','raw_foods'))->render();

        return response()->json($html);
    }


    public function selectHalfCooked($i)
    {
        $raw_foods = DB::table('bahan_baku')->where('status','setengah-matang')->get();
        $html = view('cook.select-option.half-cooked-select',compact('i','raw_foods'))->render();

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

<?php

namespace App\Http\Controllers;

use DateTimeZone;
use Carbon\Carbon;
use App\Models\RecordBahan;
use Illuminate\Http\Request;
use App\Models\ProsesProduksi;
use Illuminate\Support\Facades\DB;

class ProsesProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proses_produksis = ProsesProduksi::join('kategori_proses_produksi','proses_produksi.kategori_produksi_id','=','kategori_proses_produksi.id')
                                ->join('menu_masakan','proses_produksi.menu_masakan_id','=','menu_masakan.id')
                                ->select('proses_produksi.*','kategori_proses_produksi.nama_kategori','menu_masakan.nama_menu')
                                ->get();
        // return $proses_produksis;
        return view('proses_produksi.index-proses-produksi',compact('proses_produksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori_proses_produksis = DB::table('kategori_proses_produksi')->get();
        $menu_masakans = DB::table('menu_masakan')->get();
        $warehouses = DB::table('warehouses')->get();
        return view('proses_produksi.create-proses-produksi',compact('kategori_proses_produksis','menu_masakans','warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $menu_masakan_id = $request->menu_masakan_id;

        $masakans = DB::table('food_process')->where('menu_masakan_id',$menu_masakan_id)->get();
        

        foreach ($masakans as $value) {
            RecordBahan::create([
                'kategori_produksi_id' =>$request->kategori_produksi_id,
                'menu_masakan_id' => $value->menu_masakan_id,
                'bahan_dasar_id' => $value->bahan_dasar_id,
                'qty_masakan' => $request->qty,
                'qty_bahan' => $value->qty * $request->qty,
                'price_per_bahan' => $value->harga_satuan,
                'jumlah_cost_per_bahan' => $value->jumlah_harga * $request->qty,
            ]);
        }

        // return $masakan;

        ProsesProduksi::create([
            'kategori_produksi_id' => $request->kategori_produksi_id,
            'menu_masakan_id' => $request->menu_masakan_id,
            'jumlah_cost' => $request->jumlah_cost,
            'qty' => $request->qty,
            'created_at' => Carbon::now(new DateTimeZone('Asia/Jakarta')),
        ]);

        

        return redirect()->route('proses.produksi.index');
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
        $kategori_proses_produksis = DB::table('kategori_proses_produksi')->get();
        $menu_masakans = DB::table('menu_masakan')->get();
        $proses_produksi = ProsesProduksi::find($id);
        // return $proses_produksi;
        return view('proses_produksi.edit-proses-produksi',compact('kategori_proses_produksis','menu_masakans','proses_produksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        ProsesProduksi::find($id)->update([
            'kategori_produksi_id' => $request->kategori_produksi_id,
            'menu_masakan_id' => $request->menu_masakan_id,
            'jumlah_cost' => $request->jumlah_cost,
            'qty' => $request->qty,
            'created_at' => Carbon::now(new DateTimeZone('Asia/Jakarta')),
        ]);

        return redirect()->route('proses.produksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProsesProduksi::find($id)->delete();

        return redirect()->route('proses.produksi.index');
    }


    public function rincianResep($id,$qty)
    {

        $foods_process = DB::table('food_process')
                            ->join('bahan_dasars','food_process.bahan_dasar_id','=','bahan_dasars.id')
                            ->join('satuan','food_process.satuan_id','=','satuan.id')
                            ->where('food_process.menu_masakan_id',$id)
                            ->select('food_process.*','bahan_dasars.nama_bahan','satuan.nama_satuan')
                            ->get();
        // return $foods_process;


        $html = view('proses_produksi.table-rincian-resep',compact('foods_process','qty'))->render();

        return response()->json($html);
    }

    public function stockPurchase($id,$qty,$warehouse_id)
    {
        $food_stock_warehouses = DB::table('food_process')
                                ->leftJoin('purchases', 'food_process.bahan_dasar_id', '=', 'purchases.bahan_dasar_id')
                                ->leftJoin('bahan_dasars', 'food_process.bahan_dasar_id', '=', 'bahan_dasars.id')
                                ->where('purchases.warehouse_id', $warehouse_id)
                                ->where('food_process.menu_masakan_id', $id)
                                ->select('food_process.bahan_dasar_id', 'food_process.qty AS qty_resep', 'purchases.qty AS qty_stock', 'purchases.warehouse_id', 'bahan_dasars.nama_bahan')
                                ->get();

         $foods_process = DB::table('food_process')
                                ->where('food_process.menu_masakan_id',$id)
                                ->get();
        
        $lengkap = (count($food_stock_warehouses) === count($foods_process) ? true : false);
    

        $html = view('proses_produksi.table-stock-warehouse-purchase',compact('food_stock_warehouses','qty','lengkap'))->render();

        return response()->json($html);
    }
}

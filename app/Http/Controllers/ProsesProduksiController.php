<?php

namespace App\Http\Controllers;

use DateTimeZone;
use Carbon\Carbon;
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
        return view('proses_produksi.create-proses-produksi',compact('kategori_proses_produksis','menu_masakans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
}

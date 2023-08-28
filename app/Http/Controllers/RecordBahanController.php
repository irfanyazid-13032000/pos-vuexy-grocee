<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\RecordBahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RecordBahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('record_bahan.index-record-bahan');
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
        DB::table('record_bahan')->where('id',$id)->delete();
        return redirect()->route('record.bahan.index');
    }

    

    public function data(Request $request)
    {
        $query = RecordBahan::join('kategori_proses_produksi', 'record_bahan.kategori_produksi_id', '=', 'kategori_proses_produksi.id')
            ->join('bahan_dasars', 'record_bahan.bahan_dasar_id', 'bahan_dasars.id')
            ->join('menu_masakan', 'record_bahan.menu_masakan_id', '=', 'menu_masakan.id')
            ->select('record_bahan.*', 'kategori_proses_produksi.nama_kategori', 'bahan_dasars.nama_bahan', 'menu_masakan.nama_menu');
    
            // if ($request->has('dateFrom') && $request->has('dateTo')) {
            //     $query->whereRaw("DATE(record_bahan.created_at) >= ? AND DATE(record_bahan.created_at) <= ?", [$request->input('dateFrom'), $request->input('dateTo')]);
            // }

            // if($request->('dateFrom')!=null && $request->has('dateTo')!=null){
            //     $query->whereRaw("DATE(record_bahan.created_at) >= ? AND DATE(record_bahan.created_at) <= ?", [$request->input('dateFrom'), $request->input('dateTo')]);
            // }

            $query->get();
    
        $index = 0; // Initialize index variable
    
        return Datatables::of($query)
            ->addColumn('DT_RowIndex', function ($item) use (&$index) {
                return ++$index;
            })
            ->addColumn('price_per_bahan', function ($item) {
                return 'Rp. ' . number_format($item->price_per_bahan);
            })
            ->addColumn('jumlah_cost_per_bahan', function ($item) {
                return 'Rp. ' . number_format($item->jumlah_cost_per_bahan);
            })
            ->addColumn('created_at', function ($item) {
                return  date("d-m-Y", strtotime($item->created_at));
            })
            ->addColumn('action', function ($item) {
                return '<a href="'.route('record.bahan.delete',['id'=>$item->id]).'" class="btn btn-danger">delete</a>';
            })
            ->toJson();
    }
    

    
    
    
}

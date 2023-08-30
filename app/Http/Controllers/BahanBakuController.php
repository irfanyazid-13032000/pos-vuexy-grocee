<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class BahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bahan_baku.index-bahan-baku');
    }

    public function bahanBakuDatatable()
    {
        $bahan_bakus = DB::table('bahan_baku')->get();

        return DataTables::of($bahan_bakus)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="'.route('bahan.baku.edit',['id'=>$row->id]).'" class="btn btn-primary">edit</a>' .
                        '<a href="'.route('bahan.baku.delete',['id'=>$row->id]).'" onclick="return confirm("apakah anda yakin menghapus data ini?")" class="btn btn-danger">delete</a>';
                })
                ->rawColumns(['action'])
                ->toJson();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bahan_baku.create-bahan-baku');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('bahan_baku')->insert([
            'nama_bahan'=> $request->nama_bahan,
            'kode_bahan'=> $request->kode_bahan,
            'unit'=> $request->unit,
            'status'=> $request->status,
        ]);

        return redirect()->route('bahan.baku.index');
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
        $bahan_baku = DB::table('bahan_baku')->where('id',$id)->get()->first();
        $status_kematangan = ['mentah','setengah-matang','matang'];

        return view('bahan_baku.edit-bahan-baku',compact('bahan_baku','status_kematangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('bahan_baku')
                ->where('id', $id)
                ->update([
                    'kode_bahan' => $request->kode_bahan,
                    'nama_bahan' => $request->nama_bahan,
                    'unit' => $request->unit,
                    'status' => $request->status,
                ]);
        
        return redirect()->route('bahan.baku.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('bahan_baku')
                ->where('id', $id)
                ->delete();
        
        return redirect()->route('bahan.baku.index');
    }
}

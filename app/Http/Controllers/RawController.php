<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RawController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses = Warehouse::all();
        // return $warehouses;
        return view('raw.index',compact('warehouses'));
    }



    public function rawDatatable(Request $request)
    {
    
        // $warehouseId = 1;
        if ($request->input('warehouse_id')) {
            $warehouseId = $request->input('warehouse_id');
        }
        // $warehouseId = $request->input('warehouse_id');

        $raws = DB::table('raw')
                ->join('bahan_baku','raw.kode_bahan','=','bahan_baku.kode_bahan')
                ->when($warehouseId, function ($query) use ($warehouseId) {
                    $query->where('raw.warehouse_id', $warehouseId);
                })
                ->get();

        return DataTables::of($raws)
            ->addIndexColumn()
            ->addColumn('action', function ($raw) use ($warehouseId) {
                return '<a href="'.route('raw.edit',['id'=>$raw->id,'warehouse_id'=>$warehouseId]).'" class="btn btn-primary">edit</a>' .
                       '<a href="#" class="btn btn-danger">delete</a>';
            })
            ->rawColumns(['action'])
            ->toJson();
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

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_warehouse)
    {
        $stocks_warehouse = DB::table('warehouse_stock')
                                    // ->join('warehouses','warehouse_stock.warehouse_id','=','warehouses.id')
                                    ->where('warehouse_stock.warehouse_id',$id_warehouse)
                                    // ->select('warehouse_stock.*','warehouses.name_warehouse')
                                    ->get();
        $warehouse = Warehouse::where('id',$id_warehouse)->get()->first();

        return view('stock-warehouse.index-stock-warehouse',compact('stocks_warehouse','id_warehouse','warehouse'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_warehouse)
    {
        // $products = Product::all();
        return view('stock-warehouse.create-stock-warehouse',compact('id_warehouse'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_warehouse)
    {

        // return $request;
       
        DB::table('warehouse_stock')->insert([
            'code_ingredient' => $request->code_ingredient,
            'warehouse_id' => $id_warehouse,
            'name_ingredient' => $request->name_ingredient,
            'stock' => $request->stock,
            'unit' => $request->unit,
            'price_per_unit' => $request->price_per_unit,
            'total_price' => $request->total_price,
        ]);

        return redirect()->route('warehouse.stock.index',['id_warehouse'=>$id_warehouse]);
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
    public function edit(string $id,$stock_id)
    {
        $warehouse_stock = DB::table('warehouse_stock')->where('warehouse_stock.id',$stock_id)->get()->first();
        // return $warehouse_stock;
        return view('stock-warehouse.edit-stock-warehouse',compact('warehouse_stock','id','stock_id'));
    }


    public function warehouseData($code)
    {
        $warehouse_stock = DB::table('warehouse_stock')->where('code_ingredient',$code)->get()->first();
        return $warehouse_stock;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_warehouse, string $stock_id)
    {
        // return $stock_id;

        DB::table('warehouse_stock')->where('id',$stock_id)->update([
            'code_ingredient' => $request->code_ingredient,
            'name_ingredient' => $request->name_ingredient,
            'stock' => $request->stock,
            'unit' => $request->unit,
            'price_per_unit' => $request->price_per_unit,
            'total_price' => $request->total_price,
        ]);

        return redirect()->route('warehouse.stock.index',['id_warehouse'=>$id_warehouse]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_warehouse, $stock_id)
    {
        DB::table('warehouse_stock')
        ->where('id',$stock_id)
        ->where('warehouse_id',$id_warehouse)
        ->delete();


        return redirect()->route('warehouse.stock.index',['id_warehouse'=>$id_warehouse]);
    }
}

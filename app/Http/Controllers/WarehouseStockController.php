<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
                            ->join('warehouses','warehouses.id','=','warehouse_stock.warehouse_id')
                            ->join('products','products.id','=','warehouse_stock.product_id')
                            ->where('warehouse_stock.warehouse_id',$id_warehouse)
                            ->get();

        $first_data_stock_warehouse = $stocks_warehouse->first();

        // return $stocks_warehouse;

        return view('stock-warehouse.index-stock-warehouse',compact('stocks_warehouse','first_data_stock_warehouse','id_warehouse'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_warehouse)
    {
        $products = Product::all();
        return view('stock-warehouse.create-stock-warehouse',compact('products','id_warehouse'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_warehouse)
    {

        // return $request;
        $updateStock = DB::table('warehouse_stock')
                            ->where('warehouse_id',$id_warehouse)
                            ->where('product_id',$request->id_product)
                            ->get()
                            ->first();
        // return $updateStock;
        if (!$updateStock) {
            DB::table('warehouse_stock')->insert([
                'warehouse_id' => $id_warehouse,
                'product_id' => $request->id_product,
                'stock' => $request->stock,
            ]);
        }else{
            DB::table('warehouse_stock')
            ->where('warehouse_id',$id_warehouse)
            ->where('product_id', $request->id_product)
            ->update([
                'stock' => $updateStock->stock + $request->stock,
            ]);
        }

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
    public function edit(string $id)
    {
        return view('stock-warehouse.edit-stock-warehouse');
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
    public function destroy(string $id_warehouse, $product_id)
    {
        DB::table('warehouse_stock')
        ->where('product_id',$product_id)
        ->where('warehouse_id',$id_warehouse)
        ->delete();


        return redirect()->route('warehouse.stock.index',['id_warehouse'=>$id_warehouse]);
    }
}

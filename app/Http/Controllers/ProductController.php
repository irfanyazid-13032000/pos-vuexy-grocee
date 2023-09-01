<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Product;
use App\Models\Category;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::join('categories','products.category_id','=','categories.id')
                            ->select('products.*', 'categories.name_category')
                            ->get();

        return view('product.index-product',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warehouses = Warehouse::all();
        $categories = Category::all();
        $items = Item::all();
        return view('product.create-product',compact('warehouses','categories','items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // return $request;
        
        $validatedData = $request->validate([
            'name_product' => 'required',
            'warehouse_id' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'code_product' => 'required',
            'stock_product' => 'required',
        ]);
        
        if ($request->hasFile('product_image')) {
            $originalFilename = $request->file('product_image')->getClientOriginalName();
            $filename = pathinfo($originalFilename, PATHINFO_FILENAME); // Mendapatkan nama file tanpa ekstensi
            $extension = $request->file('product_image')->getClientOriginalExtension();
            $newFilename = $filename . '_' . time() . '.' . $extension; // Buat nama baru dengan timestamp
            $imagePath = $request->file('product_image')->storeAs('product_images', $newFilename, 'public');
         }



       Product::create([
        'name_product' => $request->name_product,
        'warehouse_id' => $request->warehouse_id,
        'category_id' => $request->category_id,
        'expired' => '',
        'price' => $request->price,
        'image' => $newFilename,
        'code_product' => $request->code_product,
        'stock_product' => $request->stock_product,
       ]);

        return redirect()->route('product.index')->with('success', 'produk berhasil disimpan.');
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
        $product = Product::find($id);
        $warehouses = Warehouse::all();
        $categories = Category::all();
        return view('product.edit-product',compact('product','warehouses','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{

    $product = Product::find($id);

    if (!$product) {
        // Handle jika produk tidak ditemukan
        return response()->json(['message' => 'Product not found'], 404);
    }

    if ($request->hasFile('product_image')) {
        $originalFilename = $request->file('product_image')->getClientOriginalName();
        $filename = pathinfo($originalFilename, PATHINFO_FILENAME);
        $extension = $request->file('product_image')->getClientOriginalExtension();
        $newFilename = $filename . '_' . time() . '.' . $extension;
        $imagePath = $request->file('product_image')->storeAs('product_images', $newFilename, 'public');

        Storage::disk('public')->delete('product_images/' . $request->oldImage);
        
        

        // Update informasi produk termasuk nama gambar baru
        $product->update([
            'name_product' => $request->name_product,
            'warehouse_id' => $request->warehouse_id,
            'category_id' => $request->category_id,
            'expired' => '',
            'price' => $request->price,
            'image' => $newFilename,
            'stock_product' => $request->stock_product,
        ]);
    } else {
        // Update informasi produk tanpa mengubah gambar
        $product->update([
            'name_product' => $request->name_product,
            'warehouse_id' => $request->warehouse_id,
            'category_id' => $request->category_id,
            'expired' => '',
            'price' => $request->price,
            'image' => $request->oldImage,
            'stock_product' => $request->stock_product
        ]);
    }

    // Berikan respons yang sesuai
    return redirect()->route('product.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        Storage::delete('/storage/product_images/' . $product->image);
        $product->delete();
        

        return redirect()->route('product.index');

    }

    public function addStock($id)
    {
        $product = Product::find($id);
        $warehouses = DB::table('warehouses')->get();
        // return $bahan_dasars = DB::table('bahan_dasars')->get();
        return view('product.add-stock-product',compact('product','warehouses'));
    }

    public function bahanPenyusun($i)
    {
        $bahan_dasars = DB::table('bahan_dasars')->get();
        return view('product.table-bahan-penyusun',compact('i','bahan_dasars'));
    }

    public function awalBahanPenyusun($i)
    {
        $bahan_dasars = DB::table('bahan_dasars')->get();
        return view('product.table-awal-bahan-penyusun',compact('bahan_dasars','i'));
    }
}

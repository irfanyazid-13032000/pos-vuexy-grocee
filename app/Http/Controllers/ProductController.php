<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Warehouse;
use Illuminate\Http\Request;
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
        return view('product.create-product',compact('warehouses','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name_product' => 'required',
            'warehouse_id' => 'required',
            'category_id' => 'required',
            'price' => 'required',
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
        //
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
}

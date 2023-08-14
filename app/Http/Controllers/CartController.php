<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Receipt;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function insert($id)
    {
        $product = Product::find($id);

        // jika product sudah ada di cart
        $checkDuplicationProduct = Cart::where('product_id',$product->id)->first();
        // $qtyProductInCart = $checkDuplicationProduct->qty;
        // dd($checkDuplicationProduct->qty);
        if($checkDuplicationProduct == null){
            Cart::create([
                'generated_card_number' => '34234wr32',
                'product_id' => $product->id,
                'price' => $product->price,
                'qty' => 1,
                'total_price' => $product->price,
            ]);

        }else{

            $checkDuplicationProduct->update([
                'generated_card_number' => '34234wr32',
                'product_id' => $product->id,
                'price' => $product->price,
                'qty' => $checkDuplicationProduct->qty + 1,
                'total_price' => $product->price * ($checkDuplicationProduct->qty + 1),
            ]);

        }


        return redirect()->route('pos.index');
    }


    public function remove($id)
    {
        Cart::find($id)->delete();

        return redirect()->route('pos.index');
    }


    public function checkout()
    {
        $carts = Cart::all();

        foreach ($carts as $key => $cart) {
            Receipt::create([
                'receipt_no' => '34234wr32',
                'product_id'=> $cart->product_id,
                'price' => $cart->price,
                'qty' => $cart->qty,
                'total_price' => $cart->total_price
            ]);
        }

        Cart::truncate();

        return 'hore sudah berhasil checkout';
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

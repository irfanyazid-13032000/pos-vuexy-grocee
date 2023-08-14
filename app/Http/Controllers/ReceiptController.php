<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function print($receipt_no)
    {
        $receipt = Receipt::where('receipt_no',$receipt_no)->get();

        return view('receipt.print-receipt');
    }

    public function submit(Request $request)
    {
        $carts = $request->cart;
        $customer = $request->customer;

        // return $carts;

        foreach ($carts as $key => $value) {
            Receipt::create([
                'receipt_no' => '34234wr32',
                'product_id'=> $key->product_id,
                'price' => $key->price,
                'qty' => $key->qty,
                'total_price' => $key->total_price,
                'customer' => $customer
            ]);
        }

        return 'hore bisa input customer';

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

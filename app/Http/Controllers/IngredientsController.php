<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($code)
    {
        $code_item = $code;
        $item = Item::where('code_item',$code)->first();
        $ingredients = Ingredient::where('code_item',$code)->get();
        return view('ingredient.index-ingredient',compact('ingredients','item','code_item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function ingredientsData($code)
    {
        $data = [
            'item' => Item::where('code_item',$code)->first(),
            'ingredients' => Ingredient::where('code_item',$code)->get(),
            'total_price' => Ingredient::where('code_item',$code)->get()->sum('total_price')
        ];

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$code)
    {
        Ingredient::create([
            'code_item' => $code,
            'code_ingredient' => $request->code_ingredient,
            'name_ingredient' => $request->name_ingredient,
            'qty' => $request->qty,
            'unit' => $request->unit,
            'price_per_unit' => $request->price_per_unit,
            'total_price' => $request->price_per_unit * $request->qty,
        ]);

        return redirect()->route('ingredient.index',['code'=> $code]);
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
    public function edit(string $code,$id)
    {
        // return $id;
        // $ingredient = Ingredient::findOrFail($id);
        // $code_item = $code;

        return view('ingredient.edit-ingredient');
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
    public function destroy(string $code, $id)
    {
        Ingredient::findOrFail($id)->delete();

        return redirect()->route('ingredient.index',['code'=> $code]);
    }
}

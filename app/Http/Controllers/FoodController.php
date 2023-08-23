<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $foods = DB::table('food_process')
        //                 ->join('bahan_dasars','food_process.bahan_dasar_id','=','bahan_dasars.id')
        //                 ->select('food_process.*','bahan_dasars.nama_bahan')
        //                 ->get();
        $menus = DB::table('menu_masakan')->get();
        return view('food.index-food',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bahan_dasars = DB::table('bahan_dasars')->get();
        $satuans = DB::table('satuan')->get();
        return view('food.create-food',compact('bahan_dasars','satuans'));
    }

    public function foodData($id)
    {
        return DB::table('bahan_dasars')->where('id',$id)->get()->first();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        DB::table('menu_masakan')->insert([
            'nama_menu' => $request->nama_menu
        ]);

        return redirect()->route('food');
        // DB::table('food_process')->insert([
        //     'nama_menu_masakan' => $request->nama_menu_masakan,
        //     'bahan_dasar_id' => $request->bahan_dasar_id,
        //     'satuan_id' => $request->satuan_id,
        //     'qty' => $request->qty,
        //     'harga_satuan' => $request->harga_satuan,
        //     'jumlah_harga' => $request->jumlah_harga,
        //     'created_at' => Carbon::now(),
        // ]);
        // return redirect()->route('food');
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
        $food = DB::table('menu_masakan')->where('id',$id)->get()->first();
        return view('food.edit-food',compact('food'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('menu_masakan')->where('id',$id)->update([
            'nama_menu' => $request->nama_menu
        ]);


        return redirect()->route('food');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('menu_masakan')->where('id',$id)->delete();

        return redirect()->route('food');
    }
}

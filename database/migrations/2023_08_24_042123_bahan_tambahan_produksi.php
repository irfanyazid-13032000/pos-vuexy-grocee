<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bahan_tambahan_produksi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bahan_tambahan_produksi');
            $table->integer('satuan');
            $table->integer('qty');
            $table->integer('harga_satuan');
            $table->integer('jumlah_harga');
            $table->integer('start_pemakaian');
            $table->integer('akhir_pemakaian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

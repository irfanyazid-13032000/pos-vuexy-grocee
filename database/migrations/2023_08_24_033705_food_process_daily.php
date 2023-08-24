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
        Schema::create('food_process_daily', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_masakan_id');
            $table->integer('bahan_dasar_id');
            $table->integer('satuan_id');
            $table->integer('qty');
            $table->integer('harga_satuan');
            $table->integer('jumlah_harga');
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

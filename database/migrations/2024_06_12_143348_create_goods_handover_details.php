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
        Schema::create('goods_handover_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('goods_handover_id')->references('id')->on('goods_handovers');
            $table->foreignId('goods_id')->references('id')->on('goods');
            $table->foreignId('unit_id')->references('id')->on('units');
            $table->foreignId('procurement_id')->references('id')->on('procurements');
            $table->string('goods_amount');
            $table->date('tgl_exp_date');
            $table->foreignUuid('pengirim_id')->references('id')->on('pengirims');
            $table->foreignUuid('penerima_id')->references('id')->on('penerimas');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods_handover_details');
    }
};

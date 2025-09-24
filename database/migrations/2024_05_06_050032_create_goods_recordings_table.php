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
        Schema::create('goods_recordings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('goods_id')->references('id')->on('goods');
            $table->integer('goods_entry');
            $table->integer('goods_out');
            $table->date('tgl_exp_date');
            $table->string('description');
            $table->string('sisa_barang');
            $table->string('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods_recordings');
    }
};

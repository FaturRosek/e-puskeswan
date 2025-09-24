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
        Schema::create('goods_supplies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('goods_id')->nullable(false);
            $table->unsignedBigInteger('unit_id')->nullable(false);
            $table->foreignUuid('user_id')->references('id')->on('users');
            $table->integer('stock')->nullable(false);
            $table->foreign('goods_id')->references('id')->on('goods');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->timestamps();
        });
        // Schema::create('goods_supply', function (Blueprint $table) {
        //     $table->uuid('id')->primary();
        //     $table->uuid('goods_id');
        //     $table->unsignedBigInteger('unit_id')->nullable(false);
        //     $table->unsignedBigInteger('warehouse_id')->nullable(false);
        //     $table->integer('stock')->nullable(false);
        //     $table->foreign('goods_id')->references('id')->on('goods');
        //     $table->foreign('unit_id')->references('id')->on('units');
        //     $table->foreign('warehouse_id')->references('id')->on('warehouses');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods_supplies');
    }
};

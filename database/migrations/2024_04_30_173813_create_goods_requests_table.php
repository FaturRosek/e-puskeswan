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
        Schema::create('goods_requests', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('puskeswan_id');
            $table->foreignId('goods_id')->references('id')->on('goods');
            $table->date('request_date');
            $table->string('request_amount');
            $table->string('request_status');
            $table->foreign('puskeswan_id')->references('uuid')->on('puskeswans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods_requests');
    }
};

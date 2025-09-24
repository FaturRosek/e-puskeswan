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
        Schema::create('goods_handovers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('date_received')->nullable(false);
            $table->string('file_bast')->nullable(false);
            $table->string('no_bast')->nullable(false);
            $table->string('description')->nullable(false);
            $table->string('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods_handovers');
    }
};

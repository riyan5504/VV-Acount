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
        Schema::create('raw_matreials', function (Blueprint $table) {
            $table->id();
            $table->string('raw_name')->nullable();
            $table->unsignedBigInteger('pro_id');
            $table->decimal('used_percent', 5, 2)->nullable();
            $table->decimal('used_qty', 8, 3)->nullable();
            $table->decimal('u_price', 10, 2)->nullable();
            $table->decimal('t_price', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raw_matreials');
    }
};

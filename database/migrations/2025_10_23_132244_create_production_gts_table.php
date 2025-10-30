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
        Schema::create('production_gts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pro_id');
            $table->double('grand_total');
            $table->double('final_qty');
            $table->string('final_unit')->nullable();
            $table->double('unit_cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_gts');
    }
};

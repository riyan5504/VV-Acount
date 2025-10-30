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
        Schema::create('production_gps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pro_id');
            $table->double('raw_grand_price')->nullable();
            $table->double('labor_grand_price')->nullable();
            $table->double('pack_grand_price')->nullable();
            $table->double('utility_grand_price')->nullable();
            $table->double('depreciation_grand_price')->nullable();
            $table->double('overhead_grand_price')->nullable();
            $table->double('transport_grand_price')->nullable();
            $table->double('qc_grand_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_gps');
    }
};

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
        Schema::create('sensor_data', function (Blueprint $table) {
            $table->id();
            $table->decimal('lat', 10, 6);
            $table->decimal('lng', 10, 6);
            $table->decimal('speed', 6, 2)->nullable();
            $table->decimal('loadvoltage', 6, 2)->nullable();
            $table->decimal('busvoltage', 6, 2)->nullable();
            $table->decimal('shuntvoltage', 6, 2)->nullable();
            $table->timestamps(); // created_at dan updated_at
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensor_data');
    }
};

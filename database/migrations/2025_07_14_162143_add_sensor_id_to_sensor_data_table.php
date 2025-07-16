<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sensor_data', function (Blueprint $table) {
            $table->unsignedBigInteger('sensor_id')->nullable()->after('id');

            // Jika pakai foreign key
            // $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('sensor_data', function (Blueprint $table) {
            $table->dropColumn('sensor_id');
        });
    }
};

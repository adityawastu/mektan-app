<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('data_alsintans', function (Blueprint $table) {
            // $table->unsignedBigInteger('sensor_id')->nullable()->after('id');

            // Tambahkan foreign key ke tabel 'sensor_data' (bukan 'sensor_data')
            $table->foreign('sensor_id')->references('id')->on('sensor_data')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('data_alsintans', function (Blueprint $table) {
            // Hapus foreign key dulu sebelum drop kolom
            $table->dropForeign(['sensor_id']);
            $table->dropColumn('sensor_id');
        });
    }
};

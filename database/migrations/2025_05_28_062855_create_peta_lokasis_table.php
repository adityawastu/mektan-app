<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // <-- Import DB facade

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peta_lokasis', function (Blueprint $table) {
            $table->id(); // Primary key auto-increment
            $table->string('device_id')->index(); // Foreign key atau ID unik perangkat
            $table->decimal('latitude', 10, 7);  // Total 10 digit, 7 di antaranya di belakang koma
            $table->decimal('longitude', 10, 7); // Total 10 digit, 7 di antaranya di belakang koma
            $table->timestamp('recorded_at')->nullable(); // Waktu data direkam oleh perangkat, bisa null
            $table->timestamps(); // Kolom created_at dan updated_at
            // $table->softDeletes(); // Hilangkan komentar jika Anda ingin menggunakan Soft Deletes
        });

        DB::table('peta_lokasis')->insert([
            [
                'device_id' => 'TRAKTOR_MIG_01',
                'latitude' => -6.9000000,
                'longitude' => 107.6000000,
                'recorded_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'device_id' => 'TRAKTOR_MIG_02',
                'latitude' => -6.9100000,
                'longitude' => 107.6100000,
                'recorded_at' => now()->subMinutes(10),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peta_lokasis');
    }
};

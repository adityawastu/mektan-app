<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\SensorData;
use App\Models\Admin\DataAlsintan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetaLokasiController extends Controller
{
    public function index()
    {
        // Ambil semua alsintan dengan relasi sensor
        $alsintans = DataAlsintan::with('sensor')->get();

        // Filter hanya alat yang aktif dalam 5 menit terakhir
        $activeAlsintans = $alsintans->filter(function ($item) {
            return $item->sensor && $item->sensor->created_at > now()->subMinutes(5);
        });

        return view('admin.asset_management.peta_lokasi.index', compact('activeAlsintans'));
    }

    public function show($sensor_id)
    {
        // Pastikan alat ditemukan berdasarkan sensor_id
        $alat = DataAlsintan::where('sensor_id', $sensor_id)->firstOrFail();

        // Ambil semua data sensor milik alat tersebut
        $dataSensor = SensorData::where('sensor_id', $sensor_id)->orderBy('created_at')->get();

        // Ambil data terbaru
        $latestData = $dataSensor->last();

        // Hitung statistik dari data sensor
        $averageSpeed  = $dataSensor->avg('speed') ?? 0;
        $maxSpeed      = $dataSensor->max('speed') ?? 0;
        $totalDistance = $this->hitungJarak($dataSensor);
        $usageDuration = $this->hitungDurasi($dataSensor);

        return view('admin.asset_management.peta_lokasi.peta_lokasi_alsintan', compact(
            'alat',
            'latestData',
            'averageSpeed',
            'maxSpeed',
            'totalDistance',
            'usageDuration'
        ));
    }

    protected function hitungDurasi($dataSensor)
    {
        $first = $dataSensor->first()?->created_at;
        $last  = $dataSensor->last()?->created_at;

        if (!$first || !$last) return '00:00:00';

        return $first->diff($last)->format('%H:%I:%S');
    }

    protected function hitungJarak($dataSensor)
    {
        $totalDistance = 0;

        for ($i = 1; $i < count($dataSensor); $i++) {
            $lat1 = $dataSensor[$i - 1]->lat;
            $lon1 = $dataSensor[$i - 1]->lng;
            $lat2 = $dataSensor[$i]->lat;
            $lon2 = $dataSensor[$i]->lng;

            $totalDistance += $this->haversine($lat1, $lon1, $lat2, $lon2);
        }

        return $totalDistance;
    }

    private function haversine($lat1, $lon1, $lat2, $lon2)
    {
        $R = 6371; // Radius bumi dalam KM
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $R * $c;
    }
}

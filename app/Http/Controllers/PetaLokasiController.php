<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;

class PetaLokasiController extends Controller
{
    public function index()
    {
        return view('asset_management.peta_lokasi.index');
    }

    public function lokasiAlsintan()
    {
        // Ambil data sensor terakhir
        $latest = SensorData::latest()->first();

        // Kirim data ke view
        return view('asset_management.peta_lokasi.peta_lokasi_alsintan', compact('latest'));
    }
}

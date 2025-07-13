<?php

namespace App\Http\Controllers\Api;

use App\Models\SensorData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class SensorDataController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'lat'       => 'required|numeric',
            'lng'      => 'required|numeric',
            'speed'          => 'required|numeric',
            'loadvoltage'   => 'required|numeric',
            'busvoltage'    => 'required|numeric',
            'shuntvoltage'  => 'required|numeric',
        ]);

        Log::info('Data diterima dari SIM800L:', $validated);
        Log::info('Request masuk:', $request->all());

        // Simpan ke database
        SensorData::create($validated);

        return response()->json([
            'message' => 'Data berhasil disimpan',
            'data' => $validated
        ], 201);
    }
    public function index()
    {
        return response()->json([
            'status' => 'GET berhasil',
            'message' => 'API /sensor method GET aktif'
        ]);
    }
}

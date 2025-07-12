<?php

namespace App\Http\Controllers\Api;

use App\Models\SensorData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SensorDataController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'latitude'       => 'required|numeric',
            'longitude'      => 'required|numeric',
            'speed'          => 'required|numeric',
            'load_voltage'   => 'required|numeric',
            'bus_voltage'    => 'required|numeric',
            'shunt_voltage'  => 'required|numeric',
        ]);

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

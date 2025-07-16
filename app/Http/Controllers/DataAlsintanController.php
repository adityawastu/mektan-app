<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\Category;
use App\Models\SensorData;
use App\Models\DataAlsintan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataAlsintanController extends Controller
{
  public function index()
  {
    // Ambil data alsintan dengan relasi kategori dan merk, pakai pagination
    $alsintansPaginated = DataAlsintan::with(['category', 'merk'])->paginate(10);

    // Transformasi data di dalam paginasi, tambahkan status dan waktu terakhir data sensor
    $alsintansPaginated->getCollection()->transform(function ($item) {
      $latestSensor = \App\Models\SensorData::where('sensor_id', $item->sensor_id)
        ->latest()
        ->first();

      $item->status = ($latestSensor && $latestSensor->created_at > now()->subMinutes(5)) ? 'ON' : 'OFF';
      $item->lastTime = $latestSensor?->created_at;

      return $item;
    });

    return view('asset_management.data_alsintan.index_alsintan', [
      'alsintans' => $alsintansPaginated
    ]);
  }

  public function create()
  {
    $categories = Category::all();
    $merks = Merk::all();
    $sensors = SensorData::select('*')
      ->whereIn('id', function ($query) {
        $query->selectRaw('MAX(id)')
          ->from('sensor_data')
          ->groupBy('sensor_id');
      })->get();


    return view('asset_management.data_alsintan.create_alsintan', compact('categories', 'merks', 'sensors'));
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'name'        => 'required|string|max:255',
      'sensor_id'   => 'nullable|string|exists:sensor_data,sensor_id',
      'category_id' => 'nullable|integer|exists:categories,id',
      'merk_id'     => 'nullable|integer|exists:merks,id',
      'stock'       => 'required|integer|min:0',
      'description' => 'nullable|string',
      'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('alsintan-images', 'public');
    }

    DataAlsintan::create([
      'name'        => $validated['name'],
      'sensor_id'   => $validated['sensor_id'] ?? null,
      'category_id' => $validated['category_id'] ?? null,
      'merk_id'     => $validated['merk_id'] ?? null,
      'stock'       => $validated['stock'],
      'description' => $validated['description'] ?? null,
      'image'       => $imagePath,
    ]);

    return redirect()->route('index_alsintan')->with('success', 'Data berhasil ditambahkan!');
  }

  public function show($id)
  {
    $alsintan = DataAlsintan::with(['category', 'merk', 'serviceHistories'])->findOrFail($id);

    // Ambil data sensor terbaru berdasarkan sensor_id
    $sensor_id = $alsintan->sensor_id;

    $latestData = SensorData::where('sensor_id', $sensor_id)->latest()->first();
    $dataSensor = SensorData::where('sensor_id', $sensor_id)->orderByDesc('created_at')->limit(5)->get();

    // Data GPS untuk tabel
    $gpsData = $dataSensor->map(function ($item) {
      return [
        'time' => $item->created_at->format('Y-m-d H:i:s'),
        'latitude' => $item->latitude,
        'longitude' => $item->longitude,
        'speed' => $item->speed,
      ];
    });

    // Data Sensor INA219 untuk tabel dan grafik
    $sensorData = $dataSensor->map(function ($item) {
      return [
        'time' => $item->created_at->format('Y-m-d H:i:s'),
        'bus' => $item->busvoltage,
        'shunt' => $item->shuntvoltage,
        'load' => $item->loadvoltage,
      ];
    });

    // Untuk Chart.js
    $labels = $sensorData->pluck('time');
    $busVoltages = $sensorData->pluck('bus');
    $loadVoltages = $sensorData->pluck('load');

    return view('asset_management.data_alsintan.show_alsintan', compact(
      'alsintan',
      'latestData',
      'gpsData',
      'sensorData',
      'labels',
      'busVoltages',
      'loadVoltages'
    ));
  }

  public function destroy($id)
  {
    $alsintan = DataAlsintan::findOrFail($id);
    $alsintan->delete();

    return redirect()->route('index_alsintan')->with('success', 'Data berhasil dihapus.');
  }
}

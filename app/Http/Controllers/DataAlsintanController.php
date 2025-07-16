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

    $alsintans = DataAlsintan::with(['category', 'merk'])->paginate(10);

    $latestSensorData = SensorData::latest()->first();

    $status = 'OFF';
    $lastTime = null;

    if ($latestSensorData && $latestSensorData->created_at->gt(now()->subMinutes(5))) {
      $status = 'ON';
      $lastTime = $latestSensorData->created_at;
    }
    return view('asset_management.data_alsintan.index_alsintan', compact('alsintans', 'status', 'lastTime'));
  }
  public function create()
  {
    $categories = Category::all();
    $merks = Merk::all();

    // Ambil ID data terbaru untuk setiap sensor_id
    $latestSensorIds = SensorData::select('sensor_id', DB::raw('MAX(id) as max_id'))
      ->groupBy('sensor_id')
      ->pluck('max_id');

    // Ambil data sensor terbaru berdasarkan max_id
    $sensors = SensorData::whereIn('id', $latestSensorIds)
      ->orderBy('sensor_id', 'asc')
      ->get();

    return view('asset_management.data_alsintan.create_alsintan', compact('categories', 'merks', 'sensors'));
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'name'        => 'required',
      'category_id' => 'nullable|integer',
      'merk_id'     => 'nullable|integer',
      'stock'       => 'required|integer',
      'sensor_id'   => 'required|integer',
      'description' => 'nullable',
      'image'       => 'nullable|image|mimes:jpg,jpeg,png',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('alsintan-images', 'public');
    }

    DataAlsintan::create([
      'name'        => $validated['name'],
      'category_id' => $validated['category_id'],
      'merk_id'     => $validated['merk_id'],
      'stock'       => $validated['stock'],
      'sensor_id'   => $validated['sensor_id'],
      'description' => $validated['description'],
      'image'       => $imagePath,
    ]);

    return redirect()->route('index_alsintan')->with('success', 'Data berhasil ditambahkan!');
  }
  public function show($id)
  {
    $alsintan = DataAlsintan::with(['category', 'merk'])->findOrFail($id);
    $alsintan = DataAlsintan::with('serviceHistories')->findOrFail($id);
    return view('asset_management.data_alsintan.show_alsintan', compact('alsintan'));
  }

  public function destroy($id)
  {
    $alsintan = DataAlsintan::findOrFail($id);
    $alsintan->delete();
    return redirect()->route('index_alsintan')->with('success', 'Data berhasil dihapus.');
  }
}

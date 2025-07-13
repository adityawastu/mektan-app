<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\Category;
use App\Models\DataAlsintan;
use Illuminate\Http\Request;

class DataAlsintanController extends Controller
{
  public function index()
  {
    $alsintans = DataAlsintan::with(['category', 'merk'])->paginate(10);
    return view('asset_management.data_alsintan.index_alsintan', compact('alsintans'));
  }
  public function create()
  {
    $categories = Category::all();
    $merks = Merk::all();
    return view('asset_management.data_alsintan.create_alsintan', compact('categories', 'merks'));
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'name'        => 'required',
      'category_id' => 'nullable|integer',
      'merk_id'     => 'nullable|integer',
      'stock'       => 'required|integer',
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
}

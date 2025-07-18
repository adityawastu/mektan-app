<?php

namespace App\Http\Controllers;

use App\Models\DataAlsintan;
use App\Models\Category;
use App\Models\SensorData;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Total semua Alsintan
        $totalAlsintan = DataAlsintan::count();

        // Ambil semua alsintan yang punya data sensor terbaru dalam 5 menit terakhir
        $runningAlsintan = DataAlsintan::whereHas('sensor', function ($query) {
            $query->where('created_at', '>=', now()->subMinutes(5));
        })->count();

        // Ambil data kategori untuk chart
        $kategoriData = DataAlsintan::with('category')
            ->get()
            ->groupBy(function ($item) {
                return $item->category->name ?? 'Tidak Ada Kategori';
            })
            ->map(function ($group) {
                return $group->count();
            });

        // Siapkan data untuk chart.js
        $labels = $kategoriData->keys();
        $data = $kategoriData->values();

        return view('dashboard.index', compact(
            'totalAlsintan',
            'runningAlsintan',
            'labels',
            'data'
        ));
    }
}

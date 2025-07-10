<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DataAlsintan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAlsintan = DataAlsintan::count();

        // Ambil jumlah alsintan per kategori
        $categories = Category::withCount('alsintans')->get();
        $labels = $categories->pluck('name');
        $data = $categories->pluck('alsintans_count');

        return view('dashboard.index', compact('totalAlsintan', 'labels', 'data'));
    }
}

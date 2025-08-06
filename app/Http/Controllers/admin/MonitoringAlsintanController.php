<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MonitoringAlsintanController extends Controller
{
    public function index()
    {
        return view('admin.asset_management.monitoring_aktivitas');
    }
}

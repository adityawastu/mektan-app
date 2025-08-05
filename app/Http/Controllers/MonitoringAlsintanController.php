<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitoringAlsintanController extends Controller
{
    public function index()
    {
        return view('admin.asset_management.monitoring_aktivitas');
    }
}

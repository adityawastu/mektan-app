<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetaLokasiController extends Controller
{
    public function index()
    {
        return view('asset_management.peta_lokasi.index');
    }

    public function lokasiAlsintan()
    {
        return view('asset_management.peta_lokasi.peta_lokasi_alsintan');
    }
}

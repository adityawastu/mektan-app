<?php

namespace App\Http\Controllers;

use App\Models\DataAlsintan;
use Illuminate\Http\Request;
use App\Models\ServiceHistory;

class ServiceHistoryController extends Controller
{
    public function create($id)
    {
        $alsintan = DataAlsintan::findOrFail($id);
        return view('asset_management.data_alsintan.service_history.create_history', compact('alsintan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'data_alsintan_id'   => 'required|exists:data_alsintans,id',
            'service_datetime'   => 'required|date',
            'pic'                => 'required|string|max:255',
            'mechanic'           => 'required|string|max:255',
            'notes'              => 'nullable|string',
        ]);

        ServiceHistory::create($validated);

        return redirect()->route('alsintan.show', $validated['data_alsintan_id'])
            ->with('success', 'Riwayat servis berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $service = ServiceHistory::findOrFail($id);
        $alsintan_id = $service->data_alsintan_id;

        $service->delete();

        return redirect()->route('alsintan.show', $alsintan_id)
            ->with('success', 'Riwayat servis berhasil dihapus.');
    }
}

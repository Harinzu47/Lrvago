<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'file' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Simpan file
        $filePath = $request->file('file')->store('laporans');

        // Buat laporan baru
        $laporan = Laporan::create([
            'order_id' => $request->order_id,
            'file_path' => $filePath,
            'status' => 'pending',
        ]);

        return response()->json(['message' => 'Laporan berhasil dibuat', 'laporan' => $laporan], 201);
    }

    public function validateLaporan($id)
    {
        $laporan = Laporan::findOrFail($id);

        // Cek apakah user memiliki izin (misal, role owner)
        if (Auth::user()->role !== 'owner') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $laporan->update(['status' => 'validated']);

        return response()->json(['message' => 'Laporan berhasil divalidasi']);
    }
}


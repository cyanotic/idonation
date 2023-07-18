<?php

namespace App\Http\Controllers;

use App\Models\DaftarDonasi;
use Illuminate\Http\Request;
use App\Models\Donasi;
use App\Models\Kategori;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function index()
    {
        $usersByTotalDonasi = Donasi::select('user_id')
            ->selectRaw('SUM(jumlah) as total_donasi')
            ->groupBy('user_id')
            ->orderByDesc('total_donasi')
            ->get();
        return \view('dashboard', [
            'data' => $usersByTotalDonasi,
            'user' => User::count(),
            'kategori' => Kategori::count(),
            'daftar' => DaftarDonasi::count()
        ]);
    }

    public function grafik()
    {
        $data = DaftarDonasi::selectRaw("kategori_id, DATE_FORMAT(updated_at, '%Y-%m') AS month, SUM(total_donasi) AS total_donasi_per_month")
            ->groupBy('kategori_id', 'month')
            ->orderBy('month')
            ->get();

        // Format data untuk Chart.js
        $chartData = [];
        foreach ($data as $donasi) {
            $chartData[$donasi->kategori_donasi]['labels'][] = $donasi->kategori->kategori;
            $chartData[$donasi->kategori_donasi]['data'][] = $donasi->total_donasi_per_month;
        }

        return response()->json($chartData);
    }


public function filterDonasi(Request $request)
{
    $bulan = $request->bulan;
    $tahun = \date('Y');

    $startDate = Carbon::createFromDate($tahun, $bulan, 1)->startOfMonth();
    $endDate = Carbon::createFromDate($tahun, $bulan, 1)->endOfMonth();

    // Query pertama untuk mendapatkan total donasi pada bulan yang dipilih
    $totalDonasi = Donasi::whereBetween('created_at', [$startDate, $endDate])
        ->sum('jumlah');

    // Query kedua untuk mendapatkan jumlah data per status pada bulan yang dipilih
    $jumlahPending = Donasi::whereBetween('created_at', [$startDate, $endDate])
        ->where('status', 'pending')
        ->count();

    $jumlahSettlement = Donasi::whereBetween('created_at', [$startDate, $endDate])
        ->where('status', 'settlement')
        ->count();

    $jumlahExpired = Donasi::whereBetween('created_at', [$startDate, $endDate])
        ->where('status', 'expire')
        ->count();

    return [
        'total_donasi' => $totalDonasi,
        'jumlah_pending' => $jumlahPending,
        'jumlah_settlement' => $jumlahSettlement,
        'jumlah_expired' => $jumlahExpired,
    ];
}

}

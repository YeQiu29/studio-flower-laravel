<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $startOfMonth = Carbon::now()->startOfMonth();

        // --- 1. Data untuk Card (Ini tetap sama) ---
        $dailyVisitors = Visitor::where('visit_date', $today)->count();
        $monthlyVisitors = Visitor::where('visit_date', '>=', $startOfMonth)->count();

        // --- 2. Data untuk Chart (Satu Grup: Total Visitors) ---

        // Ambil data pengunjung 30 hari terakhir
        // pluck() akan mengubah hasil DB menjadi [ '2025-11-13' => 12, '2025-11-14' => 5, ... ]
        $visitorsData = Visitor::select(DB::raw('DATE(visit_date) as date'), DB::raw('count(*) as views'))
            ->where('visit_date', '>=', Carbon::now()->subDays(29)) // 30 hari (termasuk hari ini)
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get()
            ->pluck('views', 'date');

        // Buat "Template" 30 hari (untuk mengisi hari yang 0 pengunjung)
        $dateRange = [];
        $labels = [];
        for ($i = 29; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $dateRange[$date->format('Y-m-d')] = 0; // Kunci: '2025-11-13' => 0
            $labels[] = $date->format('M d');      // Label: 'Nov 13'
        }

        // Gabungkan data template (0) dengan data asli dari database
        // Nilai 0 akan ditimpa jika ada data pengunjung pada hari itu
        $mergedData = array_merge($dateRange, $visitorsData->all());

        // Siapkan chartData untuk dikirim ke View
        $chartData = [
            'labels' => $labels,
            'data'   => array_values($mergedData), // array_values() mengubah [ 'key' => 5 ] menjadi [ 5 ]
        ];

        // 3. Kirim ke View
        return view('dashboard', [ // Pastikan nama view ini benar (mungkin 'admin.dashboard'?)
            'dailyVisitors'   => $dailyVisitors,
            'monthlyVisitors' => $monthlyVisitors,
            'chartData'       => $chartData,
        ]);
    }
}
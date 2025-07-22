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

        $dailyVisitors = Visitor::where('visit_date', $today)->count();
        $monthlyVisitors = Visitor::where('visit_date', '>=', $startOfMonth)->count();

        $visitorsLast30Days = Visitor::select(DB::raw('DATE(visit_date) as date'), DB::raw('count(*) as views'))
            ->where('visit_date', '>=', Carbon::now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        $chartData = [];
        foreach ($visitorsLast30Days as $visitor) {
            $chartData['labels'][] = Carbon::parse($visitor->date)->format('M d');
            $chartData['data'][] = $visitor->views;
        }

        return view('dashboard', [
            'dailyVisitors' => $dailyVisitors,
            'monthlyVisitors' => $monthlyVisitors,
            'chartData' => $chartData,
        ]);
    }
}
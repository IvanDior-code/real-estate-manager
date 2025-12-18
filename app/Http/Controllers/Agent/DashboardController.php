<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $properties = $user->properties()->count();
        $propertiesActive = $user->properties()->where('is_approved', true)->count();
        $messages = $user->receivedMessages()->count(); // Assuming relationship exists

        // Chart: User's properties over time
        $propertiesChart = $user->properties()
            ->selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%Y-%m") as month_year')
            ->groupBy('month_year')
            ->orderBy('month_year', 'asc')
            ->take(6)
            ->get();

        $months = $propertiesChart->pluck('month_year')->map(function($date) {
            return \Carbon\Carbon::parse($date)->format('M Y');
        });
        $monthCounts = $propertiesChart->pluck('count');

        return view('agent.dashboard', compact('properties', 'propertiesActive', 'messages', 'months', 'monthCounts'));
    }
}

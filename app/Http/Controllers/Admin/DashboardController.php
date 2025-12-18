<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $propertycount is redundant as we calculate $properties below
        
        $agents = \App\Models\User::whereHas('roles', function($q){ $q->where('name', 'agent'); })->count();
        $properties = \App\Models\Property::count();
        $posts = \App\Models\Post::count();
        $categories = \App\Models\Category::count();

        // Chart Data: Properties added per month for the last 6 months
        $propertiesChart = \App\Models\Property::selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%Y-%m") as month_year') // MySQL syntax
            ->groupBy('month_year')
            ->orderBy('month_year', 'asc')
            ->take(6)
            ->get();
        
        $months = $propertiesChart->pluck('month_year')->map(function($date) {
            return \Carbon\Carbon::parse($date)->format('M Y');
        });
        $monthCounts = $propertiesChart->pluck('count');

        return view('admin.dashboard', compact('agents', 'properties', 'posts', 'categories', 'months', 'monthCounts'));
    }
}

<?php

use App\Models\TamuModel;
use Carbon\Carbon;

if (!function_exists('tamuharian')) {
    function tamuharian()
    {
        $results = TamuModel::whereDay('created_at', now()->day)->count();
        return $results;
    }
}

if (!function_exists('tamumingguan')) {
    function tamumingguan()
    {
        // Get the date 7 days ago from now
        $sevenDaysAgo = Carbon::now()->subDays(6);

        // Get the current date
        $currentDate = Carbon::now()->copy()->addDay();

        // Count records where the created_at date is within the last 7 days
        $results = TamuModel::whereBetween('created_at', [$sevenDaysAgo, $currentDate])->count();

        return $results;
    }
}

if (!function_exists('tamubulanan')) {
    function tamubulanan()
    {
        $results = TamuModel::whereMonth('created_at', now()->month)->count();
        return $results;
    }
}

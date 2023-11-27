<?php

use App\Models\TamuModel;
use Carbon\Carbon;

if (!function_exists('tamuharian')) {
    function tamuharian()
    {
        // Reset data tamu pada tengah malam
        if (now()->hour == 0 && now()->minute == 0) {
            // Reset semua data tamu
            TamuModel::truncate();
        }

        // Menghitung jumlah tamu pada hari ini
        $results = TamuModel::whereDay('created_at', now()->day)->count();

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

if (!function_exists('tamutahunan')) {
    function tamutahunan()
    {
        $results = TamuModel::whereYear('created_at', now()->year)->count();
        return $results;
    }
}

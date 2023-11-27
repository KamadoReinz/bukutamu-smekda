<?php

namespace App\Http\Controllers;

use App\Models\TamuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BulananController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Data Bulanan';
        $bulananTamu = TamuModel::select(
            DB::raw('COUNT(id) as data'),
            DB::raw("DATE_FORMAT(created_at, '%m-%Y') as new_date"),
            DB::raw('YEAR(created_at) as year, MONTH(created_at) as month')
        )
            ->groupBy('year', 'month', 'new_date')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();
    
        return view('bulanan.list', compact('bulananTamu'), $data);
    }
    

    public function show($bulan)
    {
        $data['header_title'] = 'Detail Bulanan';
        $date = explode('-', $bulan);
        $date_bulan = $date[0];
        $date_tahun = $date[1];
    
        $dataTamu = TamuModel::whereMonth('created_at', $date_bulan)
            ->whereYear('created_at', $date_tahun)
            ->get();
    // $dataTamu->each(function ($tamu) {
    //     $data['getRecord'] = TamuModel::getTamu();
    //     $data['header_title'] = 'List Tamu';
    // });
        
        return view('bulanan.show', compact('dataTamu'), $data);
    }
    

    public function cetak($bulan)
    {
        $date = explode('-', $bulan);
        $date_bulan = $date[0];
        $date_tahun = $date[1];
    
        $namaBulanIndonesia = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
    
        $dataTamu = TamuModel::whereMonth('created_at', $date_bulan)
            ->whereYear('created_at', $date_tahun)
            ->get();
    
        // $data['getRecord'] = TamuModel::getTamu();
        // $data['header_title'] = 'List Tamu';
        

        $pdf = app('dompdf.wrapper')->loadView('bulanan.ekspor', [
            'dataTamu' => $dataTamu,
        ]);
        $namaBulan = $namaBulanIndonesia[$date_bulan - 1];
        $filename = "Data Tamu Bulan $namaBulan SMKN 2 Purwakarta.pdf";

        return $pdf->download($filename);

    }
}

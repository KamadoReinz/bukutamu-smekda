<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TamuModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    public function simpanTamu(Request $request)
    {
        Carbon::setLocale('id_ID');
        Carbon::setToStringFormat('d F Y H:i:s');

        $tanggal = Carbon::now()->setTimezone('Asia/Jakarta');

        $nama = $request->nama;
        $alamat = $request->alamat;
        $tujuan = $request->tujuan;

        $data = new TamuModel();
        $data->nama = $nama;
        $data->alamat = $alamat;
        $data->tujuan = $tujuan;
        $data['created_at'] = $tanggal;
        $data->save();

        notify()->success('Tamu Berhasil Ditambahkan', 'Berhasil');
        return redirect()->back()->with('status');
    }
}

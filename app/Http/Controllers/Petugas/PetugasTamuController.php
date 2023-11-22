<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\TamuModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PetugasTamuController extends Controller
{
    public function list()
    {
        $data['getTamu'] = TamuModel::getTamu();
        $data['header_title'] = 'Data Tamu';
        return view('petugas.tamu.list', $data);
    }

    public function insert(Request $request)
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
        return redirect()->route('petugas.tamu.list')->with('success');
    }

    public function update(Request $request)
    {
        Carbon::setLocale('id_ID');
        Carbon::setToStringFormat('d F Y H:i:s');

        $tanggal = Carbon::now()->setTimezone('Asia/Jakarta');

        $id = $request->id;
        $nama = $request->nama;
        $alamat = $request->alamat;
        $tujuan = $request->tujuan;

        $data = TamuModel::find($id);
        $data->nama = $nama;
        $data->alamat = $alamat;
        $data->tujuan = $tujuan;
        $data['updated_at'] = $tanggal;
        $data->update();

        notify()->success('Tamu Berhasil Diubah', 'Berhasil');
        return redirect()->route('petugas.tamu.list')->with('success');
    }

    public function delete($id)
    {
        $data = TamuModel::find($id);
        $data->delete();

        notify()->success('Tamu Berhasil Dihapus', 'Berhasil');
        return redirect()->route('petugas.tamu.list')->with('success');
    }
}

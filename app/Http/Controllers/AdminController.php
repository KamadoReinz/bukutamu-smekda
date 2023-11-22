<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = 'Data Pengguna';
        return view('admin.user.list', $data);
    }

    public function insert(Request $request)
    {
        Carbon::setLocale('id_ID');
        Carbon::setToStringFormat('d F Y H:i:s');

        $tanggal = Carbon::now()->setTimezone('Asia/Jakarta');
        
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->role = 2;
        $user['created_at'] = $tanggal;
        $user->save();

        notify()->success('User Berhasil Ditambahkan', 'Berhasil');
        return redirect()->route('user.list')->with('success');
    }

    public function update($id, Request $request)
    {
        Carbon::setLocale('id_ID');
        Carbon::setToStringFormat('d F Y H:i:s');

        $tanggal = Carbon::now()->setTimezone('Asia/Jakarta');
        
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if (!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        $user['updated_at'] = $tanggal;

        $user->save();

        notify()->success('User Berhasil Diubah', 'Berhasil');
        return redirect()->route('user.list')->with('success');
    }

    public function delete($id)
    {
        $user = User::getSingle($id);
        $user->delete();

        notify()->success('User Berhasil Dihapus', 'Berhasil');
        return redirect()->route('user.list')->with('success');
    }
}

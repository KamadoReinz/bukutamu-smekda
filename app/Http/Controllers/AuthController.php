<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        // dd(Hash::make('petugas'));
        if (!empty(Auth::check()))
        {
            if (Auth::user()->role == 1)
            {
                return redirect('admin/dashboard');
            }
            elseif (Auth::user()->role == 2)
            {
                return redirect('petugas/dashboard');
            }
        }
        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            if (Auth::user()->role == 1)
            {
                notify()->success('Selamat Datang di Buku Tamu Smekda', 'Berhasil');
                return redirect('admin/dashboard');
            }
            elseif (Auth::user()->role == 2)
            {
                notify()->success('Selamat Datang di Buku Tamu Smekda', 'Berhasil');
                return redirect('petugas/dashboard');
            }
        }
        else
        {
            notify()->error('Masukkan nama dan kata sandi Anda dengan benar', 'Gagal');
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function forgotpassword()
    {
        return view('auth.forgot');
    }

    public function PostForgotPassword(Request $request)
    {
        $user = User::getEmailSingle($request->email);
        if (!empty($user))
        {
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            notify()->success('Silahkan Periksa Email dan Atur Ulang Kata Sandi Anda', 'Berhasil');
            return back();
        }
        else
        {
            notify()->error('Email Tidak Ditemukan', 'Gagal');
            return back();
        }
    }

    public function reset($remember_token)
    {
        $user = User::getTokenSingle($remember_token);
        if (!empty($user))
        {
            $data['user'] = $user;
            return view('auth.reset', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function PostReset(Request $request, $remember_token)
    {
        if ($request->password == $request->cpassword)
        {
            $user = User::getTokenSingle($remember_token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            notify()->success('Kata Sandi Berhasil Diatur', 'Berhasil');
            return redirect()->route('login')->with('success');
        }
        else
        {
            notify()->error('Kata Sandi Tidak Sama', 'Gagal');
            return back();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Slide;
use App\Models\Berita;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('login');
    }
    public function showlogin()
    {
        if (Auth::check()) {
            if (Auth::user()->hasRole('superadmin')) {
                return redirect('/beranda');
            }
        } else {
            return view('login');
        }
    }

    public function login(Request $req)
    {
        if (Auth::attempt(['username' => $req->username, 'password' => $req->password], true)) {
            if (Auth::user()->hasRole('superadmin')) {
                return redirect('/beranda');
            }
        } else {
            toastr()->error('Username / Password Tidak Ditemukan');
            $req->flash();
            return back();
        }
    }
}

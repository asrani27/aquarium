<?php

namespace App\Http\Controllers;

use App\Models\Pakan;

class BerandaController extends Controller
{
    public function index()
    {
        $pakan = Pakan::where('active', 1)->first();

        return view('superadmin.beranda', compact('pakan'));
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Home;
use App\Models\Lampu;
use App\Models\Pakan;

class BerandaController extends Controller
{
    public function index()
    {
        $pakan = Pakan::where('active', 1)->first();

        $suhu = Home::first() == null ? 0 : Home::first()->suhu;
        $tinggi = Home::first() == null ? 0 : Home::first()->tinggi_air;
        $kipas = Home::first() == null ? 0 : Home::first()->kipas;


        $jam_lampu = Lampu::where('active', 1)->first();
        $now = Carbon::now();
        $start1 = Carbon::createFromTimeString($jam_lampu->light1_start);
        $end1 = Carbon::createFromTimeString($jam_lampu->light1_end);

        $start2 = Carbon::createFromTimeString($jam_lampu->light2_start);
        $end2 = Carbon::createFromTimeString($jam_lampu->light2_end);
        if ($now->between($start1, $end1) || $now->between($start2, $end2)) {
            $lampu = 'NYALA';
        } else {
            $lampu = 'MATI';
        }

        return view('superadmin.beranda', compact('pakan', 'suhu', 'tinggi', 'kipas', 'lampu'));
    }
}

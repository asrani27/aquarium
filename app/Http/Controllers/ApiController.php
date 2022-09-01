<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Home;
use App\Models\Lampu;
use App\Models\Pakan;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function updateSuhu($value)
    {
        Home::first()->update([
            'suhu' => $value,
        ]);

        return response()->json('sukses');
    }

    public function updateTinggiair($value)
    {
        Home::first()->update([
            'tinggi_air' => $value,
        ]);

        return response()->json('sukses');
    }

    public function lampu()
    {
        $jam_lampu = Lampu::where('active', 1)->first();
        $now = Carbon::now();
        $start1 = Carbon::createFromTimeString($jam_lampu->light1_start);
        $end1 = Carbon::createFromTimeString($jam_lampu->light1_end);

        $start2 = Carbon::createFromTimeString($jam_lampu->light2_start);
        $end2 = Carbon::createFromTimeString($jam_lampu->light2_end);
        if ($now->between($start1, $end1) || $now->between($start2, $end2)) {
            $lampu = 1;
        } else {
            $lampu = 0;
        }
        $data = $lampu;
        return response()->json($data);
    }

    public function kipas()
    {
        $data = Home::first()->kipas == 1 ? 'NYALA' : 'MATI';
        return response()->json($data);
    }

    public function kipasNyala()
    {
        $data = Home::first()->update(['kipas' => 1]);
        return response()->json($data);
    }

    public function kipasMati()
    {
        $data = Home::first()->update(['kipas' => 0]);
        return response()->json($data);
    }

    public function pakan()
    {
        $jam = Carbon::now()->format('H:i:s');
        $pakan = Pakan::where('active', 1)->first();

        if ($jam == $pakan->food1) {
            $data = 'on';
        } elseif ($jam == $pakan->food2) {
            $data = 'on';
        } elseif ($jam == $pakan->food3) {
            $data = 'on';
        } else {
            $data = 'off';
        }
        return response()->json($data);
    }
}

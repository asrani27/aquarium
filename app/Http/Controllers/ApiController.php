<?php

namespace App\Http\Controllers;

use App\Models\Home;
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
        $data = Lampu::where('active', 1)->get();
        return response()->json('sukses');
    }

    public function kipas()
    {
        $data = Home::first();
        return response()->json('sukses');
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lampu;
use Illuminate\Http\Request;

class LampuController extends Controller
{
    public function lampuaktif($id)
    {
        $check = Lampu::where('active', 1)->first();
        if ($check == null) {
            Lampu::find($id)->update(['active' => 1]);
            toastr()->success('Berhasil diaktifkan');
        } else {
            Lampu::where('active', 1)->first()->update(['active' => 0]);
            Lampu::find($id)->update(['active' => 1]);
            toastr()->success('Berhasil diaktifkan');
        }
        return redirect('/lampu');
    }

    public function lampu()
    {
        $data = Lampu::orderBy('id', 'DESC')->get();
        return view('superadmin.lampu.index', compact('data'));
    }
    public function lampucreate()
    {
        return view('superadmin.lampu.create');
    }
    public function lampustore(Request $req)
    {
        $attr = $req->all();

        $today = Carbon::now()->format('Y-m-d');
        $startTime = Carbon::parse($today . ' ' . $req->light1_start . ':00');
        $finishTime = Carbon::parse($today . ' ' . $req->light1_end . ':00');


        if ($startTime > $finishTime) {
            toastr()->error('jam mulai tidak boleh lebih dari jam selesai');
            return back();
        } else {

            $hours = $finishTime->diffInHours($startTime);
            $minutes = $finishTime->diffInMinutes($startTime);
            $seconds = $finishTime->diffInSeconds($startTime);
            if ($minutes > 480) {
                toastr()->error('tidak bisa lebih dari 8 jam / 480Menit');
                return back();
            } else {
                Lampu::create($attr);
                toastr()->success('Berhasil disimpan');
                return redirect('/lampu');
            }
        }
    }
    public function lampuedit($id)
    {
        $data = Lampu::find($id);
        return view('superadmin.lampu.edit', compact('data'));
    }
    public function lampuupdate(Request $req, $id)
    {

        $attr = $req->all();

        $today = Carbon::now()->format('Y-m-d');
        $startTime = Carbon::parse($today . ' ' . $req->light1_start . ':00');
        $finishTime = Carbon::parse($today . ' ' . $req->light1_end . ':00');


        if ($startTime > $finishTime) {
            toastr()->error('jam mulai tidak boleh lebih dari jam selesai');
            return back();
        } else {

            $hours = $finishTime->diffInHours($startTime);
            $minutes = $finishTime->diffInMinutes($startTime);
            $seconds = $finishTime->diffInSeconds($startTime);
            if ($minutes > 480) {
                toastr()->error('tidak bisa lebih dari 8 jam / 480Menit');
                return back();
            } else {
                Lampu::find($id)->update($attr);
                toastr()->success('Berhasil disimpan');
                return redirect('/lampu');
            }
        }
    }
    public function lampudelete($id)
    {
        if (Lampu::find($id)->active == 1) {
            toastr()->error('Tidak bisa di hapus karena aktive');
            return back();
        } else {
            try {
                Lampu::find($id)->delete();
                toastr()->success('Berhasil dihapus');
                return back();
            } catch (\Exception $e) {
                toastr()->error('Tidak bisa di hapus karena ada relasi dengan data lain');
                return back();
            }
        }
    }
}

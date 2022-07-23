<?php

namespace App\Http\Controllers;

use App\Models\Pakan;
use Illuminate\Http\Request;

class PakanController extends Controller
{
    public function pakanaktif($id)
    {
        $check = Pakan::where('active', 1)->first();
        if ($check == null) {
            Pakan::find($id)->update(['active' => 1]);
            toastr()->success('Berhasil diaktifkan');
        } else {
            Pakan::where('active', 1)->first()->update(['active' => 0]);
            Pakan::find($id)->update(['active' => 1]);
            toastr()->success('Berhasil diaktifkan');
        }
        return redirect('/pakan');
    }

    public function pakan()
    {
        $data = Pakan::orderBy('id', 'DESC')->get();
        return view('superadmin.pakan.index', compact('data'));
    }
    public function pakancreate()
    {
        return view('superadmin.pakan.create');
    }
    public function pakanstore(Request $req)
    {
        $attr = $req->all();

        Pakan::create($attr);
        toastr()->success('Berhasil disimpan');
        return redirect('/pakan');
    }
    public function pakanedit($id)
    {
        $data = Pakan::find($id);
        return view('superadmin.pakan.edit', compact('data'));
    }
    public function pakanupdate(Request $req, $id)
    {
        $attr = $req->all();
        Pakan::find($id)->update($attr);
        toastr()->success('Berhasil disimpan');
        return redirect('/pakan');
    }
    public function pakandelete($id)
    {
        if (Pakan::find($id)->active == 1) {
            toastr()->error('Tidak bisa di hapus karena aktive');
            return back();
        } else {
            try {
                Pakan::find($id)->delete();
                toastr()->success('Berhasil dihapus');
                return back();
            } catch (\Exception $e) {
                toastr()->error('Tidak bisa di hapus karena ada relasi dengan data lain');
                return back();
            }
        }
    }
}

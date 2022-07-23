<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TentangController extends Controller
{
    public function tentang()
    {
        $data = Tentang::orderBy('id', 'DESC')->get();
        return view('superadmin.tentang.index', compact('data'));
    }
    public function tentangcreate()
    {
        return view('superadmin.tentang.create');
    }
    public function tentangstore(Request $req)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($req->all(), [
                'file' => 'mimes:jpg,jpeg,png|max:10256'
            ]);

            if ($validator->fails()) {
                toastr()->error('File Harus Berupa JPG/PNG max 10MB');
                return back();
            }

            if ($req->hasFile('gambar')) {
                $filename = $req->gambar->getClientOriginalName();
                $filename = date('d-m-Y-') . rand(1, 9999) . $filename;
                $req->gambar->storeAs('/public/tentang', $filename);
            }

            $n = new Tentang;
            $n->gambar = $filename;
            $n->nama = $req->nama;
            $n->nim = $req->nim;
            $n->kelas = $req->kelas;
            $n->email = $req->email;
            $n->save();

            DB::commit();
            toastr()->success('Berhasil Di Simpan');
            return redirect('/tentang');
        } catch (\Exception $e) {

            DB::rollback();
            toastr()->error('Kegagalan Sistem');
            return back();
        }
    }
    public function tentangedit($id)
    {
        $data = Tentang::find($id);
        return view('superadmin.tentang.edit', compact('data'));
    }
    public function tentangupdate(Request $req, $id)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($req->all(), [
                'file' => 'mimes:jpg,jpeg,png|max:10256'
            ]);

            $data = Tentang::find($id);

            if ($validator->fails()) {
                toastr()->error('File Harus Berupa JPG/PNG max 10MB');
                return back();
            }

            if ($req->hasFile('gambar')) {
                $filename = $req->gambar->getClientOriginalName();
                $filename = date('d-m-Y-') . rand(1, 9999) . $filename;
                $req->gambar->storeAs('/public/tentang', $filename);
            } else {
                $filename = $data->gambar;
            }

            $n = $data;
            $n->gambar = $filename;
            $n->nama = $req->nama;
            $n->nim = $req->nim;
            $n->kelas = $req->kelas;
            $n->email = $req->email;
            $n->save();

            DB::commit();
            toastr()->success('Berhasil Di Update');
            return redirect('/tentang');
        } catch (\Exception $e) {

            DB::rollback();
            toastr()->error('Kegagalan Sistem');
            return back();
        }
    }
    public function tentangdelete($id)
    {
        try {
            Tentang::find($id)->delete();
            toastr()->success('Berhasil dihapus');
            return back();
        } catch (\Exception $e) {
            toastr()->error('Tidak bisa di hapus karena ada relasi dengan data lain');
            return back();
        }
    }
}

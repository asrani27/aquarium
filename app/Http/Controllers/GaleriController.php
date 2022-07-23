<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GaleriController extends Controller
{
    public function galeri()
    {
        $data = Galeri::orderBy('id', 'DESC')->get();
        return view('superadmin.galeri.index', compact('data'));
    }
    public function galericreate()
    {
        return view('superadmin.galeri.create');
    }
    public function galeristore(Request $req)
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
                $req->gambar->storeAs('/public/gambar', $filename);
            }

            $n = new Galeri;
            $n->gambar = $filename;
            $n->save();

            DB::commit();
            toastr()->success('Berhasil Di Simpan');
            return redirect('/galeri');
        } catch (\Exception $e) {

            DB::rollback();
            toastr()->error('Kegagalan Sistem');
            return back();
        }
    }

    public function galeridelete($id)
    {
        try {
            Galeri::find($id)->delete();
            toastr()->success('Berhasil dihapus');
            return back();
        } catch (\Exception $e) {
            toastr()->error('Tidak bisa di hapus karena ada relasi dengan data lain');
            return back();
        }
    }
}

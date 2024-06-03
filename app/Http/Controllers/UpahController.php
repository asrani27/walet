<?php

namespace App\Http\Controllers;

use App\Pekerja;
use App\Upah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UpahController extends Controller
{
    public function index()
    {
        $data = Upah::all();
        return view('backend.upah.index', compact('data'));
    }

    public function add()
    {
        $check = Upah::all();
        $pekerja = Pekerja::get();
        return view('backend.upah.add', compact('pekerja'));
    }

    public function save(Request $req)
    {
        $s = new Upah;
        $s->pekerja_id = $req->pekerja_id;
        $s->nilai = $req->nilai;
        $s->jumlah = $req->jumlah;
        $s->total = $req->nilai * $req->jumlah;
        $s->save();
        Alert::success('Data Berhasil Di Simpan', 'Info Message');
        return redirect('/upah');
    }

    public function edit($id)
    {
        $data = Upah::find($id);
        $pekerja = Pekerja::get();
        return view('backend.upah.edit', compact('data', 'pekerja'));
    }

    public function update(Request $req, $id)
    {
        $s = Upah::find($id);
        $s->pekerja_id = $req->pekerja_id;
        $s->nilai = $req->nilai;
        $s->jumlah = $req->jumlah;
        $s->total = $req->nilai * $req->jumlah;
        $s->save();
        Alert::success('Data Berhasil Di Update', 'Info Message');
        return redirect('/upah');
    }

    public function delete($id)
    {
        try {
            Upah::find($id)->delete();
            Alert::success('Data Berhasil Di Hapus', 'Info Message');
            return back();
        } catch (\Throwable $th) {

            Alert::error('Tidak dapat di hapus karena terikat dengan data lain', 'Info Message');
            return back();
        }
    }
}

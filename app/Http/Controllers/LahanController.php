<?php

namespace App\Http\Controllers;

use App\Lahan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LahanController extends Controller
{
    public function index()
    {
        $data = Lahan::all();
        return view('backend.lahan.index', compact('data'));
    }

    public function add()
    {
        return view('backend.lahan.add');
    }

    public function save(Request $req)
    {
        $s = new Lahan;
        $s->lokasi = $req->lokasi;
        $s->luas = $req->luas;
        $s->ukuran = $req->ukuran;
        $s->save();
        Alert::success('Data Berhasil Di Simpan', 'Info Message');
        return redirect('/lahan');
    }

    public function edit($id)
    {
        $data = Lahan::find($id);
        return view('backend.lahan.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $s = Lahan::find($id);
        $s->lokasi = $req->lokasi;
        $s->luas = $req->luas;
        $s->ukuran = $req->ukuran;
        $s->save();
        Alert::success('Data Berhasil Di Update', 'Info Message');
        return redirect('/lahan');
    }

    public function delete($id)
    {
        $delete = Lahan::find($id)->delete();
        Alert::success('Data Berhasil Di Hapus', 'Info Message');
        return back();
    }
}

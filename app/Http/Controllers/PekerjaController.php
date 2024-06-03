<?php

namespace App\Http\Controllers;

use App\Pekerja;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PekerjaController extends Controller
{
    public function index()
    {
        $data = Pekerja::all();
        return view('backend.pekerja.index', compact('data'));
    }

    public function add()
    {
        return view('backend.pekerja.add');
    }

    public function save(Request $req)
    {
        $s = new Pekerja;
        $s->nama = $req->nama;
        $s->alamat = $req->alamat;
        $s->telp = $req->telp;
        $s->bagian = $req->bagian;
        $s->save();
        Alert::success('Data Berhasil Di Simpan', 'Info Message');
        return redirect('/pekerja');
    }

    public function edit($id)
    {
        $data = Pekerja::find($id);
        return view('backend.pekerja.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $s = Pekerja::find($id);
        $s->nama = $req->nama;
        $s->alamat = $req->alamat;
        $s->telp = $req->telp;
        $s->bagian = $req->bagian;
        $s->save();
        Alert::success('Data Berhasil Di Update', 'Info Message');
        return redirect('/pekerja');
    }

    public function delete($id)
    {
        $delete = Pekerja::find($id)->delete();
        Alert::success('Data Berhasil Di Hapus', 'Info Message');
        return back();
    }
}

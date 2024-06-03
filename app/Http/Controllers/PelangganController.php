<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PelangganController extends Controller
{
    public function index()
    {
        $data = Pelanggan::all();
        return view('backend.pelanggan.index', compact('data'));
    }

    public function add()
    {
        return view('backend.pelanggan.add');
    }

    public function save(Request $req)
    {
        $s = new Pelanggan;
        $s->nama = $req->nama;
        $s->alamat = $req->alamat;
        $s->telp = $req->telp;
        $s->save();
        Alert::success('Data Berhasil Di Simpan', 'Info Message');
        return redirect('/pelanggan');
    }

    public function edit($id)
    {
        $data = Pelanggan::find($id);
        return view('backend.pelanggan.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $s = Pelanggan::find($id);
        $s->nama = $req->nama;
        $s->alamat = $req->alamat;
        $s->telp = $req->telp;
        $s->save();
        Alert::success('Data Berhasil Di Update', 'Info Message');
        return redirect('/pelanggan');
    }

    public function delete($id)
    {
        $delete = Pelanggan::find($id)->delete();
        Alert::success('Data Berhasil Di Hapus', 'Info Message');
        return back();
    }
}

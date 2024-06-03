<?php

namespace App\Http\Controllers;

use App\Pengeluaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PengeluaranController extends Controller
{
    public function index()
    {
        $data = Pengeluaran::all();
        return view('backend.pengeluaran.index', compact('data'));
    }

    public function add()
    {
        return view('backend.pengeluaran.add');
    }

    public function save(Request $req)
    {
        $s = new Pengeluaran;
        $s->tanggal = $req->tanggal;
        $s->nama = $req->nama;
        $s->jumlah = $req->jumlah;
        $s->save();
        Alert::success('Data Berhasil Di Simpan', 'Info Message');
        return redirect('/pengeluaran');
    }

    public function edit($id)
    {
        $data = Pengeluaran::find($id);
        return view('backend.pengeluaran.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $s = Pengeluaran::find($id);
        $s->tanggal = $req->tanggal;
        $s->nama = $req->nama;
        $s->jumlah = $req->jumlah;
        $s->save();
        Alert::success('Data Berhasil Di Update', 'Info Message');
        return redirect('/pengeluaran');
    }

    public function delete($id)
    {
        $delete = Pengeluaran::find($id)->delete();
        Alert::success('Data Berhasil Di Hapus', 'Info Message');
        return back();
    }
}

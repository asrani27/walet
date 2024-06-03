<?php

namespace App\Http\Controllers;

use App\Biaya;
use App\Upah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BiayaController extends Controller
{
    public function index()
    {
        $data = Biaya::all();
        return view('backend.biaya.index', compact('data'));
    }

    public function add()
    {
        $upah = Upah::get();
        return view('backend.biaya.add', compact('upah'));
    }

    public function save(Request $req)
    {
        $s = new Biaya;
        $s->tanggal = $req->tanggal;
        $s->upah_id = $req->upah_id;
        $s->uraian = $req->uraian;
        $s->jumlah = $req->jumlah;
        $s->total = $req->jumlah * Upah::find($req->upah_id)->total;
        $s->save();
        Alert::success('Data Berhasil Di Simpan', 'Info Message');
        return redirect('/biaya');
    }

    public function edit($id)
    {
        $data = Biaya::find($id);
        return view('backend.biaya.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $s = Biaya::find($id);
        $s->tanggal = $req->tanggal;
        $s->upah_id = $req->upah_id;
        $s->uraian = $req->uraian;
        $s->jumlah = $req->jumlah;
        $s->total = $req->jumlah * Upah::find($req->upah_id)->total;
        $s->save();
        Alert::success('Data Berhasil Di Update', 'Info Message');
        return redirect('/biaya');
    }

    public function delete($id)
    {
        try {
            Biaya::find($id)->delete();
            Alert::success('Data Berhasil Di Hapus', 'Info Message');
            return back();
        } catch (\Throwable $th) {

            Alert::error('Tidak dapat di hapus karena terikat dengan data lain', 'Info Message');
            return back();
        }
    }
}

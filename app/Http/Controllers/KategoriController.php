<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::all();
        return view('backend.kategori.index', compact('data'));
    }

    public function add()
    {
        return view('backend.kategori.add');
    }

    public function save(Request $req)
    {
        $s = new Kategori;
        $s->nama = $req->nama;
        $s->save();
        Alert::success('Data Berhasil Di Simpan', 'Info Message');
        return redirect('/kategori');
    }

    public function edit($id)
    {
        $data = Kategori::find($id);
        return view('backend.kategori.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $s = Kategori::find($id);
        $s->nama = $req->nama;
        $s->save();
        Alert::success('Data Berhasil Di Update', 'Info Message');
        return redirect('/kategori');
    }

    public function delete($id)
    {
        try {
            $delete = Kategori::find($id)->delete();
            Alert::success('Data Berhasil Di Hapus', 'Info Message');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Tidak dapat di hapus karena terikat dengan data lain', 'Info Message');
            return back();
        }
    }
}

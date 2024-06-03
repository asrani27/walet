<?php

namespace App\Http\Controllers;

use App\Retail;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RetailController extends Controller
{
    public function index()
    {
        $data = Retail::all();
        return view('backend.retail.index', compact('data'));
    }

    public function add()
    {
        return view('backend.retail.add');
    }

    public function save(Request $req)
    {
        $s = new Retail;
        $s->nama = $req->nama;
        $s->alamat = $req->alamat;
        $s->telp = $req->telp;
        $s->save();
        Alert::success('Data Berhasil Di Simpan', 'Info Message');
        return redirect('/retail');
    }

    public function edit($id)
    {
        $data = Retail::find($id);
        return view('backend.retail.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $s = Retail::find($id);
        $s->nama = $req->nama;
        $s->alamat = $req->alamat;
        $s->telp = $req->telp;
        $s->save();
        Alert::success('Data Berhasil Di Update', 'Info Message');
        return redirect('/retail');
    }

    public function delete($id)
    {
        $delete = Retail::find($id)->delete();
        Alert::success('Data Berhasil Di Hapus', 'Info Message');
        return back();
    }
}

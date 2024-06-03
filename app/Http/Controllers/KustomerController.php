<?php

namespace App\Http\Controllers;

use App\Kustomer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KustomerController extends Controller
{
    public function index()
    {
        $data = Kustomer::all();
        return view('backend.kustomer.index',compact('data'));
    }

    public function add()
    {
        return view('backend.kustomer.add');
    }

    public function save(Request $req)
    {
        $s = new Kustomer;
        $s->nama = $req->nama;
        $s->telp = $req->telp;
        $s->save();
        Alert::success('Data Berhasil Di Simpan', 'Info Message');
        return redirect('/kustomer');
    }

    public function edit($id)
    {
        $data = Kustomer::find($id);
        return view('backend.kustomer.edit',compact('data'));
    }
    
    public function update(Request $req, $id)
    {
        $s = Kustomer::find($id);
        $s->nama = $req->nama;
        $s->telp = $req->telp;
        $s->save();
        Alert::success('Data Berhasil Di Update', 'Info Message');
        return redirect('/kustomer');
    }

    public function delete($id)
    {
        $delete = Kustomer::find($id)->delete();
        Alert::success('Data Berhasil Di Hapus', 'Info Message');
        return back();
    }
}

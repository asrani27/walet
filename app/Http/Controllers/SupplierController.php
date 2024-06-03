<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    public function index()
    {
        $data = Supplier::all();
        return view('backend.supplier.index',compact('data'));
    }

    public function add()
    {
        return view('backend.supplier.add');
    }

    public function save(Request $req)
    {
        $s = new Supplier;
        $s->nama = $req->nama;
        $s->alamat = $req->alamat;
        $s->telp = $req->telp;
        $s->save();
        Alert::success('Data Berhasil Di Simpan', 'Info Message');
        return redirect('/supplier');
    }

    public function edit($id)
    {
        $data = Supplier::find($id);
        return view('backend.supplier.edit',compact('data'));
    }
    
    public function update(Request $req, $id)
    {
        $s = Supplier::find($id);
        $s->nama = $req->nama;
        $s->alamat = $req->alamat;
        $s->telp = $req->telp;
        $s->save();
        Alert::success('Data Berhasil Di Update', 'Info Message');
        return redirect('/supplier');
    }

    public function delete($id)
    {
        $delete = Supplier::find($id)->delete();
        Alert::success('Data Berhasil Di Hapus', 'Info Message');
        return back();
    }
}

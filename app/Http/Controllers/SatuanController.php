<?php

namespace App\Http\Controllers;

use App\Satuan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SatuanController extends Controller
{
    public function index()
    {
        $data = Satuan::all();
        return view('backend.satuan.index',compact('data'));
    }

    public function add()
    {
        return view('backend.satuan.add');
    }

    public function save(Request $req)
    {
        $s = new Satuan;
        $s->nama = $req->nama;
        $s->save();
        Alert::success('Data Berhasil Di Simpan', 'Info Message');
        return redirect('/satuan');
    }

    public function edit($id)
    {
        $data = Satuan::find($id);
        return view('backend.satuan.edit',compact('data'));
    }
    
    public function update(Request $req, $id)
    {
        $s = Satuan::find($id);
        $s->nama = $req->nama;
        $s->save();
        Alert::success('Data Berhasil Di Update', 'Info Message');
        return redirect('/satuan');
    }

    public function delete($id)
    {
        try {
            $delete = Satuan::find($id)->delete();
            Alert::success('Data Berhasil Di Hapus', 'Info Message');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Tidak dapat di hapus karena terikat dengan data lain', 'Info Message');
            return back();
        }
    }
}

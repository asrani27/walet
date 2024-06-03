<?php

namespace App\Http\Controllers;

use App\Gedung;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GedungController extends Controller
{
    public function index()
    {
        $data = Gedung::all();
        return view('backend.gedung.index', compact('data'));
    }

    public function add()
    {
        $check = Gedung::all();
        if (count($check) == 0) {
            $kode = '0001';
        } else {
            $number = count($check) + 1;
            if (strlen($number) == 1) {
                $kode = '000' . $number;
            } elseif (strlen($number) == 2) {
                $kode = '00' . $number;
            } elseif (strlen($number) == 3) {
                $kode = '0' . $number;
            } elseif (strlen($number) == 4) {
                $kode = $number;
            }
        }
        return view('backend.gedung.add', compact('kode'));
    }

    public function save(Request $req)
    {
        $s = new Gedung;
        $s->kode = $req->kode;
        $s->jenis = $req->jenis;
        $s->ukuran = $req->ukuran;
        $s->model = $req->model;
        $s->luas = $req->luas;
        $s->harga = $req->harga;
        $s->save();
        Alert::success('Data Berhasil Di Simpan', 'Info Message');
        return redirect('/gedung');
    }

    public function edit($id)
    {
        $data = Gedung::find($id);
        return view('backend.gedung.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $s = Gedung::find($id);
        $s->kode = $req->kode;
        $s->jenis = $req->jenis;
        $s->ukuran = $req->ukuran;
        $s->model = $req->model;
        $s->luas = $req->luas;
        $s->harga = $req->harga;
        $s->save();
        Alert::success('Data Berhasil Di Update', 'Info Message');
        return redirect('/gedung');
    }

    public function delete($id)
    {
        try {
            Gedung::find($id)->delete();
            Alert::success('Data Berhasil Di Hapus', 'Info Message');
            return back();
        } catch (\Throwable $th) {

            Alert::error('Tidak dapat di hapus karena terikat dengan data lain', 'Info Message');
            return back();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Bahan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BahanController extends Controller
{
    public function index()
    {
        $data = Bahan::all();
        return view('backend.bahan.index', compact('data'));
    }

    public function add()
    {
        $check = Bahan::all();
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
        return view('backend.bahan.add', compact('kode'));
    }

    public function save(Request $req)
    {
        $s = new Bahan;
        $s->nomor = $req->nomor;
        $s->nama = $req->nama;
        $s->satuan = $req->satuan;
        $s->harga_beli = str_replace('.', '', $req->harga_beli);
        $s->harga_jual = str_replace('.', '', $req->harga_jual);
        $s->stok = $req->stok;
        $s->save();
        Alert::success('Data Berhasil Di Simpan', 'Info Message');
        return redirect('/bahan');
    }

    public function edit($id)
    {
        $data = Bahan::find($id);
        return view('backend.bahan.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $s = Bahan::find($id);
        $s->nama = $req->nama;
        $s->satuan = $req->satuan;
        $s->harga_beli = str_replace('.', '', $req->harga_beli);
        $s->harga_jual = str_replace('.', '', $req->harga_jual);
        $s->stok = $req->stok;
        $s->save();
        Alert::success('Data Berhasil Di Update', 'Info Message');
        return redirect('/bahan');
    }

    public function delete($id)
    {
        try {
            Bahan::find($id)->delete();
            Alert::success('Data Berhasil Di Hapus', 'Info Message');
            return back();
        } catch (\Throwable $th) {

            Alert::error('Tidak dapat di hapus karena terikat dengan data lain', 'Info Message');
            return back();
        }
    }
}

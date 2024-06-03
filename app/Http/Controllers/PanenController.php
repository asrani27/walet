<?php

namespace App\Http\Controllers;

use App\Lahan;
use App\Panen;
use App\Sawit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PanenController extends Controller
{
    public function index()
    {
        $data = Panen::all();
        return view('backend.panen.index', compact('data'));
    }

    public function add()
    {
        $sawit = Sawit::all();
        $lahan = Lahan::all();
        $check = Panen::all();
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
        return view('backend.panen.add', compact('kode', 'sawit', 'lahan'));
    }

    public function save(Request $req)
    {
        $s = new Panen;
        $s->nomor    = $req->nomor;
        $s->tanggal  = $req->tanggal;
        $s->sawit_id = $req->sawit_id;
        $s->lahan_id = $req->lahan_id;
        $s->jumlah   = $req->jumlah;
        $s->save();
        Alert::success('Data Berhasil Di Simpan', 'Info Message');
        return redirect('/panen');
    }

    public function edit($id)
    {
        $data = Panen::find($id);
        $sawit = Sawit::all();
        $lahan = Lahan::all();
        return view('backend.panen.edit', compact('data', 'lahan', 'sawit'));
    }

    public function update(Request $req, $id)
    {
        $s = Panen::find($id);
        $s->nomor    = $req->nomor;
        $s->tanggal  = $req->tanggal;
        $s->sawit_id = $req->sawit_id;
        $s->lahan_id = $req->lahan_id;
        $s->jumlah   = $req->jumlah;
        $s->save();
        Alert::success('Data Berhasil Di Update', 'Info Message');
        return redirect('/panen');
    }

    public function delete($id)
    {
        try {
            Panen::find($id)->delete();
            Alert::success('Data Berhasil Di Hapus', 'Info Message');
            return back();
        } catch (\Throwable $th) {

            Alert::error('Tidak dapat di hapus karena terikat dengan data lain', 'Info Message');
            return back();
        }
    }
}

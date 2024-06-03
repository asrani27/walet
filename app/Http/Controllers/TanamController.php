<?php

namespace App\Http\Controllers;

use App\Bibit;
use App\Lahan;
use App\Pekerja;
use App\Tanam;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TanamController extends Controller
{
    public function index()
    {
        $data = Tanam::all();
        return view('backend.tanam.index', compact('data'));
    }

    public function add()
    {
        $pekerja = Pekerja::all();
        $bibit = Bibit::all();
        $lahan = Lahan::all();
        $check = Tanam::all();
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
        return view('backend.tanam.add', compact('pekerja', 'kode', 'bibit', 'lahan'));
    }

    public function save(Request $req)
    {
        $s = new Tanam;
        $s->nomor = $req->nomor;
        $s->tanggal = $req->tanggal;
        $s->bibit_id = $req->bibit_id;
        $s->pekerja_id = $req->pekerja_id;
        $s->lahan_id = $req->lahan_id;
        $s->jumlah = $req->jumlah;
        $s->save();
        Alert::success('Data Berhasil Di Simpan', 'Info Message');
        return redirect('/tanam');
    }

    public function edit($id)
    {
        $data = Tanam::find($id);
        $pekerja = Pekerja::all();
        $bibit = Bibit::all();
        $lahan = Lahan::all();
        return view('backend.tanam.edit', compact('data', 'bibit', 'lahan', 'pekerja'));
    }

    public function update(Request $req, $id)
    {
        $s = Tanam::find($id);
        $s->nomor = $req->nomor;
        $s->tanggal = $req->tanggal;
        $s->bibit_id = $req->bibit_id;
        $s->pekerja_id = $req->pekerja_id;
        $s->lahan_id = $req->lahan_id;
        $s->jumlah = $req->jumlah;
        $s->save();
        Alert::success('Data Berhasil Di Update', 'Info Message');
        return redirect('/tanam');
    }

    public function delete($id)
    {
        try {
            Tanam::find($id)->delete();
            Alert::success('Data Berhasil Di Hapus', 'Info Message');
            return back();
        } catch (\Throwable $th) {

            Alert::error('Tidak dapat di hapus karena terikat dengan data lain', 'Info Message');
            return back();
        }
    }
}

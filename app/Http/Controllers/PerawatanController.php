<?php

namespace App\Http\Controllers;

use App\Bibit;
use App\Lahan;
use App\Pekerja;
use App\Perawatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PerawatanController extends Controller
{
    public function index()
    {
        $data = Perawatan::all();
        return view('backend.perawatan.index', compact('data'));
    }

    public function add()
    {
        $pekerja = Pekerja::all();
        $bibit = Bibit::all();
        $lahan = Lahan::all();
        $check = Perawatan::all();
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
        return view('backend.perawatan.add', compact('pekerja', 'kode', 'bibit', 'lahan'));
    }

    public function save(Request $req)
    {
        $s = new Perawatan;
        $s->nomor = $req->nomor;
        $s->tanggal = $req->tanggal;
        $s->bibit_id = $req->bibit_id;
        $s->pekerja_id = $req->pekerja_id;
        $s->lahan_id = $req->lahan_id;
        $s->keterangan = $req->keterangan;
        $s->save();
        Alert::success('Data Berhasil Di Simpan', 'Info Message');
        return redirect('/perawatan');
    }

    public function edit($id)
    {
        $data = Perawatan::find($id);
        $pekerja = Pekerja::all();
        $bibit = Bibit::all();
        $lahan = Lahan::all();
        return view('backend.perawatan.edit', compact('data', 'bibit', 'lahan', 'pekerja'));
    }

    public function update(Request $req, $id)
    {
        $s = Perawatan::find($id);
        $s->nomor = $req->nomor;
        $s->tanggal = $req->tanggal;
        $s->bibit_id = $req->bibit_id;
        $s->pekerja_id = $req->pekerja_id;
        $s->lahan_id = $req->lahan_id;
        $s->keterangan = $req->keterangan;
        $s->save();
        Alert::success('Data Berhasil Di Update', 'Info Message');
        return redirect('/perawatan');
    }

    public function delete($id)
    {
        try {
            Perawatan::find($id)->delete();
            Alert::success('Data Berhasil Di Hapus', 'Info Message');
            return back();
        } catch (\Throwable $th) {

            Alert::error('Tidak dapat di hapus karena terikat dengan data lain', 'Info Message');
            return back();
        }
    }
}

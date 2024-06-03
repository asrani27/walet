<?php

namespace App\Http\Controllers;

use Alert;
use App\Bahan;
use App\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function add(Request $req)
    {
        if ($req->gedung_id == null) {
            $checkStok = Bahan::find($req->bahan_id)->stok;
            $checkKeranjang = Keranjang::where('bahan_id', $req->bahan_id)->where('type', $req->type)->first();
            if ($checkKeranjang == null) {

                $jumlah_jual = $req->jumlah;
            } else {

                $jumlah_jual = $checkKeranjang->jumlah + $req->jumlah;
            }
        }

        if ($req->type == 'pembelian') {
            $check = Keranjang::where('bahan_id', $req->bahan_id)->where('type', $req->type)->first();
            if ($check == null) {
                $s = new Keranjang;
                $s->bahan_id = $req->bahan_id;
                $s->jumlah = $req->jumlah;
                $s->type = $req->type;
                $s->save();
            } else {
                $s = $check;
                $s->jumlah = $s->jumlah + $req->jumlah;
                $s->save();
            }
            return back();
        } else {
            $check = Keranjang::where('gedung_id', $req->gedung_id)->where('type', $req->type)->first();
            if ($check == null) {
                $s = new Keranjang;
                $s->gedung_id = $req->gedung_id;
                $s->jumlah = $req->jumlah;
                $s->type = $req->type;
                $s->save();
            } else {
                $s = $check;
                $s->jumlah = $s->jumlah + $req->jumlah;
                $s->save();
            }
            return back();
        }
    }

    public function delete($id)
    {
        $data = Keranjang::find($id)->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Alert;
use App\Barang;
use App\Bibit;
use App\Gedung;
use App\Retail;
use App\Kustomer;
use App\Keranjang;
use App\Pelanggan;
use App\Penjualan;
use App\Penjualan_detail;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $data = Penjualan::all();
        return view('backend.penjualan.index', compact('data'));
    }

    public function add()
    {
        $pelanggan = Pelanggan::all();
        $gedung = Gedung::all();
        $check = Penjualan::all();
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
        $keranjang = Keranjang::where('type', 'penjualan')->get()->map(function ($item) {
            $item->subtotal = $item->jumlah * $item->gedung->harga;
            return $item;
        });
        return view('backend.penjualan.add', compact('pelanggan', 'kode', 'gedung', 'keranjang'));
    }

    public function save(Request $req)
    {
        $keranjang = Keranjang::where('type', 'penjualan')->get()->map(function ($item) {
            $item->subtotal = $item->jumlah * $item->gedung->harga;
            $item->harga = $item->gedung->harga;
            return $item;
        });
        if (count($keranjang) == 0) {
            Alert::warning('Keranjang Belanja Kosong, harap tambahkan', 'Info Message');
            return back();
        } else {
            $total     = $keranjang->sum('subtotal');
            $penjualan = new Penjualan;
            $penjualan->no_transaksi = $req->no_transaksi;
            $penjualan->created_at   = $req->created_at;
            $penjualan->pelanggan_id    = $req->pelanggan_id;
            $penjualan->total        = $total;
            $penjualan->dp        = $req->dp;
            $penjualan->save();

            foreach ($keranjang as $item) {
                $pj_detail = new Penjualan_detail;
                $pj_detail->gedung_id    = $item->gedung_id;
                $pj_detail->penjualan_id = $penjualan->id;
                $pj_detail->jumlah       = $item->jumlah;
                $pj_detail->harga        = $item->harga;
                $pj_detail->subtotal     = $item->subtotal;
                $pj_detail->save();
            }

            foreach ($keranjang as $delete) {
                $del = $delete->delete();
            }
            Alert::success('Data Pesanan Berhasil Di Simpan', 'Info Message');
            return redirect('/penjualan');
        }
    }

    public function print($id)
    {
        $data = Penjualan::find($id);
        return view('backend.penjualan.print', compact('data'));
    }

    public function delete($id)
    {
        $data = Penjualan::find($id);
        $detail = $data->penjualan_detail;
        // foreach ($detail as $item) {
        //     $barang = Barang::find($item->barang_id);
        //     $barang->stok = $barang->stok + $item->jumlah;
        //     $barang->save();

        //     $item->delete();
        // }
        $data->delete();
        Alert::success('Data Pesanan Di Hapus Dan Stok Di Kembalikan', 'Info Message');
        return back();
    }
}

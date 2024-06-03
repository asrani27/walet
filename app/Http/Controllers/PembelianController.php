<?php

namespace App\Http\Controllers;

use App\Bahan;
use App\Barang;
use App\Supplier;
use App\Keranjang;
use App\Pembelian;
use App\Penjualan;
use App\Pembelian_detail;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PembelianController extends Controller
{
    public function index()
    {
        $data = Pembelian::all();
        return view('backend.pembelian.index', compact('data'));
    }

    public function add()
    {
        $supplier = Supplier::all();
        $bahan = Bahan::all();
        $check = Pembelian::all();
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
        $keranjang = Keranjang::where('type', 'pembelian')->get()->map(function ($item) {
            $item->subtotal = $item->jumlah * $item->bahan->harga_jual;
            return $item;
        });
        return view('backend.pembelian.add', compact('supplier', 'kode', 'bahan', 'keranjang'));
    }

    public function save(Request $req)
    {
        $keranjang = Keranjang::where('type', 'pembelian')->get()->map(function ($item) {
            $item->subtotal = $item->jumlah * $item->bahan->harga_jual;
            $item->harga = $item->bahan->harga_jual;
            return $item;
        });
        if (count($keranjang) == 0) {
            Alert::warning('Keranjang Belanja Kosong, harap tambahkan', 'Info Message');
            return back();
        } else {

            $total     = $keranjang->sum('subtotal');
            $pembelian = new Pembelian;
            $pembelian->no_transaksi = $req->no_transaksi;
            $pembelian->created_at   = $req->created_at;
            $pembelian->supplier_id  = $req->supplier_id;
            $pembelian->total        = $total;
            $pembelian->save();

            foreach ($keranjang as $item) {
                $pj_detail = new Pembelian_detail;
                $pj_detail->bahan_id    = $item->bahan_id;
                $pj_detail->pembelian_id = $pembelian->id;
                $pj_detail->jumlah       = $item->jumlah;
                $pj_detail->harga        = $item->harga;
                $pj_detail->subtotal     = $item->subtotal;
                $pj_detail->save();

                $bahan = bahan::find($item->bahan_id);
                $bahan->stok = $bahan->stok + $item->jumlah;
                $bahan->save();
            }

            foreach ($keranjang as $delete) {
                $del = $delete->delete();
            }
            Alert::success('Data Pembelian Berhasil Di Simpan', 'Info Message');
            return redirect('/pembelian');
        }
    }

    public function print($id)
    {
        $data = Pembelian::find($id);
        return view('backend.pembelian.print', compact('data'));
    }

    public function delete($id)
    {
        $data = Pembelian::find($id);
        $detail = $data->pembelian_detail;
        foreach ($detail as $item) {
            $barang = Barang::find($item->barang_id);
            $barang->stok = $barang->stok + $item->jumlah;
            $barang->save();

            $item->delete();
        }
        $data->delete();
        Alert::success('Data Pembelian Di Hapus Dan Stok Di Kembalikan', 'Info Message');
        return back();
    }
}

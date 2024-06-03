<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Supplier;
use App\Keranjang;
use App\Retur_pembelian;
use Illuminate\Http\Request;
use App\Retur_pembelian_detail;
use RealRashid\SweetAlert\Facades\Alert;

class ReturPembelianController extends Controller
{
    public function index()
    {
        $data = Retur_pembelian::all();
        return view('backend.returpembelian.index', compact('data'));
    }

    public function add()
    {
        $supplier = Supplier::all();
        $barang = Barang::all();
        $check = Retur_pembelian::all();
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
        $keranjang = Keranjang::where('type', 'returpembelian')->get()->map(function ($item) {
            $item->subtotal = $item->jumlah * $item->barang->harga_jual;
            return $item;
        });
        return view('backend.returpembelian.add', compact('supplier', 'kode', 'barang', 'keranjang'));
    }

    public function save(Request $req)
    {
        $keranjang = Keranjang::where('type', 'returpembelian')->get()->map(function ($item) {
            $item->subtotal = $item->jumlah * $item->barang->harga_jual;
            $item->harga = $item->barang->harga_jual;
            return $item;
        });
        if (count($keranjang) == 0) {
            Alert::warning('Keranjang Belanja Kosong, harap tambahkan', 'Info Message');
            return back();
        } else {
            $total     = $keranjang->sum('subtotal');
            $returpembelian = new Retur_pembelian;
            $returpembelian->no_transaksi = $req->no_transaksi;
            $returpembelian->created_at   = $req->created_at;
            $returpembelian->supplier_id  = $req->supplier_id;
            $returpembelian->total        = $total;
            $returpembelian->save();

            foreach ($keranjang as $item) {
                $pj_detail = new Retur_pembelian_detail;
                $pj_detail->barang_id    = $item->barang_id;
                $pj_detail->retur_pembelian_id = $returpembelian->id;
                $pj_detail->jumlah       = $item->jumlah;
                $pj_detail->harga        = $item->harga;
                $pj_detail->subtotal     = $item->subtotal;
                $pj_detail->save();

                $barang = Barang::find($item->barang_id);
                $barang->stok = $barang->stok - $item->jumlah;
                $barang->save();
            }

            foreach ($keranjang as $delete) {
                $del = $delete->delete();
            }
            Alert::success('Data Retur Pembelian Berhasil Di Simpan', 'Info Message');
            return back();
        }
    }

    public function print($id)
    {
        $data = Retur_pembelian::find($id);
        return view('backend.returpembelian.print', compact('data'));
    }

    public function delete($id)
    {
        $data = Retur_pembelian::find($id);
        $detail = $data->retur_pembelian_detail;
        foreach ($detail as $item) {
            $barang = Barang::find($item->barang_id);
            $barang->stok = $barang->stok + $item->jumlah;
            $barang->save();

            $item->delete();
        }
        $data->delete();
        Alert::success('Data Retur Pembelian Di Hapus Dan Stok Di Kembalikan', 'Info Message');
        return back();
    }
}

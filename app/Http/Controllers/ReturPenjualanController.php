<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Kustomer;
use App\Keranjang;
use App\Retur_penjualan;
use Illuminate\Http\Request;
use App\Retur_penjualan_detail;
use RealRashid\SweetAlert\Facades\Alert;

class ReturPenjualanController extends Controller
{
    public function index()
    {
        $data = Retur_penjualan::all();
        return view('backend.returpenjualan.index',compact('data'));
    }
    
    public function add()
    {
        $kustomer = Kustomer::all();
        $barang = Barang::all();
        $check = Retur_penjualan::all();
        if(count($check) == 0){
            $kode = '0001';
        }else{
            $number = count($check)+1;
            if(strlen($number) == 1){
                $kode = '000'.$number;
            }elseif(strlen($number) == 2){
                $kode = '00'.$number;
            }elseif(strlen($number) == 3){
                $kode = '0'.$number;
            }elseif(strlen($number) == 4){
                $kode = $number;
            }
        }
        $keranjang = Keranjang::where('type','returpenjualan')->get()->map(function($item){
            $item->subtotal = $item->jumlah * $item->barang->harga_jual;
            return $item;
        });
        return view('backend.returpenjualan.add',compact('kustomer','kode','barang','keranjang'));
    }

    public function save(Request $req)
    {
        $keranjang = Keranjang::where('type','returpenjualan')->get()->map(function($item){
            $item->subtotal = $item->jumlah * $item->barang->harga_jual;
            $item->harga = $item->barang->harga_jual;
            return $item;
        });
        $total     = $keranjang->sum('subtotal');
        $returpenjualan = new Retur_penjualan;
        $returpenjualan->no_transaksi = $req->no_transaksi;
        $returpenjualan->created_at   = $req->created_at;
        $returpenjualan->kustomer_id  = $req->kustomer_id;
        $returpenjualan->total        = $total;
        $returpenjualan->save();

        foreach($keranjang as $item){
            $pj_detail = new Retur_penjualan_detail;
            $pj_detail->barang_id    = $item->barang_id;
            $pj_detail->retur_penjualan_id = $returpenjualan->id;
            $pj_detail->jumlah       = $item->jumlah;
            $pj_detail->harga        = $item->harga;
            $pj_detail->subtotal     = $item->subtotal;
            $pj_detail->save();
            
            $barang = Barang::find($item->barang_id);
            $barang->stok = $barang->stok + $item->jumlah;
            $barang->save();
        }
        
        foreach($keranjang as $delete)
        {
            $del = $delete->delete();
        }
        Alert::success('Data Retur Penjualan Berhasil Di Simpan', 'Info Message');
        return back();
        
    }

    public function print($id)
    {
        $data = Retur_penjualan::find($id);
        return view('backend.returpenjualan.print',compact('data'));
    }

    public function delete($id)
    {
        $data = Retur_penjualan::find($id);
        $detail = $data->retur_penjualan_detail;
        foreach($detail as $item){
            $barang = Barang::find($item->barang_id);
            $barang->stok = $barang->stok - $item->jumlah;
            $barang->save();

            $item->delete();
        }
        $data->delete();
        Alert::success('Data Retur Penjualan Di Hapus Dan Stok Di Kembalikan', 'Info Message');
        return back();
    }
}

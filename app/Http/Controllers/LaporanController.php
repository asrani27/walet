<?php

namespace App\Http\Controllers;

use App\Bahan;
use App\Bibit;
use App\Panen;
use App\Sawit;
use App\Tanam;
use App\Barang;
use App\Retail;
use App\Pekerja;
use App\Kustomer;
use App\Supplier;
use App\Pelanggan;
use App\Pembelian;
use App\Penjualan;
use App\Perawatan;
use App\Pengeluaran;
use App\Retur_pembelian;
use App\Retur_penjualan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function stok()
    {
        return view('laporan.stok');
    }

    public function penjualan()
    {
        return view('laporan.penjualan');
    }

    public function pembelian()
    {
        return view('laporan.pembelian');
    }

    public function customer()
    {
        return view('laporan.customer');
    }

    public function retail()
    {
        return view('laporan.retail');
    }

    public function printpelanggan()
    {
        $data = Pelanggan::all();
        return view('print.pelanggan', compact('data'));
    }

    public function pekerja()
    {
        return view('laporan.pekerja');
    }
    public function tanam()
    {
        return view('laporan.tanam');
    }
    public function panen()
    {
        return view('laporan.panen');
    }
    public function perawatan()
    {
        return view('laporan.perawatan');
    }


    public function pekerjaprint()
    {
        $data = Pekerja::get();
        return view('print.pekerja', compact('data'));
    }
    public function tanamprint()
    {
        $data = Tanam::get();
        return view('print.tanam', compact('data'));
    }
    public function panenprint()
    {
        $data = Panen::get();
        return view('print.panen', compact('data'));
    }
    public function perawatanprint()
    {
        $data = Perawatan::get();
        return view('print.perawatan', compact('data'));
    }


    public function pelanggan()
    {
        return view('laporan.pelanggan');
    }

    public function supplier()
    {
        return view('laporan.supplier');
    }

    public function pengeluaran()
    {
        return view('laporan.pengeluaran');
    }

    public function returpenjualan()
    {
        return view('laporan.returpenjualan');
    }

    public function returpembelian()
    {
        return view('laporan.returpembelian');
    }

    public function printstok()
    {
        $data = Barang::all();
        return view('print.stok', compact('data'));
    }

    public function stokbibit()
    {
        $data = Bibit::all();
        return view('print.stokbibit', compact('data'));
    }
    public function stoksawit()
    {
        $data = Sawit::all();
        return view('print.stoksawit', compact('data'));
    }

    public function printretail()
    {
        $data = Retail::all();
        return view('print.retail', compact('data'));
    }

    public function printpenjualan()
    {
        $data = Penjualan::all();
        return view('print.penjualan', compact('data'));
    }

    public function bulanpenjualan()
    {
        $bulan = request('bulan');
        $tahun = request('tahun');
        $data = Penjualan::whereMonth('created_at', '=', $bulan)->whereYear('created_at', '=', $tahun)->get();
        return view('print.penjualan', compact('data'));
    }

    public function tahunpenjualan()
    {
        $tahun = request('tahun');
        $data = Penjualan::whereYear('created_at', '=', $tahun)->get();
        return view('print.penjualan', compact('data'));
    }
    public function bulanpembelian()
    {
        $bulan = request('bulan');
        $tahun = request('tahun');
        $data = Pembelian::whereMonth('created_at', '=', $bulan)->whereYear('created_at', '=', $tahun)->get();
        return view('print.pembelian', compact('data'));
    }

    public function tahunpembelian()
    {
        $tahun = request('tahun');
        $data = Pembelian::whereYear('created_at', '=', $tahun)->get();
        return view('print.pembelian', compact('data'));
    }
    public function printpembelian()
    {
        $data = Pembelian::all();
        return view('print.pembelian', compact('data'));
    }

    public function printreturpenjualan()
    {
        $data = Retur_penjualan::all();
        return view('print.returpenjualan', compact('data'));
    }

    public function printreturpembelian()
    {
        $data = Retur_pembelian::all();
        return view('print.returpembelian', compact('data'));
    }

    public function laba()
    {
        $penjualan = [];
        $pengeluaran = [];

        return view('laporan.laba', compact('penjualan', 'pengeluaran'));
    }

    public function tampilkanlaba()
    {
        $bulan = request('bulan');
        $tahun = request('tahun');
        $pengeluaran = Pengeluaran::whereMonth('tanggal', '=', $bulan)->whereYear('tanggal', '=', $tahun)->get();
        $penjualan = Penjualan::whereMonth('created_at', '=', $bulan)->whereYear('created_at', '=', $tahun)->get();
        return view('laporan.laba', compact('pengeluaran', 'penjualan'));
    }

    public function printbahan()
    {
        $data = Bahan::all();
        return view('print.bahan', compact('data'));
    }
    public function printcustomer()
    {
        $data = Kustomer::all();
        return view('print.customer', compact('data'));
    }

    public function printsupplier()
    {
        $data = Supplier::all();
        return view('print.supplier', compact('data'));
    }

    public function printpengeluaran()
    {
        $bulan = request('bulan');
        $tahun = request('tahun');
        $data = Pengeluaran::whereMonth('tanggal', '=', $bulan)->whereYear('tanggal', '=', $tahun)->get();

        return view('print.pengeluaran', compact('data'));
    }
}

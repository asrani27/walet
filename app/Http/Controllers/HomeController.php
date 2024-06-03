<?php

namespace App\Http\Controllers;

use App\Bibit;
use App\Barang;
use App\Penjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('backend.home');
    }
}

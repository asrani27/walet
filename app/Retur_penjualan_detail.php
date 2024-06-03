<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retur_penjualan_detail extends Model
{
    protected $table = 'retur_penjualan_detail';

    public function returpenjualan()
    {
        return $this->belongsTo(Retur_penjualan::class, 'retur_penjualan_id');
    }
    
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}

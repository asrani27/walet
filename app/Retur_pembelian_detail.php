<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retur_pembelian_detail extends Model
{
    protected $table = 'retur_pembelian_detail';
    public $timestamps = false;

    public function returpembelian()
    {
        return $this->belongsTo(Retur_pembelian::class, 'retur_pembelian_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}

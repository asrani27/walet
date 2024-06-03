<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retur_penjualan extends Model
{
    protected $table = 'retur_penjualan';

    public function retur_penjualan_detail()
    {
        return $this->hasMany(Retur_penjualan_detail::class, 'retur_penjualan_id');
    }

    public function kustomer()
    {
        return $this->belongsTo(Kustomer::class, 'kustomer_id');
    }
}

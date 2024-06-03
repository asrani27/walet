<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retur_pembelian extends Model
{
    protected $table = 'retur_pembelian';

    public function retur_pembelian_detail()
    {
        return $this->hasMany(Retur_pembelian_detail::class, 'retur_pembelian_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}

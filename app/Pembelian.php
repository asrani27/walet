<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{

    protected $table = 'pembelian';

    public function pembelian_detail()
    {
        return $this->hasMany(Pembelian_detail::class, 'pembelian_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}

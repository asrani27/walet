<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';

    public function penjualan_detail()
    {
        return $this->hasMany(Penjualan_detail::class, 'penjualan_id');
    }

    public function retail()
    {
        return $this->belongsTo(Retail::class, 'retail_id');
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
}

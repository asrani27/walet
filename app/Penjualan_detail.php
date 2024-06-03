<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan_detail extends Model
{
    protected $table = 'penjualan_detail';
    public $timestamps = false;

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id');
    }

    public function gedung()
    {
        return $this->belongsTo(Gedung::class, 'gedung_id');
    }
}

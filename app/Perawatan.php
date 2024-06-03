<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perawatan extends Model
{
    protected $table = 'perawatan';

    public function bibit()
    {
        return $this->belongsTo(Bibit::class, 'bibit_id');
    }
    public function lahan()
    {
        return $this->belongsTo(Lahan::class, 'lahan_id');
    }
    public function pekerja()
    {
        return $this->belongsTo(Pekerja::class, 'pekerja_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanam extends Model
{
    protected $table = 'tanam';


    public function bibit()
    {
        return $this->belongsTo(Bibit::class, 'bibit_id');
    }
    public function pekerja()
    {
        return $this->belongsTo(Pekerja::class, 'pekerja_id');
    }
    public function lahan()
    {
        return $this->belongsTo(Lahan::class, 'lahan_id');
    }
}

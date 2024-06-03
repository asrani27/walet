<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upah extends Model
{
    protected $table = 'upah';

    public function pekerja()
    {
        return $this->belongsTo(Pekerja::class, 'pekerja_id');
    }
}

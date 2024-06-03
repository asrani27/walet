<?php

namespace App;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;

class Panen extends Model
{
    protected $table = 'panen';
    protected $guarded = ['id'];

    public function sawit()
    {
        return $this->belongsTo(Sawit::class, 'sawit_id');
    }
    public function lahan()
    {
        return $this->belongsTo(Lahan::class, 'lahan_id');
    }
}

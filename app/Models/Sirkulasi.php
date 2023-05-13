<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sirkulasi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function koleksi()
    {
        return $this->belongsTo('App\Models\Koleksi');
    }

    public function anggota()
    {
        return $this->belongsTo('App\Models\Anggota');
    }

    public function pengembalian()
    {
        return $this->hasOne('App\Models\Pengembalian');
    }
}

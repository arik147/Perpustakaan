<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sirkulasi()
    {
        return $this->belongsTo('App\Models\Sirkulasi');
    }
}

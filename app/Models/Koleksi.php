<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function biblio()
    {
        return $this->belongsTo('App\Models\Biblio');
    }

    public function sirkulasis()
    {
        return $this->hasMany('App\Models\Sirkulasi');
    }
}
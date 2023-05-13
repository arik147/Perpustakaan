<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
 
    // Cara 2
    protected $guarded = [];

    public function sirkulasis()
    {
        return $this->hasMany('App\Models\Sirkulasi');
    }
}

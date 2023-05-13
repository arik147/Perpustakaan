<?php

namespace App\Http\Controllers;
use App\Models\pengembalian;

use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    //
    public function index () {
        $pengembalians = Pengembalian::all();

        return view('pengembalian.index', ['pengembalians' => $pengembalians]);
    }

    public function show (Pengembalian $pengembalian) {
 
        return view('pengembalian.show', ['pengembalian' => $pengembalian]);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Sirkulasi;
use App\Models\Koleksi;
use App\Models\Anggota;
use App\Models\Pengembalian;

use Illuminate\Http\Request;

class SirkulasiController extends Controller
{
    //
    public function index () {
        $sirkulasis = Sirkulasi::where('status','y')
                    ->get();

        return view('sirkulasi.index', ['sirkulasis' => $sirkulasis]);
    }

    public function show (Sirkulasi $sirkulasi) {
 
        return view('sirkulasi.show', ['sirkulasi' => $sirkulasi]);
    }

    
    public function create() {

        $koleksis = Koleksi::where('status','ada')
                    ->orderBy('kode_buku')
                    ->get();
        
        $anggotas = Anggota::all();

        return view('sirkulasi.create', ['koleksis' => $koleksis], ['anggotas' => $anggotas]);
    }

    public function store (Request $request) {
 
        $validateData = $request->validate([
            'koleksi_id' => 'required',
            'anggota_id' => 'required',
            'lama_pinjam' => 'required',
        ]);
    
        $validateData['status'] = 'y';
        $validateData['tanggal_pinjam'] = now();

        // Cara 2
        Sirkulasi::create($validateData); 
        Koleksi::where('id', $validateData['koleksi_id'])->update(['status' => 'dipinjam']);
    
        // Cara 2
        return redirect()->route('sirkulasis.index')
            ->with('pesan',"Penambahan data sirkulasi berhasil!");
    }

    public function destroy (Sirkulasi $sirkulasi) {
        
        // update data sirkulasi
        Sirkulasi::where('id', $sirkulasi->id)->update(['status' => 'n']);

        $pengembalian = new Pengembalian();

        $pengembalian->sirkulasi_id = $sirkulasi->id;
        $pengembalian->tanggal_kembali = now();
        
        $pengembalian->save();

        Koleksi::where('id', $sirkulasi->koleksi->id)->update(['status' => 'ada']);
 
        return redirect()->route('sirkulasis.index')
          ->with('pesan',"Buku berhasil dikembalikan!");
    }
}

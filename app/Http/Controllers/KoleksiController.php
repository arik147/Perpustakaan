<?php

namespace App\Http\Controllers;
use App\Models\Koleksi;
use App\Models\Biblio;

use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    //
    public function index () {
        $koleksis = Koleksi::all();
        $biblios = Biblio::all();

        return view('koleksi.index', ['koleksis' => $koleksis], ['biblios' => $biblios]);
    }

    public function show (Koleksi $koleksi) {
        return view('koleksi.show', ['koleksi' => $koleksi]);
    }

    public function edit (Koleksi $koleksi) {

        $biblios = Biblio::all();
        return view('koleksi.edit', ['koleksi' => $koleksi], ['biblios' => $biblios]);
    }
 
    public function update (Request $request, Koleksi $koleksi) {
        $validateData = $request->validate([
            'biblio_id' => 'required',
            'kode_buku' => 'required|size:7|unique:koleksis,kode_buku,',
            'lokasi' => 'required',
            'kondisi' => 'required',
        ]);
 
        // Cara 2
        $koleksi->update($validateData);
 
        return redirect()->route('koleksis.show',['koleksi' => $koleksi->id])
            ->with('pesan',"Update {$validateData['kode_buku']} berhasil!");

    }
    
    public function create() {

        $biblios = Biblio::all();

        return view('koleksi.create', ['biblios' => $biblios]);
    }

    public function store (Request $request) {
 
        $validateData = $request->validate([
            'biblio_id' => 'required',
            'kode_buku' => 'required|size:7|unique:koleksis,kode_buku,',
            'lokasi' => 'required',
            'kondisi' => 'required',
        ]);
    
        $validateData['status'] = 'ada';
        
        // Cara 2
        Koleksi::create($validateData);
    
        // Cara 2
        return redirect()->route('koleksis.index')
            ->with('pesan',"Penambahan {$validateData['kode_buku']} berhasil!");
    }

    public function destroy (koleksi $koleksi) {
        $koleksi->delete();
 
        return redirect()->route('koleksis.index')
          ->with('pesan',"Hapus $koleksi->judul berhasil!");
    }

}

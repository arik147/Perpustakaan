<?php

namespace App\Http\Controllers;
use App\Models\Biblio;

use Illuminate\Http\Request;

class BiblioController extends Controller
{
    //
    public function index () {
        $biblios = Biblio::all();

        return view('biblio.index', ['biblios' => $biblios]);
    }

    public function show (Biblio $biblio) {
 
        return view('biblio.show', ['biblio' => $biblio]);
    }

    public function edit (biblio $biblio) {
        return view('biblio.edit',['biblio' => $biblio]);
    }
 
    public function update (Request $request, Biblio $biblio) {
        $validateData = $request->validate([

            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'edisi' => 'required',
            'tahun' => 'required',
            'isbn' => 'required',
            'jumlah_halaman' => 'required',
            'kategori' => 'required',
            'sinopsis' => 'required',
            'image' => 'image|file|max:1024',
  
        ]);

        if ($request->file('image'))
        {
            $validateData['image'] = $request->file('image')->store('biblio-images');
        }
 
        $biblio->update($validateData);
 
        return redirect()->route('biblios.show',['biblio' => $biblio->id])
            ->with('pesan',"Update {$validateData['judul']} berhasil!");
            

    }
    
    public function create() {
        return view('biblio.create');
    }

    public function store (Request $request) {
 
        $validateData = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'edisi' => 'required',
            'tahun' => 'required',
            'isbn' => 'required',
            'kategori' => 'required',
            'sinopsis' => 'required',
            'jumlah_halaman' => 'required',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image'))
        {
            $validateData['image'] = $request->file('image')->store('biblio-images');
        }
    
        // Cara 2
        biblio::create($validateData); 
    
        // Cara 2
        return redirect()->route('biblios.index')
            ->with('pesan',"Penambahan {$validateData['judul']} berhasil!");
    }

    public function destroy (Biblio $biblio) {
        $biblio->delete();
 
        return redirect()->route('biblios.index')
          ->with('pesan',"Hapus $biblio->judul berhasil!");
    }
}

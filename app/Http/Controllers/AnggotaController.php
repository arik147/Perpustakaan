<?php

namespace App\Http\Controllers;
use App\Models\Anggota;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    //
    public function index () {
        $anggotas = Anggota::all();

        return view('anggota.index', ['anggotas' => $anggotas]);
    }

    public function show (Anggota $anggota) {
 
        return view('anggota.show', ['anggota' => $anggota]);
    }

    public function edit (Anggota $anggota) {
        return view('anggota.edit',['anggota' => $anggota]);
    }
 
    public function update (Request $request, Anggota $anggota) {
        $validateData = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'username' => 'required|unique:anggotas,username,',
            'password' => 'required',
            'alamat' => 'required',
            'nik' => 'required|size:16|unique:anggotas,nik,',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image'))
        {
            $validateData['image'] = $request->file('image')->store('biblio-images');
        }
 
        // Cara 2
        $anggota->update($validateData);
 
        return redirect()->route('anggotas.show',['anggota' => $anggota->id])
            ->with('pesan',"Update {$validateData['nama']} berhasil!");
            
    }
    
    public function create() {
        return view('anggota.create');
    }

    public function store (Request $request) {
 
        $validateData = $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:anggotas,email,',
            'username' => 'required|unique:anggotas,username,',
            'password' => 'required|min:8',
            'alamat' => 'required',
            'nik' => 'required|size:16|unique:anggotas,nik,',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image'))
        {
            $validateData['image'] = $request->file('image')->store('biblio-images');
        }
    
        // Cara 2
        anggota::create($validateData); 
    
        // Cara 2
        return redirect()->route('anggotas.index')
            ->with('pesan',"Penambahan {$validateData['nama']} berhasil!");
    }

    public function destroy (Anggota $anggota) {
        $anggota->delete();
 
        return redirect()->route('anggotas.index')
          ->with('pesan',"Hapus $anggota->nama berhasil!");
    }

}

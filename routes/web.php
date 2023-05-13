<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiblioController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\SirkulasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
    Arik Rizki Akbar
    2007392
    Ilmu Komputer - C1 2020
    Tugas UAS DPW 2022
*/

/* Route::get('/', function () {
    return view('page');
}); */

Route::get('/', [BiblioController::class,'index'])
    ->name('biblios.index');

/* ------- Routing Bibliografi ------- */
Route::get('/biblios', [BiblioController::class,'index'])
    ->name('biblios.index');

Route::get('/biblios/create', [BiblioController::class,'create'])
    ->name('biblios.create');
 
Route::post('/biblios', [BiblioController::class,'store'])
    ->name('biblios.store');

Route::get('/biblios/{biblio}', [BiblioController::class,'show'])
    ->name('biblios.show');

Route::get('/biblios/{biblio}/edit', [BiblioController::class,'edit'])
    ->name('biblios.edit');

Route::put('/biblios/{biblio}', [BiblioController::class,'update'])
    ->name('biblios.update');

Route::delete('/biblio/{biblio}', [BiblioController::class,'destroy'])
    ->name('biblios.destroy');


/* ------- Routing Anggota ------- */

Route::get('/anggotas', [AnggotaController::class,'index'])
    ->name('anggotas.index');

Route::get('/anggotas/create', [AnggotaController::class,'create'])
    ->name('anggotas.create');
 
Route::post('/anggotas', [AnggotaController::class,'store'])
    ->name('anggotas.store');

Route::get('/anggotas/{anggota}', [AnggotaController::class,'show'])
    ->name('anggotas.show');

Route::get('/anggotas/{anggota}/edit', [AnggotaController::class,'edit'])
    ->name('anggotas.edit');

Route::put('/anggotas/{anggota}', [AnggotaController::class,'update'])
    ->name('anggotas.update');

Route::delete('/anggota/{anggota}', [AnggotaController::class,'destroy'])
    ->name('anggotas.destroy');


/* ------- Routing Koleksi ------- */

Route::get('/koleksis', [KoleksiController::class,'index'])
    ->name('koleksis.index');

Route::get('/koleksis/create', [KoleksiController::class,'create'])
    ->name('koleksis.create');
 
Route::post('/koleksis', [KoleksiController::class,'store'])
    ->name('koleksis.store');

Route::get('/koleksis/{koleksi}', [KoleksiController::class,'show'])
    ->name('koleksis.show');

Route::get('/koleksis/{koleksi}/edit', [KoleksiController::class,'edit'])
    ->name('koleksis.edit');

Route::put('/koleksis/{koleksi}', [KoleksiController::class,'update'])
    ->name('koleksis.update');

Route::delete('/koleksi/{koleksi}', [KoleksiController::class,'destroy'])
    ->name('koleksis.destroy');


/* ------- Routing Sirkulasis ------- */
Route::get('/sirkulasis', [SirkulasiController::class,'index'])
    ->name('sirkulasis.index');

Route::get('/sirkulasis/create', [SirkulasiController::class,'create'])
    ->name('sirkulasis.create');
 
Route::post('/sirkulasis', [SirkulasiController::class,'store'])
    ->name('sirkulasis.store');

Route::delete('/sirkulasi/{sirkulasi}', [SirkulasiController::class,'destroy'])
    ->name('sirkulasis.destroy');


/* ------- Routing Pengembalian ------- */
Route::get('/pengembalians', [PengembalianController::class,'index'])
    ->name('pengembalians.index');
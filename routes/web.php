<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RekapMasjidController;
use App\Http\Controllers\RekapSosialController;
use App\Http\Controllers\PemasukanMasjidController;
use App\Http\Controllers\PemasukanSosialController;
use App\Http\Controllers\PengeluaranMasjidController;
use App\Http\Controllers\PengeluaranSosialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login',[SessionController::class, 'index'])->name('login');
Route::post('/login-proses',[SessionController::class, 'login_proses'])->name('login-proses');
Route::post('/logout',[SessionController::class, 'logout'])->name('logout');


Route::middleware(['auth.backoffice'])->group(function () {

    //Pemasukan Kass Masjid
Route::get('/pemasukanmasjid', [PemasukanMasjidController::class, 'index'])->name('pemasukanmasjid.index');
Route::get('/pemasukanmasjid/create', [PemasukanMasjidController::class, 'create'])->name('pemasukanmasjid.create');
Route::post('/pemasukanmasjid/store', [PemasukanMasjidController::class, 'store'])->name('pemasukanmasjid.store');
Route::get('/pemasukanmasjid/{pemasukanmasjid}/edit', [PemasukanMasjidController::class, 'edit'])->name('pemasukanmasjid.edit');
Route::put('/pemasukanmasjid/{pemasukanmasjid}/update', [PemasukanMasjidController::class, 'update'])->name('pemasukanmasjid.update');
Route::delete('/pemasukanmasjid/{pemasukanmasjid}/destroy', [PemasukanMasjidController::class, 'destroy'])->name('pemasukanmasjid.destroy');

//Rekening Kass Masjid
Route::get('/rekening', [RekeningController::class, 'index'])->name('rekening.index');
Route::get('/rekening/create', [RekeningController::class, 'create'])->name('rekening.create');
Route::post('/rekening/store', [RekeningController::class, 'store'])->name('rekening.store');
Route::get('/rekening/{rekening}/edit', [RekeningController::class, 'edit'])->name('rekening.edit');
Route::put('/rekening/{rekening}/update', [RekeningController::class, 'update'])->name('rekening.update');
Route::delete('/rekening/{rekening}/destroy', [RekeningController::class, 'destroy'])->name('rekening.destroy');

//Pengeluaran Kass Masjid
Route::get('/pengeluaranmasjid', [PengeluaranMasjidController::class, 'index'])->name('pengeluaranmasjid.index');
Route::get('/pengeluaranmasjid/create', [PengeluaranMasjidController::class, 'create'])->name('pengeluaranmasjid.create');
Route::post('/pengeluaranmasjid/store', [PengeluaranMasjidController::class, 'store'])->name('pengeluaranmasjid.store');
Route::get('/pengeluaranmasjid/{pengeluaranmasjid}/edit', [PengeluaranMasjidController::class, 'edit'])->name('pengeluaranmasjid.edit');
Route::put('/pengeluaranmasjid/{pengeluaranmasjid}/update', [PengeluaranMasjidController::class, 'update'])->name('pengeluaranmasjid.update');
Route::delete('/pengeluaranmasjid/{pengeluaranmasjid}/destroy', [PengeluaranMasjidController::class, 'destroy'])->name('pengeluaranmasjid.destroy');

//Pemasukan Kass Sosial
Route::get('/pemasukansosial', [PemasukanSosialController::class, 'index'])->name('pemasukansosial.index');
Route::get('/pemasukansosial/create', [PemasukanSosialController::class, 'create'])->name('pemasukansosial.create');
Route::post('/pemasukansosial/store', [PemasukanSosialController::class, 'store'])->name('pemasukansosial.store');
Route::get('/pemasukansosial/{pemasukansosial}/edit', [PemasukanSosialController::class, 'edit'])->name('pemasukansosial.edit');
Route::put('/pemasukansosial/{pemasukansosial}/update', [PemasukanSosialController::class, 'update'])->name('pemasukansosial.update');
Route::delete('/pemasukansosial/{pemasukansosial}/destroy', [PemasukanSosialController::class, 'destroy'])->name('pemasukansosial.destroy');

//Pengeluaran Kass Sosial
Route::get('/pengeluaransosial', [PengeluaranSosialController::class, 'index'])->name('pengeluaransosial.index');
Route::get('/pengeluaransosial/create', [PengeluaranSosialController::class, 'create'])->name('pengeluaransosial.create');
Route::post('/pengeluaransosial/store', [PengeluaranSosialController::class, 'store'])->name('pengeluaransosial.store');
Route::get('/pengeluaransosial/{pengeluaransosial}/edit', [PengeluaranSosialController::class, 'edit'])->name('pengeluaransosial.edit');
Route::put('/pengeluaransosial/{pengeluaransosial}/update', [PengeluaranSosialController::class, 'update'])->name('pengeluaransosial.update');
Route::delete('/pengeluaransosial/{pengeluaransosial}/destroy', [PengeluaranSosialController::class, 'destroy'])->name('pengeluaransosial.destroy');

//Rekap Kas Masjid
Route::get('/rekapmasjid', [RekapMasjidController::class, 'index'])->name('rekapmasjid.index');
Route::get('/laporan-kas-masjid', [RekapMasjidController::class, 'showLaporanForm'])->name('laporan.kas.masjid');
Route::post('/laporan-kas-masjid', [RekapMasjidController::class, 'cetakLaporan'])->name('laporan.kas.masjid.cetak');

//Rekap Kas Sosial
Route::get('/rekapsosial', [RekapSosialController::class, 'index'])->name('rekapsosial.index');
Route::get('/laporan-kas-sosial', [RekapSosialController::class, 'showLaporanForm'])->name('laporan.kas.sosial');
Route::post('/laporan-kas-sosial/cetak', [RekapSosialController::class, 'cetakLaporan'])->name('laporan.kas.sosial.cetak');

//Pemasukan Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


    //Users
    Route::resource('users', UserController::class);

});







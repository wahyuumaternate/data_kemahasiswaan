<?php

use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PendaftaranBemController;
use App\Http\Controllers\PengurusBemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramKerjaController;
use App\Models\Dokumentasi;
use App\Models\PengurusBem;
use App\Models\ProgramKerja;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\App;

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

Route::get('/reset-database', function () {
    if (App::environment('local')) {
        Artisan::call('migrate:fresh --seed');
        return 'Database reset and seeded!';
    } else {
        abort(403, 'Unauthorized');
    }
});

Route::get('/', function () {
    // Ambil semua data dokumentasi, urut terbaru dulu
            $dokumentasi = Dokumentasi::orderBy('created_at', 'desc')->get();
    return view('frontend.index',compact('dokumentasi'));
})->name('home');


Route::get('/dashboard', function () {
    $totalPengurus = PengurusBem::count();
    $totalProgramKerja = ProgramKerja::count();
    return view('dashboard', compact('totalPengurus', 'totalProgramKerja'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // pnegurus
    Route::get('/pengurus', [PengurusBemController::class, 'index'])->name('pengurus.index');
    Route::get('/pengurus/create', [PengurusBemController::class, 'create'])->name('pengurus.create');
    Route::post('/pengurus', [PengurusBemController::class, 'store'])->name('pengurus.store');
    Route::get('/pengurus/{penguru}/edit', [PengurusBemController::class, 'edit'])->name('pengurus.edit');
    Route::put('/pengurus/{penguru}', [PengurusBemController::class, 'update'])->name('pengurus.update');
    Route::delete('/pengurus/{penguru}', [PengurusBemController::class, 'destroy'])->name('pengurus.destroy');
    Route::get('/pengurus/download/pdf', [PengurusBemController::class, 'downloadPdf'])->name('pengurus.download.pdf');
    // end pnegurus

    Route::get('/program-kerja', [ProgramKerjaController::class, 'index'])->name('program-kerja.index');
    Route::get('/program-kerja/create', [ProgramKerjaController::class, 'create'])->name('program-kerja.create');
    Route::post('/program-kerja', [ProgramKerjaController::class, 'store'])->name('program-kerja.store');
    Route::get('/program-kerja/{programKerja}/edit', [ProgramKerjaController::class, 'edit'])->name('program-kerja.edit');
    Route::put('/program-kerja/{programKerja}', [ProgramKerjaController::class, 'update'])->name('program-kerja.update');
    Route::delete('/program-kerja/{programKerja}', [ProgramKerjaController::class, 'destroy'])->name('program-kerja.destroy');
    Route::get('/program-kerja/download/pdf', [ProgramKerjaController::class, 'downloadPdf'])->name('program-kerja.download.pdf');

    // Tampilkan semua data mahasiswa
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    // Tampilkan form tambah mahasiswa
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    // Simpan data mahasiswa baru
    Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    // Tampilkan detail mahasiswa
    Route::get('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
    // Tampilkan form edit mahasiswa
    Route::get('/mahasiswa/{mahasiswa}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    // Update data mahasiswa
    Route::put('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    // Hapus data mahasiswa
    Route::delete('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

    Route::get('/dokumentasi', [DokumentasiController::class, 'index'])->name('dokumentasi.index');
    Route::get('/dokumentasi/create', [DokumentasiController::class, 'create'])->name('dokumentasi.create');
    Route::post('/dokumentasi', [DokumentasiController::class, 'store'])->name('dokumentasi.store');
    Route::get('/dokumentasi/{dokumentasi}/edit', [DokumentasiController::class, 'edit'])->name('dokumentasi.edit');
    Route::put('/dokumentasi/{dokumentasi}', [DokumentasiController::class, 'update'])->name('dokumentasi.update');
    Route::delete('/dokumentasi/{dokumentasi}', [DokumentasiController::class, 'destroy'])->name('dokumentasi.destroy');

     Route::resource('bem',PendaftaranBemController::class);
});

Route::get('/program-kerja', [FrontEndController::class, 'programKerja'])->name('program.kerja');
// Download PDF Program Kerja
Route::get('/program-kerja/download', [FrontendController::class, 'downloadProgramKerja'])->name('program.kerja.download');

// Tampilkan halaman Pengurus BEM
Route::get('/pengurus', [FrontendController::class, 'pengurus'])->name('pengurus');

// Download PDF Pengurus BEM
Route::get('/pengurus/download', [PengurusBemController::class, 'downloadPdf'])->name('pengurus.download');

Route::get('/mahasiswa', [FrontEndController::class, 'mahasiswa'])->name('mahasiswa');
Route::get('/dokumentasi', [FrontEndController::class, 'dokumentasi'])->name('dokumentasi');

Route::get('/pendaftaran-bem', [FrontendController::class, 'createBem'])->name('bem.form');
Route::post('/pendaftaran-bem', [FrontendController::class, 'storeBem'])->name('bem.store');

require __DIR__.'/auth.php';

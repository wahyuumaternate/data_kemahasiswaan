<?php

use App\Http\Controllers\PengurusBemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramKerjaController;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
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
});



require __DIR__.'/auth.php';

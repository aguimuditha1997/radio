<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/kategory', function () {
    return view('back.kategori.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get ('kategori' ,  [KategoriController::class, 'index'])->name('kategori.index');
    Route::get ('kategori/edit' , [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('kategori/create' , [KategoriController::class,'create'])->name('kategori.create');
    Route::get('kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy'); 

    Route::get ('artikel' ,  [ArtikelController::class, 'index'])->name('artikel.index');
    Route::get('artikel/create' , [ArtikelController::class,'create'])->name('artikel.create');
    Route::post('artikel', [ArtikelController::class, 'store'])->name('artikel.store');
});

require __DIR__.'/auth.php';

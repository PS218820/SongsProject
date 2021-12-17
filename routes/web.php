<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\SongAlbumController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/songs', [SongController::class, 'index'])->Name('songs.index');

Route::get('/songs/create', function () {
    return view('Songs.create');
})->middleware(['auth']);
Route::get('/songs/{id}',[SongController::class, 'show']);
Route::get('/songs/{id}/edit',[SongController::class, 'edit'])->middleware(['auth']);
Route::post('/songs', [SongController::class, 'store'])->name('songs.store')->middleware(['auth']);
Route::delete('/songs/{id}', [SongController::class, 'destroy'])->name('songs.destroy')->middleware(['auth']);
Route::put('/songs/{id}', [SongController::class, 'update'])->name('songs.update')->middleware(['auth']);



//Albums
Route::get('/albums', [AlbumController::class, 'index'])->Name('albums.index');

Route::get('/albums/create', function () {
    return view('Albums.create');
})->middleware(['auth']);
Route::get('/albums/{id}',[AlbumController::class, 'show']);
Route::get('/albums/{id}/edit',[AlbumController::class, 'edit'])->middleware(['auth']);
Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store')->middleware(['auth']);
Route::delete('/albums/{id}', [AlbumController::class, 'destroy'])->name('albums.destroy')->middleware(['auth']);
Route::put('/albums/{id}', [AlbumController::class, 'update'])->name('albums.update')->middleware(['auth']);


//Bands
Route::get('/bands', [BandController::class, 'index'])->Name('bands.index');

Route::get('/bands/create', function () {
    return view('Bands.create')->middleware(['auth']);
});
Route::get('/bands/{id}',[BandController::class, 'show']);
Route::get('/bands/{id}/edit',[BandController::class, 'edit'])->middleware(['auth']);
Route::post('/bands', [BandController::class, 'store'])->name('bands.store')->middleware(['auth']);
Route::delete('/bands/{id}', [BandController::class, 'destroy'])->name('bands.destroy')->middleware(['auth']);
Route::put('/bands/{id}', [BandController::class, 'update'])->name('bands.update')->middleware(['auth']);

//SongAlbum
Route::post('/songs/{id}/albums', [SongAlbumController::class, 'store'])->name('songsAlbum.store')->middleware(['auth']);
// Route::delete('/songs/{id}', [SongAlbumController::class, 'destroy'])->name('songsAlbum.destroy');



require __DIR__.'/auth.php';

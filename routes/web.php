<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DiskController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\PaginateArtistController;
use App\Http\Controllers\PaisController;

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
    return view('index');
});

Route::resource('movie', MovieController::class);
Route::get('movie/view/{ide}',[MovieController::class, 'view'])-> name('movie.view');

Route::get('setting',[SettingController::class, 'index'])-> name('setting.index');
Route::put('setting',[SettingController::class, 'update'])-> name('setting.update');

// Hacemos la ruta para setear los paises
Route::get('setting/showSelect',[SettingController::class, 'showSelect'])-> name('setting.showSelect');

// Definimos las rutas para discos y artistas
Route::resource('artist', ArtistController::class);
// Ruta para paginación
Route::resource('paginateartist', PaginateArtistController::class);
Route::get('paginateartist2', [PaginateArtistController::class, 'index2'])->name('paginateartist.index2');
Route::resource('disk', DiskController::class);
Route::get('disk/view/file/fotosubida.jpg', [DiskController::class, 'view'])->name('disk.view');

// Ruta para añadir disco a usuarios
Route::get('disk/create/{idartist}', [DiskController::class, 'createArtist'])->name('disk.create.artist');
Route::get('pais', [PaisController::class, 'index'])->name('pais.index');
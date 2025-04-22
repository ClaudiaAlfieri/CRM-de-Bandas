<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandaController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('dashboard.home');
});

//Rotas para as bandas

//Ver todas as bandas
Route::get('/bands', [BandaController::class, 'returnAllBandsView'])->name('bands');

//Adicionar bandas
Route::get('/add_bands', [BandaController::class, 'returnAddBandsView'])->name('add_bands') ->middleware('auth');

Route::post('/create_bands', [BandaController::class, 'createBands'] )->name('bands.create') ->middleware('auth');

//Ver/Editar banda

Route::get('/bandsView/{id}', [BandaController::class, 'bandsView'])->name('bandsView');

//Deletar bandas
Route::get('delete_band/{id}', [BandaController::class, 'deleteBand'])->name('deleteBand') ->middleware('auth');

//Rota para alterar dados das Bandas

Route::post('/update_band', [BandaController::class, 'updateBand'])->name('updateBand') ->middleware('auth');

//Rota para mostrar apenas os albums da banda pesquisada
Route::get('/bands/{id}/albums', [BandaController::class, 'showAlbums'])->name('bands.albums');




//Rotas para os albums

//Ver todos os albums
Route::get('/albums', [AlbumController::class, 'returnAllAlbumsView'])->name('albums');

//Adicionar albums
Route::get('/add_albums', [AlbumController::class, 'returnAddAlbumsView'])->name('add_albums') ->middleware('auth');

Route::post('/create_albums', [AlbumController::class, 'createAlbums'] )->name('albums.create') ->middleware('auth');

//Ver/editar detalhe do album

Route::get('/albumsView/{id}', [AlbumController::class, 'albumsView'])->name('albumsView');

//Deletar bandas
Route::get('delete_album/{id}', [AlbumController::class, 'deleteAlbum'])->name('deleteAlbum') ->middleware('auth');

//Rota para alterar dados dos albums

Route::post('/update_album', [AlbumController::class, 'updateAlbum'])->name('updateAlbum') ->middleware('auth');




//Rotas para os users

//Ver todas os users
Route::get('/users', [UserController::class, 'returnAllUsersView'])->name('users');

//Adicionar users
Route::get('/add_users', [UserController::class, 'returnAddUsersView'])->name('add_users') ->middleware('auth');

Route::post('/create_users', [UserController::class, 'createUsers'] )->name('users.create') ->middleware('auth');

//Ver detalhe do user

Route::get('/usersView/{id}', [UserController::class, 'usersView'])->name('usersView');

//Deletar users
Route::get('delete_user/{id}', [UserController::class, 'deleteUser'])->name('deleteUser') ->middleware('auth');

//Rota para alterar dados dos users

Route::post('/update_user', [UserController::class, 'updateUser'])->name('updateUser');




//Rota Dashboard

Route::get('/home',[DashboardController::class, 'returDashboardView']) ->name('home');


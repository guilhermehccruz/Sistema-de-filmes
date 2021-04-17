<?php

use App\Http\Controllers\FilmeController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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

Route::match(
    ['get', 'post'],
    '/',
    [UsuarioController::class, 'login']
)->name('login');

Route::match(
    ['get', 'post'],
    '/sair',
    [UsuarioController::class, 'sair']
)->name('sair');

Route::middleware(['auth'])->prefix("home")->name("home.")->group(
    function () {
        // Chama home.index
        Route::match(
            ['get', 'post'],
            '/',
            [FilmeController::class, 'index']
        )->name('index');

        // Usuarios
        // Chama home.usuarios
        Route::match(
            ['get', 'post'],
            '/usuarios',
            [UsuarioController::class, 'listaCadastra']
        )->name('usuarios');

        // Chama home.usuarios.delete
        Route::match(
            ['get', 'post'],
            '/usuarios/{id}/delete',
            [UsuarioController::class, 'delete']
        )->name('usuarios.delete');


        // Filmes
        // Chama home.filmes
        Route::match(
            ['get', 'post'],
            '/filmes',
            [FilmeController::class, 'listaCadastra']
        )->name('filmes');

        // Chama home.filmes.filme
        Route::match(
            ['get', 'post'],
            '/filmes/{slug}',
            [FilmeController::class, 'info']
        )->name('filmes.filme');

        // Chama home.filmes.filme.edit
        Route::match(
            ['get', 'post'],
            '/filmes/{slug}/edit',
            [FilmeController::class, 'edit']
        )->name('filmes.filme.edit');

        // Chama home.filmes.filme.delete
        Route::match(
            ['get', 'post'],
            '/filmes/{slug}/delete',
            [FilmeController::class, 'delete']
        )->name('filmes.filme.delete');
    }
);
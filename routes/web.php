<?php

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
            [UsuarioController::class, 'index']
        )->name('index');

        // Chama home.usuarios.usuarios
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
    }
);
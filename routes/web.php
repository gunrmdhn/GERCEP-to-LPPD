<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dinsos\DinsosController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PUPR\PUPRController;
use App\Http\Controllers\Auth\MasukController;
use App\Http\Controllers\Auth\PenggunaController;
use App\Http\Controllers\Kabag\BerkasController;
use App\Http\Controllers\Dinkes\DinkesController;
use App\Http\Controllers\Dinpend\DinpendController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Kabag\KabagController;
use App\Http\Controllers\SatpolPP\SatpolPPController;
use App\Http\Controllers\Sekda\SekdaController;

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

Route::get('/', IndexController::class)->name('index');

Route::get('/masuk', MasukController::class)->name('login')->middleware('guest');
Route::name('auth.')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/authenticate', 'authenticate')->name('authenticate')->middleware('guest');
        Route::get('/keluar', 'logout')->name('keluar')->middleware('auth');
    });
});

Route::resource('/dinkes', DinkesController::class)->parameters(['dinkes' => 'dinkes'])->middleware('can:dinkes');

Route::resource('/pupr', PUPRController::class)->middleware('can:pupr');

Route::resource('/dinpend', DinpendController::class)->middleware('can:dinpend');

Route::resource('/satpolpp', SatpolPPController::class)->middleware('can:satpolpp');

Route::resource('/dinsos', DinsosController::class)->parameters(['dinsos' => 'dinsos'])->middleware('can:dinsos');

Route::controller(KabagController::class)->group(function () {
    Route::get('/kabag', 'index')->name('kabag.index');
    Route::put('/kabag/dinkes/{dinkes}', 'updateDinkes')->name('update.dinkes');
    Route::put('/kabag/pupr/{pupr}', 'updatePupr')->name('update.pupr');
    Route::put('/kabag/dinpend/{dinpend}', 'updateDinpend')->name('update.dinpend');
    Route::put('/kabag/satpolpp/{satpolpp}', 'updateSatpolPP')->name('update.satpolpp');
    Route::put('/kabag/dinsos/{dinsos}', 'updateDinsos')->name('update.dinsos');
})->middleware('can:kabag');
Route::resource('/berkas', BerkasController::class)->parameters(['berkas' => 'berkas'])->middleware('can:kabag');
Route::resource('/pengguna', PenggunaController::class)->parameters(['pengguna' => 'user'])->middleware('can:kabag');

Route::get('/sekda', SekdaController::class)->name('sekda.index')->middleware('can:sekda');

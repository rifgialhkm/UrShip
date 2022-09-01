<?php

use App\Http\Controllers\CostController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function() {
    return redirect('cek-ongkir');
});
Route::get('cek-ongkir', [CostController::class, 'cekOngkir'])->name('cek-ongkir');
Route::get('getCity/ajax/{id}', [CostController::class, 'getCityAjax']);
Route::get('getSubdistrict/ajax/{id}', [CostController::class, 'getSubdistrictAjax']);
Route::get('cek-resi', [CostController::class, 'cekResi'])->name('cek-resi');

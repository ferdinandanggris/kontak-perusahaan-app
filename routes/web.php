<?php

use App\Http\Controllers\PerusahaanController;
use App\Models\PerusahaanModel;
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

Route::get('/', function () {
    return redirect('/perusahaan');
});

Route::resource('perusahaan',PerusahaanController::class);
// Route::delete('/perusahaan',[PerusahaanController::class, 'destroy']);
Route::put('/perusahaan/editStatus/{id}',[PerusahaanController::class, 'editStatus']);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildingController;
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

Route::get('buildings', [BuildingController::class, 'index'])->name("buildings.index");
Route::get('buildings/{building}', [BuildingController::class, 'show'])->name("buildings.show");

require __DIR__.'/auth.php';

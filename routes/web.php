<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ResourceController;
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
Route::get('buildings/all/{building}', [BuildingController::class, 'show'])->name("buildings.show");

Route::get('resources', [ResourceController::class, 'index'])->name("resources.index");
Route::get('resources/all/{resource}', [ResourceController::class, 'show'])->name("resources.show");

Route::middleware(['auth'])->group(function () {
    Route::get('buildings/mymap', [BuildingController::class, 'mymap'])->name("buildings.mymap");
    Route::get('buildings/my', [BuildingController::class, 'myindex'])->name("buildings.myindex");
    Route::get('buildings/my/{building}', [BuildingController::class, 'myshow'])->name("buildings.myshow");
    Route::get('buildings/create/{buildinguser}', [BuildingController::class, 'create'])->name("buildings.create");
    Route::get('buildings/upgrade/{buildinguser}/{building}', [BuildingController::class, 'upgrade'])->name("buildings.upgrade");
    Route::get('buildings/make/{buildinguser}/{building}', [BuildingController::class, 'make'])->name("buildings.make");

    Route::get('resources/my', [ResourceController::class, 'myindex'])->name("resources.myindex");
    Route::get('resources/my/{resource}', [ResourceController::class, 'myshow'])->name("resources.myshow");
});

require __DIR__.'/auth.php';

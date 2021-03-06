<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\MarketController;
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

Route::redirect('/', 'dashboard');

Route::get('katana', [BuildingController::class, 'katana'])->name("katana");

Route::get('buildings/all/{building}', [BuildingController::class, 'show'])->name("buildings.show");
Route::get('resources/my', [ResourceController::class, 'myindex'])->name("resources.myindex");
Route::get('help', [BuildingController::class, 'help'])->name("help");

Route::middleware(['auth'])->group(function () {
    Route::redirect('dashboard', 'buildings/mymap')->middleware(['auth'])->name('dashboard');

    Route::get('buildings', [BuildingController::class, 'index'])->name("buildings.index");

    Route::get('resources', [ResourceController::class, 'index'])->name("resources.index");
    Route::get('resources/all/{resource}', [ResourceController::class, 'show'])->name("resources.show");

    Route::get('buildings/mymap', [BuildingController::class, 'mymap'])->name("buildings.mymap");
    Route::get('buildings/my', [BuildingController::class, 'myindex'])->name("buildings.myindex");
    Route::get('buildings/my/{buildinguser}/{building}', [BuildingController::class, 'myshow'])->name("buildings.myshow");
    Route::get('buildings/create/{buildinguser}', [BuildingController::class, 'create'])->name("buildings.create");
    Route::get('buildings/upgrade/{buildinguser}/{building}', [BuildingController::class, 'upgrade'])->name("buildings.upgrade");
    Route::get('buildings/make/{buildinguser}/{building}', [BuildingController::class, 'make'])->name("buildings.make");

    Route::get('resources/my/{resource}', [ResourceController::class, 'myshow'])->name("resources.myshow");

    Route::get('market', [MarketController::class, 'index'])->name("market.index");
    Route::get('market/create', [MarketController::class, 'create'])->name("market.create");
    Route::post('market', [MarketController::class, 'store'])->name("market.store");
    Route::get('market/buy/{market}', [MarketController::class, 'buy'])->name("market.buy");
    Route::patch('market/buy/{market}', [MarketController::class, 'update'])->name("market.update");
});

require __DIR__.'/auth.php';

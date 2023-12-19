<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DemandsController;
use App\Http\Controllers\Admin\JobsController;
use App\Http\Controllers\Admin\LanguagesController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\ReferencesController;
use App\Http\Controllers\Admin\TypesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});


Route::middleware(['auth', 'client'])
    ->group(function () {
        // Route::get('/', [HomeController::class, 'index'])->name('home');

        Route::resource('offers', OffersController::class);
        Route::post('/demands', [DemandsController::class, 'store'])->name('demands.store');

        Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}', [OrdersController::class, 'update'])->name('orders.update');

        Route::get('/payments', [PaymentsController::class, 'index'])->name('payments.index');

        Route::resource('clients', ClientsController::class);
    });

Route::prefix('admin')
    ->namespace('App\Http\Controllers\Admin') // default letak folder pada controller
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('types', TypesController::class);

        Route::resource('jobs', JobsController::class);

        Route::get('/demands', [DemandsController::class, 'index'])->name('demands.index');
        Route::get('/demands{id}', [DemandsController::class, 'update'])->name('demands.update');

        Route::resource('languages', LanguagesController::class);

        Route::resource('references', ReferencesController::class);
        Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');
    });

require __DIR__ . '/auth.php';

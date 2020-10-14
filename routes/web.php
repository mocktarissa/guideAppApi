<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/', [DashboardController::class, 'dashboard']);
Route::middleware(['auth:sanctum', 'verified'])->get('/company/list', [CompanyController::class, 'list']);
Route::middleware(['auth:sanctum', 'verified'])->get('/company/create', [CompanyController::class, 'create']);
Route::middleware(['auth:sanctum', 'verified'])->post('/company/store', [CompanyController::class, 'store']);
Route::get('/test', [DashboardController::class, 'signup'])->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'login'])->name('dashboard');

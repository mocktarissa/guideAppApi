<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PoiController;
use App\Http\Controllers\CompanyApiController;
use App\Http\Controllers\PoiApiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QrCodeApiController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\SearchController;
use App\Models\Category;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/', [CompanyController::class, 'index']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/company/list', [CompanyController::class, 'list']);
// Route::middleware(['auth:sanctum', 'verified'])->get('/company/create', [CompanyController::class, 'create']);
// Route::middleware(['auth:sanctum', 'verified'])->post('/company/store', [CompanyController::class, 'store']);
// Route::middleware(['auth:sanctum', 'verified'])->get('/company/view', [CompanyController::class, 'view_one']);
// Route::get('/test', [DashboardController::class, 'signup'])->middleware('auth');
Route::resource('company', CompanyController::class)->middleware('auth');
Route::resource('company.category', CategoryController::class)->middleware('auth');
Route::resource('company.qrcode', QrCodeController::class)->middleware('auth');
Route::resource('company.pois', PoiController::class)->middleware('auth'); //->except(['store'])
// Route::post('/val/company/{company}/pois', [PoiController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'login'])->name('dashboard');
Route::get('/api/company/', [CompanyApiController::class, 'index']);
Route::get('/api/company/{company}', [CompanyApiController::class, 'show']);

Route::get('/api/company/{company}/pois', [PoiApiController::class, 'index']);
Route::get('/api/company/{company}/pois/{poi}', [PoiApiController::class, 'show']);

Route::get('/api/qrcode/{id}', [QrCodeApiController::class, 'show']);
// Route::get('/poi/{id}/image', [PoiController::class, 'poiImage'])->name('poi.image');
Route::get('/api/search/', [SearchController::class, 'index']);

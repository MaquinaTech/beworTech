<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Create new company
Route::post('/company', [App\Http\Controllers\Api\Company\PostCreateCompanyController::class, '__invoke']);

// Activate a company
Route::post('/company/activate', [App\Http\Controllers\Api\Company\PostActivateCompanyController::class, '__invoke']);

// List companies
Route::get('/company', [App\Http\Controllers\Api\Company\PostListCompanyController::class, '__invoke']);

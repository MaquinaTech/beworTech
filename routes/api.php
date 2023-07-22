<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Company
use App\Http\Controllers\Api\Company\PostCreateCompanyController;
use App\Http\Controllers\Api\Company\PostActivateCompanyController;
use App\Http\Controllers\Api\Company\PostListCompanyController;

// Employee
use App\Http\Controllers\Api\Employee\PostCreateEmployeeController;
use App\Http\Controllers\Api\Employee\PostActivateEmployeeController;
use App\Http\Controllers\Api\Employee\PostListEmployeeController;

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

/*
|--------------------------------------------------------------------------
| Company Routes
|--------------------------------------------------------------------------
*/

// Create new company
Route::post('/company', [PostCreateCompanyController::class, '__invoke']);

// Activate a company
Route::post('/company/activate', [PostActivateCompanyController::class, '__invoke']);

// List companies
Route::get('/company', [PostListCompanyController::class, '__invoke']);


/*
|--------------------------------------------------------------------------
| Employee Routes
|--------------------------------------------------------------------------
*/

// Create new employee
Route::post('/employee', [PostCreateEmployeeController::class, '__invoke']);

// Activate a employee
Route::post('/employee/activate', [PostActivateEmployeeController::class, '__invoke']);

// List employees
Route::get('/employee', [PostListEmployeeController::class, '__invoke']);

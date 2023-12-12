<?php

use App\Http\v1\Controllers\AdminController;
use App\Http\v1\Controllers\CafeController;
use App\Http\v1\Controllers\MenuController;
use App\Http\v1\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function (): void {
    Route::prefix('auth')->group(function (): void {
        Route::post('/sendSMS', [UserController::class, 'sendSMS']);
        Route::post('/verify', [UserController::class, 'verify']);
    });
    Route::prefix('admin')->group(function (): void {
        Route::post('/create', [UserController::class, 'create']);
        Route::post('/login', [UserController::class, 'login']);
    });

    Route::group(['middleware' => ['auth:sanctum', 'abilities:client']], function () {
        Route::post('update', [UserController::class, 'update']);
    });
    Route::prefix('admin')->group(function (): void {
        Route::group(['middleware' => ['auth:sanctum', 'abilities:admin']], function () {
            Route::post('/addCity', [AdminController::class, 'addCity']);
            Route::post('/addCafe', [AdminController::class, 'addCafe']);
            Route::get('/getSections', [AdminController::class, 'getSections']);
            Route::post('/addSection', [AdminController::class, 'addSection']);
            Route::post('/addMenu', [MenuController::class, 'addMenu']);
        });
    });

    Route::prefix('user')->group(function (): void {
        Route::group(['middleware' => ['auth:sanctum', 'abilities:client']], function () {
            Route::get('/getCity', [CafeController::class, 'getCity']);
            Route::get('/getCafesByCity', [CafeController::class, 'getCafesByCity']);

        });
    });

    /* Route::prefix('cafe')->group(function (): void {
         Route::get('/getAllCafeByCity/{id}', [CafeController::class, 'getAllCafe']);
         Route::get('/getCafeById/{id}', [CafeController::class, 'getCafeById']);
     });*/
});


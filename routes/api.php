<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DummyApi;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/add', [DummyApi::class, 'add']);
Route::put('/edit', [DummyApi::class, 'edit']);
Route::delete('/destroy', [DummyApi::class, 'destroy']);
Route::get('/search/{searchTerm}', [DummyApi::class, 'search']);

// Route::post('login', [UserController::class, 'index']);
Route::post('/validate', [UserController::class, 'validateApi']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('/list', [DummyApi::class, 'getList']);
    Route::get('/data', [DummyApi::class, 'getData']);
});

// Route::middleware('auth:sanctum')->get('/list', [DummyApi::class, 'getList']);
// Route::apiResource('/member', MemberController::class);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\MemberController;
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

Route::get('/home', function() {
    return view('home');
})->middleware('protectedPage');

Route::get('/noaccess', function() {
    return view('noaccess');
});

// Route::group(['middleware' => 'protectedPage'], function(){
//     Route::get('/users', function(){
//         return view('users');
//     });
// });
// Route::put('/users', [UserController::class, 'testRequest']);
Route::post('/users', [UserController::class, 'loginUser']);

// Route::view('login', 'login');
Route::get('/login', function () {
    if(session()->has('user')){
        return view('profile');
    }
    return view('login');
});
Route::view('/profile', 'profile');
Route::view('/upload', 'upload');
Route::post('/upload', [UploadController::class, 'index']);
Route::get('/list', [UserController::class, 'show']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::get('/users/edit/{id}', [UserController::class, 'showData']);
Route::put('/users/{id}', [UserController::class, 'update']);

Route::get('/members', [MemberController::class, 'show']);
Route::get('/mutator', [MemberController::class, 'storeData']);
Route::get('/binding/{key}', [MemberController::class, 'binding']);
// to search with the name instead of the id
// Route::get('/binding/{key:name}', [MemberController::class, 'binding']);
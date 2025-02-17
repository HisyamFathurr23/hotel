<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::post('/add_booking/{id}', action:[HomeController::class,'add_booking']);
});

Route::get('/', action: [AdminController::class, 'home']);
Route::get('/home', action: [AdminController::class, 'index'])->name('home');
Route::get('/create_kamar',[AdminController::class,'create_kamar']);
Route::get('/data_kamar',[AdminController::class,'data_kamar']);
Route::get('/kamar_update/{id}' ,action:[AdminController::class,'kamar_update']);
Route::get('/kamar_delete/{id}' ,action:[AdminController::class,'kamar_delete']);
Route::post('/tambah_kamar', action:[AdminController::class,'tambah_kamar']);
Route::post('/edit_kamar/{id}', action:[AdminController::class,'edit_kamar']); 
Route::get('/room_detail/{id}', [HomeController::class,'room_detail']);
Route::get('/booking_kamar', [AdminController::class,'booking_kamar']);
Route::get('/booking_update/{id}', [AdminController::class,'booking_update']);
Route::get('/booking_delete/{id}', [AdminController::class,'booking_delete']);
Route::post('/edit_booking/{id}', action:[AdminController::class,'edit_booking']);


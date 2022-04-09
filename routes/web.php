<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\RegisteredAdminController;
use App\Http\Controllers\Admin\AdminAuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

require __DIR__ . '/auth.php';

Route::get('/hotel-ace', [HomeController::class, 'home']);
Route::get('/hotel-ace/about', [HomeController::class, 'about']);
Route::get('/hotel-ace/contact', [ContactController::class, 'index']);
Route::post('/hotel-ace/contact/store', [ContactController::class, 'store']);
Route::get('/hotel-ace/admin/login', [AdminAuthenticatedSessionController::class, 'create'])->name('admin-login');
Route::post('/hotel-ace/admin/login/store', [AdminAuthenticatedSessionController::class, 'store']);

//Only routes with user auth here
Route::group(['prefix' => '/hotel-ace', 'middleware' => ['auth']], function () {
    
    Route::get('/rooms', [HomeController::class, 'room']);

    Route::get('/{id}/card', [CardController::class, 'index']);
    Route::post('/{id}/card/store', [CardController::class, 'store']);
    Route::get('/{id}/card/show', [CardController::class, 'show']);
    Route::get('/{id}/card/edit', [CardController::class, 'edit']);
    Route::put('/{id}/card/edit/update', [CardController::class, 'update']);

    Route::get('/{id}/booking', [BookingController::class, 'index']);
    Route::get('/{id}/booking/store', [BookingController::class, 'store']);
    Route::get('/{id}/mybooking', [BookingController::class, 'show']);

    Route::get('/{id}/billing', [BookingController::class, 'bill']);
    Route::get('/{id}/billing/pay', [BookingController::class, 'pay']);
});

//Admin Routes here
Route::group(['prefix' => '/hotel-ace/admin', 'middleware' => ['admin']], function () {

    //Admin CRUD
    Route::get('/view', [RegisteredAdminController::class, 'show']);
    Route::get('/create', [RegisteredAdminController::class, 'create']);
    Route::delete('/view/destroy/{id}', [RegisteredAdminController::class, 'destroy']);
    Route::get('/view/{id}/edit', [RegisteredAdminController::class, 'edit']);
    Route::put('/view/{id}/update', [RegisteredAdminController::class, 'update']);

    //Admin Booking view
    Route::get('/booking/show', [BookingController::class, 'view'])->name('admin-booking');
    Route::post('/booking/{id}', [BookingController::class, 'checkout']);
    Route::delete('/booking/destroy/{id}', [BookingController::class, 'destroy']);

    Route::get('/register', [RegisteredAdminController::class, 'create']);
    Route::post('/register/store', [RegisteredAdminController::class, 'store']);
    Route::post('/logout', [AdminAuthenticatedSessionController::class, 'destroy']);

    //Room CRUD 
    Route::get('/room', [RoomController::class, 'index']);
    Route::get('/room/create', [RoomController::class, 'create']);
    Route::post('/room/store', [RoomController::class, 'store']);
    Route::get('/room/{id}', [RoomController::class, 'edit']);
    Route::put('/room/{id}/update', [RoomController::class, 'update']);
    Route::delete('/room/destroy/{id}', [RoomController::class, 'destroy']);

    Route::get('/dashboard', [HomeController::class, 'index']);

    //Staff CRUD
    Route::get('/staffs', [StaffController::class, 'index'])->name('staffs');
    Route::get('/staffs/create', [StaffController::class, 'create'])->name('staffs.create');
    Route::post('/staffs/store', [StaffController::class, 'store'])->name('staffs.store');
    Route::get('/staffs/{id}/edit', [StaffController::class, 'edit'])->name('staffs.edit');
    Route::put('/staffs/{id}/update', [StaffController::class, 'update'])->name('staffs.update');
    Route::delete('/staffs/destroy/{id}', [StaffController::class, 'destroy'])->name('staffs.destroy');

    //Comments
    Route::get('/comment', [ContactController::class, 'show']);
    Route::delete('/comment/destroy/{id}', [ContactController::class, 'destroy']);

    //Users CRUD
    Route::get('/users', [AuthenticatedSessionController::class, 'show']);
    Route::delete('/users/{id}/destroy', [AuthenticatedSessionController::class, 'remove']);
});


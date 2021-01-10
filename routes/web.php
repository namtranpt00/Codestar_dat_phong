<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use  App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\OrderController;

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
Auth::routes(['register' => false]);
Route::group(['middleware' => ['auth','auth.active']], function () {
    Route::get('/', function () {
        if (Auth::user()->is_admin) {
            return redirect()->route('admin.users.list');
        } else {
            return redirect()->route('room.booking');
        }
    });
    Route::group(['middleware' => 'auth.admin', 'prefix' => 'admin'], function () {
        Route::get('/users', [UserController::class, 'adminUsersList'])->name('admin.users.list');
        Route::get('/users/add', [UserController::class, 'adminUsersAdd'])->name('admin.users.add');
        Route::post('/users/save', [UserController::class, 'adminUsersSave'])->name('admin.users.save');
        Route::get('/users/delete/{user}', [UserController::class, 'adminUsersDelete'])->name('admin.users.delete');
        Route::get('/users/edit/{user}', [UserController::class, 'adminUsersEdit'])->name('admin.users.edit');
        Route::post('/users/update/{user}', [UserController::class, 'adminUsersUpdate'])->name('admin.users.update');

        Route::get('/services', [ServiceController::class, 'adminServicesList'])->name('admin.services.list');
        Route::get('/services/add', [ServiceController::class, 'adminServicesAdd'])->name('admin.services.add');
        Route::post('/services/save', [ServiceController::class, 'adminServicesSave'])->name('admin.services.save');
        Route::get('/services/delete/{service}', [ServiceController::class, 'adminServicesDelete'])->name('admin.services.delete');
        Route::get('/services/edit/{service}', [ServiceController::class, 'adminServicesEdit'])->name('admin.services.edit');
        Route::post('/services/update/{service}', [ServiceController::class, 'adminServicesUpdate'])->name('admin.services.update');

        Route::get('/rooms', [RoomController::class, 'adminRoomsList'])->name('admin.rooms.list');
        Route::get('/rooms/add', [RoomController::class, 'adminRoomsAdd'])->name('admin.rooms.add');
        Route::post('/rooms/save', [RoomController::class, 'adminRoomsSave'])->name('admin.rooms.save');
        Route::get('/rooms/delete/{room}', [RoomController::class, 'adminRoomsDelete'])->name('admin.rooms.delete');
        Route::get('/rooms/edit/{room}', [RoomController::class, 'adminRoomsEdit'])->name('admin.rooms.edit');
        Route::post('/rooms/update/{room}', [RoomController::class, 'adminRoomsUpdate'])->name('admin.rooms.update');

        Route::get('/orders', [OrderController::class, 'adminOrdersList'])->name('admin.orders.list');
        Route::get('/orders/add/{order}', [OrderController::class, 'adminOrdersAdd'])->name('admin.orders.add');
        Route::post('/orders/add/{order}', [OrderController::class, 'adminOrdersSave'])->name('admin.orders.save');

    });
    Route::get('home', [BookingController::class, 'booking'])->name('room.booking');
    Route::get('home/{room}', [BookingController::class, 'roomDetail'])->name('room.detail');
    Route::post('home/save/{room}', [BookingController::class, 'bookingSave'])->name('booking.save');
    Route::get('order', [BookingController::class, 'orderDetail'])->name('room.orderDetail');

});


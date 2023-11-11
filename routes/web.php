<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagerUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PushNotificationController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

// Route::get('/manager-user', [ManagerUserController::class, 'index'])->middleware('auth' , 'can:admin');
Route::middleware('auth', 'can:admin')->group(function () {
    Route::get('/manager-user', [ManagerUserController::class, 'index']);
    Route::get('/manager-user/create', [ManagerUserController::class, 'create']);
    Route::post('/manager-user/new', [ManagerUserController::class, 'store']);
    Route::get('/manager-user/edit/{id}', [ManagerUserController::class, 'edit']);
    Route::put('/manager-user/update/{id}', [ManagerUserController::class, 'update']);
    Route::delete('/manager-user/delete/{id}', [ManagerUserController::class, 'destroy']);
});

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/store-token', [PushNotificationController::class, 'updateDeviceToken']);


require __DIR__.'/auth.php';

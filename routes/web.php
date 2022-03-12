<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Models\User;

Route::get('/', function (){
    return view('welcome');
});

Auth::routes();

Route::get('super_admin/home', [App\Http\Controllers\HomeController::class, 'superAdminHome'])->name('super.admin.home');
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');

// CRUD users routes

Route::middleware(['auth','is_user'])->group(function () {
    Route::get('/home', [App\Http\Controllers\Controller::class, 'show'])->name('home');//
    Route::get('/users-create', [App\Http\Controllers\Controller::class, 'create_user'])->name('user.store');
    Route::post('/users-create', [App\Http\Controllers\Controller::class, 'store']);
    Route::get('/users-edit/{id}', [App\Http\Controllers\Controller::class, 'edit'])->name('user.edit');
    Route::put('/users-edit/{id}', [App\Http\Controllers\Controller::class, 'update'])->name('user.update');
    Route::get('/users-delete/{id}', [App\Http\Controllers\Controller::class, 'destroy'])->name('user.destroy');
});

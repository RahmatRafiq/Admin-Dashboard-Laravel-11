<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/admin', [DashboardController::class, 'dashboardAdmin'])->name('dashboard.admin');

    Route::resource('mbkm/about-mbkms', \App\Http\Controllers\AboutMbkmController::class);

    Route::get('mbkm/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('mbkm/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('mbkm/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('mbkm/admin/role-permissions/permission', \App\Http\Controllers\RolePermission\PermissionController::class);
    Route::post('mbkm/admin/role-permissions/permission/json', [\App\Http\Controllers\RolePermission\PermissionController::class, 'json'])->name('permission.json');

    Route::resource('mbkm/admin/role-permissions/role', \App\Http\Controllers\RolePermission\RoleController::class);
    Route::post('mbkm/admin/role-permissions/role/json', [\App\Http\Controllers\RolePermission\RoleController::class, 'json'])->name('role.json');

    Route::resource('mbkm/admin/role-permissions/user', UserController::class);
    Route::post('mbkm/admin/role-permissions/user/json', [UserController::class, 'json'])->name('user.json');

});

require __DIR__ . '/auth.php';

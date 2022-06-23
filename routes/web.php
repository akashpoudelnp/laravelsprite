<?php

use App\Http\Controllers\Backend\NotificationController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\PagesController as FrontPagesController;
use App\Models\Notification;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontPagesController::class, 'home']);

Route::middleware('auth', 'permission:can_dashboard')->prefix('admin/')->name('admin.')->group(function () {
    Route::get('/', [PagesController::class, 'index'])->name('index');

    Route::resource('users', UserController::class)->middleware('permission:can_crud_users');
    Route::resource('roles', RolesController::class)->middleware('permission:can_crud_users');
    Route::resource('permissions', PermissionController::class)->middleware('permission:can_crud_users');

    Route::get('/user/generatepdf', [UserController::class, 'generatePdf'])->name('users.generatepdf');
    Route::get('/user/reset-password/{user}', [UserController::class, 'resetLink'])->name('users.reset-password');

    Route::get('/console', [PagesController::class, 'console'])->middleware('permission:can_console')->name('console');
    Route::post('/console/execute', [PagesController::class, 'consoleExecute'])->middleware('permission:can_console')->name('console.execute');

    Route::resource('notifications', NotificationController::class)->middleware('role:super_admin');
    Route::post('/notifications/{notification}/mark-as-read/{user}', [NotificationController::class, 'markAsRead'])->name('notifications.mark-as-read');

    Route::resource('pages', PageController::class);
});
Route::get('/user/reset-password/{token}', [UserController::class, 'resetPasswordView'])->name('users.reset-password-view');
Route::post('/user/change-password', [UserController::class, 'changePassword'])->name('users.change-password');

Route::get('/{pageslug}', [FrontPagesController::class, 'show'])->name('pages.show');

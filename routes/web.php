<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\FileController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::get('/', function () {
    // return view('welcome');

    return redirect()->route('dashboard.home');
});

// Route::get('/dashboard', function () {
    // return view('dashboard.pages.dashboard'); // Ensure this points to the correct view
// });
// ->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



Route::middleware('auth')->group(function () {

    Route::get('/dashboard',[DashboardController::class, 'index'])
    ->name('dashboard.home');

    //  File Management Routes
    Route::controller(FileController::class)->group(function () {
        Route::get('/files', 'index')->name('dashboard.files');
        Route::get('/files-create-page', 'createPage')->name('dashboard.fileUploadPage');
        Route::post('/files-upload', 'upload')->name('dashboard.fileUpload');
        Route::get('/files/{id}/delete', 'delete')->name('dashboard.fileDelete');
        Route::get('/files-history', 'fileHistory')->name('dashboard.filesUploadHistory');

        // action
        Route::get('/files-qr-code/{id}', 'qrCode')->name('dashboard.fileQrCode');
        Route::get('/files/{id}/download', 'fileDownload')->name('dashboard.fileDownload');
        Route::get('/qr/{id}/download', 'qrDownload')->name('dashboard.qrDownload');
    });


    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('dashboard.categories');
        Route::post('/category-create', 'create')->name('dashboard.categoryCreate');
        Route::get('/category/{id}/edit', 'edit')->name('dashboard.categoryEdit');
        Route::post('/category/{id}/update', 'update')->name('dashboard.categoryUpdate');
        Route::get('/category/{id}/delete', 'delete')->name('dashboard.categoryDelete');
    });


    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('dashboard.users');
        Route::get('/users-create-page', 'createPage')->name('dashboard.userCreatePage');
        Route::post('/users-create', 'create')->name('dashboard.userCreate');
        Route::get('/users/{id}/edit', 'edit')->name('dashboard.userEdit');
        Route::post('/users/{id}/update', 'update')->name('dashboard.userUpdate');
        Route::get('/users/{id}/delete', 'delete')->name('dashboard.userDelete');
    });

});





require __DIR__.'/auth.php';
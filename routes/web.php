<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\FileController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::get('/', function () {
    return view('welcome');
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

    Route::controller(FileController::class)->group(function () {
        Route::get('/files', 'index')->name('dashboard.files');
        Route::get('/files-create-page', 'createPage')->name('dashboard.fileUploadPage');
        Route::post('/files-upload', 'upload')->name('dashboard.fileUpload');
        Route::get('/files/{id}/delete', 'delete')->name('dashboard.fileDelete');
        // action

        Route::get('/files/{id}/download', 'download')->name('dashboard.fileDownload');
    });

});





require __DIR__.'/auth.php';

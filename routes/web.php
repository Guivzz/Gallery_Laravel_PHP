<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){
    Route::prefix('user/')->group(function(){
        Route::get('galleries/create', [App\Http\Controllers\GalleryController::class, 'galleryCreate'])->name('galleryCreate');
        Route::post('galleries/store',[App\Http\Controllers\GalleryController::class, 'galleryStore'])->name('galleryStore'); 
        Route::get('galleries/show/{id}',[App\Http\Controllers\GalleryController::class, 'galleryShow'])->name('galleryShow');
        Route::get('galleries/edit/{id}',[App\Http\Controllers\GalleryController::class, 'galleryEdit'])->name('galleryEdit');
        Route::get('galleries/delete/{id}',[App\Http\Controllers\GalleryController::class, 'galleryDelete'])->name('galleryDelete');
        Route::post('galleries/update/{id}',[App\Http\Controllers\GalleryController::class, 'galleryUpdate'])->name('galleryUpdate');
        
        //photo routes
        Route::get('galleries/photos/create/{id}', [App\Http\Controllers\GalleryController::class, 'photoCreate'])->name('photoCreate');
        Route::post('galleries/photos/store/', [App\Http\Controllers\GalleryController::class, 'photoStore'])->name('photoStore');
        Route::get('galleries/photos/show/{id}', [App\Http\Controllers\GalleryController::class, 'photoShow'])->name('photoShow');
        Route::get('galleries/photos/edit/{id}', [App\Http\Controllers\GalleryController::class, 'photoEdit'])->name('photoEdit');
        Route::post('galleries/photos/update/{id}', [App\Http\Controllers\GalleryController::class, 'photoUpdate'])->name('photoUpdate');
        Route::get('galleries/photos/delete/{id}', [App\Http\Controllers\GalleryController::class, 'photoDelete'])->name('photoDelete');
    });
});
        Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

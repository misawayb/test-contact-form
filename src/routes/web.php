<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/',[ContactController::class,'index'])->name('contact.index');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::get('/confirm', [ContactController::class, 'showConfirm'])->name('contact.showConfirm');
Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');
Route::get('/back', [ContactController::class, 'back'])->name('contact.back');


Route::middleware('auth')->group(function(){
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
    Route::get('/search',[AdminController::class,'search'])->name('admin.search');
    Route::get('/reset',[AdminController::class,'reset'])->name('admin.reset');
    Route::delete('/delete',[AdminController::class,'destroy'])->name('admin.delete');
    Route::get('/export',[AdminController::class,'export'])->name('admin.export');
});
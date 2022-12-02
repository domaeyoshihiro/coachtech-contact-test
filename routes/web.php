<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'index'])->name('index');
Route::get('/confirm',[ContactController::class, 'confirm']);
Route::post('/confirm',[ContactController::class, 'confirm'])->name('confirm');
Route::post('/add', [ContactController::class, 'create'])->name('create');
Route::get('/thanks',[ContactController::class, 'thanks']);
Route::get('/management',[ContactController::class, 'management']);
Route::get('/search', [ContactController::class, 'search'])->name('search');
Route::post('/delete', [ContactController::class, 'delete'])->name('delete');

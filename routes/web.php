<?php

use App\Http\Controllers\createGroup;
use App\Http\Controllers\myAccount;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/myAccount', [myAccount::class, 'index'])->name('myAccount');
Route::get('/createGroup', [createGroup::class, 'index'])->name('createGroup');

// Groups
Route::get('/groups', [GroupController::class, 'index'])->name('groups');
Route::post('/group/save', [GroupController::class, 'save'])->name('group.save');

<?php

use App\Http\Controllers\createGroup;
use App\Http\Controllers\myAccount;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupTemplateController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/myAccount', [myAccount::class, 'index'])->middleware('auth')->name('myAccount');
Route::get('/createGroup', [createGroup::class, 'index'])->middleware('auth')->name('createGroup');
Route::get('/groupeTemplate', [GroupTemplateController::class, 'index'])->middleware('auth')->name('groupeTemplate');

Route::get('/myAccount', [myAccount::class, 'index'])->name('myAccount');
Route::get('/createGroup', [createGroup::class, 'index'])->name('createGroup');
Route::get('/groupeTemplate', [GroupTemplateController::class, 'index'])->name('groupeTemplate');

// Groups
Route::get('/groups', [GroupController::class, 'index'])->name('groups');
Route::post('/group/save', [GroupController::class, 'save'])->name('group.save');

<?php

use App\Http\Controllers\createGroup;
use App\Http\Controllers\myAccount;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupTemplateController;
use App\Http\Controllers\Auth\LogoutController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/myAccount', [myAccount::class, 'index'])->middleware('auth')->name('myAccount');
Route::get('/createGroup', [createGroup::class, 'index'])->middleware('auth')->name('createGroup');
Route::get('/groupeTemplate', [GroupTemplateController::class, 'index'])->middleware('auth')->name('groupeTemplate');

Route::get('/myAccount', [myAccount::class, 'index'])->name('myAccount')->middleware('auth');;
Route::get('/myAccount', [myAccount::class, 'myAccount'])->name('myAccount');
Route::get('/createGroup', [createGroup::class, 'index'])->name('createGroup');
Route::get('/groupeTemplate', [GroupTemplateController::class, 'index'])->name('groupeTemplate');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
// Groups
Route::get('/groups', [GroupController::class, 'index'])->middleware('auth')->name('groups');
Route::post('/group/save', [GroupController::class, 'save'])->name('group.save');
Route::get('/group/show/{group}', [GroupController::class, 'show'])->name('group.show');


Route::get('/group-content/{section}', [GroupController::class, 'loadContent'])->name('loadContent');

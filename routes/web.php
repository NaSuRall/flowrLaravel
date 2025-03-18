<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\createGroup;
use App\Http\Controllers\GroupTemplateV2Controller;
use App\Http\Controllers\JoinGroupController;
use App\Http\Controllers\ListeController;
use App\Http\Controllers\listeTemplateController;
use App\Http\Controllers\myAccount;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupTemplateController;
use App\Http\Controllers\Auth\LogoutController;
use App\Mail\Test;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/myAccount', [myAccount::class, 'index'])->middleware('auth')->name('myAccount');
Route::get('/createGroup', [createGroup::class, 'index'])->middleware('auth')->name('createGroup');
Route::get('/groupeTemplate', [GroupTemplateController::class, 'index'])->middleware('auth')->name('groupeTemplate');

Route::get('/myAccount', [myAccount::class, 'index'])->name('myAccount')->middleware('auth');;
Route::get('/myAccount', [myAccount::class, 'myAccount'])->name('myAccount')->middleware('auth');
Route::get('/createGroup', [createGroup::class, 'index'])->name('createGroup');
Route::get('/groupeTemplate', [GroupTemplateController::class, 'index'])->name('groupeTemplate');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
// Groups
Route::get('/groups', [GroupController::class, 'index'])->middleware('auth')->name('groups');
Route::post('/group/save', [GroupController::class, 'save'])->name('group.save');
Route::get('/group/{code}', [GroupController::class, 'show'])->name('group.show');
Route::post('/group/join', [JoinGroupController::class, 'join'])->name('group.join');
Route::get('/join/group', [JoinGroupController::class, 'index'])->name('joinGroup');


Route::get('/group-content/{groupId}', [GroupController::class, 'loadContent'])->name('loadContent');
Route::post('/group', [GroupController::class, 'createListe'])->name('create.Liste');

Route::get('/group-templateV2', [GroupTemplateV2Controller::class, 'index'])->name('groupTemplate');
Route::put('/myAccount/update/{id}', [myAccount::class, 'update'])->name('myAccount.update');
Route::post('/update-profile-image', [myAccount::class, 'updateProfileImage'])->name('update.profile.image');

Route::get('/contact-support', [ContactController::class, 'index'])->name('contact.support');
Route::post('/contact-support', [ContactController::class, 'contactFromUser'])->name('contact.form');

Route::get('/test-email', function () {
    Mail::to('contact.flowr.space@gmail.com')->send(new test());
    return 'Email envoyé avec succès !';
})->name('test.email');

// liste template

Route::get('/liste-template/{id}/{code}', [listeTemplateController::class, 'index'])->name('listeTemplate');
Route::post('/liste-template/{id}/{code}', [listeTemplateController::class, 'create'])->middleware('auth')->name('create.tem.liste');

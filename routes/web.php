<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\createGroup;
use App\Http\Controllers\JoinGroupController;
use App\Http\Controllers\listeTemplateController;
use App\Http\Controllers\myAccount;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupTemplateController;
use App\Http\Controllers\Auth\LogoutController;
// use App\Mail\Test;


Auth::routes();

// Route pour afficher La page accueil
Route::get('/', [HomeController::class, 'index'])->name('home');
// route pour afficher la page MyAccount
Route::get('/myAccount', [myAccount::class, 'index'])->middleware('auth')->name('myAccount');
// route pour afficher la page create groupe
Route::get('/createGroup', [createGroup::class, 'index'])->middleware('auth')->name('createGroup');
// route pour afficher la page group template
Route::get('/groupeTemplate', [GroupTemplateController::class, 'index'])->middleware('auth')->name('groupeTemplate');
// route pour se deconnecter
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
// Route pour Update les info de l'utilisateur dans MyAccount
Route::put('/myAccount/update/{id}', [myAccount::class, 'update'])->name('myAccount.update');
// Route pour modifier la photo de profil
Route::post('/update-profile-image', [myAccount::class, 'updateProfileImage'])->name('update.profile.image');
// Route pour afficher la view contact-support
Route::get('/contact-support', [ContactController::class, 'index'])->name('contact.support');
// Route pour envoyer le form contact dans la bdd
Route::post('/contact-support', [ContactController::class, 'contactFromUser'])->name('contact.form');
// Route pour delete une Liste
Route::delete('/liste/{id}', [GroupController::class, 'SuppListe'])->middleware('auth')->name('liste.delete');
// Route pour supprimer son groupe
Route::delete('/group/{id}', [GroupController::class, 'deleteGroup'])->middleware('auth')->name('group.delete');
// Groups

// Route pour afficher la page mesGroupes
Route::get('/groups', [GroupController::class, 'index'])->middleware('auth')->name('groups');
// Route pour crée le groupe et l'envoyer en bdd
Route::post('/group/save', [GroupController::class, 'save'])->name('group.save');
// route pour permettre d'afficher la vue avec le code generer dans l'url
Route::get('/group/{code}', [GroupController::class, 'show'])->name('group.show');
// Route pour crée une liste dans le groupe
Route::post('/group', [GroupController::class, 'createListe'])->name('create.Liste');


// liste template

// Route pour affiche la liste en fonction de celle que l'on a cliquer et dans le bon groupe
Route::get('/liste-template/{id}/{code}', [listeTemplateController::class, 'index'])->name('listeTemplate');
// Route pour crée les cadeaux la les liste choisi dans le bon groupe
Route::post('/liste-template/{id}/{code}', [listeTemplateController::class, 'create'])->middleware('auth')->name('create.tem.liste');


// Join Group

// Route pour afficher la view rejoindre un group
Route::get('/join/group', [JoinGroupController::class, 'index'])->name('joinGroup');
// Route pour acctiver la funtion de join pour les groupes
Route::post('/group/join', [JoinGroupController::class, 'join'])->name('group.join');



// Route::get('/myAccount', [myAccount::class, 'index'])->name('myAccount')->middleware('auth');;
// Route::get('/myAccount', [myAccount::class, 'myAccount'])->name('myAccount')->middleware('auth');
//Route::get('/createGroup', [createGroup::class, 'index'])->name('createGroup');
// Route::get('/groupeTemplate', [GroupTemplateController::class, 'index'])->name('groupeTemplate');
// Route::get('/group-content/{groupId}', [GroupController::class, 'loadContent'])->name('loadContent');


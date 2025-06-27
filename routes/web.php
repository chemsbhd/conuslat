<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\VisaRequestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminVisaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/actu1', [App\Http\Controllers\HomeController::class, 'actu1'])->name('actu1');
Route::get('/actu2', [App\Http\Controllers\HomeController::class, 'actu2'])->name('actu2');
Route::get('/actu3', [App\Http\Controllers\HomeController::class, 'actu3'])->name('actu3');
Route::get('/actu4', [App\Http\Controllers\HomeController::class, 'actu4'])->name('actu4');
Route::get('/actu5', [App\Http\Controllers\HomeController::class, 'actu5'])->name('actu5');
Route::get('/actu6', [App\Http\Controllers\HomeController::class, 'actu6'])->name('actu6');
Route::get('/actu7', [App\Http\Controllers\HomeController::class, 'actu7'])->name('actu7');

Route::get('/event1', [App\Http\Controllers\HomeController::class, 'event1'])->name('event1');
Route::get('/event2', [App\Http\Controllers\HomeController::class, 'event2'])->name('event2');
Route::get('/event3', [App\Http\Controllers\HomeController::class, 'event3'])->name('event3');
Route::get('/FAQ', [App\Http\Controllers\HomeController::class, 'FAQ'])->name('FAQ');

Route::get('/visa-request', [VisaRequestController::class, 'create'])->name('visa.request');
Route::post('/visa-request', [VisaRequestController::class, 'store'])->name('visa.request.store');

Route::middleware('auth')->get('/profil', [ProfilController::class, 'show'])->name('profil');

Route::get('/profil', [ProfilController::class, 'show'])->name('profil.show');
Route::get('/admin', [ProfilController::class, 'admin'])->name('profil.admin');

Route::post('/admin/create-users', [AdminController::class, 'createUsers'])->name('admin.createUsers');
Route::post('/admin/lottery', [AdminController::class, 'lottery'])->name('admin.lottery');

// Route pour afficher toutes les demandes
Route::get('/admin/visa', [AdminVisaController::class, 'index'])->name('admin.visa');

// Route pour accepter/refuser une demande
Route::post('/admin/visa/{id}/{status}', [AdminVisaController::class, 'updateValidation'])->name('admin.visa.update');

// Route pour générer un PDF
Route::get('/admin/visa/{id}/pdf', [AdminVisaController::class, 'generatePdf'])->name('admin.visa.pdf');
Route::get('/admin/visa/{id}/accepted-pdf', [AdminVisaController::class, 'generateAcceptedPdf'])->name('admin.visa.accepted-pdf');

Route::get('/profil/visa-request/{id}/pdf', [ProfilController::class, 'generatePDF'])->name('profil.visa-request.pdf');
Route::get('/profile/visa/{id}/download', [ProfilController::class, 'generateAcceptedVisaPdf'])->name('profil.visa.download');

#Mails

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

// Route pour soumettre le formulaire de contact
Route::post('/', [HomeController::class, 'submitContactForm'])->name('home.contact.submit');


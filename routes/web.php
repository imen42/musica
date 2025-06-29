<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\PasteController;
use App\Http\Controllers\AnonymousNoteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MusicXmlController;
use App\Http\Controllers\MelodyGeneratorController;
use App\Http\Controllers\MozartDiceController;
use App\Http\Controllers\ScaleBuilderController;

Route::get('/', [HomeController::class, 'index'])->name('home');
    //register && login && logout
Route::get('/Register', [AuthController::class , 'RegisterPage'])->name('Register.page');
Route::get('/Login', [AuthController::class , 'LoginPage'])->name('Login.page');
Route::post('/Register', [AuthController::class , 'register'])->name('register');
Route::post('/Login', [AuthController::class , 'login'])->name('login');
Route::post('/logout', [AuthController::class , 'logout'])->name('logout');
//reset password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


// routes fro past 
Route::get('/p/{slug}', [PasteController::class, 'showBySlug'])->name('pastes.slug');
Route::get('/pastes', [PasteController::class, 'index'])->name('pastes.index');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::middleware('auth')->group(function () {
    Route::get('/pastes/create', [PasteController::class, 'create'])->name('pastes.create');

    Route::post('/pastes', [PasteController::class, 'store'])->name('pastes.store');
    Route::post('/pastes/{paste}/comments', [PasteController::class, 'storeComment'])->name('pastes.comment');
    Route::post('pastes/{paste}/vote', [PasteController::class, 'vote'])->name('pastes.vote');
    Route::get('/melody/generate', [MelodyGeneratorController::class, 'generateMelody'])->name('melody.generate');



});

Route::get('/pastes/{paste}', [PasteController::class, 'show'])->name('pastes.show');
Route::get('/pastes', [PasteController::class, 'index'])->name('pastes.index');
//routes of notes for anonymous 
Route::get('/notes/create', [AnonymousNoteController::class, 'create'])->name('notes.anonymous.create');
Route::post('/notes', [AnonymousNoteController::class, 'store'])->name('notes.anonymous.store');
Route::get('/notes/view/{hash}', [AnonymousNoteController::class, 'show'])->name('notes.anonymous.show');








Route::get('/musicxml/upload', [MusicXmlController::class, 'upload'])->name('musicxml.upload');
Route::post('/musicxml/analyze', [MusicXmlController::class, 'analyze'])->name('musicxml.analyze');

Route::get('/melody/{id}/export', [MelodyGeneratorController::class, 'exportToMusicXML'])
    ->middleware('auth')
    ->name('melody.export');
    Route::post('/melody/compare', [MelodyGeneratorController::class, 'compareMelodiesFromRequest'])
    ->middleware('auth')
    ->name('melody.compare');

Route::get('/melody/compare/{id1}/{id2}', [MelodyGeneratorController::class, 'compareMelodies'])
    ->middleware('auth')
    ->name('melody.compare.ids');
    Route::get('/mozart-dice', [MozartDiceController::class, 'generate'])->name('mozart.dice');
    Route::get('/scale-builder', [ScaleBuilderController::class, 'showForm'])->name('scale.builder.form');
    Route::post('/scale-builder', [ScaleBuilderController::class, 'generateScale'])->name('scale.builder.generate');
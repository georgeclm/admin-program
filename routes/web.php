<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ReminderController;





Route::get('/', [WelcomeController::class, 'index']);
// this mean to access dashboard they need to pass this middleware which is auth so if they are not log in they cannot access this page and will be redirected to login page
Route::group(['middleware' => 'auth'], function(){
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dash');
    Route::get('/leads/add',[LeadController::class, 'create'])->name('lead.add');
    Route::post('/leads/save',[LeadController::class, 'store']);

    Route::get('/leads/list',[LeadController::class, 'index'])->name('lead.list');

    Route::get('/leads/view/{lead}',[LeadController::class, 'view'])->name('lead.view');
    Route::post('/leads/update',[LeadController::class, 'update'])->name('lead.update');
    Route::get('/leads/view/{lead}/reminder/add',[ReminderController::class,'add'])->name('reminder.add');
    Route::post('/leads/view/reminder/save',[ReminderController::class,'store'])->name('reminder.save');
    Route::get('/leads/view/{lead}/reminder/{reminder}/view',[ReminderController::class,'view'])->name('reminder.view');
    Route::post('/leads/view/reminder/update',[ReminderController::class,'updateAndCreate'])->name('reminder.update');
    Route::get('/leads/view/{lead}/reminder/{reminder}/note',[ReminderController::class,'addNote'])->name('reminder.note');
    Route::post('/leads/view/reminder/close',[ReminderController::class,'close'])->name('reminder.close');









});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

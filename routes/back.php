<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController')->name('dashboard');

Route::resource('notes', 'NoteController')->except('show');
<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController')->name('dashboard');

Route::resource('notes', 'NoteController')->except('show');

Route::resource('tags', 'TagController')->except('show');

Route::group(['middleware' => 'can:admin'], function(){
    // Route::resource('users', 'UserController')->except('show');
    Route::resource('users', 'UserController');
    Route::resource('connects', 'ConnectController');
    Route::get('connects/approval', 'ConnectController@approval')->name('connects.approval');
    Route::get('connects/rejection', 'ConnectController@rejection')->name('connects.rejection');
});

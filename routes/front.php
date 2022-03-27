<?php
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     echo 'front';
// });

Route::get('/', 'NoteController@index')->name('home');
Route::resource('notes', 'NoteController')->only(['index', 'show']);

Route::get('notes/tag/{tagSlug}', 'NoteController@index')->where('tagSlug', '[a-z]+')->name('notes.index.tag');

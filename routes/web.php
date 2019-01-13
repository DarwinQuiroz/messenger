<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/api/conversations', 'ConversationController@index')->name('conversations');
Route::get('/api/messages', 'MessageController@index')->name('messages');
Route::post('/api/messages', 'MessageController@store')->name('messages.store');

Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
Route::post('/profile', 'ProfileController@update')->name('profile.update');
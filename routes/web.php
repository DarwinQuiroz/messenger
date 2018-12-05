<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/api/conversations', 'ConversationController@index')->name('conversations');
Route::get('/api/messages', 'MessageController@index')->name('messages');

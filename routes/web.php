<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/chat', 'ChatController@index')->name('chat');
Route::get('/chat/{conversationId}', 'ChatController@index');

Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
Route::post('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/api/conversations', 'ConversationController@index')->name('conversations');
Route::get('/api/messages', 'MessageController@index')->name('messages');
Route::post('/api/messages', 'MessageController@store')->name('messages.store');
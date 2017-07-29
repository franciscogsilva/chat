<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('chat/{username}', function($username)
{
	return view('chats')
		->with('username', $username);
});

Route::post('chat/action/sendMessage', [
	'uses'  => 'ChatController@sendMessage',
	'as'	=> 'sendMessage'
]);

Route::post('chat/action/isTyping', [
	'uses' 	=> 'ChatController@isTyping',
	'as'	=> 'isTyping'
]);

Route::post('chat/action/notTyping', [
	'uses' 	=> 'ChatController@notTyping',
	'as'	=> 'notTyping'
]);

Route::post('chat/action/retrieveChatMessages', [
	'uses'  => 'ChatController@retrieveChatMessages',
	'as'	=> 'retrieveChatMessages'
]);

Route::post('chat/action/retrieveTypingStatus', [
	'uses' 	=> 'ChatController@retrieveTypingStatus',
	'as'	=> 'retrieveTypingStatus'
]);

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

Route::get('/', 'MessageController@index');
Route::get('/message/create', 'MessageController@create');
Route::get(
    '/message/{id}', 'MessageController@view'
)->where('id', '[0-9]+');
Route::get(
    '/message/{id}/delete', 'MessageController@delete'
)->where('id', '[0-9]+');
Route::get(
    '/message/{id}/edit', 'MessageController@edit'
)->where('id', '[0-9]+');

Route::get(
    '/comment/{id}/edit', 'CommentController@edit'
)->where('id', '[0-9]+');
Route::get(
    '/message/{id}/comment', 'CommentController@create'
)->where('id', '[0-9]+');

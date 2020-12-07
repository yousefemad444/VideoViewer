<?php

use Illuminate\Support\Facades\Route;
Route::middleware('admin')->group(function (){
    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::resource('users', 'UsersController')->except('show');
    Route::resource('categories', 'CategoriesController')->except('show');
    Route::resource('skills', 'SkillsController')->except('show');
    Route::resource('tags', 'TagsController')->except('show');
    Route::resource('pages', 'PagesController')->except('show');
    Route::resource('videos', 'VideosController')->except('show');

    Route::post('messages/replay/{message}', 'MessagesController@replay')->name('messages.replay');
    Route::resource('messages', 'MessagesController')->only('index','destroy','edit');

    Route::post('comments', 'VideosController@commentStore')->name('comment.store');
    Route::get('comments/{comment}', 'VideosController@commentDelete')->name('comment.delete');
    Route::patch('comments/{comment}', 'VideosController@commentUpdate')->name('comment.update');
});


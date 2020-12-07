<?php

use Illuminate\Support\Facades\Route;

Route::namespace('FrontEnd')->group(function () {

    Route::get('/', 'HomeController@welcome')->name('frontend.landing');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('category/{category}', 'HomeController@category')->name('front.category');
    Route::get('skill/{skill}', 'HomeController@skills')->name('front.skill');
    Route::get('tag/{tag}', 'HomeController@tags')->name('front.tags');
    Route::get('video/{video}', 'HomeController@video')->name('frontend.video');
    Route::get('page/{page}/{slug?}', 'HomeController@page')->name('front.page');

    Route::post('contact-us', 'HomeController@messageStore')->name('contact.store');

    Route::get('profile/{user}/{slug?}', 'ProfilesController@index')->name('front.profile');
    Route::patch('profile/{user}', 'ProfilesController@update')->name('profile.update');

    Route::patch('comment/{comment}', 'CommentsController@update')->name('front.comment.update');
    Route::post('comment/{video}/store', 'CommentsController@store')->name('front.comment.store');

});
Auth::routes();

<?php

Route::group(['middleware' => 'api'], function(){
    /**
     * Authentication
     */
    Route::post('auth/signup', [
        'uses' => 'AuthController@signup'
    ]);

    Route::post('auth/signin', [
        'uses' => 'AuthController@signin'
    ]);

    /**
     * Forum
     */
    Route::get('/sections', [
        'uses' => 'Forum\SectionController@index'
    ]);

    Route::get('/topic', [
        'uses' => 'Forum\TopicController@index'
    ]);

    Route::get('/topic/{topic}', [
        'uses' => 'Forum\TopicController@show'
    ]);

    /**
     * Protected request
     */
    Route::group(['middleware' => 'jwt.auth'], function() {
        Route::get('/user', [
            'uses'  => 'UserController@index'
        ]);

        Route::post('/topic', [
            'uses'  => 'Forum\TopicController@store'
        ]);
    });
});

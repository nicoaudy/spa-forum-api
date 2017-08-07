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
     * Section
     */
    Route::get('/sections', [
        'uses' => 'Forum\SectionController@index'
    ]);

    /**
     * Protected request
     */
    Route::group(['middleware' => 'jwt.auth'], function() {
        Route::get('/user', [
            'uses'  => 'UserController@index'
        ]);
    });
});

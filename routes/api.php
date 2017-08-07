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
     * Protected request
     */
    Route::group(['middleware' => 'jwt.auth'], function() {
        //
    });
});

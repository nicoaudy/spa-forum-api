<?php

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api'], function(){
    Route::post('auth/signup', [
        'uses' => 'AuthController@signup'
    ]);
    Route::post('auth/signin', [
        'uses' => 'AuthController@signin'
    ]);
});

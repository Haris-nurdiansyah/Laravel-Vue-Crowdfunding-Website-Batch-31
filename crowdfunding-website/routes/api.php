<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Api\Auth')->group(function ()
{
    Route::post('/register', 'RegisterController');
    Route::post('/regenerate-otp', 'RegenerateOtpCode');
    Route::post('/verification', 'VerificationController');
    Route::post('/update-password', 'UpdatePasswordController');
    Route::post('/login', 'LoginController');
    Route::post('/logout', 'LogoutController')->middleware(['auth:api']);
    Route::post('/check-token', 'CheckTokenController')->middleware(['auth:api']);

    // auth social media
    Route::get('/auth/social/{provider}', 'SocialiteController@redirectToProvider');
    Route::get('/auth/social/{provider}/callback', 'SocialiteController@handleProviderCallback');
});

Route::namespace('Api\User')->middleware(['auth:api','email_verify'])->group(function ()
{
    Route::get('get-profile', 'ProfileController');
    Route::post('update-profile', 'UpdateProfileController');
});

Route::group([
    'middleware'    => 'api',
    'prefix'    => 'campaign',
], function () {

    Route::namespace('Api')->group(function () {
        Route::get('/random/{count}', 'CampaignController@random');
        Route::post('/store', 'CampaignController@store');
        Route::get('/', 'CampaignController@index');
        Route::get('/{id}', 'CampaignController@detail');
        Route::get('/search/{keyword}', 'CampaignController@search');
    });

});

Route::group([
    'middleware'    => 'api',
    'prefix'    => 'blog',
], function () {

    Route::namespace('Api')->group(function () {
        Route::get('/random/{count}', 'BlogController@random');
        Route::post('/store', 'BlogController@store');
    });

});

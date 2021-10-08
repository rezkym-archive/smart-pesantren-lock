<?php

namespace App\Classes\Routes;

use Illuminate\Support\Facades\Route;

class SocialAuthRoutesClass
{
    public static function initRoutes()
    {
        /* Student Route */
        Route::group(
            [
                'prefix'     => 'auth',
                'as'         => 'auth.',
            ],
            function () {

                self::initGoogleAuth();
            }
        );
    }

    protected static function initGoogleAuth()
    {
        Route::group(
            [
                'prefix'     => 'google',
                'as'         => 'google.',
            ],
            function () {
                Route::get('/', [\Controllers\Auth\Social\GoogleController::class, 'redirectToGoogle'])->name('create');
                Route::get('/callback', [\Controllers\Auth\Social\GoogleController::class, 'handleGoogleCallback'])->name('callback');
            }
        );
    }
}

<?php

namespace App\Classes\Routes;

use Illuminate\Support\Facades\Route;

class BinsisRouteClass
{

    /**
     * * initialize all routes for binsis
     */
    public static function initRoutes()
    {
        /* Admin Route */
        Route::group(
            [
                'middleware' => ['auth:sanctum', 'role:binsis'],
                'prefix'     => 'binsis',
                'as'         => 'binsis.',
            ],
            function () {

                self::initHomePage();
            }
        );
    }

    /**
     * * initialize home page route for admin
     * 
     * @param
     * @return x
     */
    protected static function initHomePage()
    {
        // Dashboard
        Route::get('/', [\Controllers\Binsis\HomeController::class, 'create'])->name('home');
    }
}

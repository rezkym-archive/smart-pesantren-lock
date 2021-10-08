<?php

namespace App\Classes\Routes;

use Illuminate\Support\Facades\Route;

class AdminRoutesClass
{

    /**
     * * initialize all routes for admin
     */
    public static function initRoutes()
    {
        /* Admin Route */
        Route::group(
            [
                'middleware' => ['auth:sanctum', 'role:admin'],
                'prefix'     => 'admin',
                'as'         => 'admin.',
            ],
            function () {

                self::initHomePage();
                self::initManageSantri();
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
        Route::get('/', [\Controllers\Admin\HomeController::class, 'create'])->name('home');
    }

    /**
     * * initialize manage santri route for admin
     * 
     * @param 
     * @return x
     */
    protected static function initManageSantri()
    {


        // Data santri route
        Route::get('data-santri', [\Controllers\Admin\Kesantrian\DataSantri::class, 'create'])->name('data-santri');

        // Data izin santri route
        Route::get('student-permission', [\Controllers\Admin\Kesantrian\StudentPermission::class, 'create'])->name('student-permission');

        // Aksi kesantrian route
    }
}

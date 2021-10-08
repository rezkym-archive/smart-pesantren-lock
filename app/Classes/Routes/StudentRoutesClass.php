<?php

namespace App\Classes\Routes;

use Illuminate\Support\Facades\Route;

class   StudentRoutesClass
{
    public static function initRoutes()
    {
        /* Student Route */
        Route::group(
            [
                'middleware' => ['auth:sanctum', 'role:student'],
                'prefix'     => 'student',
                'as'         => 'student.',
            ],
            function () {

                self::initHomePage();
                self::initMutabaahYaumiyah();
            }
        );
    }

    protected static function initHomePage()
    {
        // Dashboard
        Route::get('/', [\Controllers\Student\HomeController::class, 'create'])->name('home');
    }

    protected static function initMutabaahYaumiyah()
    {
        Route::group(
            [
                'prefix'    => 'mutabaah',
                'as'        => 'mutabaah.',
            ],
            function () {

                // Create mutabaah yaumiyah form
                Route::get('/', [\Controllers\Student\Mutabaah\MutabaahYaumiyahController::class, 'create'])->name('create');
                Route::post('/', [\Controllers\Student\Mutabaah\MutabaahYaumiyahController::class, 'store'])->name('store');
            }
        );
    }
}

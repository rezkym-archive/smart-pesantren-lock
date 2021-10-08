<?php

namespace App\Classes\Routes;

use Illuminate\Support\Facades\Route;

class TeacherRoutesClass
{
    public static function initRoutes()
    {
        /* Teacher Route */
        Route::group(
            [
                'middleware' => ['auth:sanctum', 'role:teacher'],
                'prefix'     => 'teacher',
                'as'         => 'teacher.',
            ],
            function () {
                
                self::initHomePage();
                self::initHalaqohRoute();
            }
        );
    }

    protected static function initHomePage()
    {
        // Dashboard Teacher
        Route::get('/', [\Controllers\Teacher\HomeController::class, 'create'])->name('home');
    }

    protected static function initHalaqohRoute()
    {


        // Halaqoh Route Group
        Route::group(
            [
                'prefix'     => 'halaqoh',
                'as'         => 'halaqoh.',
            ],
            function () {

                //Create new halaqoh teacher
                Route::get('/', [\Controllers\Teacher\Halaqoh\CreateNewHalaqohController::class, 'create'])->name('create');
                Route::post('/', [\Controllers\Teacher\Halaqoh\CreateNewHalaqohController::class, 'store'])->name('store');

                // Halaqoh history teacher
                Route::get('/history', [\Controllers\Teacher\Halaqoh\HalaqohHistoryController::class, 'index'])->name('history.create');
                /* Route::get('/history/show', [\Controller\Teacher\Halaqoh\HalaqohHistoryController::class, 'show'])->name('history.show'); */
            }
        );
    }
}

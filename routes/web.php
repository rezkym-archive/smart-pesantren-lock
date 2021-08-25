<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Auth\Social\GoogleController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['role:admin', 'auth:sanctum'])->get('/', [PagesController::class, 'index']);


/* Admin Role */
Route::group([
       'middleware' => ['auth:sanctum', 'role:admin'],
       'prefix'     => 'admin',
       'as'         => 'admin.',
    ],
    function () {

        // Dashboard
        Route::get('/', [\Controller\Admin\HomeController::class, 'create'])->name('home');

        // Data santri route
        Route::get('data-santri', [\Controller\Admin\Kesantrian\DataSantri::class, 'create'])->name('data-santri');

        // Data izin santri route
        Route::get('student-permission', [\Controller\Admin\Kesantrian\StudentPermission::class, 'create'])->name('student-permission');

        // Aksi kesantrian route
    }
);









Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Route::get('/', 'PagesController@index');



// Demo routes
Route::get('/datatables', [PagesController::class, 'datatables']);
Route::get('/ktdatatables', [PagesController::class, 'ktDatatables']);
Route::get('/select2', [PagesController::class, 'select2']);
Route::get('/jquerymask', [PagesController::class, 'jQueryMask']);
Route::get('/icons/custom-icons', [PagesController::class, 'customIcons']);
Route::get('/icons/flaticon', [PagesController::class, 'flaticon']);
Route::get('/icons/fontawesome', [PagesController::class, 'fontawesome']);
Route::get('/icons/lineawesome', [PagesController::class, 'lineawesome']);
Route::get('/icons/socicons', [PagesController::class, 'socicons']);
Route::get('/icons/svg', [PagesController::class, 'svg']);

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', [PagesController::class, 'quickSearch'])->name('quick-search');

// Google auth (Laravel socialate)
/* Route::get('/home', 'HomeController@index')->name('home'); */
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth-google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('callback-google');

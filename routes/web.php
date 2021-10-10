<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth:sanctum')->get('/', function () {
    $getFirstRoleUserName = Auth::user()->roles->pluck('name')->first();
    return redirect('/' . $getFirstRoleUserName);
});

/*
|--------------------------------------------------------------------------
| Admin Routes Class
|--------------------------------------------------------------------------
|
| All routes of admin inside this class
| 
| 
|
*/

\App\Classes\Routes\AdminRoutesClass::initRoutes();

/*
|--------------------------------------------------------------------------
| Teacher Routes Class
|--------------------------------------------------------------------------
|
| All routes of teacher inside this class
| 
| 
|
*/

\App\Classes\Routes\TeacherRoutesClass::initRoutes();

/*
|--------------------------------------------------------------------------
| Teacher Routes Class
|--------------------------------------------------------------------------
|
| All routes of teacher inside this class
| 
| 
|
*/

\App\Classes\Routes\BinsisRouteClass::initRoutes();

/*
|--------------------------------------------------------------------------
| Student Routes Class
|--------------------------------------------------------------------------
|
| All routes of student inside this class
| 
| 
|
*/

\App\Classes\Routes\StudentRoutesClass::initRoutes();



Route::get('/tes', function () {


});

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

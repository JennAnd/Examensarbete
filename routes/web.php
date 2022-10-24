<?php


use App\Http\Controllers\ClassesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MakeYogaclassController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/adminpanel', function () {
    return view('adminpanel');
});



Route::view('/login', 'login')->name('login')->middleware('guest');
Route::post('login', LoginController::class);
Route::get('dashboard', DashboardController::class)->middleware('auth');
Route::get('logout', LogoutController::class);
Route::get('ourclasses', [ClassesController::class, 'index'])->name('ourclasses');
Route::get('ourclasses/{id}', [ClassesController::class, 'show'])->name('ourclasses.show');
Route::post('make-yogaclass', MakeYogaclassController::class);

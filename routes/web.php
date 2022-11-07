<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MakeYogaclassController;
use App\Http\Controllers\AdminScheduleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BuyMembershipController;
use App\Http\Controllers\CancelBookedYogaclassController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MakeMembershipController;
use App\Http\Controllers\MembershipsController;
use App\Http\Controllers\OurProductsController;
use App\Http\Controllers\SchemeController;
use App\Http\Controllers\SignUpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentsController;
use Illuminate\Foundation\Console\AboutCommand;

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

Route::get('/signup', function () {
    return view('signup');
});






Route::view('/login', 'login')->name('login')->middleware('guest');
Route::post('login', LoginController::class);
Route::post('signup', SignUpController::class);
Route::get('dashboard', DashboardController::class)->middleware('auth');
Route::get('logout', LogoutController::class);
Route::get('ourclasses', [ClassesController::class, 'index'])->name('ourclasses');
Route::get('ourclasses/{id}', [ClassesController::class, 'show'])->name('ourclasses.show');
Route::post('make-yogaclass', MakeYogaclassController::class);
Route::post('make-membership', MakeMembershipController::class);
Route::post('buy-membership', BuyMembershipController::class);
Route::get('/adminpanel', AdminScheduleController::class)->middleware('admin');
Route::get('/scheme', SchemeController::class);
Route::get('/profile', ProfileController::class);
Route::get('/payments', PaymentsController::class);
Route::post('book', BookingController::class);
Route::post('/cancelbooked', CancelBookedYogaclassController::class);
Route::get('aboutus', [AboutUsController::class, 'index'])->name('aboutus');
Route::get('events', [EventController::class, 'index'])->name('events');
Route::get('ourproducts', [OurProductsController::class, 'index'])->name('ourproducts');
Route::get('memberships', [MembershipsController::class, 'index'])->name('memberships');

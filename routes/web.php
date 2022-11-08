<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\YogaclassController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BuyMembershipController;
use App\Http\Controllers\CancelBookedYogaclassController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MembershipController;

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


Route::get('/admin', function () {
    return view('admin');
});



Route::get('/signup', function () {
    return view('signup');
})->middleware('guest');





//Login
Route::view('/login', 'login')->name('login')->middleware('guest');
Route::post('login', LoginController::class);
Route::post('login-admin', [LoginController::class, 'loginAdmin']);

//Signup
Route::post('signup', SignUpController::class)->middleware('guest');
Route::get('dashboard', DashboardController::class)->middleware('auth');
Route::get('logout', LogoutController::class);


Route::get('ourclasses', [ClassesController::class, 'index'])->name('ourclasses')->middleware('guest');
Route::get('ourclasses/{id}', [ClassesController::class, 'show'])->name('ourclasses.show')->middleware('guest');

Route::post('buy-membership', BuyMembershipController::class);
Route::get('/adminpanel', AdminPanelController::class)->middleware('admin');

Route::get('/profile', ProfileController::class)->middleware('auth');
Route::get('/payments', PaymentsController::class)->middleware('auth');
Route::get('/payments/{id}', [PaymentsController::class, 'showClickedInvoice'])->middleware('auth');
Route::post('book', BookingController::class);
Route::post('/cancelbooked', CancelBookedYogaclassController::class);
Route::get('aboutus', [AboutUsController::class, 'index'])->name('aboutus');
Route::get('events', [EventController::class, 'index'])->name('events');
Route::get('ourproducts', [OurProductsController::class, 'index'])->name('ourproducts');


Route::get('invoices', InvoiceController::class)->name('invoices')->middleware('auth');
Route::post('confirm-payment', [PaymentsController::class, 'confirmPayment']);

Route::post('delete-membership', [MembershipController::class, 'deleteMembership']);
Route::post('make-membership', MembershipController::class);

Route::post('delete-yogaclass', [YogaclassController::class, 'deleteYogaclass']);
Route::post('make-yogaclass', YogaclassController::class);

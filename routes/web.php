<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\OurClassesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\YogaclassController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\AdminMembershipsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\OurProductsController;
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

//Login, logout and signup


// Middleware Auth
// Middleware Admin
// Middleware Guest

Route::view('/login', 'login')->name('login')->middleware('guest');
Route::post('login', LoginController::class);
Route::post('login-admin', [LoginController::class, 'loginAdmin']);
Route::post('signup', SignUpController::class)->middleware('guest');
Route::get('logout', LogoutController::class);
Route::get('adminmemberships', AdminMembershipsController::class)->name('adminmemberships');

Route::get('ourclasses', [OurClassesController::class, 'index'])->name('ourclasses');
Route::get('ourclasses/{id}', [OurClassesController::class, 'show'])->name('ourclasses.show');

Route::get('/profile', ProfileController::class)->middleware('auth')->name('profile');
Route::get('/profileconfirm', [ProfileController::class, 'profileConfirmView'])->middleware('auth');
Route::post('buy-membership', [ProfileController::class, 'buyMembership']);
Route::get('/adminpanel', AdminPanelController::class)->middleware('admin')->name('adminpanel');

Route::get('/payments', PaymentsController::class)->middleware('auth')->name('payments');
Route::get('/payments/{id}', [PaymentsController::class, 'showClickedInvoice'])->middleware('auth');
Route::post('confirm-payment', [PaymentsController::class, 'confirmPayment']);

Route::post('book', [DashboardController::class, 'bookYogaclass']);

Route::post('/cancelbooked', [DashboardController::class, 'cancelBookedYogaclass']);
Route::get('dashboard', DashboardController::class)->middleware('auth')->name('dashboard');

Route::get('aboutus', [AboutUsController::class, 'index'])->name('aboutus');
Route::get('events', [EventController::class, 'index'])->name('events');
Route::get('ourproducts', [OurProductsController::class, 'index'])->name('ourproducts');
Route::get('invoices', InvoiceController::class)->middleware('auth')->name('invoices');


Route::post('delete-membership', [MembershipController::class, 'deleteMembership']);
Route::post('make-membership', MembershipController::class);
Route::get('/memberships', [MembershipController::class, 'showMemberships'])->name('memberships');


Route::post('delete-yogaclass', [YogaclassController::class, 'deleteYogaclass']);
Route::post('make-yogaclass', YogaclassController::class);

Route::post('edit-contact', [MembershipController::class, 'editContactInfo']);

Route::get('confirmbooking', [DashboardController::class, 'confirmBooking']);
Route::get('cancelyogaclass', [DashboardController::class, 'cancelBooking']);

Route::get('confirmmembership', [ProfileController::class, 'confirmMembershipView']);
Route::get('/admindeleteyogaclass', [AdminPanelController::class, 'adminDeleteYogaclassView'])->middleware('admin');
Route::get('/admindeletemembership', [AdminMembershipsController::class, 'confirmDeleteMembershipView'])->middleware('admin');
Route::get('invoicesconfirm', [InvoiceController::class, 'invoicesConfirmView']);

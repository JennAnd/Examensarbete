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


// Middleware Auth
Route::middleware('auth')->group(function () {
    Route::get('logout', LogoutController::class);
    Route::get('/profile', ProfileController::class)->name('profile');
    Route::get('/profileconfirm', [ProfileController::class, 'profileConfirmView']);
    Route::post('buy-membership', [ProfileController::class, 'buyMembership']);
    Route::get('/payments', PaymentsController::class)->name('payments');
    Route::get('/payments/{id}', [PaymentsController::class, 'showClickedInvoice']);
    Route::post('confirm-payment', [PaymentsController::class, 'confirmPayment']);
    Route::post('book', [DashboardController::class, 'bookYogaclass']);
    Route::post('/cancelbooked', [DashboardController::class, 'cancelBookedYogaclass']);
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::post('edit-contact', [MembershipController::class, 'editContactInfo']);

    Route::get('confirmbooking', [DashboardController::class, 'confirmBooking']);
    Route::get('cancelyogaclass', [DashboardController::class, 'cancelBooking']);

    Route::get('confirmmembership', [ProfileController::class, 'confirmMembershipView']);
});

// Middleware Admin
Route::middleware('admin')->group(function () {
    Route::get('/adminpanel', AdminPanelController::class)->name('adminpanel');
    Route::get('adminmemberships', AdminMembershipsController::class)->name('adminmemberships');
    Route::get('invoices', InvoiceController::class)->name('invoices');
    Route::post('delete-membership', [MembershipController::class, 'deleteMembership']);
    Route::post('make-membership', MembershipController::class);
    Route::post('delete-yogaclass', [YogaclassController::class, 'deleteYogaclass']);
    Route::post('make-yogaclass', YogaclassController::class);
    Route::get('/admindeleteyogaclass', [AdminPanelController::class, 'adminDeleteYogaclassView'])->middleware('admin');
    Route::get('/admindeletemembership', [AdminMembershipsController::class, 'confirmDeleteMembershipView'])->middleware('admin');
    Route::get('invoicesconfirm', [InvoiceController::class, 'invoicesConfirmView']);
});

// Middleware Guest
Route::middleware('guest')->group(function () {
    Route::view('/login', 'login')->name('login');
    Route::post('signup', SignUpController::class);
    Route::post('login', LoginController::class);
    Route::post('login-admin', [LoginController::class, 'loginAdmin']);
});


Route::get('ourclasses', [OurClassesController::class, 'index'])->name('ourclasses');
Route::get('ourclasses/{id}', [OurClassesController::class, 'show'])->name('ourclasses.show');
Route::get('aboutus', [AboutUsController::class, 'index'])->name('aboutus');
Route::get('events', [EventController::class, 'index'])->name('events');
Route::get('ourproducts', [OurProductsController::class, 'index'])->name('ourproducts');
Route::get('/memberships', [MembershipController::class, 'showMemberships'])->name('memberships');

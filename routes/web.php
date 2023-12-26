<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManagmentController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ClientController;  
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AppointmentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth.manual'])->group(function () {
    Route::get('/back-home', function () {
        return view('back.home');
    })->name('admin.home');
    
});


// routes/web.php or routes/web.php

Route::middleware(['auth.manual'])->group(function () {
    Route::get('/customer', [ClientController::class, 'index'])->name('customer');
    Route::post('/appointments', [ClientController::class, 'store'])->name('appointments.store');
});


//User Management rout//

Route::group(['prefix' => 'user'], function () {
    Route::get('table', [UserManagmentController::class, 'index'])->name('userTable');
    Route::get('edit/{id}', [UserManagmentController::class, 'editUser'])->name('editUser');
    Route::post('update/{id}', [UserManagmentController::class, 'updateUser'])->name('updateUser');
    Route::get('archive/{id}', [UserManagmentController::class, 'archiveUser'])->name('archiveUser');
    Route::get('add-user-form', [UserManagmentController::class, 'showAddUserForm'])->name('addUserForm'); // Add this line
    Route::post('store-user', [UserManagmentController::class, 'storeUser'])->name('storeUser');
    Route::get('/user/details/{id}', [UserManagmentController::class, 'getUserDetails'])->name('getUserDetails');
});



// Clinic routes
Route::get('/create-clinic', [ClinicController::class, 'createForm'])->name('clinic.create.form');
Route::post('/create-clinic', [ClinicController::class, 'create'])->name('clinic.create');
Route::get('/view-clinics', [ClinicController::class, 'view'])->name('clinic.view');
Route::get('/edit-clinic/{id}', [ClinicController::class, 'editForm'])->name('clinic.edit.form');
Route::put('/update-clinic/{id}', [ClinicController::class, 'update'])->name('clinic.update');
Route::delete('/archive-clinic/{id}', [ClinicController::class, 'archive'])->name('clinic.archive');

//CLIENT side//

Route::get('/home1', [ClientController::class, 'home1'])->name('home1');
Route::get('/about2', [CLientController::class, 'about2'])->name('about2');
Route::get('/dentalClinic2', [PageController::class, 'dentalClinic2'])->name('dentalClinic2');



// routes/web.php



Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
//apointment routes
Route::get('/staff', [StaffController::class, 'index'])->name('staff');
Route::post('/complete-appointment/{appointment}', [StaffController::class, 'completeAppointment'])->name('complete.appointment');


Route::get('/logout', [AuthController::class, 'logout'])->name('manual.logout');

//landingpage
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/dentalClinic', [PageController::class, 'dentalClinic'])->name('dentalClinic');




Route::middleware(['auth'])->group(function () {
    // Other authenticated routes...

    Route::prefix('appointment')->group(function () {
        Route::get('completed', [AppointmentController::class, 'completedAppointments'])->name('appointment.completed');
    });
});


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManagmentController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ClientController;  
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



//branch routes nakakalito na to //
Route::get('/create-branch', [BranchController::class, 'createForm'])->name('branch.create.form');
Route::post('/create-branch', [BranchController::class, 'create'])->name('branch.create');
Route::get('/view-branches', [BranchController::class, 'view'])->name('branch.view');
Route::get('/edit-branch/{id}', [BranchController::class, 'editForm'])->name('branch.edit.form');
Route::delete('/archive-branch/{id}', [BranchController::class, 'archive'])->name('branch.archive');
Route::put('/update-branch/{id}', [BranchController::class, 'update'])->name('branch.update');
//CLIENT side//

Route::get('/home1', [ClientController::class, 'home1'])->name('home1');
Route::get('/about2', [CLientController::class, 'about2'])->name('about2');



// routes/web.php



Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');


//cashier

Route::get('/cashier', [CashierController::class, 'show'])->name('cashier.show');
Route::get('/cashier/inventory', [CashierController::class, 'showInventory'])->name('cashier.inventory');
Route::get('/logout', [AuthController::class, 'logout'])->name('manual.logout');

//landingpage
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/products', [PageController::class, 'products'])->name('products');




<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome-w');
// });
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', [DashboardController::class, 'index'])->name('lp');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard')->middleware('auth');

// //register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// //login
// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate']);

// //logout
// Route::post('/logout', [LoginController::class, 'logout']);

Route::group([
    'namespace'=>'App\\Http\\Controllers',
],function () {
    //register
    // Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
    // Route::post('/register', [RegisterController::class, 'store']);
    //login
    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'authenticate']);    

    Route::middleware(['auth:user'])->group(function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // route admin 
        Route::middleware(['can:role,"admin"'])->group(function () {
            Route::resource('students', StudentController::class);
            Route::resource('rombels', RombelController::class);
            Route::resource('rayons', RayonController::class);

            // Route::resource('admins', UserController::class);
            Route::get('/admins', [AdminController::class, 'index'])->name('admins');
            // create admin
            Route::get('/admins/create', [AdminController::class, 'create'])->name('admins-create');
            Route::post('/admins/create/input', [AdminController::class, 'store'])->name('admins-create-input');
            // edit admin
            Route::get('/admins/{id}/edit', [AdminController::class, 'edit'])->name('admins-edit');
            Route::post('/admins/{id}/edit/update', [AdminController::class, 'update'])->name('admins-update');
            // delete admin
            Route::post('/admins/{id}/delete', [AdminController::class, 'destroy'])->name('admins-delete');


            Route::get('/presences', [PresenceController::class, 'history'])->name('historis');
        });

        // route student 
        Route::middleware(['can:role,"student"'])->group(function () {
            Route::get('/presences-in', [PresenceController::class, 'presenceIn'])->name('presences-in');
            Route::post('/input-presences-in', [PresenceController::class, 'store'])->name('input-presences-in');

            Route::get('/presences-out', [PresenceController::class, 'presenceOut'])->name('presences-out');
            Route::post('/input-presences-out', [PresenceController::class, 'storeOut'])->name('input-presences-out');

            Route::get('/presences-success', [PresenceController::class, 'presenceSuccess'])->name('presences-success');

            Route::get('/absents', [PresenceController::class, 'absent'])->name('absents');
            Route::post('/input-absents', [PresenceController::class, 'storeAbsent'])->name('input-absents');

            Route::get('/profiles', [DashboardController::class, 'profile'])->name('profiles');
        });
    });
});

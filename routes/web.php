<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ALL USERS
|--------------------------------------------------------------------------
|
*/
Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
|
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('teachers', TeacherController::class);
    Route::resource('students', StudentController::class);
    Route::resource('programs', ProgramController::class);
    Route::resource('products', ProductController::class);
    Route::resource('appointments', AppointmentController::class);

    Route::get('teachers', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('teachers/createOrEdit/{teacher?}', [TeacherController::class, 'edit'])->name('teachers.createOrEdit');
    Route::post('teachers/save/{teacher?}', [TeacherController::class, 'save'])->name('teachers.save');
    Route::delete('teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

    Route::get('students', [StudentController::class, 'index'])->name('students.index');
    Route::get('students/createOrEdit/{student?}', [StudentController::class, 'edit'])->name('students.createOrEdit');
    Route::post('students/save/{student?}', [StudentController::class, 'save'])->name('students.save');
    Route::delete('students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
});

/*
|--------------------------------------------------------------------------
| TEACHERS
|--------------------------------------------------------------------------
|
*/
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('teacher.dashboard');
    Route::get('/schedule', [TeacherController::class, 'schedule'])->name('teacher.schedule');
    Route::get('/students', [TeacherController::class, 'students'])->name('teacher.students');
});

/*
|--------------------------------------------------------------------------
| DEFAULT USER
|--------------------------------------------------------------------------
|
*/
Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    // Appointments
    Route::get('/appointments/createOrEdit', [AppointmentController::class, 'edit'])->name('appointments.createOrEdit');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.save');

    // Products
    Route::get('/products/list', [ProductController::class, 'index'])->name('products.list');
    Route::post('/products/{product}/buy', [ProductController::class, 'buy'])->name('products.buy');
});

// Authentication Routes
require __DIR__.'/auth.php';
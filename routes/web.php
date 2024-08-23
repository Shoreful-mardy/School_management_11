<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('admin/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout');

    // User Manage All Route
    Route::controller(UserController::class)->group(function () {
        Route::get('view/user', 'ViewUser')->name('user.view');
        Route::get('add/user', 'AddUser')->name('add.user');
        Route::post('store/user', 'StoreUser')->name('store.user');
        Route::get('edit/user/{id}', 'EditUser')->name('edit.user');
        Route::post('update/user', 'UpdateUser')->name('update.user');
        Route::get('delete/user/{id}', 'DeleteUser')->name('delete.user');
    });

    // Profile Manage All Route
    // User Manage All Route
    Route::controller(UserProfileController::class)->group(function () {
        Route::get('profile/view', 'ProfileView')->name('profile.view');
        Route::get('profile/edit', 'ProfileEdit')->name('edit.profile');
        Route::post('profile/store', 'ProfileStore')->name('profile.store');

        //Password Changed Route
        Route::get('password/edit', 'PasswordView')->name('password.view');
        Route::post('password/update', 'PasswordUpdate')->name('update.password');
    });

    // Setup Management All Route
    Route::controller(StudentClassController::class)->group(function () {
        Route::get('student/class', 'StudentClass')->name('student.class');
        Route::get('add/student/class', 'AddStudentClass')->name('add.student.class');
        Route::post('store/student/class', 'StoreStudentClass')->name('store.student.class');
        Route::get('edit/student/class/{id}', 'EditStudentClass')->name('edit.student.class');
        Route::post('update/student/class', 'UpdateStudentClass')->name('update.student.class');
        Route::get('delete/student/class/{id}', 'DeleteStudentClass')->name('delete.student.class');
    });


});










































require __DIR__.'/auth.php';

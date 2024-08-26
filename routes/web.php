<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;

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

    // Setup Management Student Class  All Route
    Route::controller(StudentClassController::class)->group(function () {
        Route::get('student/class', 'StudentClass')->name('student.class');
        Route::get('add/student/class', 'AddStudentClass')->name('add.student.class');
        Route::post('store/student/class', 'StoreStudentClass')->name('store.student.class');
        Route::get('edit/student/class/{id}', 'EditStudentClass')->name('edit.student.class');
        Route::post('update/student/class', 'UpdateStudentClass')->name('update.student.class');
        Route::get('delete/student/class/{id}', 'DeleteStudentClass')->name('delete.student.class');
    });

     // Setup Management Student Year All Route
    Route::controller(StudentYearController::class)->group(function () {
        Route::get('student/year', 'StudentYear')->name('student.year');
        Route::get('add/student/year', 'AddStudentyear')->name('add.student.year');
        Route::post('store/student/year', 'StoreStudentYear')->name('store.student.year');
        Route::get('edit/student/year/{id}', 'EditStudentYear')->name('edit.student.year');
        Route::post('update/student/year', 'UpdateStudentYear')->name('update.student.year');
        Route::get('delete/student/year/{id}', 'DeleteStudentYear')->name('delete.student.year');
    });

     // Setup Management Student Group All Route
    Route::controller(StudentGroupController::class)->group(function () {
        Route::get('student/group', 'StudentGroup')->name('student.group');
        Route::get('add/student/group', 'AddStudentGroup')->name('add.student.group');
        Route::post('store/student/group', 'StoreStudentGroup')->name('store.student.group');
        Route::get('edit/student/group/{id}', 'EditStudentGroup')->name('edit.student.group');
        Route::post('update/student/group', 'UpdateStudentGroup')->name('update.student.group');
        Route::get('delete/student/group/{id}', 'DeleteStudentGroup')->name('delete.student.group');
    });

     // Setup Management Student Shift All Route
    Route::controller(StudentShiftController::class)->group(function () {
        Route::get('student/shift', 'StudentShift')->name('student.shift');
        Route::get('add/student/shift', 'AddStudentShift')->name('add.student.shift');
        Route::post('store/student/shift', 'StoreStudentShift')->name('store.student.shift');
        Route::get('edit/student/shift/{id}', 'EditStudentShift')->name('edit.student.shift');
        Route::post('update/student/shift', 'UpdateStudentShift')->name('update.student.shift');
        Route::get('delete/student/shift/{id}', 'DeleteStudentShift')->name('delete.student.shift');
    });

     // Setup Management Student Fee Category All Route
    Route::controller(FeeCategoryController::class)->group(function () {
        Route::get('fee/category', 'FeeCategoryView')->name('fee.category');
        Route::get('add/student/fee', 'AddStudentFee')->name('add.student.fee');
        Route::post('store/fee/category', 'StoreFeeCategory')->name('store.fee.category');
        Route::get('edit/fee/category/{id}', 'EditFeeCategory')->name('edit.fee.category');
        Route::post('update/fee/category', 'UpdateFeeCategory')->name('update.fee.category');
        Route::get('delete/fee/category/{id}', 'DeleteFeeCategory')->name('delete.fee.category');
    });

     // Setup Management Student Fee Category Amount All Route
    Route::controller(FeeAmountController::class)->group(function () {
        Route::get('fee/category/amount', 'FeeCategoryAmountView')->name('fee.category.amount');
        Route::get('add/fee/amount', 'AddFeeAmount')->name('add.fee.amount');
        Route::post('store/fee/amount', 'StoreFeeAmount')->name('store.fee.amount');
        Route::get('edit/fee/amount/{fee_category_id}', 'EditFeeAmount')->name('edit.fee.amount');
        Route::post('update/fee/amount/{fee_category_id}', 'UpdateFeeAmount')->name('update.fee.amount');
        Route::get('details/fee/amount/{fee_category_id}', 'DetailsFeeAmount')->name('details.fee.amount');
        Route::get('delete/fee/amount/{fee_category_id}', 'DeleteFeeAmount')->name('delete.fee.amount');

    });

     // Setup Management Student Exam Type All Route
    Route::controller(ExamTypeController::class)->group(function () {
        Route::get('exam/type', 'ExamType')->name('exam.type');
        Route::get('add/exam/type', 'AddExamType')->name('add.exam.type');
        Route::post('store/exam/type', 'StoreExamType')->name('store.exam.type');
        Route::get('edit/exam/type/{id}', 'EditExamType')->name('edit.exam.type');
        Route::post('update/exam/type', 'UpdateExamType')->name('update.exam.type');
        Route::get('delete/exam/type/{id}', 'DeleteExamType')->name('delete.exam.type');
    });

    // Setup Management Student Exam Type All Route
    Route::controller(SubjectController::class)->group(function () {
        Route::get('/subject', 'ExamType')->name('subject');
        Route::get('add/subject', 'AddSubject')->name('add.subject');
        Route::post('store/subject', 'StoreSubject')->name('store.subject');
        Route::get('edit/esubject/{id}', 'EditSubject')->name('edit.subject');
        Route::post('update/subject', 'UpdateSubject')->name('update.subject');
        Route::get('delete/subject/{id}', 'DeleteSubject')->name('delete.subject');
    });

     // Setup Management Assign Subject All Route
    Route::controller(AssignSubjectController::class)->group(function () {
        Route::get('assign/subject/view', 'AssignSubjectView')->name('assign.subject.view');
        Route::get('add/assgin/subject', 'AddAssignSubject')->name('add.assgin.subject');
        Route::post('store/assign/subject', 'StoreAssignSubject')->name('store.assign.subject');
        // Route::get('edit/fee/amount/{fee_category_id}', 'EditFeeAmount')->name('edit.fee.amount');
        // Route::post('update/fee/amount/{fee_category_id}', 'UpdateFeeAmount')->name('update.fee.amount');
        // Route::get('details/fee/amount/{fee_category_id}', 'DetailsFeeAmount')->name('details.fee.amount');
        // Route::get('delete/fee/amount/{fee_category_id}', 'DeleteFeeAmount')->name('delete.fee.amount');

    });



});










































require __DIR__.'/auth.php';

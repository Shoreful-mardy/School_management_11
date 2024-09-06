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
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Student\StudentRegisterController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Employee\EmployeeRegController;
use App\Http\Controllers\Backend\Employee\EmpoyeeSalaryController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendanceController;

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
        Route::get('edit/assgin/subject/{class_id}', 'EditAssignSubject')->name('edit.assgin.subject');
        Route::post('update/assgin/subject/{class_id}', 'UpdateAssignSubject')->name('update.assign.subject');
        Route::get('details/assgin/subject/{class_id}', 'DetailsAssignSubject')->name('details.assgin.subject');
    });

    // Setup Management Designation All Route
    Route::controller(DesignationController::class)->group(function () {
        Route::get('designation/view', 'DesignationView')->name('designation.view');
        Route::get('add/designation', 'AddDesignation')->name('add.designation');
        Route::post('store/designation', 'StoreDesignation')->name('store.designation');
        Route::get('edit/designation/{id}', 'EditDesignation')->name('edit.designation');
        Route::post('update/designaion', 'UpdateDesignaion')->name('update.designaion');
        Route::get('delete/designation/{id}', 'DeleteDesignation')->name('delete.designation');
    });

    // Student Registation All Route
    Route::controller(StudentRegisterController::class)->group(function () {
        Route::get('student/registration/view', 'StudentRegisterView')->name('student.registration.view');
        Route::get('student/registration/add', 'StudentRegisterAdd')->name('student.registration.add');
        Route::post('store/student/registration', 'StoreStudentRegister')->name('store.student.registration');
        Route::get('student/year/class/wise', 'StudentClassYearWise')->name('student.year.class.wise');
        Route::get('student/registration/edit/{studetn_id}', 'StudentRegEdit')->name('student.registration.edit');
        Route::post('update/student/registration/{studetn_id}', 'UpdateStudentRegister')->name('update.student.registration');
        Route::get('student/registration/promotion/{id}', 'StudentRegPromote')->name('student.registration.promotion');
        Route::post('promotion/student/registration/{studetn_id}', 'PromotionStudentRegister')->name('promotion.student.registration');
        Route::get('student/registration/details/{studetn_id}', 'StudentRegDetails')->name('student.registration.details');
    });

    // Student Management Roll Generate All Route
    Route::controller(StudentRollController::class)->group(function () {
        Route::get('roll/generate/view', 'StudentRollView')->name('roll.generate.view');
        Route::get('student/registration/getstudents', 'GetStudents')->name('student.registration.getstudents');
        Route::post('roll/generate/store', 'RollGenerateStore')->name('roll.generate.store');
    });

    // Student Management Registration Fee All Route
    Route::controller(RegistrationFeeController::class)->group(function () {
        Route::get('registration/fee/view', 'RegistrationFeeView')->name('registration.fee.view');
        Route::get('registration/fee/classwise', 'RegistrationFeeClassWise')->name('student.registration.fee.classwise.get');
        Route::get('registration/fee/payslip', 'RegistrationFeePayslip')->name('student.registration.fee.payslip');
    });

    // Student Management Monthly Fee All Route
    Route::controller(MonthlyFeeController::class)->group(function () {
        Route::get('monthly/fee/view', 'MonthlyFeeView')->name('monthly.fee.view');
        Route::get('monthly/fee/classwise', 'MonthlyFeeClassWise')->name('student.monthly.fee.classwise.get');
        Route::get('monthly/fee/payslip', 'MonthlyFeePayslip')->name('student.monthly.fee.payslip');
    });

    // Student Management Exam Fee All Route
    Route::controller(ExamFeeController::class)->group(function () {
        Route::get('exam/fee/view', 'ExamFeeView')->name('exam.fee.view');
        Route::get('exam/fee/classwise', 'ExamFeeClassWise')->name('student.exam.fee.classwise.get');
        Route::get('exam/fee/payslip', 'ExamFeePayslip')->name('student.exam.fee.payslip');
    });

    // Employe Management  All Route
    Route::controller(EmployeeRegController::class)->group(function () {
        Route::get('employe/registration/view', 'EmpployeView')->name('employe.registration.view');
        Route::get('add/employee/registration', 'AddEmpployeReg')->name('add.employee.registration');
        Route::post('store/employee/registration', 'StoreEmpployeReg')->name('store.employe.registration');
        Route::get('edit/employee/registration/{id}', 'EditEmpployeReg')->name('employee.registration.edit');
        Route::post('update/employee/registration/{id}', 'UpdateEmpployeReg')->name('update.employe.registration');
        Route::get('details/employee/registration/{employee_id}', 'EmployeeEmpployeReg')->name('employee.registration.details');
    });
    // Employe Salary  All Route
    Route::controller(EmpoyeeSalaryController::class)->group(function () {
        Route::get('employe/salary/view', 'EmpployeSalaryView')->name('employe.salary.view');
        Route::get('employe/salary/increment/{id}', 'EmpployeSalaryIncrement')->name('employee.salary.increment');
        Route::post('update/increment/store/{id}', 'UpdateIncrementStore')->name('update.increment.store');
        Route::get('employee/salary/details/{id}', 'EmpployeSalaryDetails')->name('employee.salary.details');
    });

    // Employe Leave  All Route
    Route::controller(EmployeeLeaveController::class)->group(function () {
        Route::get('employe/leave/view', 'EmpployeLeaveView')->name('employe.leave.view');
        Route::get('add/employee/leave', 'EmpployeLeaveAdd')->name('add.employee.leave');
        Route::post('store/employee/leave', 'EmpployeLeaveStore')->name('employee.leave.store');
        Route::get('edit/employee/leave/{id}', 'EmpployeLeaveEdit')->name('edit.employee.leave');
        Route::post('edit/employee/update/{id}', 'EmpployeLeaveUpdate')->name('employee.leave.update');
        Route::get('delete/employee/leave/{id}', 'EmpployeLeaveDelete')->name('delete.employee.leave');
    });

    // Employe Attendance  All Route
    Route::controller(EmployeeAttendanceController::class)->group(function () {
        Route::get('employe/attendance/view', 'EmpployeeAttendanceView')->name('employe.attendance.view');
        Route::get('add/employee/attendacne', 'EmpployeeAttendanceAdd')->name('add.employee.attendacne');
        Route::post('store/employee/attendacne', 'EmpployeeAttendanceStore')->name('store.employee.attendacne');
        Route::get('edit/employee/attendance/{date}', 'EmpployeeAttendanceEdit')->name('edit.employee.attendance');
        Route::get('details/employee/attendance/{date}', 'EmpployeeAttendanceDetails')->name('details.employee.attendance');
    });






});//End Auth Middleware










































require __DIR__.'/auth.php';

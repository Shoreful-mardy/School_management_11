<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeSalaryLog;
use App\Models\Designation;
use Illuminate\Support\Facades\Hash;

class EmployeeRegController extends Controller
{
    public function EmpployeView(){
        $alldata = User::where('user_type','Employee')->get();
        return view('backend.employee.employee_reg.employee_view',compact('alldata'));
    }//End Method

    public function AddEmpployeReg(){
        $designation = Designation::all();
        return view('backend.employee.employee_reg.employee_add',compact('designation'));
    }//End Method
    public function StoreEmpployeReg(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'designation_id' => 'required',
            'photo' => 'required',
        ]);

        $checkYear = date('Ym',strtotime($request->join_date));
        $employee = User::where('user_type','employee')->orderBy('id','DESC')->first();
        if ($employee==null) {
            $firstRegister = 0;
            $employeId = $firstRegister+1;
            if ($employeId < 10) {
                $id_no = '000'.$employeId;
            }elseif($employeId < 100){
                $id_no = '00'.$employeId;
            }elseif($employeId < 1000){
                $id_no = '0'.$employeeId;
            }//endif
        }else{
            $employee = User::where('user_type','Student')->orderBy('id','DESC')->first()->id;
            $employeeId = $employee+1;
             if ($employeeId < 10) {
                $id_no = '000'.$employeeId;
            }elseif($employeeId < 100){
                $id_no = '00'.$employeeId;
            }elseif($employeeId < 1000){
                $id_no = '0'.$employeeId;
            }//endif
        }//endif

        $final_id_no = $checkYear.$id_no;
        $code = rand(0000,9999);
        $user = new User();
        $user->id_no = $final_id_no;
        $user->password = Hash::make($code);
        $user->user_type = 'employee';
        $user->code = $code;
        $user->name = $request->name;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->designation_id = $request->designation_id;
        $user->salary = $request->salary;
        $user->dob = date('Y-m-d',strtotime($request->dob));
        $user->join_date = date('Y-m-d',strtotime($request->join_date));

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/employee_images'),$filename);
            $user['photo'] = $filename;
        }
        $user->save();

        $employee_salary = new EmployeeSalaryLog();
        $employee_salary->employee_id = $user->id;
        $employee_salary->effected_salary = date('Y-m-d',strtotime($request->join_date));
        $employee_salary->previous_salary = $request->salary;
        $employee_salary->present_salary = $request->salary;
        $employee_salary->increment_salary = '0';
        $employee_salary->save();

    $notification = array(
        'message' => 'Employee Registration successfully!',
        'alert-type' => 'success'
    );
   return redirect()->route('employe.registration.view')->with($notification);
    }//End Method
















}

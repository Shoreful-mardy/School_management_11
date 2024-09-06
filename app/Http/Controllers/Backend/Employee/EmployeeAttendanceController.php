<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeAttendance;
use Barryvdh\DomPDF\Facade\Pdf;

class EmployeeAttendanceController extends Controller
{
    
    public function EmpployeeAttendanceView(){
        $data['alldata'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id','DESC')->get();
        return view('backend.employee.employee_attendance.employee_attend_view',$data);
    }//End Method

    public function EmpployeeAttendanceAdd(){
        $data['employee'] = User::where('user_type','employee')->get();
        return view('backend.employee.employee_attendance.employee_attend_add',$data);
    }//End Method

    public function EmpployeeAttendanceStore(Request $request){

        EmployeeAttendance::where('date',date('Y-m-d',strtotime($request->date)))->delete();
        $countemployee = count($request->employee_id);
        for ($i=0; $i < $countemployee ; $i++) { 
            $attend_status = 'attend_status'.$i;
            $attend = new EmployeeAttendance();
            $attend->date = date('Y-m-d',strtotime($request->date));
            $attend->employee_id = $request->employee_id[$i];
            $attend->attend_status = $request->$attend_status;
            $attend->save();
        }

        $notification = array(
            'message' => 'Employee Attendance Date Updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('employe.attendance.view')->with($notification);

    }//End Method

    public function EmpployeeAttendanceEdit($date){
        $data['editData'] = EmployeeAttendance::where('date',$date)->get();
        $data['employee'] = User::where('user_type','employee')->get();
        return view('backend.employee.employee_attendance.employee_attend_edit',$data);
    }//End Method

    public function EmpployeeAttendanceDetails($date){
        $data['details'] = EmployeeAttendance::where('date',$date)->get();
        return view('backend.employee.employee_attendance.employee_attend_details',$data);
    }//End Method












}

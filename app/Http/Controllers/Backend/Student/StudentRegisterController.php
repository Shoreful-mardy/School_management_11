<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use Illuminate\Support\Facades\Hash;
use DB;

class StudentRegisterController extends Controller
{
    public function StudentRegisterView(){
        $student_year = StudentYear::all();
        $student_class = StudentClass::all();
        $year_id = StudentYear::orderBy('id','desc')->first()->id;
        $class_id = StudentClass::orderBy('id','desc')->first()->id;
        $data = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->orderBy('id','desc')->get();
        return view('backend.student.student_reg.student_view',compact('data','student_year','student_class','year_id','class_id'));
    }//End Method

    public function StudentClassYearWise(Request $request){
        $student_year = StudentYear::all();
        $student_class = StudentClass::all();
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $data = AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->orderBy('id','desc')->get();
        return view('backend.student.student_reg.searh_result_view',compact('data','student_year','student_class','year_id','class_id'));
    }//End Method

    public function StudentRegisterAdd(){
        $student_year = StudentYear::all();
        $student_class = StudentClass::all();
        $student_group = StudentGroup::all();
        $student_shift = StudentShift::all();
        return view('backend.student.student_reg.student_add',compact('student_year','student_class','student_group','student_shift'));
    }//End Method

    public function StoreStudentRegister(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:users,name',
            'fname' => 'required',
            'mname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'year_id' => 'required',
            'class_id' => 'required',
            'group_id' => 'required',
            'shift_id' => 'required',
            'photo' => 'required',
        ]);
        $checkYear = StudentYear::find($request->year_id)->name;
        $student = User::where('user_type','Student')->orderBy('id','DESC')->first();
        if ($student==null) {
            $firstRegister = 0;
            $studentId = $firstRegister+1;
            if ($studentId < 10) {
                $id_no = '000'.$studentId;
            }elseif($studentId < 100){
                $id_no = '00'.$studentId;
            }elseif($studentId < 1000){
                $id_no = '0'.$studentId;
            }//endif
        }else{
            $student = User::where('user_type','Student')->orderBy('id','DESC')->first()->id;
            $studentId = $student+1;
             if ($studentId < 10) {
                $id_no = '000'.$studentId;
            }elseif($studentId < 100){
                $id_no = '00'.$studentId;
            }elseif($studentId < 1000){
                $id_no = '0'.$studentId;
            }//endif
        }//endif

        $final_id_no = $checkYear.$id_no;
        $code = rand(0000,9999);
        $user = new User();
        $user->id_no = $final_id_no;
        $user->password = Hash::make($code);
        $user->user_type = 'Student';
        $user->code = $code;
        $user->name = $request->name;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->dob = date('Y-m-d',strtotime($request->dob));

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/student_images'),$filename);
            $user['photo'] = $filename;
        }
        $user->save();

        $assign_student = new AssignStudent();
        $assign_student->studetn_id = $user->id;
        $assign_student->class_id = $request->class_id;
        $assign_student->year_id = $request->year_id;
        $assign_student->group_id = $request->group_id;
        $assign_student->shift_id = $request->shift_id;
        $assign_student->save();

        $dicount_student = new DiscountStudent();
        $dicount_student->assign_student_id = $assign_student->id;
        $dicount_student->fee_category_id = '1';
        $dicount_student->discount = $request->discount;
        $dicount_student->save();

    $notification = array(
        'message' => 'Student Registration successfully!',
        'alert-type' => 'success'
    );
   return redirect()->route('student.registration.view')->with($notification);
    }//End Method

    public function StudentRegEdit($studetn_id){

        $student_year = StudentYear::all();
        $student_class = StudentClass::all();
        $student_group = StudentGroup::all();
        $student_shift = StudentShift::all();
        $data = AssignStudent::with(['student','discount'])->where('studetn_id',$studetn_id)->first();
        return view('backend.student.student_reg.student_edit',compact('student_year','student_class','student_group','student_shift','data'));

    }//End Method


















}

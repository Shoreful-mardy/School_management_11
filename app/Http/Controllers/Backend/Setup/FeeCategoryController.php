<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function FeeCategoryView(){
        $data = FeeCategory::all();
        return view('Backend.setup.fee_category.view_fee_category',compact('data'));
    }//End Method

    public function AddStudentFee(){
        return view('Backend.setup.fee_category.add_student_fee_category');
    }//End Method

    public function StoreFeeCategory(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ]);

        FeeCategory::insert([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Student Fee Category created successfully!',
            'alert-type' => 'success'
        );
       return redirect()->route('fee.category')->with($notification);
    }//End Method

    public function EditFeeCategory($id){
       $data = FeeCategory::find($id);
       return view('Backend.setup.fee_category.edit_fee_category',compact('data'));

    }//End Method

    public function UpdateFeeCategory(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ]);

        $id = $request->id;


        FeeCategory::findOrFail($id)->update([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Student Fee Category Updated successfully!',
            'alert-type' => 'success'
        );

       return redirect()->route('fee.category')->with($notification);

    }//End Methon

    public function DeleteFeeCategory($id){
        FeeCategory::find($id)->delete();
        $notification = array(
            'message' => 'Student Fee Category Deleted successfully!',
            'alert-type' => 'success'
        );

       return redirect()->back()->with($notification);
   }//End Method












}

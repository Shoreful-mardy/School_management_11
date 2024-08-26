<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategoryAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;

class FeeAmountController extends Controller
{
    public function FeeCategoryAmountView(){
        $data = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('Backend.setup.fee_amount.view_fee_amount',compact('data'));
    }//End Method

    public function AddFeeAmount(){
        $fee_category = FeeCategory::all();
        $student_class = StudentClass::all();
        return view('Backend.setup.fee_amount.add_fee_amount',compact('fee_category','student_class'));
    }//End Method


    public function StoreFeeAmount(Request $request){

        $countclass = count($request->class_id);
        if ($countclass != Null) {
            for ($i=0; $i < $countclass; $i++) { 
                FeeCategoryAmount::insert([
                    'fee_category_id' => $request->fee_category_id,
                    'class_id' => $request->class_id[$i],
                    'amount' => $request->amount[$i],
                ]);
            }//End For
            $notification = array(
                'message' => 'Student Fee Amount successfully!',
                'alert-type' => 'success'
            );
           return redirect()->route('fee.category.amount')->with($notification);
        }//End if

        $notification = array(
            'message' => 'Something Want Wrong',
            'alert-type' => 'error'
        );
       return redirect()->back()->with($notification);

    }//End Method


    public function EditFeeAmount($fee_category_id){

        $editdata = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
        $fee_category = FeeCategory::all();
        $student_class = StudentClass::all();

        return view('Backend.setup.fee_amount.edit_fee_amount',compact('editdata','fee_category','student_class'));

    }//End Method

    public function UpdateFeeAmount(Request $request,$fee_category_id){
        if ($request->class_id == Null) {
            $notification = array(
                'message' => 'Something Want Wrong',
                'alert-type' => 'error'
            );
           return redirect()->back()->with($notification);
        }else{
            $countclass = count($request->class_id);
            FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete();
                for ($i=0; $i < $countclass; $i++) { 
                   $fee_amount = new  FeeCategoryAmount();
                   $fee_amount->fee_category_id = $request->fee_category_id;
                   $fee_amount->class_id = $request->class_id[$i];
                   $fee_amount->amount = $request->amount[$i];
                   $fee_amount->save();
                }//End For

          $notification = array(
                'message' => 'Student Fee Amount Updated successfully!',
                'alert-type' => 'success'
            );
           return redirect()->route('fee.category.amount')->with($notification);  

        }//end if
    }//End Method

    public function DetailsFeeAmount($fee_category_id){
         $detailsData = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
         return view('Backend.setup.fee_amount.details_fee_amount',compact('detailsData'));
    }//End Method


    public function DeleteFeeAmount($fee_category_id){
        FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete(); 

        $notification = array(
                'message' => 'Student Fee Amount Delete successfully!',
                'alert-type' => 'success'
            );
           return redirect()->back()->with($notification); 
    }//End Method



















}

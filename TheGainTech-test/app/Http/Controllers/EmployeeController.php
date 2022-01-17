<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Session;

class EmployeeController extends Controller
{
    public function employees(){
        $employees = Employee::paginate(5);
        // echo "<pre>"; print_r($employees);die;
        return view('employee.employees')->with(compact('employees'));
    }

    public function addEmployee(Request $request){
        $employee = new Employee;
            $employee->name = $request->input('name');
            $employee->email = $request->input('email');
            $employee->address = $request->input('address');
            $employee->phone = $request->input('phone');
            $employee->save();
            $message ="Employee Add Successfully!";
            Session::flash('success_message',$message);
            return redirect()->back();
    }

    public function Edit($id){
        $employee = Employee::find($id);
        // echo "<pre>"; print_r($employee);die;
        return response()->json([
            'status'=>2000,
            'employee'=>$employee,
        ]);
    }

    public function update(Request $request){
        $employee_id = $request->input('employee_id');
        $employee = Employee::find($employee_id);
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->address = $request->input('address');
        $employee->phone = $request->input('phone');
        $employee->update();
        $message ="Employee Update Successfully!";
        Session::flash('success_message',$message);
        return redirect()->back();
    }

    public function destroy(Request $request){
        $delete_id = $request->input('delete_id');
        $employee = Employee::find($delete_id);
        $employee->delete();
        $message ="Employee deleted Successfully!";
        Session::flash('success_message',$message);
        return redirect()->back();
    }
    public function deleteMultipleRecoeds(Request $request){
        $ids = $request->ids;
        // echo "<pre>"; print_r($ids);die;
        Employee::whereIn('id',explode(",",$ids))->delete();
        $message ="Employee data deleted Successfully!";
        Session::flash('success_message',$message);
        return redirect()->back();
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeeController extends Controller
{
    public function employee(){
        $employee = Employee::all();
        return view('index',compact('employee'));

    }   

    public function submit(Request $request){
                $employee = new Employee; 
                if ($image = $request->file('img')) {
                    $destinationPath = 'uploads/';
                    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move($destinationPath, $profileImage);
                }
                $employee->name= $request->name;
                $employee->email= $request->email;
                $employee->number= $request->number;
                $employee->dob= $request->dob;
                $employee->img= $profileImage;
              
                $employee->save();
            
                return back()->with('Success','your form is submitted');       
        }
}

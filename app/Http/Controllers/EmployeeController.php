<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeeController extends Controller
{
    public function employee(Request $request){
        if(isset($request->id)){
            $update = Employee::find($request->id);
        }else{
            $update = '';
        }
        $employee = Employee::all();
        return view('index',compact('employee','update'));

    }   

    public function submit(Request $request){
                if($request->id == ''){
                    $employee = new Employee; 
                    $message = 'Employee added successfully..';
                }else{
                    $employee = Employee::find($request->id); 
                    $message = 'Employee updated successfully..';
                }
                if ($image = $request->file('img')) {
                    $destinationPath = 'uploads/';
                    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move($destinationPath, $profileImage);
                    $employee->img= $profileImage;
                }
                $employee->name= $request->name;
                $employee->email= $request->email;
                $employee->number= $request->number;
                $employee->dob= $request->dob;
              
                $employee->save();
            
                return redirect('employee')->with('Success',$message);       
        }
        // public function destroy($id)
        // {
        //     // Find the Employee by ID
            


        //     $employee = Employee ::find($id);
        
        //     // Check if Employee exists
        //     if ($employee) {
        //         // Delete the Employee
        //         $employee->delete();
        
        //         // Redirect with a success message
        //         // return redirect()->route('index')->with('success', 'Employee deleted successfully.');
        //          return back()->with('Success','Employee deleted successfully'); 
        //       ;
        //     } 
             
        
        // }  
        public function Employees(Request $request){
            $employee = employee::where('id',$request->id)->delete();
            return back()->with('success',' Deleted successfully..');
           
        }





//  public function update(Request $request, $id)
// {
//     // Validate the incoming request data
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|string|max:255',
//         'number' => 'required|string|max:15',
//         'dob' => 'required|string|max:15',
//         'img' => 'required|string|max:15',
        
//     ]);

//     // Find the student by ID
//     $employee = employee::findOrFail($id);

//     $employee->name=$request->name;
//     $employee->email=$request->email;
//     $employee->number=$request->number;
//     $employee->dob= $request->dob;
//     $employee->img= $request->img;
              
//                 // $user->password = Hash::make(Input::get('password'));
//     $employee->save();
//     // Redirect back with a success message
//     return redirect('employee')->with('success', ' updated successfully.');
// }

public function update_status(Request $request){
    $employee = Employee::find($request->id);
    $employee->status = $request->status;
    $employee->save();

    return back()->with('success',' status updated successfully..');
}

}

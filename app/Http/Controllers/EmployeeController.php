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

public function update(Request $request){
    if(isset($request->id)){
        $res = employee::where('id',$request->id)->first();
    }else{
        $res = '';
    }
    // $get = employee::latest()->paginate(10);
    return view('index',compact('index'));
}

}

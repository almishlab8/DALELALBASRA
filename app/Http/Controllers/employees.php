<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use App\EmployeeFiles;
use Auth;
use Illuminate\Support\Facades\Input;
use DB;
use Image  ; 
class employees extends Controller
{
   
public function index()
{
  
$employees =   DB::table('employees')
->join('employee_files', function ($join) {
    $join->on('employees.files_id', '=', 'employee_files.id');
})->orderBy('time', 'DESC')->paginate(15);
return view('employees.index')->with('employees',$employees);

}

public function addmarket(Request $request){


    $request->validate([
        'name' => 'required', 'string',
        'age' => 'required','numeric',
        'gender' => 'required', 'string',
        'academic_achievement' => 'required', 'string',
        'specialization' => 'required', 'string',
        'phone_number' => 'required', 'numeric',
        'profilel_image' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable|max:1024',
        'cv' => 'required|file|nullable|max:1024',

    ]);


    if($request->isMethod('post')){



        $addfile = new EmployeeFiles();
         
    
            //===  company_image  ===
            if ($request->file('img')) {
                $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('upload/employees/img/' . $filename);
            Image::make($image)->resize(300, 300)->save($location);
            $addfile->profilel_image  = 'upload/employees/img/'.$filename;
               
            } else {
                $addfile->profilel_image  = '';
            }
       

           //===  cv  ===
        if ($request->file('cv')) {
            $cv = $request->file('cv');
        $filename = time() . '.' . $cv->getClientOriginalExtension();
       $destinationPath=public_path('upload/employees/cv/');
        $cv->move($destinationPath, $filename);

        $addfile->cv = 'upload/employees/cv/'.$filename;
           
        } else {
            $addfile->cv = '';
        }

        $addfile->save();
    
      
        $addemployees = new Employe();
        $addemployees->user_id= Auth::user()->id;
        $addemployees->name = $request->input('name');
        $addemployees->age = $request->input('age');
        $addemployees->gender = $request->input('gender');
        $addemployees->academic_achievement = $request->input('academic_achievement');
        $addemployees->specialization = $request->input('specialization');
        $addemployees->phone_number = $request->input('phone_number');
        $addemployees->files_id = $addfile->id;
        $addemployees->time = time();
        $addemployees->save();
     }
    
    
      return redirect('/employees')->with('success', 'تم اضافة المحتوى بنجاح');
}


public function delete_market($id){
    $employe =   Employe::find($id);
    $employeeFiles = EmployeeFiles::find($id);

    $img=$employeeFiles->profilel_image;
    $cv=$employeeFiles->cv;
    if ($employeeFiles == null) {
    unlink(public_path($img));
    unlink(public_path($cv));
    }
    $employe->delete() ;   
    $employeeFiles->delete() ;      
    return redirect('/employees')->with('success', 'تم حذف المحتوى بنجاح');

   echo "go";

}





















public function edit_market($id  , Request $request){

    if($request->isMethod('post')){
        $request->validate([
            'name' => 'required', 'string',
            'age' => 'required','numeric',
            'gender' => 'required', 'string',
            'academic_achievement' => 'required', 'string',
            'specialization' => 'required', 'string',
            'phone_number' => 'required', 'numeric',
    
        ]);
        $employee =   Employe::where('files_id', $id)->first();
        $employeeFiles = EmployeeFiles::find($id);
        
        $employee->name   = $request->input('name');
        $employee->age = $request->input('age');
        $employee->gender = $request->input('gender');
        $employee->academic_achievement   = $request->input('academic_achievement');
        $employee->specialization = $request->input('specialization');   
        $employee->time = time();     
    
      //===  company_image  ===
      if ($request->file('img')) {
        $image = $request->file('img');
    $filename = time() . '.' . $image->getClientOriginalExtension();
    $location = public_path('upload/employees/img/' . $filename);
    Image::make($image)->resize(300, 300)->save($location);
    if ($employeeFiles->profilel_image == null) {
        unlink(public_path( $employeeFiles->profilel_image));
    }
   
    $employeeFiles->profilel_image  = 'upload/employees/img/'.$filename;
       
    } 


    
      //===  cv  ===
    if ($request->file('cv')) {
        $image = $request->file('cv');
    $filename = time() . '.' . $image->getClientOriginalExtension();
    $location = public_path('upload/employees/cv/' . $filename);
    Image::make($image)->resize(300, 300)->save($location);
    unlink(public_path( $employeeFiles->cv));
    $employeeFiles->cv  = 'upload/employees/cv/'.$filename;
       
    } 
    $employee->save();  
    $employeeFiles->save();

    return redirect('/employees')->with('success', 'تم تحديث المحتوى بنجاح');

    }else{
    $employee =   Employe::where('files_id', $id)->first();
    $employeeFiles = EmployeeFiles::findOrFail($id);
    
    return view('employees.edit')->with('employee',$employee)->with('employeeFiles',$employeeFiles);

    
        }
}
}

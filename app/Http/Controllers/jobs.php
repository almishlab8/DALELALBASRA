<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use Auth;
use Illuminate\Support\Facades\Input;
class jobs extends Controller
{
    //
    public function index(){
        $jobs= Job::orderBy('created_at','desc')->paginate(15);
        $arr=Array('jobs' => $jobs);
    
          return view('jobs.jobs' , $arr);
       
    }
    public function addjobs(Request $request){
        if($request->isMethod('post')){

              
            $request->validate([
                'title' => 'required', 'string',
                'age' => 'required', 'numeric',
                'gender' => 'required', 'string',
                'specialization' => 'required', 'string',
                'experiences' => 'required', 'string',      
            ]);


            $addjobs = new Job();
            $addjobs->user_id= Auth::user()->id;
            $addjobs->title = $request->input('title');
            $addjobs->age = $request->input('age');
            $addjobs->gender = $request->input('gender');
            $addjobs->specialization = $request->input('specialization');
            $addjobs->experiences = $request->input('experiences');

            
            $addjobs->save();
            
        }
        return redirect('jobs')->with('success', 'تم اضافة المحتوى بنجاح');
       

    }
    public function delete_jobs($id){
      
            $del = Job::find($id);
            $del->delete();
            return redirect('jobs')->with('success', 'تم حذف المحتوى بنجاح');
    }

public function edit_jobs($id  , Request $request){
    if($request->isMethod('post')){

        $request->validate([
            'title' => 'required', 'string',
            'age' => 'required', 'numeric',
            'gender' => 'required', 'string',
            'specialization' => 'required', 'string',
            'experiences' => 'required', 'string',      
        ]);

        $editjobs = Job::find($id);
        $editjobs->title = $request->input('title');
        $editjobs->age = $request->input('age');
        $editjobs->gender = $request->input('gender');
        $editjobs->specialization = $request->input('specialization');
        $editjobs->experiences = $request->input('experiences');
        $editjobs->save();

        return redirect('jobs')->with('success', 'تم تحديث المحتوى بنجاح');
    }else{

        $job=Job::findOrFail($id);
      
        return view('jobs.edit_jobs')->with('job', $job);
       
    }
}
}

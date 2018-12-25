<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Career;
use App\Careerdetails;
use Auth;
use Illuminate\Support\Facades\Input;
use DB;
use Image  ; 
class careers extends Controller
{
    public function index(){
       
        
$careers =   DB::table('careers')
->join('careerdetails', function ($join) {
    $join->on('careers.careerdetails_id', '=', 'careerdetails.id');
})->orderBy('time', 'DESC')->paginate(15);;
return view('careers.careers')->with('careers',$careers);

    }




    public function addcareer(Request $request){
        if($request->isMethod('post')){

            $request->validate([
                'location' => 'required', 'string',
                'title' => 'required', 'string',
                'subject' => 'required', 'string',
                'phone_number' => 'required', 'numeric',        
            ]);

            $addCareerDetails = new Careerdetails();
            $addCareerDetails->user_id= Auth::user()->id;
            $addCareerDetails->location = $request->input('location');
            $addCareerDetails->phone_number = $request->input('phone_number');
            if ($request->file('img')) {
                $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('upload/careers/img/' . $filename);
            Image::make($image)->resize(300, 300)->save($location);
            $addCareerDetails->image = 'upload/careers/img/'.$filename;
               
            } else {
                $addCareerDetails->image = '';
            }
            $addCareerDetails->save();

            $addcareer = new Career();
            $addcareer->title=$request->input('title');
            $addcareer->subject=$request->input('subject');
            $addcareer->user_id=Auth::user()->id;
            $addcareer->careerdetails_id=  $addCareerDetails->id;
            $addcareer->time = time();
            $addcareer->save();
            
        }
        $career= Career::all();
        $arr=Array('careers.careers' => $career);
    
        return redirect('careers')->with('success', 'تم اضافة المحتوى بنجاح');

    }
    public function delete_career($id){
      
            $careerdetails = Careerdetails::find($id);
            $career = Career::where('careerdetails_id' , '=', $id)->first();
            $img=$careerdetails->image;
            unlink(public_path($img));
            $careerdetails->delete();
            $career->delete();

            return redirect('careers')->with('success', 'تم حذف المحتوى بنجاح');;
    }
    public function edit_career($id , Request $request){

        if($request->isMethod('post')){

           
            $request->validate([
                'location' => 'required', 'string',
                'title' => 'required', 'string',
                'subject' => 'required', 'string',
                'phone_number' => 'required', 'numeric',        
            ]);


            $career= Career::where('careerdetails_id', $id)->first();
            $careerdetails= Careerdetails::find($id);

            $career->title   = $request->input('title');
            $career->subject = $request->input('subject');
            $career->time = time();

            $careerdetails->location = $request->input('location');
            $careerdetails->phone_number = $request->input('phone_number');
            if ($request->file('img')) {
                $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('upload/careers/img/' . $filename);
            Image::make($image)->resize(300, 300)->save($location);
            if ($careerdetails->image != null) {
                unlink(public_path( $careerdetails->image));
            }
            
            $careerdetails->image = 'upload/careers/img/'.$filename;
               
            } 
            $career->save();
            $careerdetails->save();
            return redirect('careers')->with('success', 'تم تحديث المحتوى بنجاح');
        }else{
            $career= Career::where('careerdetails_id', $id)->first();
            $careerdetails= Careerdetails::findOrFail($id);
          
            return view('careers.edit_careers')->with('career',$career)->with('careerdetails',$careerdetails);
           
        }
    }
}

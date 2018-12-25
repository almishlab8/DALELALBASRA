<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
Use App\Company;
use App\Companydetail;
use Auth;
use Illuminate\Support\Facades\Input;
class guide extends Controller
{
  public function index(){
    $category = Category::all();
    $arr=Array('category' => $category);

      return view('companies.index' , $arr);
  
}
public function addcompany($id , Request $request){
    if($request->isMethod('post')){
        $newCompany=new Company();
        $newCompany->company_name=$request->input('company_name');
        $newCompany->category_id=$id;
        $newCompany->subject=$request->input('company_details');
        if(Input::hasFile('logo')){
            $img = Input::file('logo');
            $newCompany->company_logo =  $img->move('company_logo', $img->getClientOriginalName());
        }
        $newCompany->user_id=Auth::user()->id;
        $newCompany->save();

        $companyDetails = new Companydetail();
        $companyDetails->user_id=Auth::user()->id;
        $companyDetails->company_id = $newCompany->id;
        $companyDetails->email=$request->input('email');
        $companyDetails->phone_number=$request->input('tele');
        $companyDetails->location=$request->input('location');
        $companyDetails->map=$request->input('location_map');
        if(Input::hasFile('image')){
            $img = Input::file('image');
            $companyDetails->image =  $img->move('company_img', $img->getClientOriginalName());
        }
 
        $companyDetails->website=$request->input('website');
        $companyDetails->save();
    
    //  if(Input::hasFile('file')){
        //  $img = Input::file('file');
        //  $newServ->img =  $img->move('uploads', $img->getClientOriginalName());
         
    //  }
    $newCompany->save();


    }
        $company = Company::where('category_id', $id)->get();
        $arr=Array('company' => $company , 'id'=>$id );
    
          return view('categories.guide.addcompany' , $arr );
}
public function delete_company($cat_id , $id){
    $comp = Company::find($id);
    $comp->delete();
    // $company = Company::where('category_id', $cat_id)->get();
    //     $arr=Array('company' => $company , 'id'=>$id );
    
    //       return view('categories.guide.addcompany' , $arr );

    return redirect()->back();
    // return redirect('addcompany');
}

public function edit_company($id , Request $request){
    if($request->isMethod('post')){
        $editCompany=Company::find($id);
        $editCompanyDetails=Companydetail::where('company_id', $id)->first();
        $editCompany->company_name=$request->input('company_name');
        $editCompanyDetails->email=$request->input('email');
        $editCompanyDetails->phone_number=$request->input('tele');
        $editCompanyDetails->location=$request->input('location');
        $editCompanyDetails->map=$request->input('location_map');
        $editCompany->subject=$request->input('company_details');
        
        if(Input::hasFile('logo')){
            $img = Input::file('logo');
            $newCompany->company_logo =  $img->move('company_logo', $img->getClientOriginalName());
        }
        if(Input::hasFile('image')){
            $img = Input::file('image');
            $companyDetails->image =  $img->move('company_img', $img->getClientOriginalName());
        }
     $editCompany->save();
     $editCompanyDetails->save();
     echo 
     '<script type="text/javascript">'
     , 'history.go(-2);'
     , '</script>';
    }
   
        $company = Company::find($id);
        $companyDetails=Companydetail::where('company_id', $id)->get();
        $arr=Array('company' => $company , 'id'=>$id , 'companyDetails' =>$companyDetails );
    
          return view('categories.guide.edit' , $arr );
     
    
    }
   
}

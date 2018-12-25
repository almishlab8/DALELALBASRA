<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Important_phone;
use Auth;
class phones extends Controller
{
    public function __construct()
    {
        // check if user is logged in, if not then redirect them to the login page
        $this->middleware('auth');
    }

    public function index()
    {
    $phones =   Important_phone::orderBy('created_at','desc')->paginate(15);
        return view('phones.index')->with('phones',$phones);
    }

    public function store(Request $request){
       
        $request->validate([
            'company_name' => 'required', 'string',
            'phone_number' => 'required', 'numeric',        
        ]);

       $phone = new Important_phone;
$phone->company_name   = $request->input('company_name');
$phone->phone_number = $request->input('phone_number');
$phone->user_id      =  auth()->user()->id;
$phone->save();
return redirect('/phones')->with('success', 'تم اضافة المحتوى بنجاح');

   }


    public function destroy($id)
    {
        $phone =   Important_phone::find($id);
        $phone->delete() ;   
        return redirect('/phones')->with('success', 'تم حذف المحتوى بنجاح');
    
}


    public function show($id)
    {   
       $phone  =   Important_phone::find($id);   
       return view('phones.show')->with('phone',$phone);
    }

    public function edit($id)
    {
        $phone  =   Important_phone::find($id);   
        return view('phones.edit')->with('phone',$phone);
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required', 'string',
            'phone_number' => 'required', 'numeric',        
        ]);
        $phone =   Important_phone::find($id);
        $phone->company_name   = $request->input('company_name');
        $phone->phone_number = $request->input('phone_number');
        $phone->save();
        return redirect('/phones')->with('success', 'تم تحديث المحتوى بنجاح');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marketing;
use Auth;
use DB;
class market extends Controller

{
    //
    public function index(){
        $market = Marketing::orderBy('created_at','desc')->paginate(15);
        $arr=Array('market' => $market);
    
        return view('marketing.marketing' , $arr);
    }
    public function addmarket(Request $request){

        if($request->isMethod('post')){

              
            $request->validate([
                'description' => 'required', 'string',
                'title' => 'required', 'string',  
            ]);

            $new=new Marketing();
            $new->title=$request->input('title');
            $new->description=$request->input('description');
            $new->user_id=Auth::user()->id;
            $new->save();
            return redirect('marketing')->with('success', 'تم اضافة المحتوى بنجاح');
        }
    }


    public function edit_market($id  , Request $request){
        if($request->isMethod('post')){

            $request->validate([
                'description' => 'required', 'string',
                'title' => 'required', 'string',  
            ]);
            
            $editmarket = Marketing::find($id);
            $editmarket->title = $request->input('title');
            $editmarket->description = $request->input('description');
            $editmarket->save();
    
            return redirect('marketing')->with('success', 'تم تحديث المحتوى بنجاح');
        }else{

        $market=Marketing::findOrFail($id);
      
        return view('marketing.edit_marketing')->with('market',$market);
       
       
        }
    }


    public function delete_market($id){
        $del = Marketing::find($id);
        $del->delete();
    return redirect('marketing')->with('success', 'تم حذف المحتوى بنجاح');
    }
}

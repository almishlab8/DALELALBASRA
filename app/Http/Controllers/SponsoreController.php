<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsors;
use Auth;
use Image;
class SponsoreController extends Controller
{
    public function index(){
        $sponsors = Sponsors::orderBy('created_at','desc')->paginate(15);
        $arr=Array('sponsors' => $sponsors);
        return view('sponsors.index' , $arr);
    }




    public function add(Request $request){
        if($request->isMethod('post')){      
            $request->validate([
                'name' => 'required', 'string',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|nullable|max:1024',

            ]);
            $sponsor=new Sponsors();
            $sponsor->name=$request->input('name');
            $sponsor->user_id=Auth::user()->id;


            //=== Sponsor Image  ===
            if ($request->file('img')) {
            $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('upload/sponsors/img/' . $filename);
            Image::make($image)->resize(300, 300)->save($location);
            $sponsor->image  = 'upload/sponsors/img/'.$filename;
            } else {
            $sponsor->image  = '';
            }

       $sponsor->save();
            return redirect('sponsors')->with('success', 'تم اضافة المحتوى بنجاح');
        }
    }




    public function edit($id  , Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name' => 'required', 'string',
            ]);
            $sponsor = Sponsors::find($id);
            $sponsor->name=$request->input('name');

            //===  Sponsor Image ===
            if ($request->file('img')) {
                $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('upload/sponsors/img/' . $filename);
            Image::make($image)->resize(300, 300)->save($location);
            if ($sponsor->image == null) {
                unlink(public_path( $sponsor->image));
            }
            $sponsor->image  = 'upload/sponsors/img/'.$filename;
            
            }            
            $sponsor->save();
            return redirect('sponsors')->with('success', 'تم تحديث المحتوى بنجاح');
        }else{
        $sponsor=Sponsors::findOrFail($id);
        return view('sponsors.edit')->with('sponsor',$sponsor);
        }
    }






    public function delete($id){
        $sponsor = Sponsors::find($id);
        $img=$sponsor->image;
            unlink(public_path($img));
        
        $sponsor->delete();
    return redirect('sponsors')->with('success', 'تم حذف المحتوى بنجاح');
    }


}

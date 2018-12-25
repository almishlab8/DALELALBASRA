<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use  Validator ;

class UserController extends Controller

{

    public function __construct()
    {
        // check if user is logged in, if not then redirect them to the login page
        $this->middleware('auth');
    }

    public function index()
    {
    $users =   User::orderBy('created_at','desc')->paginate(15);
        return view('users.index')->with('users',$users);
    }

  

    public function store(Request $request){
        $this->validate($request ,[
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required',  'min:6'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
          ]);
        return redirect('/users')->with('success', 'تم اضافة المحتوى بنجاح');
    }


    public function show($id)
    {   
       $user  =   User::find($id);   
       return view('users.show')->with('user',$user);
    }

    public function edit($id)
    {
        $user  =   User::find($id);   
        return view('users.edit')->with('user',$user);
    }



    public function update(Request $request, $id)
    {
        $this->validate($request ,[
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required',  'min:6'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        
        $user =   User::find($id);
        $user->name   = $request->input('name');
        $user->email = $request->input('email');
        $user->password  = bcrypt($request->password);
        $user->save();
        return redirect('/users')->with('success', 'تم تحديث المحتوى بنجاح');
    }


    public function destroy($id)
    {
        $user =   User::find($id);
        $user->delete() ;   
        return redirect('/users')->with('success', 'تم حذف المحتوى بنجاح');
    }

   
}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Image;
use  Validator ;
use App\Company;
use App\Companydetail;
use App\CompanyPhotos;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;

class companiesController extends Controller
{
    public function __construct()
   {
       $this->middleware('auth');
   }

  

public function index()
{
  
$companies =   DB::table('companies')
->join('companydetails', function ($join) {
    $join->on('companies.company_details_id', '=', 'companydetails.id');
})->join('company_photos', function ($join) {
    $join->on('companydetails.photos_id', '=', 'company_photos.id');
})
->orderBy('time', 'DESC')->paginate(15);
return view('companies.index')->with('companies',$companies);
}

public function show($id)
{
   
   $company = Company::find($id);

   return view('companies.edit')->with('company',$company);
}

public function addCompany(Request $request)
{
 if($request->isMethod('post')){
    
  
    $request->validate([
        'website' => 'required', 'string',
        'email' => 'required', 'string','email',
        'type' => 'required', 'string',
        'phone_number' => 'required', 'numeric',   
        'location' => 'required', 'string',
        'map' => 'required', 'string',
        'company_name' => 'required', 'string',
        'subject' => 'required', 'string',
        'logo' => 'required|mimes:jpeg,png,jpg,gif,svg|nullable|max:1024',
        'image1' => 'required|mimes:jpeg,png,jpg,gif,svg|nullable|max:1024',
        'image2' => 'required|mimes:jpeg,png,jpg,gif,svg|nullable|max:1024',
        'image3' => 'required|mimes:jpeg,png,jpg,gif,svg|nullable|max:1024',
        'image4' => 'required|mimes:jpeg,png,jpg,gif,svg|nullable|max:1024',    
    ]);

    $addphoto = new CompanyPhotos();

    //===  company_logo  ===
    if ($request->file('logo')) {
        $image = $request->file('logo');
    $filename = time() . '.' . $image->getClientOriginalExtension();
    $location = public_path('upload/company_logo/' . $filename);
    Image::make($image)->resize(300, 300)->save($location);
    $addphoto->company_logo   = 'upload/company_logo/'.$filename;
       
    } else {
        $addphoto->company_logo   = '';
    }

     //===  image1  ===
     if ($request->file('image1')) {
        $image = $request->file('image1');
    $filename = time() . '.' . $image->getClientOriginalExtension();
    $location = public_path('upload/company_image1/' . $filename);
    Image::make($image)->resize(300, 300)->save($location);
    $addphoto->image1   = 'upload/company_image1/'.$filename;
       
    } else {
        $addphoto->image1   = '';
    }

     //===  image2  ===
     if ($request->file('image2')) {
        $image = $request->file('image2');
    $filename = time() . '.' . $image->getClientOriginalExtension();
    $location = public_path('upload/company_image2/' . $filename);
    Image::make($image)->resize(300, 300)->save($location);
    $addphoto->image2   = 'upload/company_image2/'.$filename;
       
    } else {
        $addphoto->image2   = '';
    }

     //===  image3  ===
     if ($request->file('image3')) {
        $image = $request->file('image3');
    $filename = time() . '.' . $image->getClientOriginalExtension();
    $location = public_path('upload/company_image3/' . $filename);
    Image::make($image)->resize(300, 300)->save($location);
    $addphoto->image3   = 'upload/company_image3/'.$filename;
       
    } else {
        $addphoto->image3   = '';
    }

     //===  image4  ===
     if ($request->file('image4')) {
        $image = $request->file('image4');
    $filename = time() . '.' . $image->getClientOriginalExtension();
    $location = public_path('upload/company_image4/' . $filename);
    Image::make($image)->resize(300, 300)->save($location);
    $addphoto->image4   = 'upload/company_image4/'.$filename;
       
    } else {
        $addphoto->image4   = '';
    }

$addphoto->save();

 
    $addcompanyDetails = new Companydetail();
    $addcompanyDetails->user_id= Auth::user()->id;
    $addcompanyDetails->photos_id = $addphoto->id;
    $addcompanyDetails->website = $request->input('website');
    $addcompanyDetails->email = $request->input('email');
    $addcompanyDetails->type = $request->input('type');
    $addcompanyDetails->phone_number = $request->input('phone_number');
    $addcompanyDetails->location = $request->input('location');
    $addcompanyDetails->map = $request->input('map');
    $addcompanyDetails->company_id =0;
    $addcompanyDetails->save();

  
     $addcompany = new Company();
     $addcompany->user_id= Auth::user()->id;
     $addcompany->company_name = $request->input('company_name');
     $addcompany->subject = $request->input('subject');
     $addcompany->company_details_id = $addcompanyDetails->id;
     $addcompany->time = time();
     $addcompany->save();
 }
  return redirect('/companies')->with('success', 'تم اضافة المحتوى بنجاح');
    }




    public function editCompany( $id  , Request $request)
    {     

        if($request->isMethod('post')){


            $request->validate([
                'website' => 'required', 'string',
                'email' => 'required', 'string','email',
                'phone_number' => 'required', 'numeric',   
                'location' => 'required', 'string',
                'map' => 'required', 'string',
                'company_name' => 'required', 'string',
                'subject' => 'required', 'string',
                         ]);
   
       
            $company  =   Company::find($id);
            $companyDetails = Companydetail::find($id);
            $photo = CompanyPhotos::find($id);

            $company->company_name = $request->input('company_name');
            $company->subject = $request->input('subject');
            $company->time = time();
            $company->save();

            $companyDetails->website = $request->input('website');
            $companyDetails->email = $request->input('email');
            $companyDetails->phone_number = $request->input('phone_number');
            $companyDetails->location = $request->input('location');
            $companyDetails->map  = $request->input('map');
            $companyDetails->save();


            //===  company_logo  ===
            if ($request->file('logo')) {
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('upload/company_logo/' . $filename);
            Image::make($image)->resize(300, 300)->save($location);
            unlink(public_path( $photo->company_logo ));
            $photo->company_logo   = 'upload/company_logo/'.$filename;

            }

              //===  image1  ===
              if ($request->file('image1')) {
                $image = $request->file('image1');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('upload/company_image1/' . $filename);
                Image::make($image)->resize(300, 300)->save($location);
                unlink(public_path( $photo->image1 ));
                $photo->image1   = 'upload/company_image1/'.$filename;
    
                }


                  //===  image2  ===
            if ($request->file('image2')) {
                $image = $request->file('image2');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('upload/company_image2/' . $filename);
                Image::make($image)->resize(300, 300)->save($location);
                unlink(public_path( $photo->image2 ));
                $photo->image2   = 'upload/company_image2/'.$filename;
    
                }

                  //===  image3  ===
            if ($request->file('image3')) {
                $image = $request->file('image3');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('upload/company_image3/' . $filename);
                Image::make($image)->resize(300, 300)->save($location);
                unlink(public_path( $photo->image3 ));
                $photo->image3   = 'upload/company_image3/'.$filename;
    
                }

                  //===  image4  ===
            if ($request->file('image4')) {
                $image = $request->file('image4');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('upload/company_image4/' . $filename);
                Image::make($image)->resize(300, 300)->save($location);
                unlink(public_path( $photo->image4 ));
                $photo->image4   = 'upload/company_image4/'.$filename;
    
                }
            $photo->save();
            return redirect('/companies')->with('success', 'تم تحديث المحتوى بنجاح');
        }
    
        $company  =   Company::find($id);
        $companyDetails = Companydetail::find($id);
        $photo = CompanyPhotos::find($id);
        $arr=Array('company' => $company ,
                   'companyDetails' => $companyDetails,
                   'photo' => $photo 
                );
    

       return view('companies.edit' ,  $arr);
    }


    
  public function showDetails($id){
    $company =   Company::find($id);
    $companyDetails = Companydetail::find($id);
    $photo =  CompanyPhotos::find($id);
    $arr=Array('company' => $company ,
    'companyDetails' => $companyDetails,
    'photo' => $photo 
               );

return view('companies.show'  , $arr);

  }

   

public function delete($id){
$company =   Company::find($id);
$companyDetails = Companydetail::find($id);
$photo =  CompanyPhotos::find($id);

$img1=$photo->image1;
$img2=$photo->image2;
$img3=$photo->image3;
$img4=$photo->image4;
$logo=$photo->company_logo;

unlink(public_path($img1));
unlink(public_path($img2));
unlink(public_path($img3));
unlink(public_path($img4));
unlink(public_path($logo));

$company->delete() ;   
$companyDetails->delete() ; 
$photo->delete() ;      

return redirect('/companies')->with('success', 'تم حذف المحتوى بنجاح');

echo "go";

}

}





@extends('layouts.nav')
@section('pageName')
الموظفين
@endsection
@section('content')
<br> <br>

<div class="" style="direction: rtl;">
    <div class="panel-heading" style="background:#4ECDC4">
        <h3 class="panel-title" style="color:white;text-align:center">تعديل البيانات </h3>
    </div>

    @include('messages')
    <div class="panel-body">
        <form  action="/edit_market/{{$employee->id}}" method="POST" enctype="multipart/form-data">
          
          

                <div class="form-group col-md-12">
                    <label for="" class="control-label"> الاسم </label>
                    <input style="text-align:right;" type="text" value="{{$employee->name}}" name="name" class="form-control" >
                    
                </div>
                
                
                <div class="form-group col-md-12">
                        <label for="" class="control-label">  العمر </label>
                        <input style="text-align:right;" type="number" value="{{$employee->age}}" name="age" class="form-control" >
                        
                    </div>
                
                
                
                <div class="form-group col-md-12">
                @if($employee->gender == 1)
        <div class="form-group col-md-12">
            <label for="" class="control-label">الجنس </label>
            <select name="gender" id="" class=" form-control " >
                <option selected value="1">ذكر</option>
                <option  value="2">انثى</option>
            </select>
        </div>
        @else
        <div class="form-group col-md-12">
            <label for="" class="control-label">الجنس </label>
            <select name="gender" id="" class=" form-control " >
                <option  value="1">ذكر</option>
                <option selected value="2">انثى</option>
            </select>
        </div>  
        @endif 
                    </div>
                
                
                    <div class="form-group col-md-12">
                            <label for="" class="control-label">   الشهادة الحامعية  </label>
                            <input  style="text-align:right;" type="text" value="{{$employee->academic_achievement}}" name="academic_achievement" class="form-control" >
                            
                        </div>
                
                
                        <div class="form-group col-md-12">
                                <label for="" class="control-label">   التخصص  </label>
                                <input  style="text-align:right;" type="text" value="{{$employee->specialization}}" name="specialization" class="form-control" >
                                
                            </div>
                
                            <div class="form-group col-md-12">
                                    <label for="" class="control-label">   رقم الهاتف  </label>
                                    <input  style="text-align:right;" type="number" value="{{$employee->phone_number}}" name="phone_number" class="form-control" >
                                    
                                </div>

                                <div class="form-group col-md-12">
<div class="col-md-8">

<div class="fileupload fileupload-new" data-provides="fileupload" style="width: 75%;margin-right: 10%;text-align: center;">
    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
      <img src="../{{$employeeFiles->profilel_image}}" alt="" />
    </div>
    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
    <div style="padding-right: 20px;">
      <span class="btn btn-info btn-file">
        <span class="fileupload-new"><i class="fa fa-picture-o"></i> رفع الصورة الشخصية</span>
      <span class="fileupload-exists"><i class="fa fa-undo"></i> تغيير</span>
      <input type="file" value="{{$employeeFiles->profilel_image}}" id="img" name="img" class="default" />
      </span>
    </div>
  </div>

</div>


  <div class="col-md-2" style="padding-top: 50px;">
    <div class="fileupload fileupload-new" data-provides="fileupload">
               <span class="btn btn-theme02 btn-file">
                 <span class="fileupload-new"><i class="fa fa-paperclip"></i> رفع السيرة الذاتية (CV) </span>
               <span class="fileupload-exists"><i class="fa fa-undo"></i> تغيير</span>
               <input type="file" name="cv" class="default" />
               </span>
               <span class="fileupload-preview" style="margin-left:5px;"></span>
               <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
             </div>
    </div>

                                </div>
                          
                           <button type="submit" class="btn btn-theme form-control" style="width: 75%;margin-right: 10%;"><i class="fa fa-check"></i> حفظ</button>
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        </form>
                
                

    </div>
</div>
@endsection
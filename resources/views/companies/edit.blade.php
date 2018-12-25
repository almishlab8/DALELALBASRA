@extends('layouts.nav')
@section('pageName')
الدليل
@endsection
@section('content')
<br> <br>

<div class="" style="direction: rtl;">
<div class="panel-heading" style="background:#4ECDC4">
<h3 class="panel-title" style="color:white;text-align:center">تعديل البيانات </h3>
</div>
@include('messages')

<div class="panel-body">

<form action="/editCompany/{{$company->id}}" method="post" enctype="multipart/form-data" >


<div class="form-group col-md-12">
    <label for="" class="control-label"> اسم الشركة  </label>
    <input type="text" name="company_name" class="form-control" value="{{$company->company_name}}">
    
</div>


<div class="form-group col-md-12">
        <label for="" class="control-label"> شعار الشركه (LOGO) </label>
        <input type="file" name="logo" class="form-control" >
        
    </div>



<div class="form-group col-md-12">
        <label for="" class="control-label">  نبذة عن الشركة  </label>
        <input type="text" name="subject" class="form-control" value="{{$company->subject}}" >
        
    </div>


    <div class="form-group col-md-12">
            <label for="" class="control-label">  الموقع الالكتروني  </label>
            <input type="text" name="website" class="form-control" value="{{$companyDetails->website}}">
            
        </div>



<div class="form-group col-md-12">
        <label for="" class="control-label">  البريد الالكتروني  </label>
        <input type="text" name="email" class="form-control" value="{{$companyDetails->email}}">
        
    </div>


    <div class="form-group col-md-12">
            <label for="" class="control-label"> رقم الهاتف </label>
            <input type="number" name="phone_number" class="form-control" value="{{$companyDetails->phone_number}}">
            
        </div>

<div class="form-group col-md-12">
        <label for="" class="control-label">  العنوان  </label>
        <input type="text" name="location" class="form-control" value="{{$companyDetails->location}}">
        
    </div>



<div class="form-group col-md-12">
        <label for="" class="control-label">  الموقع علي الخارطة  </label>
        <input type="text" name="map" class="form-control" value="{{$companyDetails->map}}">
        
    </div>


    <div class="form-group col-md-12">
            <label for="" class="control-label">  (1) الصوره  </label>
            <input type="file" name="image1" class="form-control" style="width: 49%;">    
     </div>

     <div class="form-group col-md-12">
            <label for="" class="control-label">  (2) الصوره  </label>
            <input type="file" name="image2" class="form-control" style="width: 49%;">    
     </div>


     <div class="form-group col-md-12">
            <label for="" class="control-label">  (3) الصوره  </label>
            <input type="file" name="image3" class="form-control" style="width: 49%;">    
     </div>


     <div class="form-group col-md-12">
            <label for="" class="control-label">  (4) الصوره  </label>
            <input type="file" name="image4" class="form-control" style="width: 49%;">    
     </div>








<button type="submit" class="btn btn-theme form-control" ><i class="fa fa-check"></i> حفظ</button>
<input type="hidden" value="{{ csrf_token() }}" name="_token">

</form>

    </div>
</div>
@endsection

@extends('layouts.nav')
@section('pageName')
الوظائف
@endsection
@section('content')
<br> <br>
<div class="" style="direction: rtl;">
<div class="panel-heading" style="background:#4ECDC4">
   
<h3 class="panel-title" style="color:white;text-align:center">تعديل البيانات </h3>
</div>
<br>

@include('messages')

<div class="panel-body">
    <form action="/edit_jobs/{{$job->id}}" method="post" enctype="multipart/form-data" >
        <div class="form-group col-md-12">
            <label for="" class="control-label">   العنوان    </label>
            <input type="text" value="{{$job->title}}" name="title" class="form-control" style="width: 60%">
        </div>
        <div class="form-group col-md-12">
            <label for="" class="control-label"> العمر  </label>
            <input type="number" value="{{$job->age}}"  name="age" class="form-control" style="width: 60%">
        </div>
        @if($job->gender == 1)
        <div class="form-group col-md-12">
            <label for="" class="control-label">الجنس </label>
            <select name="gender" id="" class=" form-control " style="width: 60%">
                <option selected value="1">ذكر</option>
                <option  value="2">انثى</option>
            </select>
        </div>
        @else
        <div class="form-group col-md-12">
            <label for="" class="control-label">الجنس </label>
            <select name="gender" id="" class=" form-control " style="width: 60%">
                <option  value="1">ذكر</option>
                <option selected value="2">انثى</option>
            </select>
        </div>  
        @endif      
        <div class="form-group col-md-12">
            <label for="" class="control-label">التخصص </label>
            <input type="text" value="{{$job->specialization}}" name="specialization" class=" form-control" style="width: 60%" >
        </div>
        <div class="form-group col-md-12">
            <label for="" class="control-label">الخبرة </label>
            <input type="text" value="{{$job->experiences}}" name="experiences" class=" form-control" style="width: 60%" >
        </div>
        <br>
        <button type="submit" class="btn btn-theme form-control" ><i class="fa fa-check"></i> حفظ</button>
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
    </form>
    </div>
</div>
@endsection

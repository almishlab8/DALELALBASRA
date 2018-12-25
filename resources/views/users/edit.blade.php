@extends('layouts.nav')
@section('pageName')
المستخدمون
@endsection
@section('content')
<br> <br>

<div class="" style="direction: rtl;">
    <div class="panel-heading" style="background:#4ECDC4">
        <h3 class="panel-title" style="color:white;text-align:center">تعديل البيانات </h3>
    </div>
    <div class="panel-body">
    @if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
            <ul><li>{{$error}}</li></ul>
        @endforeach
    </div>
    @endif
{!! Form::open(['action' => ['UserController@update',$user->id], 'method'=>'PUT','enctype'=>'multipart/form-data']) !!}

<div class="form-group">

<form action="{{ action('UserController@index') }}" method="post" enctype="multipart/form-data" >


<div class="form-group col-md-12">
    <label for="" class="control-label"> الاسم </label>
    <input style="text-align:right;" type="text" value="{{$user->name}}" name="name" class="form-control" >
    
</div>


<div class="form-group col-md-12">
        <label for="" class="control-label"> البريد الالكتروني </label>
        <input style="text-align:right;" type="email" value="{{$user->email}}" name="email" class="form-control" >
        
    </div>



<div class="form-group col-md-12">
        <label for="" class="control-label">  كلمة المرور  </label>
        <input  style="text-align:right;" type="password" value="{{$user->password}}" name="password" class="form-control" >
        
    </div>


<button type="submit" class="btn btn-theme form-control" style="background: #4ECDC4;"><i class="fa fa-check"></i> حفظ</button>
<input type="hidden" value="{{ csrf_token() }}" name="_token">

</form>

    </div>
</div>
@endsection
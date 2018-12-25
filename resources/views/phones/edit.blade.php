
@extends('layouts.nav')
@section('pageName')
هاتف / {{$phone->id}}
@endsection
@section('content')
<br> <br>
<div class="" style="direction: rtl;">
    <div class="panel-heading" style="background:#4ECDC4">
        <h3 class="panel-title" style="color:white;text-align:center">تعديل البيانات </h3>
    </div>

    @include('messages')

    <div class="panel-body">

{!! Form::open(['action' => ['phones@update',$phone->id], 'method'=>'PUT','enctype'=>'multipart/form-data']) !!}


{{Form::label('company_name', 'الاسم')}}
{{Form::text('company_name',$phone->company_name,['class'=>'form-control','placeholder'=>'Subject']) }}
</div>

<div class="form-group col-md-12">
{{Form::label('phone_number', ' رقم الهاتف ')}}
{{Form::text('phone_number',$phone->phone_number,['class'=>'form-control','placeholder'=>'Subject']) }}
</div>


{{Form::hidden('_method' ,'PUT') }}
{{Form::submit('تعديل',['class'=>"btn btn-theme form-control"]) }}

</div>
</div>
</div>
{!! Form::close() !!}

    </div>
</div>
@endsection
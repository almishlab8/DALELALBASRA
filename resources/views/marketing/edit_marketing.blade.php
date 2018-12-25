@extends('layouts.nav')
@section('pageName')
التسويق
@endsection
@section('content')
<br> <br>
<div class="" style="direction: rtl;">
    <div class="panel-heading" style="background:#4ECDC4">
        <h3 class="panel-title" style="color:white;text-align:center">تعديل البيانات </h3>
    </div>
    @include('messages')

    <div class="panel-body">
            <form action="/edit_markett/{{$market->id}}" method="post" enctype="multipart/form-data" >
                
                <div class="form-group col-md-12">
                    <label for="" class="control-label"> الاسم  </label>
                    <input type="text" value="{{$market->title}}" name="title" class="form-control" style="width: 75%">
                    
                </div>
                <div class="form-group col-md-12">
                <label for="" class="control-label">الوصف</label>
                        <textarea  name="description" class=" form-control" style="width: 75%" >
                        {{$market->description}}
                        </textarea>

                </div>
                <button type="submit" class="btn btn-theme form-control" ><i class="fa fa-check"></i> حفظ</button>
                <input type="hidden" value="{{ csrf_token() }}" name="_token">

            </form>
    </div>
</div>
@endsection

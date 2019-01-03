@extends('layouts.nav')
@section('pageName')
الاعمال
@endsection
@section('content')
<br> <br>

<div class="" style="direction: rtl;">
<div class="panel-heading" style="background:#4ECDC4">
<h3 class="panel-title" style="color:white;text-align:center">تعديل البيانات </h3>
</div>

@include('messages')

<div class="panel-body">
    <form action="/edit-sponsor/{{$sponsor->id}}" method="post" enctype="multipart/form-data" >
        <div class="form-group col-md-12">
            <label for="" class="control-label">   العنوان    </label>
            <input type="text" value="{{$sponsor->name}}" name="name" class="form-control" style="width: 75%; margin-right: 10%;">
        </div>
       
        <div class="fileupload fileupload-new" data-provides="fileupload" style="width: 75%;margin-right: 10%;text-align: center;">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="../{{$sponsor->image}}" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div style="padding-right: 20px;">
                        <span class="btn btn-info btn-file">
                          <span class="fileupload-new"><i class="fa fa-picture-o"></i> رفع الصورة الشخصية</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> تغيير</span>
                        <input type="file" value="{{$sponsor->image}}" name="img" class="default" />
                        </span>
                      </div>
                    </div>

        <button type="submit" class="btn btn-theme form-control" style="width: 75%;margin-right: 10%;"><i class="fa fa-check"></i> حفظ</button>
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
    </form>
</div>
</div>
@endsection

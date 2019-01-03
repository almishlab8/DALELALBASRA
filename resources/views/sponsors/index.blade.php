@extends('layouts.nav')
@section('pageName')
المسوقيين
@endsection
@section('content')
<div>
    <div >
        <a  data-toggle="modal" data-target="#myModal" class="btn btn-compose">
        اضافة جديد
        <i class="fa fa-plus"></i>  </a>
  </div>
  <br>

  @include('messages')

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
      <div class="container">
         
          <form action="/add" method="post" enctype="multipart/form-data" >
     
          <div class="form-group col-md-12">
              <label for="" class="control-label"> الاسم  </label>
              <input type="text" name="name" class="form-control" style="width: 49%;">
             
          </div>

         <div class="col-md-12" style="padding-right: 30px;">
           <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div style="padding-right: 20px;">
                        <span class="btn btn-info btn-file">
                          <span class="fileupload-new"><i class="fa fa-picture-o"></i> رفع الصورة الشخصية</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> تغيير</span>
                        <input type="file" name="img" class="default" />
                        </span>
                      </div>
                    </div>
           </div>

          <button type="submit" class="btn btn-theme form-control" style="width: 49%;"><i class="fa fa-check"></i> حفظ</button>
         <input type="hidden" value="{{ csrf_token() }}" name="_token">

          </form>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
      </div>
    </div>
    
  </div>
</div>
<!--END Modal -->
@if(count($sponsors) >0)

      <!--  Card -->
  <div class="row mt">
    @foreach($sponsors as $value)
  <div class="col-lg-4 col-md-4 col-sm-4 mb">
  <div class="  centered">
  <div >
    <img src="/{{$value->image}}"  alt="">
      <h3>{{$value->name}} </h3>

    <div class="info">
      <div class="col-sm-6 col-xs-6 pull-left lft" style="margin:0">
          <a href="/edit-sponsor/{{$value->id}}" class="btn btn-round btn-default"><i class="fa fa-pencil ede"></i>تعديل</a>
        </div>
        <div class="col-sm-6 col-xs-6 pull-right rit" style="margin:0">
          <a href="/delete-sponsor/{{$value->id}}" class="btn btn-round btn-default"><i class="fa fa-trash-o del"></i>حذف</a>
        </div>
    </div>
  </div>
  </div>
</div>
      @endforeach
  </div>
<!--END Card -->
 
</div>


<div style="text-align:right;">
    {{$sponsors->links()}}
</div>
    

@else

<div class="alert alert-dismissible alert-danger" style="text-align:right;">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>لا يوجد محتوى ! </strong> <a data-toggle="modal" data-target="#myModal" class="alert-link"> ،اضغط هنا لاضافة محتوى جديد
    </a>
</div>


@endif
@endsection

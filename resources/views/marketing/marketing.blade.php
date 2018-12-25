@extends('layouts.nav')
@section('pageName')
التسويق
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
         
          <form action="/addmarketting" method="post" enctype="multipart/form-data" >
     
          <div class="form-group col-md-12">
              <label for="" class="control-label"> الاسم  </label>
              <input type="text" name="title" class="form-control" style="width: 49%;">
             
          </div>
          <div class="form-group col-md-12">
          <label for="" class="control-label">الوصف</label>
                <textarea  name="description" class=" form-control" style="width: 49%;" ></textarea>

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
@if(count($market) >0)

      <!--  Card -->
  <div class="row mt">
    @foreach($market as $value)
            <div class="col-lg-4 col-md-4 col-sm-4 mb">
            <div class="weather-3 pn centered">
              <i class="fa fa-bullhorn"></i>
              <h3>{{$value->title}} </h3>
              <div class="info">
                <div class="row">
                  <h5 class="centered">{{$value->description}}</h5>
                </div>
                <div class="col-sm-6 col-xs-6 pull-left lft">
                    <a href="/edit_markett/{{$value->id}}" class="btn btn-round btn-default"><i class="fa fa-pencil ede"></i>تعديل</a>
                  </div>
                  <div class="col-sm-6 col-xs-6 pull-right rit">
                    <a href="/delete_markett/{{$value->id}}" class="btn btn-round btn-default"><i class="fa fa-trash-o del"></i>حذف</a>
                  </div>
              </div>
            </div>
          </div>
      @endforeach
  </div>
<!--END Card -->
 
</div>


<div style="text-align:right;">
    {{$market->links()}}
    </div>
    

@else

<div class="alert alert-dismissible alert-danger" style="text-align:right;">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>لا يوجد محتوى ! </strong> <a data-toggle="modal" data-target="#myModal" class="alert-link"> ،اضغط هنا لاضافة محتوى جديد
    </a>
</div>


@endif
@endsection

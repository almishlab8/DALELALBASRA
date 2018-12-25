@extends('layouts.nav')
@section('pageName')
هواتف مهمة
@endsection
@section('content')

<div>

    <div >
        <a  data-toggle="modal" data-target="#myModal" class="btn btn-compose">
      اضافة جديد
      <i class="fa fa-plus"></i>      </a>
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
         
          <form action="{{ action('phones@index') }}" method="post" enctype="multipart/form-data" >
     
          <div class="form-group col-md-12">
              <label for="" class="control-label"> الاسم  </label>
              <input type="text" name="company_name" class="form-control" style="width: 49%;">
             
          </div>
          <div class="form-group col-md-12">
              <label for="" class="control-label"> رقم الهاتف </label>
              <input type="number" name="phone_number" class="form-control" style="width: 49%;">
             
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
@if(count($phones) >0)

      <!--  Table -->
   <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel table-responsive">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-left"></i> هواتف مهمة </h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> الاسم</th>
                    <th><i class="fa fa-phone"></i> رقم الهاتف</th>

                    <th><i class=" fa fa-edit"></i>تعديل</th>
                    <th><i class=" fa fa-remove"></i>حذف</th>

                  </tr>
                </thead>
                <tbody>
                @foreach($phones as $value)
                  <tr>
                    <td contenteditable="true">{{$value->company_name}} </td>
                    <!-- <td class="hidden-phone">{{$value->phone_number}}</td> -->
                    <td>{{$value->phone_number}}</td>
                    <!-- <td><span class="label label-info label-mini">Due</span></td> -->
                    <td>
                 <a  class="btn btn-success btn-xs" href="/phones/{{$value->id}}/edit"><i class="fa fa-pencil "></i></a>

                    </td>

                    <td>
                    <form class="delete" action="{{ action('phones@destroy',$value->id) }}" method="POST" onsubmit ='return confirmDelete()'>
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }}         
                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>            
                        </form> 
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>

        <!-- END Table -->
</div>

<div style="text-align:right;">
{{$phones->links()}}
</div>

<script>
function confirmDelete() {
var result = confirm('هل انت متأكد من حذف هذا الهاتف ؟');

if (result) {
return true;
} else {
return false;
}
}
</script>
      
@else

<div class="alert alert-dismissible alert-danger" style="text-align:right;">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>لا يوجد محتوى ! </strong> <a data-toggle="modal" data-target="#myModal" class="alert-link"> ،اضغط هنا لاضافة محتوى جديد
    </a>
</div>


@endif
@endsection

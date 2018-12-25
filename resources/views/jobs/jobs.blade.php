@extends('layouts.nav')
@section('pageName')
الوظائف
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
           
           <form action="addjobs" method="post" enctype="multipart/form-data" >
      
           <div class="form-group col-md-12">
               <label for="" class="control-label">   العنوان    </label>
               <input type="text" name="title" class="form-control" style="width: 49%;">
              
           </div>
           <div class="form-group col-md-12">
               <label for="" class="control-label"> العمر  </label>
               <input type="number" name="age" class="form-control" style="width: 49%;">
              
           </div>
       
           <div class="form-group col-md-12">
               <label for="" class="control-label">الجنس </label>
               <select name="gender" id="" class=" form-control " style="width: 49%;">
               <option value="1">ذكر</option>
               <option value="2">انثى</option>
               </select>
           </div>
           <div class="form-group col-md-12">
               <label for="" class="control-label">التخصص </label>
               <input type="text" name="specialization" class=" form-control" style="width: 49%;" >
           </div>
           <div class="form-group col-md-12">
               <label for="" class="control-label">الخبرة </label>
               <input type="text" name="experiences" class=" form-control" style="width: 49%;" >
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
@if(count($jobs) >0)

      <!--  Table -->
      <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel table-responsive">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-left"></i> جدول الوظائف</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> العنوان</th>
                    <th class="hidden-phone"><i class="fa fa-calendar"></i> العمر</th>
                    <th><i class="fa fa-transgender"></i> الجنس</th>
                    <th><i class="fa fa-black-tie"></i> التخصص</th>
                    <th><i class=" fa fa-graduation-cap"></i> الخبرة</th>
                    <th><i class=" fa fa-edit"></i>تعديل</th>
                    <th><i class=" fa fa-remove"></i>حذف</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($jobs as $value)
                  <tr>
                    <td>{{$value->title}} </td>
                    <td class="hidden-phone">{{$value->age}}</td>
                    @if($value->gender == 1)
                    <td><span class="label label-info label-mini">ذكر</span></td>
                    @else
                    <td><span class="label label-theme02 label-mini">انثى</span></td>
                    @endif
                    <td>{{$value->specialization}}</td>
                    <td>{{$value->experiences}}</td>
                   
                    <td>
                      <a class="btn btn-success btn-xs" href="/edit_jobs/{{$value->id}}"><i class="fa fa-pencil"></i></a>
                    </td>
                    <td>
                      <a class="btn btn-danger btn-xs" href="/delete_jobs/{{$value->id}}"><i class="fa fa-trash-o "></i></a>
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
    {{$jobs->links()}}
    </div>
    
     
@else

<div class="alert alert-dismissible alert-danger" style="text-align:right;">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>لا يوجد محتوى ! </strong> <a data-toggle="modal" data-target="#myModal" class="alert-link"> ،اضغط هنا لاضافة محتوى جديد
    </a>
</div>


@endif
@endsection

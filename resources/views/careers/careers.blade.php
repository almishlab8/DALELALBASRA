@extends('layouts.nav')

@section('pageName')
الاعمال
@endsection
@section('content')
<div>
    <div >
        <a  data-toggle="modal" data-target="#myModal" class="btn btn-compose">
         اضافة جديد
         <i class="fa fa-plus"></i>    </a>
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
           
           <form action="addcareer" method="post" enctype="multipart/form-data" >
      
           <div class="form-group col-md-12">
               <label for="" class="control-label">   عنوان الموظوع    </label>
               <input type="text" name="title" class="form-control" style="width: 49%;">
              
           </div>
           <div class="form-group col-md-12">
          <label for="" class="control-label">التفاصيل</label>
                <textarea  name="subject" class=" form-control" style="width: 49%;" ></textarea>

          </div>

           <div class="form-group col-md-12">
               <label for="" class="control-label"> رقم الهاتف  </label>
               <input type="number" name="phone_number" class="form-control" style="width: 49%;">
              
           </div>

           <div class="form-group col-md-12">
               <label for="" class="control-label">العنوان </label>
               <input type="text" name="location" class=" form-control" style="width: 49%;" >
           </div>
           <label class="control-label col-md-6" style="opacity: 0;">cv</label>
           <div class="col-md-6" style="padding-right: 30px;">
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
@if(count($careers) >0)
      <!--  Table -->
      <div class="row mt">
          <div class="col-md-12 ">
            <div class="content-panel table-responsive">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-left"></i> جدول الاعمال</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> عنوان الموظوع</th>
                    <th class="hidden-phone"><i class="fa fa-info-circle"></i> التفاصيل</th>
                    <th><i class="fa fa-mobile"></i> رقم الهاتف</th>
                    <th><i class="fa fa-location-arrow"></i> العنوان</th>
                    <th><i class=" fa fa-picture-o"></i> الصورة</th>
                    <th><i class=" fa fa-edit"></i>تعديل</th>
                    <th><i class=" fa fa-remove"></i>حذف</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($careers as $value)
                  <tr>
                    <td>{{$value->title}} </td>
                    <td>{{$value->subject}} </td>
                    <td>{{$value->phone_number}} </td>
                    <td>{{$value->location}} </td>
                    <td >
                      <a class="fancybox" href="{{$value->image}}"><i class=" fa fa-eye"></i> عرض</a>                    
                    </td>
                    <td>
                      <a href="/edit_career/{{$value->careerdetails_id}}" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
                    </td>
                    <td>
                      <a class="btn btn-danger btn-xs" href="/delete_career/{{$value->careerdetails_id}}"><i class="fa fa-trash-o "></i></a>
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
    {{$careers->links()}}
    </div>
@else

<div class="alert alert-dismissible alert-danger" style="text-align:right;">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>لا يوجد محتوى ! </strong> <a data-toggle="modal" data-target="#myModal" class="alert-link"> ،اضغط هنا لاضافة محتوى جديد
    </a>
</div>


@endif
@endsection

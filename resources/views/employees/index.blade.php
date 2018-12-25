@extends('layouts.nav')
@section('pageName')
الموظفين
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
         
          <form action="/addmarket" method="post" enctype="multipart/form-data" >
     
          <div class="form-group col-md-12">
              <label for="" class="control-label"> الاسم  </label>
              <input type="text" name="name" class="form-control" style="width: 49%;">
             
          </div>

                     <div class="form-group col-md-12">
               <label for="" class="control-label"> العمر  </label>
               <input type="number" name="age" class="form-control" style="width: 49%;">
              
           </div>
        
           <div class="form-group col-md-12">
               <label for="" class="control-label"> رقم الهاتف  </label>
               <input type="number" name="phone_number" class="form-control" style="width: 49%;">
              
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
               <label for="" class="control-label">التحصيل الدراسي </label>
               <input type="text" name="academic_achievement" class=" form-control" style="width: 49%;" >
           </div>
      
         <div class="form-group col-md-12">
         <label class="control-label col-md-5" style="opacity: 0;">cv</label>
         <div class="col-md-4" style="padding-right: 30px;">
           <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div style="padding-right: 20px;">
                        <span class="btn btn-info btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> رفع الصورة الشخصية</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> تغيير</span>
                        <input type="file" name="img" class="default" />
                        </span>
                        <!-- <a  class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a> -->
                      </div>
                    </div>
           </div>
           <div class="col-md-3" style="padding-top: 50px;">
           <div class="fileupload fileupload-new" data-provides="fileupload">
                      <span class="btn btn-theme02 btn-file">
                        <span class="fileupload-new"><i class="fa fa-paperclip"></i> رفع السيرة الذاتية (CV) </span>
                      <span class="fileupload-exists"><i class="fa fa-undo"></i> تغيير</span>
                      <input type="file" name="cv" class="default" />
                      </span>
                      <span class="fileupload-preview" style="margin-left:5px;"></span>
                      <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
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

   
@if(count($employees) >0)

<!--  Table -->
<div class="row mt" >
    <div class="col-md-12">
    <div class="content-panel">
            <div class="table-responsive">
        <table class="table table-striped table-advance table-hover">
        <h4><i class="fa fa-angle-left"></i> الموظفيين </h4>
        <hr>
        <thead>
            <tr>
            <th style="text-align: -webkit-auto;"><i class="fa fa-bullhorn"></i> الاسم</th>
            <th style="text-align: -webkit-auto;"><i class="fa fa-certificate"></i> الشهاده الجامعية </th>
            <th style="text-align: -webkit-auto;"><i class="fa fa-book"></i> التخصص  </th>
            <th style="text-align: -webkit-auto;"><i class="fa fa-phone"></i> رقم الهاتف  </th>
            <th style="text-align: -webkit-auto;"><i class="fa fa-transgender"></i> الجنس   </th>
            <th style="text-align: -webkit-auto;"><i class="fa fa-calendar"></i> العمر   </th>
            <th style="text-align: -webkit-auto;"><i class="fa fa-image"></i>  صورة البروفايل  </th>
            <th style="text-align: -webkit-auto;"><i class="fa fa-file"></i> السيرة الذاتية   </th>
            <th style="text-align: -webkit-auto;"><i class=" fa fa-edit"></i>تعديل</th>
            <th style="text-align: -webkit-auto;"><i class=" fa fa-remove"></i>حذف</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employees as $value)
            <tr>
            <td>{{$value->name}} </td>
            <td>{{$value->academic_achievement}} </td>
            <td>{{$value->specialization}} </td>
            <td>{{$value->phone_number}} </td>
            @if($value->gender == 1)
                    <td><span class="label label-info label-mini">ذكر</span></td>
                    @else
                    <td><span class="label label-theme02 label-mini">انثى</span></td>
                    @endif
            <td>{{$value->age}} </td>
            <td >
            <a class="fancybox" href="{{$value->profilel_image}}"><i class=" fa fa-eye"></i> عرض</a>                    
            </td>
            <td >
            <a class="fancybox" href="{{$value->cv}}"><i class=" fa fa-download"></i> تحميل</a>                    
            </td>
            

           
            <td>
                
                <a class="btn btn-success btn-xs" href="/edit_market/{{$value->id}}"><i class="fa fa-pencil "></i></a>
            </td>
            <td>
    
               
                    <a href="/delete_market/{{$value->id}}"class="btn btn-danger btn-xs" onsubmit ='return confirmDelete()' ><i class="fa fa-trash-o"></i></a>
                 
            </td>
            </tr>
        @endforeach
    
    
    
                                
    
        </tbody>
        </table>
            </div>
    </div>
    <!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
    </div>
   
<div style="text-align:right;">
    {{$employees->links()}}
    </div> 
    <!-- END Table -->

    <script>
        function confirmDelete() {
        var result = confirm('هل انت متأكد من حذف هذه العنصر ؟');
        
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

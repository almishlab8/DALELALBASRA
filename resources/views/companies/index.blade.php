@extends('layouts.nav')

@section('pageName')
الدليل
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

            <form action="addCompany" method="post" enctype="multipart/form-data" >

            <div class="form-group col-md-12">
                <label for="" class="control-label"> اسم الشركة  </label>
                <input type="text" name="company_name" class="form-control" style="width: 49%;">
                
            </div>


            <div class="form-group col-md-12">
            <label for="" class="control-label"> النوع </label>
                <select class="form-control" name="type" style="width: 49%;">
                    <option selected disabled value="0">اختار النوع</option>
                    <option value="1">مطاعم</option>
                    <option value="2">شركات</option>
                    <option value="3">فنادق</option>
                    <option value="4">ديكور واصباغ</option>
                    <option value="5">تسويق</option>
                </select>
                </div>
            <div class="form-group col-md-12">
                    <label for="" class="control-label"> شعار الشركة (LOGO) </label>
                    <input type="file" name="logo" class="form-control" style="width: 49%;">
                    
             </div>

            <div class="form-group col-md-12">
                    <label for="" class="control-label">  نبذة عن الشركة  </label>
                    <input type="text" name="subject" class="form-control" style="width: 49%;">
            </div>

                <div class="form-group col-md-12">
                        <label for="" class="control-label">  الموقع الالكتروني  </label>
                        <input type="text" name="website" class="form-control" style="width: 49%;"> 
                </div>

            <div class="form-group col-md-12">
                <label for="" class="control-label">  البريد الالكتروني  </label>
                <input type="text" name="email" class="form-control" style="width: 49%;">
            </div>

                <div class="form-group col-md-12">
                        <label for="" class="control-label"> رقم الهاتف </label>
                        <input type="number" name="phone_number" class="form-control" style="width: 49%;">  
                </div>

            <div class="form-group col-md-12">
                    <label for="" class="control-label">  العنوان  </label>
                    <input type="text" name="location" class="form-control" style="width: 49%;"> 
            </div>

            <div class="form-group col-md-12">
                    <label for="" class="control-label">  الموقع علي الخارطة  </label>
                    <input type="text" name="map" class="form-control" style="width: 49%;">         
            </div>

            <div class="form-group col-md-12">
                    <label for="" class="control-label">  (1) الصوره  </label>
                    <input type="file" name="image1" class="form-control" style="width: 49%;">    
             </div>

             <div class="form-group col-md-12">
                    <label for="" class="control-label">  (2) الصوره  </label>
                    <input type="file" name="image2" class="form-control" style="width: 49%;">    
             </div>


             <div class="form-group col-md-12">
                    <label for="" class="control-label">  (3) الصوره  </label>
                    <input type="file" name="image3" class="form-control" style="width: 49%;">    
             </div>


             <div class="form-group col-md-12">
                    <label for="" class="control-label">  (4) الصوره  </label>
                    <input type="file" name="image4" class="form-control" style="width: 49%;">    
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

@if(count($companies) >0)

    <!--  Table -->
    <div class="row mt">
        <div class="col-md-12 ">
        <div class="content-panel table-responsive">
            <table class="table table-striped table-advance table-hover">
            <h4><i class="fa fa-angle-left"></i> الدليل</h4>
            <hr>
            <thead>
                <tr>
                <th><i class="fa fa-building"></i> اسم الشركة</th>
                <th><i class="fa fa-mobile"></i> رقم الهاتف</th>
                <th><i class="fa fa-location-arrow"></i> العنوان</th>
                <th><i class=" fa fa-info-circle"></i> نبذة عن الشركة</th>
                <th><i class=" fa fa-picture-o"></i> شعار الشركة</th>

                <th><i class=" fa fa-eye"></i>عرض كل التفاصيل</th>
                <th><i class=" fa fa-edit"></i>تعديل</th>
                <th><i class=" fa fa-remove"></i>حذف</th>
                </tr>
            </thead>
            <tbody>
            @foreach($companies as $value)
                <tr>
                <td>{{$value->company_name}} </td>
                <td>{{$value->phone_number}} </td>
                <td>{{$value->location}} </td>
                <td>{{$value->subject}}</td>

                <td >
                    <a class="fancybox" href="{{$value->company_logo}}"><i class=" fa fa-eye"></i> عرض</a>                    
                </td>
                <td>
                        <a  class="btn btn-success btn-xs" href="show/{{$value->id}}"> <i class="fa fa-share-square"></i></a>
                </td>
                <td>
                    <a href="/editCompany/{{$value->id}}" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
                </td>
                <td>
                    <a class="btn btn-danger btn-xs" href="/delete/{{$value->id}}"><i class="fa fa-trash-o "></i></a>
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
        {{$companies->links()}}
        </div>
<script>
function confirmDelete() {
var result = confirm('هل انت متأكد من حذف هذه الوظيفة ؟');

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

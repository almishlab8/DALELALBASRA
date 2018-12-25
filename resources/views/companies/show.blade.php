@extends('layouts.nav')
@section('pageName')
الدليل/ {{$company->company_name}}
@endsection
@section('content')
<style>
.form-group{
    text-align: right;
    font-size: 12pt;
    font-weight: bold;
    padding-right: 11px;
}
td{
    text-align:center;
    font-size:12pt;
    font-weight:bold;
}
.card-body p{
    text-align: -webkit-center;
    padding-top: 20%;
}

</style>
<div >


<br><br><br>   

<div class="container">
        <div >
                <div class="panel panel-warning">
                <div class="panel-heading" style="background:#4ECDC4">
                <h3 class="panel-title" style="color:white;text-align:center">عرض البيانات </h3>
                </div>
                <br><br>
<div class="row">
<div class="col-md-2">
    <div class="card" style="width: 15rem;">
            <img class="card-img-top" src="../{{$photo->company_logo}}" width="100%" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">شعار الشركه (LOGO)</p>
            </div>
            </div>
</div>
<div class="col-md-2">
    <div class="card" style="width: 15rem;">
            <img class="card-img-top" src="../{{$photo->image1}}" width="100%"  alt="Card image cap">
            <div class="card-body">
                <p class="card-text"> (1) الصورة</p>
            </div>
            </div>
</div>


<div class="col-md-2">
    <div class="card" style="width: 15rem;">
            <img class="card-img-top" src="../{{$photo->image2}}" width="100%"  alt="Card image cap">

            <div class="card-body">
                <p class="card-text"> (2) الصورة</p>
            </div>
            </div>
</div>
<div class="col-md-2">
    <div class="card" style="width: 15rem;">
            <img class="card-img-top" src="../{{$photo->image3}}" width="100%"  alt="Card image cap">
            <div class="card-body">
                <p class="card-text"> (3) الصورة</p>
            </div>
            </div>
</div>
<div class="col-md-2">
    <div class="card" style="width: 15rem;">
            <img class="card-img-top" src="../{{$photo->image4}}" width="100%"  alt="Card image cap">
            <div class="card-body">
                <p class="card-text"> (4) الصورة</p>
            </div>
            </div>
</div>
</div>
</div>







<div class="table-responsive" >
<table class="table table-striped table-advance table-hover">
<tr>
        <td>اسم الشركة </td>
<td>{{$company->company_name}}</td>

</tr>

<tr>
        <td>نبذة عن الشركة</td>
<td>{{$company->subject}}</td>

</tr>




<tr>
        <td>رقم الهاتف</td>
<td>{{$companyDetails->phone_number}}</td>

</tr>


<tr>
        <td>البريد الالكتروني</td>
<td>{{$companyDetails->email}}</td>

</tr>


<tr>
        <td>الموقع الالكتروني</td>
<td>{{$companyDetails->website}}</td>

</tr>

<tr>
        <td>العنوان</td>    
<td>{{$companyDetails->location}}</td>

</tr>

<tr>
        <td>الموقع على الخريطة </td>     
<td><a class="btn btn-success btn-xs" href="http://maps.google.com?q={{$companyDetails->map}}">افتح <i class="fa fa-share-square"></i></</a></td>

</tr>

</table>



<div class="form-group">

</div>
</div>
</div>
</div>
</div>



</div>
@endsection
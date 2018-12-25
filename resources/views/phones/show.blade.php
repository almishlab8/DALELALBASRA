@extends('layouts.nav')
@section('pageName')
هاتف / {{$phone->id}}
@endsection
@section('content')



<div class="" style="direction: rtl;">
<h3>{{$phone->company_name}}</h3>
<p>{{$phone->phone_number}}</p>
<p>{{$phone->created_at}}</p>
</div>

@endsection
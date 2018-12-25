@extends('layouts.app')
@section('content')



<div class="container">
<h3>{{$phone->company_name}}</h3>
<p>{{$phone->phone_number}}</p>
<p>{{$phone->created_at}}</p>
</div>

@endsection
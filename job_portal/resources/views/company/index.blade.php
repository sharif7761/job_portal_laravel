@extends('layouts.company_header')

@section('content')
<div class="container">
    
    
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script> 


<h1>Welcome Company Home</h1>
<h3>ID:
@if(Session::has('company_id'))
{{ Session::get('company_id') }}
    </h3>
@endif

</div>
@endsection
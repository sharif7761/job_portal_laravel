@extends('layouts.applicant_header')

@section('content')
<div class="container">
    

    <h1>Welcome Appplicant Home</h1>
    <h3>ID:
    @if(Session::has('applicant_id'))
    {{ Session::get('applicant_id') }}

    </h3>
@endif

    
</div>
@endsection
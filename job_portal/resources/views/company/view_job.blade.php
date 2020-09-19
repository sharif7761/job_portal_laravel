@extends('layouts.company_header')

@section('content')
<div class="container">
    
    
<h2>Jobs Posted by your company</h2>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Job Title </th>
        <th scope="col">Job Description</th>
        <th scope="col">Salary</th>
        <th scope="col">Location</th>
        <th scope="col">Country</th>
        
      </tr>
    </thead>
    <tbody>
        @foreach ($jobs as $item)
       
      <tr>
        <th scope="row">{{$item->job_title  }}</th>
        <td>{{$item->job_description  }}</td>
        <td>{{$item->salary  }}</td>
        <td>{{$item->location  }}</td>
        <td>{{$item->country  }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@endsection
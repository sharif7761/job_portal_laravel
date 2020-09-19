@extends('layouts.applicant_header')

@section('content')
<div class="container">
    
    
<h2>Jobs</h2>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Job Title </th>
        <th scope="col">Job Description</th>
        <th scope="col">Salary</th>
        <th scope="col">Location</th>
        <th scope="col">Country</th>
        <th scope="col">Apply</th>
        
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
        <td> <a type="button" class="btn btn-sm btn-primary" href="{{URL::to('/applicant_apply/'.$item->job_id)}}" >
          Apply
        </a></td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@endsection
@extends('layouts.company_header')

@section('content')
<div class="container">
    
    
<h2>Received Job Applications </h2>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Job Title </th>
        <th scope="col">Applicant First Name</th>
        <th scope="col">Applicant Email</th>
        <th scope="col">Applicant Resume</th>
        <th scope="col">Applicant Picture</th>
        
      </tr>
    </thead>
    <tbody>
        @foreach ($job_applications as $item)
       <?php
        $applicant_details=DB::table('applicant')
                        ->where('applicant_id',$item->applicant_id)
                        ->first();
       ?>
      <tr>
        <th scope="row">{{$item->job_title  }}</th>
        <td>{{$applicant_details->first_name  }}</td>
        <td>{{$applicant_details->email  }}</td>
        <td>
            {{$applicant_details->resume  }}
           
            
        </td>
        <td>
            <img   style="height:auto;width:60px;border-radius:50%;"  alt="{{ $applicant_details->first_name }}"  src="{{asset('img/'.$applicant_details->profile_pic)}}">
        </td>
     
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@endsection
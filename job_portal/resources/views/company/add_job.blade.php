@extends('layouts.company_header')

@section('content')
<div class="container">
    
  
<form method="post" >
    @csrf
<h2>Please provide Job Inforamtion</h2>
<label>Job Title :</label>  <input type="text" name="job_title" > <br>
<label>Job Description :</label> <input type="text" name="job_description" ><br>
<label>Salary :</label> <input type="text" name="salary" ><br>
<label>Location :</label> <input type="text" name="location" ><br>
<label>Country :</label> <input type="text" name="country" > <br>


<br>
    <input type="submit" name="submit" formaction="{{url('/company_addJob')}}" class="btn btn-primary" value="Submit" >
</form>
  
</div>

@endsection
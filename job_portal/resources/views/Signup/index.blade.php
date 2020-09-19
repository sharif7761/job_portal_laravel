<!DOCTYPE html>
<html>
<head>
	<title>Signup Inforamtion</title>
	<script src="https://code.jquery.com/jquery-1.8.3.js" integrity="sha256-dW19+sSjW7V1Q/Z3KD1saC6NcE5TUIhLJzJbrdKzxKc=" crossorigin="anonymous"></script>
	
</head>
<body>

	@extends('layouts.log')

	@section('content')
	<div class="container">
		<h1>Signup Inforamtion</h1>
		
		
		


	@if ($errors->any())
			@foreach ($errors->all() as $error)
				<div class="alert alert-dismissible alert-danger">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  <strong>Oh !</strong>{{ $error }}
				</div>
			@endforeach
		@endif

	<label>Sign Up as</label>	
		<select id='purpose'>
            <option selected disabled >Choose a option First</option>
            <option value="red">Applicant</option>
            <option value="1">Company</option>
		</select>
		


		

    <div style='display:none;' id='business'>

	<form method="post" >
		@csrf

	<h2>Please provide Company Inforamtion</h2>
	<label>First Name:</label>  <input type="text" name="first_name" > <br>
	<label>Last Name:</label> <input type="text" name="last_name" ><br>
	<label>Business Name:</label> <input type="text" name="business_name" ><br>
	<label>Email :</label> <input type="email" name="email" ><br>
	<label>Password :</label> <input type="password" name="password" > <label>[password is not encypted for testing]</label><br>
	
	
<br>
		<input type="submit" name="submit" formaction="{{url('/company_signup')}}" class="btn btn-primary" value="Submit" >
	</form>
</div>



<div style='display:none;' id='applicant'>
	<form method="post" >
		@csrf
<!-- 		{{csrf_field()}} -->		
<!-- 		<input type="hidden" name="_token" value="{{csrf_token()}}"> -->
	<h2>Please provide Applicant Inforamtion</h2>
	<label>First Name:</label>  <input type="text" name="first_name" > <br>
	<label>Last Name:</label> <input type="text" name="last_name" ><br>
	<label>Email :</label> <input type="email" name="email" ><br>
	<label>Password :</label> <input type="password" name="password" ><br>
	
	
<br>
		<input type="submit" formaction="{{url('/applicant_signup')}}"  name="submit" class="btn btn-primary" value="Submit" >
	</form>
</div>

	<h3>{{session('msg')}}</h3>

	
</div>


<script>
	$(document).ready(function(){
    $('#purpose').on('change', function() {
      if ( this.value == '1')
      {
        $("#business").show();
		$("#applicant").hide();
      }
      else
      {
		$("#applicant").show();
        $("#business").hide();
      }
    });
});
</script>	

@endsection

</body>
</html>
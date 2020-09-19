<!DOCTYPE html>
<html>
<head>
	<title>Login Inforamtion</title>
</head>
<body>

	@extends('layouts.log')

	@section('content')
	<div class="container">
		<h1>Login Inforamtion</h1>
		
		<script>
			var msg = '{{Session::get('alert')}}';
			var exist = '{{Session::has('alert')}}';
			if(exist){
			  alert(msg);
			}
		  </script> 

	@if ($errors->any())
			@foreach ($errors->all() as $error)
				<div class="alert alert-dismissible alert-danger">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  <strong>Oh !</strong>{{ $error }}
				</div>
			@endforeach
		@endif


	<form method="post" >
		@csrf
<!-- 		{{csrf_field()}} -->		
<!-- 		<input type="hidden" name="_token" value="{{csrf_token()}}"> -->
		Email: <input type="email" name="email" > <br>
		Password: <input type="password" name="password" ><br>
		Type:   <select name="type" id="Type" style="width: 10%;">
            <option selected hidden disabled >Select Type</option>
             <option value="Company">Company</option>
             <option value="Applicant">Applicant</option>
           </select><br>
         <br>
<br>
		<input type="submit" name="submit" class="btn btn-primary" value="Submit" >
	</form> 
	<h3 style="color: red">New Here? Sign up as company or applicant <a href="{{ URL::to('/signup') }}" >here</a> </h3>

	<h3>{{session('msg')}}</h3>

	
</div>
	
		
@endsection

</body>
</html>
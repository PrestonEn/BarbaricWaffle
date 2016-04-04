
@extends('testing.navbarTop')

@section('content')


<style>

form {
	font-size: 1.3em;
	margin-top: 5%;
}

#signUpTitle {
	font-size: 400%;
	margin-top: 5%;
	margin-left: 10%;
}

.row {
	margin-bottom: 2%;
}

#phoneNumDiv input {
	font-size: 1em;
	text-align: center;
}

</style>



<h1 id = "signUpTitle"> Sign Up </h1>

<form action = "register" method = "post">
	<div class = "row">
		<div class = "col-xs-1"></div>
		<div class = "col-xs-5">
			First Name : 
			<input type = "text" class = "form-control" name = "firstName">
		</div>
		<div class = "col-xs-5">
			Last Name : 
			<input type = "text" class = "form-control" name = "lastName">
		</div>

	</div>

	<div class = "row">
		<div class = "col-xs-1"></div>
		<div class = "col-xs-10">
			E-mail Address : 
			<input type = "email" class = "form-control" name = "email">
		</div>
	</div>

	<div class = "row">
		<div class = "col-xs-1"></div>
		<div class = "col-xs-10">
			Verify E-mail Address : 
			<input type = "email" class = "form-control" name = "email_confirmation">
		</div>
	</div>

	<div class = "row">
		<div class = "col-xs-1"></div>
		<div class = "col-xs-6" id = "phoneNumDiv">
				Phone Number : 
				<div class = "controls form-inline">
				<input type = "text" class = "form-control input-sm" placeholder="111-111-1111" name = "phoneNumber" maxlength = "12">
				</div>
		<div class = "col-xs-5"></div>	
		</div>
	</div>

	<div class = "row">
		<div class = "col-xs-1"></div>
		<div class = "col-xs-10">
			Password :  
			<input type = "password" class = "form-control" name = "pass">
		</div>
	</div>

	<div class = "row">
		<div class = "col-xs-1"></div>
		<div class = "col-xs-10">
			Verify Password :  
			<input type = "password" class = "form-control" name = "pass_confirmation">
		</div>
	</div>

	<div class = "row">
		<div class = "col-xs-1"></div>
		<div class = "col-xs-5">
			<button type="submit" class = "btn btn-default">Submit</button>
		</div>
	</div>

</form>				

@stop
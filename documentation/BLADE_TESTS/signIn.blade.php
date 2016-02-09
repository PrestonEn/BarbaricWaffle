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
	margin-top: 3%;
}

#phoneNumDiv input {
	font-size: 1em;
	text-align: center;
}

#forgotPass {
	font-size: 0.7em;
	color: blue;
}

</style>



<h1 id = "signUpTitle"> Sign In </h1>	


<form action = "" method = "post">

	<div class = "row">
		<div class = "col-xs-1"></div>
		<div class = "col-xs-7">
			Username :  
			<input type = "text" class = "form-control" name = "pass">
		</div>
	</div>	

	<div class = "row">
		<div class = "col-xs-1"></div>
		<div class = "col-xs-7">
			Password :  
			<input type = "password" class = "form-control" name = "pass">
		</div>
	</div>	

	<div class = "row">
		<div class = "col-xs-1"></div>
		<div class = "col-xs-5">
			<button type="submit" class = "btn btn-default">Submit</button>
		</div>
		<div class = "col-xs-2">
			<a href="#" id = "forgotPass"> Forgot your password </a>
		</div>	
	</div>

</form>
@stop
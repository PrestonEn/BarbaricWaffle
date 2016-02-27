@extends('testing.navbarTop')

@section('content')


<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/signIn.css') !!}" media="all" rel="stylesheet" type="text/css" />

<h1 id = "signUpTitle"> Sign In </h1>	


<form action = "" method = "post">

	<div class = "row">
		<div class = "col-xs-1 col-sm-2 col-md-3"></div>
		<div class = "col-xs-10 col-sm-8 col-md-6">
			Username :  
			<input type = "text" class = "form-control" name = "pass">
		</div>
	</div>	

	<div class = "row">
		<div class = "col-xs-1 col-sm-2 col-md-3"></div>
		<div class = "col-xs-10 col-sm-8 col-md-6">
			Password :  
			<input type = "password" class = "form-control" name = "pass">
		</div>
	</div>	

	<div class = "row">
		<div class = "col-xs-1 col-sm-2 col-md-3"></div>
		<div class = "col-xs-7 col-sm-5 col-md-4">
			<button type="submit" class = "btn btn-default">Submit</button>
		</div>
		<div class = "col-xs-3 col-sm-3 col-md-2">
			<a href="#" id = "forgotPass"> Forgot your password </a>
		</div>	
	</div>


	<div class = "row" id = "registerInquiry">
		<div class = "col-xs-1 col-sm-2 col-md-3"></div>
		<div class = "col-xs-10 col-sm-8 col-md-6">
			<div class = "panel panel-default">
				Not Yet Registered? <a href="../signUp"> Sign up </a>
			</div>
		</div>
	</div>


</form>
@stop
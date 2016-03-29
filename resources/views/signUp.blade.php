
@extends('navbarTop')

@section('content')

<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/signUp.css') !!}" media="all" rel="stylesheet" type="text/css" />

<div class = "pageTitle"> Sign Up </div>

<form action = "register" method = "POST">
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
			<input type = "email" class = "form-control" name = "emailAddress1">
		</div>
	</div>

	<div class = "row">
		<div class = "col-xs-1"></div>
		<div class = "col-xs-10">
			Verify E-mail Address : 
			<input type = "email" class = "form-control" name = "emailAddress2">
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
			<input type = "password" class = "form-control" name = "pass2">
		</div>
	</div>

	<div class = "row">
		<div class = "col-xs-1"></div>
		<div class = "col-xs-5">
			<button type="submit" class = "btn btn-default">Submit</button>
		</div>
	</div>

	<div class = "row" id = "registerInquiry">
		<div class = "col-xs-1"></div>
		<div class = "col-xs-10">
			<div class = "panel panel-default">
				Already Registered? <a href="../signIn"> Sign in </a>
			</div>
		</div>
	</div>


</form>				

@stop
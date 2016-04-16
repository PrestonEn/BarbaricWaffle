
@extends('navbarTop')

@section('content')

<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/signUp.css') !!}" media="all" rel="stylesheet" type="text/css" />

</br>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class = "pageTitle"> Sign Up </div>

<form action = "signUp" method = "post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class = "row">
		<div class = "col-xs-1 col-sm-2 col-md-3"></div>
		<div class = "col-xs-5 col-sm-4 col-md-3">
			First Name : 
			<input type = "text" class = "form-control" name = "firstName" value="{{ old('firstName') }}">
		</div>
		<div class = "col-xs-5 col-sm-4 col-md-3">
			Last Name : 
			<input type = "text" class = "form-control" name = "lastName" value="{{ old('lastName') }}">
		</div>
	</div>

	<div class = "row">
		<div class = "col-xs-1 col-sm-2 col-md-3"></div>
		<div class = "col-xs-10 col-sm-8 col-md-6">
			Phone Number : 
			<!--<div class = "controls form-inline">-->
			<input type = "text" class = "form-control" placeholder="123-456-7890 x1234" name = "phone" maxlength = "18" value="{{ old('phone') }}">
			<!--</div>-->
		<div class = "col-xs-5"></div>	
		</div>
	</div>

	<div class = "row">
		<div class = "col-xs-1 col-sm-2 col-md-3"></div>
		<div class = "col-xs-10 col-sm-4 col-md-3">
			E-mail Address : 
			<input type = "email" class = "form-control" name = "email" id = "username" value="{{ old('email') }}">
		</div>
		<div class = "col-xs-12 col-sm-2 col-md-3"></div>
		<div class = "col-xs-1 col-sm-2 col-md-3"></div>
		<div class = "col-xs-10 col-sm-4 col-md-3">
			Verify E-mail Address : 
			<input type = "email" class = "form-control" name = "email_confirmation" value="{{ old('email') }}">
		</div>
	</div>

	<div class = "row">
		<div class = "col-xs-1 col-sm-2 col-md-3"></div>
		<div class = "col-xs-10 col-sm-4 col-md-3">
			Password :  
			<input type = "password" class = "form-control" name = "pass" id = "password">
		</div>
		<div class = "col-xs-12 col-sm-2 col-md-3"></div>
		<div class = "col-xs-1 col-sm-2 col-md-3"></div>
		<div class = "col-xs-10 col-sm-4 col-md-3">
			Verify Password :  
			<input type = "password" class = "form-control" name = "pass_confirmation">
		</div>
	</div>

	<div class = "row">
		<div class = "col-xs-1 col-sm-2 col-md-3"></div>
		<div class = "col-xs-5 col-sm-4 col-md-3">
			<button type="submit" class = "btn btn-default">Submit</button>
		</div>
	</div>

	<div class = "row" id = "registerInquiry">
		<div class = "col-xs-3"></div>
		<div class = "col-xs-6">
			<div class = "panel panel-default">
				Already Registered? <a href="../signIn"> Sign in </a>
			</div>
		</div>
	</div>


</form>	



@stop
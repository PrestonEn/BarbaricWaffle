@extends('navbarTop')

@section('content')


<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/signIn.css') !!}" media="all" rel="stylesheet" type="text/css" />

<br>
<div class = "pageTitle"> Password Retrieval </div>	



<form action = "" method = "post">

	<div id = "instrText">
		Please input your registered username and e-mail address into the following form to retrieve your password.
	</div>

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
			e-mail address:  
			<input type = "text" class = "form-control" name = "pass">
		</div>
	</div>	

	<div class = "row">
		<div class = "col-xs-1 col-sm-2 col-md-3"></div>
		<div class = "col-xs-7 col-sm-5 col-md-4">
			<button type="submit" class = "btn btn-default">Submit</button>
		</div>
	</div>

</form>
@stop
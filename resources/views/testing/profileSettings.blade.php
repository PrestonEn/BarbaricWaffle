<!DOCTYPE html>
<html lang = "en">

@extends('testing.navbarLeft')

@section('profileContent')

<head>
	<title> ProfileSettings </title>
	<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<link href="{!! asset('CSS/profileSettings.css') !!}" media="all" rel="stylesheet" type="text/css" />
</head>

<body>


<div class = "col-xs-12">
  <div class = "pageTitle">
    {{$user->first_name}} {{$user->last_name}}
  </div>

  <form action="" method="post">
      <div class = "row">
        <div class = "col-xs-1"></div>
          Input Picture Drag and Drop here
      </div>  
      <div class = "row">
        <div id = "button" class = "col-xs-12">
          <button type = "submit" class = "btn-md">Submit</input>
        </div>
      </div> 
  </form>


    <div class = "row">
      <div class = "col-xs-1"></div>
      <div id = "email" class = "col-xs-10">
        <strong id = "emailTitle">Current E-mail :</strong>
        {{$user->email}}
      </div>
    </div>  

    <form action="" method="post">
      <div class = "row">
        <div class = "col-xs-1"></div>
          New E-mail:  
          <div class = "col-xs-12">
          <input type = "text" class = "form-control" name = "nEmail">
        </div>
      </div>  

      <div class = "row">
        <div class = "col-xs-1"></div>
          Verify E-mail:  
          <div class = "col-xs-12">
          <input type = "text" class = "form-control" name = "bEmail">
        </div>
      </div> 

      <div class = "row">
        <div class = "col-xs-1"></div>
        <div id = "button" class = "col-xs-10">
          <button type = "submit" class = "btn-md">Submit</input>
        </div>
      </div> 
    </form>


    <div id = "passFormTitle" class = "row">
        <div class = "col-xs-1"></div>
        <div id = "email" class = "col-xs-10">
          <strong>Password :</strong>
        </div>
    </div>  

    <form action="" method="post">
      <div class = "row">
        <div class = "col-xs-1"></div>
          Old Password:  
          <div class = "col-xs-12">
          <input type = "password" class = "form-control" name = "oldPass">
        </div>
      </div>  

      <div class = "row">
        <div class = "col-xs-1"></div>
          New Password:  
          <div class = "col-xs-12">
          <input type = "password" class = "form-control" name = "nPass">
        </div>
      </div> 

      <div class = "row">
        <div class = "col-xs-1"></div>
          Verify Password:  
          <div class = "col-xs-12">
          <input type = "password" class = "form-control" name = "vPass">
        </div>
      </div>

      <div class = "row">
        <div class = "col-xs-1"></div>
        <div id = "button" class = "col-xs-10">
          <button type = "submit" class = "btn-md">Submit</input>
        </div>
      </div> 
    </form>

</div>
@stop

@extends('testing.navbarTop')

</body>
</html>
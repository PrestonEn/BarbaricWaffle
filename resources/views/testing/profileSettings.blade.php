<!DOCTYPE html>
<html lang = "en">

@extends('testing.navbarLeft')

@section('profileContent')

<head>
	<title> ProfileMain </title>
	<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<link href="{!! asset('CSS/profileSettings.css') !!}" media="all" rel="stylesheet" type="text/css" />
</head>

<body>


<div class = "col-xs-12">
  <div id = "pTitle">
	 <h1 id = "profileTitle"> Person's Name <h1>
  </div>

  <form action="" method="post">
      <div class = "row">
        <div class = "col-xs-1"></div>
        <div class = "col-xs-10">
          Input Picture Drag and Drop here
        </div>
      </div>  
      <div class = "row">
        <div class = "col-xs-1"></div>
        <div id = "button" class = "col-xs-10">
          <button type = "submit" class = "btn-md">Submit</input>
        </div>
      </div> 
  </form>


    <div class = "row">
      <div class = "col-xs-1"></div>
      <div id = "email" class = "col-xs-10">
        <strong id = "emailTitle">Current E-mail :</strong>
        SomeEmailAddress@hotmail.com
      </div>
    </div>  

    <form action="" method="post">
      <div class = "row">
        <div class = "col-xs-1"></div>
        <div class = "col-xs-10">
          New E-mail:  
          <input type = "text" class = "form-control" name = "nEmail">
        </div>
      </div>  

      <div class = "row">
        <div class = "col-xs-1"></div>
        <div class = "col-xs-10">
          Verify E-mail:  
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
        <div class = "col-xs-10">
          Old Password:  
          <input type = "password" class = "form-control" name = "oldPass">
        </div>
      </div>  

      <div class = "row">
        <div class = "col-xs-1"></div>
        <div class = "col-xs-10">
          New Password:  
          <input type = "password" class = "form-control" name = "nPass">
        </div>
      </div> 

      <div class = "row">
        <div class = "col-xs-1"></div>
        <div class = "col-xs-10">
          Verify Password:  
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
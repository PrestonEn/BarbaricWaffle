<!DOCTYPE html>
<html lang = "en">

@extends('navbarLeft')

@section('profileContent')

<head>
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="{!! asset('JS/profileImageHandle.js') !!}"></script>
	<title> ProfileSettings </title>
	<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<link href="{!! asset('CSS/profileSettings.css') !!}" media="all" rel="stylesheet" type="text/css" />
</head>

<body>

  @if (session('update'))
    <div class="alert alert-success">
      <ul>
        <li>{{ session('update') }}</li>
      </ul>
    </div>
  @endif

  @if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

<div class = "pageHeaderDiv col-xs-12" >
  <div class = "pageTitle">
    My Settings
  </div>
  <p>Current Email: <b>{{$user->email}}</b></p>
</div>

<div class = "col-xs-12 col-md-6">
  <h2>Change Phone Number</h2>
  <form action="{{$user->user_id}}/resetPhoneNumber" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class = "row">
      <div class = "col-xs-10 col-md-6">
        <label>New Phone #: </label> 
        <input type = "text" class = "form-control" name = "phone">
      </div>
      <div class = "col-xs-10 col-md-6">
        <label>Verify:</label>
        <input type = "text" class = "form-control" name = "phone_confirmation">
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

<div class = "col-xs-12 col-md-6">
  <h2>Change Password</h2>
  <form action= "{{$user->user_id}}/resetPassword" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class = "row">
      <div class = "col-xs-10 col-md-6">
        <label>Old Password: </label>
        <input type = "password" class = "form-control" name = "oldPass">
      </div>
      <div class = "col-xs-10 col-md-6">
        <label>New Password:</label>
        <input type = "password" class = "form-control" name = "nPass">
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

<div class = "col-xs-12 col-md-6">
  <h2>Edit Name</h2>
  <form action= "{{$user->user_id}}/resetName" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class = "row">
      <div class = "col-xs-10 col-md-6">
        <label>First Name: </label>
        <input class = "form-control" name = "firstName" value = "{{$user->first_name}}">
      </div>
      <div class = "col-xs-10 col-md-6">
        <label>Last Name:</label>
        <input class = "form-control" name = "lastName" value = "{{$user->last_name}}">
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

<div class = "col-xs-12 col-md-6">
  <h2>Change Profile Image</h2>
  <form action= "{{$user->user_id}}/updateImage" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class = "row">
      <div class = "col-xs-10 col-md-10">
        <button type="button" id="select_image" >Select a file to upload</button>
      </div>
    </div> 

      <div class = "row">
        <div id = "button" class = "col-xs-6">
          <input type = "file" class = "form-control" name = "photo" id="img_store">
          <button type = "submit" class = "btn-md">Submit</input>
        </div>
      </div> 

  </form>
</div>

@stop

@extends('navbarTop')


</body>
</html>
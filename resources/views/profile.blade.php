<!DOCTYPE html>
<html lang = "en">

@extends('navbarLeft')

@section('profileContent')

<head>
	<title> Profile </title>
	<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<link href="{!! asset('CSS/profileMain.css') !!}" media="all" rel="stylesheet" type="text/css" />
</head>

<body>

<div class = "pageHeaderDiv col-xs-12" >
  <div class = "pageTitle">
    My Profile
  </div>
  <hr>
  <p>{{$user->first_name}} {{$user->last_name}}</br>
  {{$user->phone}}</br>
  {{$user->email}}</p>
</div>

@stop

@extends('navbarTop')

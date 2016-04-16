<!DOCTYPE html>
<html lang = "en">

@extends('navbarLeft')

@section('profileContent')

<head>
	<title> ProfileProperties</title>
	<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<link href="{!! asset('CSS/profileFavourites.css') !!}" media="all" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="{!! asset('JS/properties.js') !!}"></script>
   <script type="text/javascript" src="{!! asset('JS/profileFavourites.js') !!}"></script>

</head>

<body>

<div class = "pageTitle"> Profile Properties </div>

   <div class = "row" id = "buttonDiv">
      <div class = "col-xs-12">
         <label id = "warning"></label>
         <label id = "buttonHolder"></label>
         <labeL><button id = 'editButton' class = "btn btn-primary" value = "0" onclick="makeEditable(this)">edit</button></label>
	   </div>
   </div>


   <form name="formyform" method="post" action="profileProperties">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input id = "array" name="array" type="hidden" value="">
   @foreach($locations as $location)
      <div class = "row">   
         <div class = "col-xs-12 col-sm-12">
                     <table class = "table">
                        <tr>
                           <td class = "col-xs-2 col-sm-1 removeable"  name = {{$location->location_id}} ></div>
                           <td class = "col-xs-4 col-sm-5"><strong> {{$location->street_address}}, {{$location->city}} </strong></td>
                           <td class = "col-xs-3 col-sm-1">{{ $location->postal_code}}, {{ $location->country}}</td>
                           <td class = "col-xs-3 col-sm-2"><a href = '../ListingByProperty/{{$location->location_id}}'> View Associated Listings</a></td>
                        </tr>
                     </table>  
                 
         </div>
      </div>
   @endforeach
      
   </form>
@stop

@extends('navbarTop')

</body>
</html>
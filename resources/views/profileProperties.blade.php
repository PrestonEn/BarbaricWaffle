<!DOCTYPE html>
<html lang = "en">

@extends('navbarLeft')

@section('profileContent')

<head>
	<title> ProfileProperties</title>
	<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<link href="{!! asset('CSS/profileFavourites.css') !!}" media="all" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="{!! asset('JS/properties.js') !!}"></script>

</head>

<body>

<div class = "pageTitle"> Property Listings </div>

   <div class = "row" id = "buttonDiv">
      <div class = "col-xs-12">
         <label id = "buttonHolder"></label>
         <labeL><button id = 'editButton' class = "btn btn-primary" value = "0" onclick="makeEditable(this)">edit</button></label>
	   </div>
   </div>
<div class = "row">
   <div class = "col-xs-2" id = "remove">remove</div>
</div>

<div class = "row">
<div class = "col-xs-11">
@foreach($listings as $listing)
      @foreach($listing->listing_info as $list)
      @if($list->is_active == 1)
      <div class = "row">
      <div class = "col-xs-2 col-sm-1 removeable" name = {{$list->listing_id}}></div>
      <div class = "col-xs-10 col-sm-10">
                  <table class = "table">
                  <tr>
                     <td colspan = 2><strong> {{ $list->listing->location->street_address}}, {{ $list->listing->location->city}} </strong></td>
                     <td> {{ $list->listing->location->postal_code}}, {{ $list->listing->location->country}} 
                     </td>
                  </tr>
                  </table>  
              
      </div>
      @endif
      @endforeach
      @endforeach
    </div>
</div>
@stop

@extends('navbarTop')

</body>
</html>
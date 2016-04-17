<!DOCTYPE html>
<html lang = "en">

@extends('navbarLeft')

@section('profileContent')

<head>
	<title> ProfileSearches </title>
	<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<link href="{!! asset('CSS/profileSearches.css') !!}" media="all" rel="stylesheet" type="text/css" />
   <link href="{!! asset('CSS/profileFavourites.css') !!}" media="all" rel="stylesheet" type="text/css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script type="text/javascript" src="{!! asset('JS/profileSearches.js') !!}"></script>
   <script type="text/javascript" src="{!! asset('JS/profileFavourites.js') !!}"></script>

</head>

<body>

   <div class = "col-xs-12">

   <div class = "pageTitle"> Saved Searches </div>

   <div class = "row" id = "buttonDiv">
      <div class = "col-xs-12">
         <label id = "buttonHolder"></label>
         <labeL><button id = 'editButton' class = "btn btn-primary" value = "0" onclick="makeEditable(this)">edit</button></label>
      </div>
   </div>


   <form name="formyform" method="post" action="profileProperties">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input id = "array" name="array" type="hidden" value="">
   @foreach($search as $s)
      <div class = "row">   
         <div class = "col-xs-12 col-sm-12">
                     <table class = "table">
                        <tr>

                           <!--
                           'date_created_min',
                           'date_created_max',
                           'is_active',
                           'search_description',
                           'price_monthly_min',
                           'price_monthly_max',
                           'rental_length_months_min',
                           'rental_length_months_max',
                           'rental_available_from',
                           'rental_available_to',
                           'room_size_sqft_min',
                           'room_size_sqft_max',
                           'num_roommates_max',
                           
                           -->

                           <td class = "col-xs-2 col-sm-1 removeable searchCriteria"  name = {{$s->saved_search_id}} ></div>
                           <td class = "col-xs-3 col-sm-3">
                              <strong> Search Criteria </strong>
                              <ul class = "searchCriteria">
                              @if($s->date_created_min == null)<li> halllp</li> @endif

                              </ul>   
                           </td>
                           <td class = "col-xs-3 col-sm-3">
                              <strong id = "secondTitle"> Search Criteria </strong>
                              <ul class = "searchCriteria secondCol">
                              @if($s->allowed_dogs == 1) <li>Dogs Allowed</li>@endif
                              @if($s->allowed_cats == 1) <li>Cats Allowed</li>@endif
                              @if($s->allowed_other_pets == 1) <li>Other Pets Allowed</li>@endif
                              @if($s->owner_has_pets == 1) <li>Owner has Pets</li>@endif
                              @if($s->owner_has_pets == 0) <li>Owner doesn't have Pets</li>@endif
                              @if($s->owner_pays_electricity == 1) <li>Hydro Included</li>@endif
                              @if($s->owner_pays_water == 1) <li>Water Price Included</li>@endif
                              @if($s->owner_pays_internet == 1) <li>Internet Included</li>@endif
                              @if($s->has_yard == 1) <li>Property has Yard</li>@endif
                              @if($s->has_kitchen == 1) <li>Property has Kitchen</li>@endif
                              @if($s->has_furnishings == 1) <li>Property is Furnished</li>@endif
                              </ul>   
                           </td>
                           <td class = "col-xs-3 col-sm-1"></td>
                           <td class = "col-xs-2 col-sm-1 searchCriteria"><a href = '#'> View Associated Listings</a></td>
                        </tr>
                     </table>                
         </div>
      </div>
   @endforeach
      
   </form>

   <div id = "addProp"> Searches not meeting your criteria? <a href="../addProperty"> Add a new Saved Search</a></div>
   <div></div>

@stop

@extends('navbarTop')

</body>
</html>
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


   <form name="formyform" method="post" action="profileSearches">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input id = "array" name="array" type="hidden" value="">
   @foreach($search as $s)
      <div class = "row">   
         <div class = "col-xs-12 col-sm-12">
                     <table class = "table">
                        <tr>
                           <td class = "col-xs-2 col-sm-2 removeable searchCriteria"  name = {{$s->saved_search_id}} ></div>
                           <td class = "col-xs-3 col-sm-3">
                              <strong> Search Criteria </strong>
                              <ul class = "searchCriteria">
                                 <li> Min Price : {{$s->price_monthly_min}}</li>
                                 <li> Max Price : {{$s->price_monthly_max}}</li>

                              @if($s->rental_length_months_min != null)<li>Minimum Lease Length : {{$s->rental_length_months_min}}</li> @endif
                              @if($s->rental_length_months_max != null)<li>Maximum Lease Length : {{$s->rental_length_months_max}}</li> @endif
                              
                              @if($s->date_created_min != null)<li>Listing Posted After {{$s->date_created_min}}</li> @endif
                              @if($s->date_created_max != null)<li>Listing Posted Before {{$s->date_created_max}}</li> @endif

                              @if($s->rental_available_from != null)<li>Available From : {{$s->rental_available_from}}</li> @endif
                              @if($s->rental_available_to != null)<li>Available Until : {{$s->rental_available_to}}</li> @endif
                              
                              @if($s->room_size_sqft_min != null)<li>Minimum Square Footage : {{$s->room_size_sqft_min}}</li> @endif
                              @if($s->room_size_sqft_max != null)<li>Maximum Square Footage : {{$s->room_size_sqft_max}}</li> @endif

                              @if($s->num_roommates_max != null)<li>Maximum Desired Roommates : {{$s->num_roommates_max}}</li> @endif
                              </ul>   
                           </td>
                           <td class = "col-xs-3 col-sm-3">
                              <strong class = "secondTitle"> Search Criteria </strong>
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
                           <td class = "col-xs-1 col-sm-1"></td>
                           <td class = "col-xs-3 col-sm-3">
                              <strong class = "secondTitle"> Search Criteria </strong><br>
                           <div id="listingsLink" onclick='window.location="../mapListing"' class="searchCriteria"> View Associated Listings</div></td>
                        </tr>
                     </table>                
         </div>
      </div>
   @endforeach
      
   </form>

   <div id = "addProp"> Searches not meeting your criteria? <a href="#"> Add a new Saved Search</a></div>
   <div></div>

@stop

@extends('navbarTop')

</body>
</html>
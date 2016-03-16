<!DOCTYPE html>
<html lang = "en">

@extends('testing.navbarLeft')

@section('profileContent')

<head>
	<title> ProfileFavourites</title>
	<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<link href="{!! asset('CSS/profileFavourites.css') !!}" media="all" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="{!! asset('JS/profileFavourites.js') !!}"></script>

</head>

<body>

<div class = "pageTitle"> Favourite Listings </div>

   <div class = "row" id = "buttonDiv">
      <div class = "col-xs-12">
         <label id = "buttonHolder"></label>
         <labeL><button id = 'editButton' class = "btn btn-primary" value = "0" onclick="makeEditable(this)">edit</button></label>
	   </div>
   </div>



@foreach($listings as $listing)
      @foreach($listing->listing_info as $list)
      @if($list->is_active == 1)
      <div class = "col-md-4">
            <table class = "table">
               
                  <tr>
                     <th class = "removeable" colspan = 2> 
                        {{$list->listing_title}}
                     </th>
                  </tr>

                  <tr>
                     <td colspan = 2>
                        <img a class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
                     </td>   
                  </tr>         
    
                  <tr>
                     <td colspan = 2> {{ $list->listing->location->street_num}} {{ $list->listing->location->street_name}}, {{ $list->listing->location->city}} </td>
                  </tr>
              
                  <tr>
                     <td> Price </td>
                     <td class = "prices"> {{$list->price_monthly}}/month </td>
                  </tr>

                  <tr>
                     <td colspan = 2> Other feature we deem important </td>
                  </tr>

                  <tr>
                     <td class = "features">
                       @if ($list->has_kitchen)
                        <img class = "img-responsive" src="../images/kitchen.jpeg">
                       @endif

                       @if ($list->allowed_dogs || $list->allowed_cats || $list->allowed_other_pets)
                        <img class = "img-responsive" src="../images/pets.jpeg">
                       @endif

                       @if ($list->has_furnishings)
                        <img class = "img-responsive" src="../images/furnished.jpeg">
                       @endif

                       @if ($list->has_laundry)
                        <img class = "img-responsive" src="../images/laundry.jpeg">
                       @endif

                       @if (!$list->owner_pays_hydro)
                        <img class = "img-responsive" src="../images/water.jpeg">
                       @endif

                       @if (!$list->owner_pays_electricity)
                        <img class = "img-responsive" src="../images/hydro.jpeg">
                       @endif

                       @if (!$list->owner_pays_internet)
                        <img class = "img-responsive" src="../images/internet.jpeg">
                       @endif
                     </td>
                  </tr>

            </table> 
      </div>
      @endif
      @endforeach
      @endforeach

@stop

@extends('testing.navbarTop')

</body>
</html>
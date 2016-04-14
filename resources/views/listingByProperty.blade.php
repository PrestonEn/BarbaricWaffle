<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/listingsList.css') !!}" media="all" rel="stylesheet" type="text/css" />
 
  @extends('navbarTop')

  @section('content')

  
  <div id = "test">
  </div>

  <div class = "pageTitle">
    Available Properties
  </div>


  <div class = "pageBody row">

      @foreach ($listingInfo as $listing)


      <div class = "listing col-xs-12" onclick="window.location = '../../houseTemplate/{{$listing->listing_id}}'">
        <div class = "col-xs-12 col-sm-4">
        <img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
        </div>
        <div class = "col-xs-12 col-sm-8">
            <table class = "table table-condensed">
              <tr>
                <th colspan = 2>{{$listing->listing_title}} </th>
              </tr>
    
              <tr>
                <td colspan = 2><em> {{ $listing->listing->location->street_address}}, {{ $listing->listing->location->city}}</em></td>
              </tr>
              
              <tr>
                <td> {{ $listing->price_description }} </td>
                <td> <strong>{{$listing->price_monthly}}/mth </strong></td>
              </tr>

              <tr>
                <td colspan= 2>  <strong> Available from : </strong> {{$listing->rental_available_from}} 
                &nbsp &nbsp &nbsp<strong> To : </strong> {{$listing->rental_available_to}} 
                &nbsp &nbsp &nbsp<strong> Min. Lease : </strong> {{$listing->rental_length_months_min}} months
              </td>
                
              </tr>

              <tr>
                <td class = "features">
                 @if ($listing->has_kitchen)
                  <img class = "img-responsive" src="../images/kitchen.jpeg">
                 @endif

                 @if ($listing->allowed_dogs || $listing->allowed_cats || $listing->allowed_other_pets)
                  <img class = "img-responsive" src="../images/pets.jpeg">
                 @endif

                 @if ($listing->has_furnishings)
                  <img class = "img-responsive" src="../images/furnished.jpeg">
                 @endif

                 @if ($listing->has_laundry)
                  <img class = "img-responsive" src="../images/laundry.jpeg">
                 @endif

                 @if ($listing->owner_pays_hydro)
                  <img class = "img-responsive" src="../images/water.jpeg">
                 @endif

                 @if ($listing->owner_pays_electricity)
                  <img class = "img-responsive" src="../images/hydro.jpeg">
                 @endif

                 @if ($listing->owner_pays_internet)
                  <img class = "img-responsive" src="../images/internet.jpeg">
                 @endif
                </td>
              </tr>

              <tr>
                <td id = "description">
                   {{$listing->listing_description}} 
                </td>
              </tr>
            </table> 
          </div>
        </div>  
      @endforeach
    
  </div>


  @stop




<script type="text/javascript" src="{!! asset('JS/listingsList.js') !!}"></script> 



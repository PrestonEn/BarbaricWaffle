<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/listingsList.css') !!}" media="all" rel="stylesheet" type="text/css" />
 
  @extends('navbarTop')

  @section('content')

  <br>
  <div class = "pageTitle">
    Listings Meeting Search Criteria
  </div>
  <br>

  <div class = "pageBody row">

      @if (count($listings)==0)
      <div class = "center">No Listings to display - <a href="../mapListing">Create new Saved Search?</a></div>
      @endif
      @foreach ($listings as $list)

      <div class = "listing col-xs-12" onclick="window.location = '../../houseTemplate/{{$list->listing_id}}'">
        <div class = "col-xs-12 col-sm-4">
        <img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
        </div>
        <div class = "col-xs-12 col-sm-8">
            <table class = "table table-condensed">
              <tr>
                <th colspan = 2>{{$list->listing_title}} </th>
              </tr>
    
              <tr>
                <td colspan = 2><em> {{ $list->listing->location->street_address}}, {{ $list->listing->location->city}}</em></td>
              </tr>
              
              <tr>
                <td> {{ $list->price_description }} </td>
                <td> <strong>{{$list->price_monthly}}/mth </strong></td>
              </tr>

              <tr>
                <td colspan= 2>  <strong> Available from : </strong> {{$list->rental_available_from}} 
                &nbsp &nbsp &nbsp<strong> To : </strong> {{$list->rental_available_to}} 
                &nbsp &nbsp &nbsp<strong> Min. Lease : </strong> {{$list->rental_length_months_min}} months
              </td>
                
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

                 @if ($list->owner_pays_hydro)
                  <img class = "img-responsive" src="../images/water.jpeg">
                 @endif

                 @if ($list->owner_pays_electricity)
                  <img class = "img-responsive" src="../images/hydro.jpeg">
                 @endif

                 @if ($list->owner_pays_internet)
                  <img class = "img-responsive" src="../images/internet.jpeg">
                 @endif
                </td>
              </tr>

              <tr>
                <td id = "description">
                   {{$list->listing_description}} 
                </td>
              </tr>
            </table> 
          </div>
        </div>  
    @endforeach
    
  </div>


  @stop




<script type="text/javascript" src="{!! asset('JS/listingsList.js') !!}"></script> 



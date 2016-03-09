<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/listingsList.css') !!}" media="all" rel="stylesheet" type="text/css" />
 


  @extends('testing.navbarTop')

  @section('content')

  <div id = "test">
  </div>

  <div class = "pageTitle">
    Available Properties
  </div>

  <div class = "pageBar row">
    <div class = "col-xs-6 col-sm-4">
      <strong> Listings Found : </strong> {{ $num }} 
    </div>
    <div id = "selDiv" class = "col-xs-6 col-sm-4">
      Sort by:
      <select>
        <option> Most Recent </option>
        <option> Lowest Price </option>
        <option> Highest Price </option>
      </select>
    </div>
    <div  id = "refineDiv" class = "panel panel-default col-xs-5 col-sm-4">
      <table class="table-condensed">
        <tr> <th> Search Listings </th></tr>
        <tr> <td> <input type="text" name = "searchVal"> <button class="btn btn-sm" type = "submit" onClick="#">search</button> </td> </tr>
        <tr> <td> Some additional Search properties here </td> </tr>
      </table>
    </div>
  </div>


  <div class = "pageBody row">

      @foreach ($listingInfo as $listing)


      <div class = "listing col-xs-12">
        <div class = "col-xs-12 col-sm-4">
        <img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
        </div>
        <div class = "col-xs-12 col-sm-8">
            <table class = "table table-condensed">
              <tr>
                <th colspan = 2>{{$listing->listing_title}} </th>
              </tr>
    
              <tr>
                <td colspan = 2><em> {{ $listing->listing->location->street_num}} {{ $listing->listing->location->street_name}}, {{ $listing->listing->location->city}}</em></td>
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
                  <img style = "height:3vmax;width:3vmax;float:left;" class = "img-responsive" src="../images/kitchen.jpeg">
                 @endif

                 @if ($listing->allowed_dogs || $listing->allowed_cats || $listing->allowed_other_pets)
                  <img style = "height:3vmax;width:3vmax;float:left" class = "img-responsive" src="../images/pets.jpeg">
                 @endif

                 @if ($listing->has_furnishings)
                  <img style = "height:3vmax;width:3vmax;float:left" class = "img-responsive" src="../images/furnished.jpeg">
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



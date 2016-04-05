<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/mapListing.css') !!}" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{!! asset('JS/map.js') !!}"></script>


  @extends('navbarTop')

  @section('content')



  <div class = "row">
    <div id = "col1" class = "col-md-8 col-sm-12 col-xs-12">
    </div>

    <div id = "col2" class = "col-md-4 col-sm-0 col-xs-0">
      
      @foreach($listingInfo as $listing)
      <div id = "subrow" class = "row">
          
          <div class = "col-xs-6" onclick="window.location = '../../houseTemplate/{{$listing->listing_id}}'">
            <div id = "eg1">
                <img class = "housePic img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
            </div>
          </div>
          
          <div class = "col-xs-6">
            <table class = "table table-condensed" style = "border-width: 20px;">
              <tr>
                <th colspan = 2><label id="title"> {{$listing->listing_title}} </label></th>
              </tr>
    
              <tr>
                <td colspan = 2> {{ $listing->listing->location->street_num}} {{ $listing->listing->location->street_name}}, {{ $listing->listing->location->city}} </td>
              </tr>
              
              <tr>
                <td> Price </td>
                <td> {{$listing->price_monthly}}/mth </td>
              </tr>

              <tr>
                <td colspan = 2> Other feature we deem important </td>
              </tr>

              <tr>
                <td class = "features"> 
                  @if ($listing->has_kitchen)
                  <img class = "feature" src="../images/kitchen.jpeg">
                 @endif

                 @if ($listing->allowed_dogs || $listing->allowed_cats || $listing->allowed_other_pets)
                  <img class = "feature" src="../images/pets.jpeg">
                 @endif

                 @if ($listing->has_furnishings)
                  <img class = "feature" src="../images/furnished.jpeg">
                 @endif

                 @if ($listing->has_laundry)
                  <img class = "feature" src="../images/laundry.jpeg">
                 @endif

                 @if ($listing->owner_pays_hydro)
                  <img class = "feature" src="../images/water.jpeg">
                 @endif

                 @if ($listing->owner_pays_electricity)
                  <img class = "feature" src="../images/hydro.jpeg">
                 @endif

                 @if ($listing->owner_pays_internet)
                  <img class = "feature" src="../images/internet.jpeg">
                 @endif </td>
              </tr>

             </table> 
          </div>
      </div>
      @endforeach

    </div>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5TYaJ1DT_MLRMhkoN6FKknWTkMh5Rg6Q&callback=load"></script>
    <?php
      $i = 0;
      $arr = array();
      $ids = array();
      foreach ($listingInfo as $listing) {
        $l = $listing->listing->location;
        $address = "$l->street_num $l->street_name, $l->city, $l->country, $l->postal_code";
        $arr[$i] = $address;
        $ids[$i] = $listing->listing_id;
        $i = $i+1;
      };
    ?>

    <script> 
    function load(){
      var arr = <?php echo '["' . implode('", "', $arr) . '"]'; ?>;
      var ids = <?php echo '["' . implode('", "', $ids) . '"]'; ?>;
      google.maps.event.addDomListener(window,'load',function(){initMap(arr, ids)})
    }
    </script>










  @stop

  




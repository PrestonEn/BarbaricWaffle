<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/mapListing.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/mainMapSearches.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/nouislider.css') !!}" media="all" rel="stylesheet" type="text/css" />

@extends('navbarTop') @section('content')
<div class="row">
    <div id="col1" class="col-md-8 col-sm-12 col-xs-12">
        
        
    </div>
    <div id = "col2" class = "col-md-4 col-sm-0 col-xs-0">
        <div id = "sideBar">
        </div>
    </div>


      <div id = "modalButtonHolder">
        <button type="button" id = "modalButton" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Refine Search</button>
      </div>

      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div id = "search">

              <form id = "searchFilter" action="#" method="#">
              <div class = "row panel panel-default">

              <div class = "row" id = "centerText">
                <h2> Search Refinement </h2>
              </div>  


                <div class = "row">
                  <div class = 'col-sm-1'></div>
                  <div class = "col-sm-4">
                    <label class = "textLabel"> Region </label>
                    <select name = "region">
                        @foreach($location as $loc)
                        <option> {{$loc->city}} </option>
                        @endforeach
                        
                      </select>
                  </div>
                  
                    
                </div>

                <div class = "row">
                  <div class = "col-sm-1"></div>
                  <div class = "col-sm-2">
                    <label> Min. Price: </label>
                    <label id = "lower">test</label>
                  </div>
                  <div class = "col-xs-10 col-sm-6">
                    <div id = "slider"></div>
                  </div>
                  <div class = "col-xs-6 col-sm-3"></div>
                  <div class = "col-xs-12 col-sm-3">
                    <label> Max. Price: </label>
                    <label id = "upper">test</label>
                  </div>
                </div>
                <div class = "row">
                  <div class = 'col-sm-1'></div>
                  <div class = "col-sm-11">
                        <label class = "textLabel"> Pet Friendly </label>
                        <label class="radio-inline"><input type="radio" id = "pets" name="pets" onClick="getFurther(value)">Yes</label>
                        <label class="radio-inline"><input type="radio" name="pets">No</label>
                        <label class="radio-inline"><input type="radio" name="pets">Don' care</label>  
                    
                  </div>
                </div>

                <div class = "row">
                  <div class = "col-sm-3"></div>
                  <div id = "petsBox" class = "col-sm-8">
                    <div class = "col-sm-6">
                      <label class = "textLabel">Dogs</label>
                      <input id = "dogs" type = "checkbox" name = "dogs">
                    </div>
                    <div class = "col-sm-6">
                      <label class = "textLabel">Cats</label>
                      <input id = "cats" type = "checkbox" name = "cats">
                    </div>
                    <div class = "col-sm-6">
                      <label class = "textLabel">Dogs</label>
                      <input id = "other" type = "checkbox" name = "other">
                    </div>
                  </div>
                </div>


                <div class = "row">
                  <div class = "col-sm-1"></div>
                  <div class = "col-sm-2"><strong> Included in Price</strong></div>
                  <div class = "col-sm-8">
                    <div class = "col-sm-6">
                      <label class = "textLabel">Kitchen</label>
                      <input id = "hasKitchen" type = "checkbox" name = "hasKitchen" checked="checked">
                    </div>
                    <div class = "col-sm-6">
                      <label class = "textLabel">Hydro</label>
                      <input id = "hydro" type = "checkbox" name = "hydro" checked="checked">
                    </div>
                    <div class = "col-sm-6">
                      <label class = "textLabel">Internet</label>
                      <input id = "internet" type = "checkbox" name = "internet" checked="checked">
                    </div>
                    <div class = "col-sm-6">
                      <label class = "textLabel">Water</label>
                      <input id = "water" type = "checkbox" name = "water" checked="checked">
                    </div>
                  </div>
                </div>

                <div class = "row">
                  <div class = 'col-sm-1'></div>
                  <div class = "col-sm-2"><strong> Room Level</strong></div>
                    <div class = "col-sm-6">
                    <select name = "rmLevel">
                      <option value = "">Any</option>
                      <option value = "basement">Basement</option>
                      <option value = "mainFloor">Main Floor</option>
                      <option value = "upper">Upper Floors</option>
                    </select>
                    </div>
                </div>

                    <div class = "row">
                      <div class = "col-sm-1"></div>
                      <div class = "col-sm-2"><strong>Laundry</strong></div>
                      <div class = "col-sm-6">
                      <select name = "Laundry">
                        <option value = ""> Any </option>
                        <option value = "coinOper"> On Site (coin operated) </option>
                        <option value = "noCost"> On Site (no cost) </option>
                        <option value = "n/a"> Unavailable </option>
                      </select>
                    </div>
                </div>

                <div class = "row">
                  <div class = "col-sm-1"></div>
                  <div class = "col-sm-2"><strong> Max. Number of Roommates</strong></div>
                    <div class = "col-sm-6">
                      <select name = "MaxNumRoommates">
                        <option value = "any"> Any </option>
                        <option value = "99"> 6+ </option>
                        <option value = "5"> 5 </option>
                        <option value = "4"> 4 </option>
                        <option value = "3"> 3 </option>
                        <option value = "2"> 2 </option>
                        <option value = "1"> 1  </option>
                      </select>
                    </div>
                  </div>
                  <div class = "row">
                      <div class = "col-sm-1"></div>
                      <div class = "col-sm-4">
                            <p>rooms</p>
                            <input type = "text" name = "rooms" />
                      </div>
                      <div class = "col-sm-4">
                          <p>Bathrooms</p>
                          <input type = "text" name = "bathrooms" />
                      </div>
                  
                  </div>



                <div class = "row">
                  <div class = "col-xs-10"></div>
                  <div class = "col-xs-2">
                  <button onClick="searchFilters(event)" class="btn btn-default">Submit</button>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5TYaJ1DT_MLRMhkoN6FKknWTkMh5Rg6Q&callback=load"></script>
    <?php
        $i = 0;
        $lat = array();
        $lon = array();
        $ids = array();
        $price = array();
        $title = array();
        $long = array();
        $lat = array();
        $arr = array();

        foreach ($listingInfo as $listing) {
            $l = $listing->listing->location;
            $address = "$l->street_address, $l->city, $l->country, $l->postal_code";
              
            $long[$i] = $l->longitude;
            $lat[$i] = $l->latitude;
            $arr[$i] = $address;
            $ids[$i] = $listing->listing_id;
            $price[$i] = $listing->price_monthly;
            $title[$i] = $listing->listing_title;
            $i = $i+1;
        };
    ?>

    <script>
        function load() {
            var arr = <?php echo '["' . implode('", "', $arr) . '"]'; ?>;
            var ids = <?php echo '["' . implode('", "', $ids) . '"]'; ?>;
            var price = <?php echo '["' . implode('", "', $price) . '"]'; ?>;
            var title = <?php echo '["' . implode('", "', $title) . '"]'; ?>;
            var long = <?php echo '["' . implode('", "', $long) . '"]'; ?>;
            var lat = <?php echo '["' . implode('", "', $lat) . '"]'; ?>;
           
            google.maps.event.addDomListener(window, 'load', function () {
                initMap(arr, ids, price, title, long, lat)
            })
        }  
    </script>

<script type="text/javascript" src="{!! asset('JS/nouislider.js') !!}"></script>
    
<script type="text/javascript" src="{!! asset('JS/addSearches.js') !!}"></script>
<script type="text/javascript" src="{!! asset('JS/map.js') !!}"></script>
        
@stop
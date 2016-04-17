<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/mapListing.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/addSearches.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/nouislider.css') !!}" media="all" rel="stylesheet" type="text/css" /> @extends('navbarTop') @section('content')
<div class="row">
    <div id="col1" class="col-md-8 col-sm-12 col-xs-12">


    </div>
    <div id="col2" class="col-md-4 col-sm-0 col-xs-0">
        <div id="sideBar">
        </div>
    </div>


    <div id="modalButtonHolder">
        <button type="button" id="modalButton" class="customButton btn btn-primary" data-toggle="modal" data-target="#myModal">Refine Search</button>

    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Search Filters</h4>
                </div>
                <div class="modal-body">
                    <div class="customContainer" id="search">
                        <form id="searchFilter" action="#" method="#">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label class="textLabel"> Saved Searches</label>
                                    @if($savedSearch != null && $savedSearch->count() != 0)
                                        <select onchange="updateSearch(this)" id = "savedSearch" class="form-control" name="savedSearch">
                                        <option></option>
                                            @foreach($savedSearch as $saved)

                                            <script>
                                                $(document).ready(function () {
                                                    var obj = <?php echo json_encode($saved); ?>;
                                                    passToArray(obj);
                                                });
                                            </script>

                                            <option value="{{$saved->saved_search_id}}"> {{$saved->city}} </option>

                                            @endforeach
                                        </select>
                                    @elseif(!Auth::check())
                                        <p>Make an account to save searches!</p>
                                    @else
                                        <p>No Saved Searches!</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-3">
                                    <label class="textLabel"> Country </label>
                                    <select onchange="getCitiesFromCountry(this)" class="form-control" id = "country" name="country">
                                        <option value = "all">All</option>
                                        @foreach($location as $loc)
                                        <option value = "{{$loc->country}}"> {{$loc->country}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label class="textLabel"> City </label>
                                    <select disabled class="form-control" id = "region" name="region">
                                        
                                    </select>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label class="textLabel"> Rooms </label>
                                    <input class="form-control" type="text" name="rooms" />
                                </div>
                                <div class="form-group col-sm-3">
                                    <label class="textLabel"> Bathroom </label>
                                    <input class="form-control" type="text" name="bathrooms" />
                                </div>
                            </div>
                            <div class="row slider">
                                <div class="col-sm-2">
                                    <label> Min. Price: </label>
                                    <label id="lower">test</label>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div id="slider"></div>
                                </div>
                                <div class="col-xs-6 col-sm-3"></div>
                                <div class="col-xs-12 col-sm-3">
                                    <label> Max. Price: </label>
                                    <label id="upper">test</label>
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Pets</label>

                                    <div class="col-sm-10 columns">
                                        <span class="additional-info-wrap">        
                                        <label class="radio-inline petsRadioButton">  
                                            <input type="radio" name="pets" id="pets" value="Grape">Yes                       
                                        </label>                         
                                        <div class="additional-info hide">
                                            <label class="inner radio-inline petsRadioButton">
                                                <input type="checkbox" id="dog" name="dogs"/>Dog
                                            </label>
                                            <label class="inner radio-inline petsRadioButton">
                                                <input type="checkbox" id="cat" name="cats" />Cat
                                            </label>
                                            <label class="inner radio-inlin petsRadioButtone">
                                                <input type="checkbox" id="other" name="other" />Other
                                            </label>
                                        </div>                    
                                        </span>

                                        <label class="radio-inline petsRadioButton">
                                            <input type="radio" name="pets" value="0"> No
                                        </label>
                                        <label class="checked radio-inline petsRadioButton">
                                            <input type="radio" name="pets" value="" checked="checked"> Dont' Care
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <h3>Amenities you want</h3>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-4 columns form-group">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="internet">Free Internet
                                        </label>
                                    </div>

                                    <div class="col-sm-4 columns form-group">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="hasKitchen">Kitchen
                                        </label>
                                    </div>
                                    <div class="col-sm-4 columns form-group">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="hydro"> Free Hydro
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-4 columns form-group">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="water"> Free Electricity
                                        </label>
                                    </div>
                                    <div class="col-sm-4 columns form-group">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="smokeFree"> Smoke Free
                                        </label>
                                    </div>
                                    <div class="col-sm-4 columns form-group">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="smokeFree"> Smoke Free
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-4 columns form-group">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="furnished"> Furnished
                                        </label>
                                    </div>
                                    <div class="col-sm-4 columns form-group">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="wheelChair"> Wheelchair Accessible
                                        </label>
                                    </div>
                                    <div class="col-sm-4 columns form-group">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="parking"> Free Parking
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <br />
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label class="textLabel">Room Level</label>
                                        <select class="form-control" name="rmLevel">
                                            <option value="any">Any</option>
                                            <option value="basement">Basement</option>
                                            <option value="mainFloor">Main Floor</option>
                                            <option value="upper">Upper Floors</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class=" col-sm-4">
                                        <label class="textLabel">Laundry</label>
                                        <select class="form-control" name="Laundry">
                                            <option value="any"> Any </option>
                                            <option value="coinOper"> On Site (coin operated) </option>
                                            <option value="noCost"> On Site (no cost) </option>
                                            <option value="na"> Unavailable </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">

                                    <div class="col-sm-4">
                                        <label class="textLabel"># roomates</label>
                                        <select id = "maxRoommates" class="form-control" name="MaxNumRoommates">
                                            <option value="99"> Any </option>
                                            <option value="6"> 6 </option>
                                            <option value="5"> 5 </option>
                                            <option value="4"> 4 </option>
                                            <option value="3"> 3 </option>
                                            <option value="2"> 2 </option>
                                            <option value="1"> 1 </option>
                                            <option value="0"> 0 </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <button onClick="searchFilters(event)" class="btn btn-primary position button1">Submit</button>
                                    <button onClick="saveSearch(event)" class="btn btn-primary position button1">Save Search</button>

                                </div>



                            </div>
                        </form>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5TYaJ1DT_MLRMhkoN6FKknWTkMh5Rg6Q"></script>


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
            google.maps.event.addDomListener(window, 'load', function () {
                load();
            });

            function load() {
                var arr = <?php echo '["' . implode('", "', $arr) . '"]'; ?>;
                var ids = <?php echo '["' . implode('", "', $ids) . '"]'; ?>;
                var price = <?php echo '["' . implode('", "', $price) . '"]'; ?>;
                var title = <?php echo '["' . implode('", "', $title) . '"]'; ?>;
                var long = <?php echo '["' . implode('", "', $long) . '"]'; ?>;
                var lat = <?php echo '["' . implode('", "', $lat) . '"]'; ?>;

                initMap(arr, ids, price, title, long, lat)
            }
        </script>

        <script type="text/javascript" src="{!! asset('JS/nouislider.js') !!}"></script>

        <script type="text/javascript" src="{!! asset('JS/addSearches.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('JS/map.js') !!}"></script>
        <script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerwithlabel/src/markerwithlabel.js"></script>

        @stop
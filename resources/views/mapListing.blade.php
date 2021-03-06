<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/mapListing.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/addSearches.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/nouislider.css') !!}" media="all" rel="stylesheet" type="text/css" /> @extends('navbarTop') 
@section('content')
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
                                    <select onchange="updateSearch(this)" id="savedSearch" class="form-control" name="savedSearch">
                                        <option></option>
                                        @foreach($savedSearch as $saved)

                                        <script>
                                            $(document).ready(function () {
                                                var obj = <?php echo json_encode($saved); ?>;
                                                passToArray(obj);
                                            });
                                        </script>

                                        <option value="{{$saved->saved_search_id}}"> {{$saved->city}}, {{$saved->country}} </option>

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
                                    <select onchange="getCitiesFromCountry(this.value)" class="form-control" id="country" name="country">
                                        <option value="all">All</option>
                                        @foreach($location as $loc)
                                        <option value="{{$loc->country}}"> {{$loc->country}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label class="textLabel"> City </label>
                                    <select disabled class="form-control" id="region" name="region">

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


                                <label class="col-sm-2 control-label">Pets</label>

                                <div class="col-sm-10 columns">
                                    <div class="col-sm-3 columns form-group">
                                        <label class="checkbox-inline">
                                            <input class="yespets" type="checkbox" name="dogs">Dogs
                                        </label>
                                    </div>

                                    <div class="col-sm-3 columns form-group">
                                        <label class="checkbox-inline">
                                            <input class="yespets" type="checkbox" name="cats">Cats
                                        </label>
                                    </div>
                                    <div class="col-sm-3 columns form-group">
                                        <label class="checkbox-inline">
                                            <input class="yespets" type="checkbox" name="other">Other Pets
                                        </label>
                                    </div>
                                    <div class="col-sm-3 columns form-group">
                                        <label class="checkbox-inline">
                                            <input id="nopets" type="checkbox" name="nopets">No Pets
                                        </label>
                                    </div>

                                </div>
                                <script>
                                    $(document).ready(function () {
                                        $(".yespets").change(function () {
                                            if (this.checked) {
                                                $("input[name='nopets']").prop("checked",false);
                                                updateCheckBoxes();
                                            }
                                        });
                                         $("#nopets").change(function () {
                                            if (this.checked) {
                                                $("input[name='dogs']").prop("checked",false);
                                                $("input[name='cats']").prop("checked",false);
                                                $("input[name='other']").prop("checked",false);
                                                updateCheckBoxes();
                                            }
                                        });
                                        
                                    });
                                </script>

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
                                            <input type="checkbox" name="smoke"> Smoke Free
                                        </label>
                                    </div>
                                    <div class="col-sm-4 columns form-group">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="yard"> Yard
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
                                            <input type="checkbox" name="laundry"> Onsite Laundry
                                        </label>
                                    </div>
                                    
                                </div>

                            </div>

                            <br />

                            <div class="row">
                                <div class="form-group">

                                    <div class="col-sm-4">
                                        <label class="textLabel"># roomates</label>
                                        <select id="maxRoommates" class="form-control" name="MaxNumRoommates">
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
                                    <button onClick="clearForm(event)" class="btn btn-primary position button1">Clear Form</button>
                                    @if(Auth::check())
                                    <button onClick="saveSearch(event)" class="btn btn-primary position button1">Save Search</button>
                                    @else
                                    <button type="button" id="logInModalButton" class="btn btn-primary position button1">Save Search</button>
                                    <script>
                                        $(document).ready(function () {
                                            $("#logInModalButton").click(function () {

                                                $('#logInModal').modal('show');
                                            });
                                        });
                                    </script>
                                    @endif
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


    <div class="modal fade" id="logInModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Log In</h4>
                </div>
                <div class="modal-body">
                    <p>Please log in</p>
                    <br/>
                    <form action="signIn" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="row">
                            <div class="col-xs-1 col-sm-2 col-md-3"></div>
                            <div class="col-xs-10 col-sm-8 col-md-6">
                                Email :
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-1 col-sm-2 col-md-3"></div>
                            <div class="col-xs-10 col-sm-8 col-md-6">
                                Password :
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-1 col-sm-2 col-md-3"></div>
                            <div class="col-xs-7 col-sm-5 col-md-4">
                                <button type="submit" class="btn btn-default"> Sign In </button>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-2">
                                <a href="../passwordRetrieval" id="forgotPass"> Forgot your password? </a>
                            </div>
                        </div>


                        <div class="row" id="registerInquiry">
                            <div class="col-xs-1 col-sm-2 col-md-3"></div>
                            <div class="col-xs-10 col-sm-8 col-md-6">
                                <div class="panel panel-default">
                                    Not Yet Registered? <a href="../signUp"> Sign up </a>
                                </div>
                            </div>
                        </div>


                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
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
    <script type="text/javascript" src="{!! asset('JS/markerCluster.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('JS/map.js') !!}"></script>
    <script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerwithlabel/src/markerwithlabel.js"></script>

    @stop
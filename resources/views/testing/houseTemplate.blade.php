<link href="{!! asset('CSS/houseTemplate.css') !!}" media="all" rel="stylesheet" type="text/css" /> 
<script type="text/javascript" src="{!! asset('JS/map.js') !!}"></script>

@extends('testing.navbarTop') @section('content')

<div class="customWidth">
    <div class="row">
        <div class="col-sm-3">
            <h4>4010 Dundas West Toronto, ON</h4>
            <h1>$1,000,000</h1>
            <h4 class="style">4 Bedrooms</h4>
            <h4>3+ Bathrooms</h4>
            <p>Added to our website 28 days ago</p>
            <p class="mls">MLS®: N3232412</p>

        </div>
        <div class="col-sm-6">
            <div class="imgGallery"></div>
            <div id="requestViewing" class="button col-sm-5">Request Viewing</div>
            <div id="requestInfo" class="button col-sm-5">Request Info</div>
            <div id="callNow" class="button col-sm-2">Call Now!</div>
            <div class="row">
                <div class="col-sm-12">
                    <h4>Description</h4>
                    <p>Hello, thank you for visitngLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu iaculis lectus, a condimentum eros. Cras sit amet diam et nunc malesuada scelerisque. Proin finibus odio sed fermentum pharetra. Proin in pellentesque.a condimentum eros. Cras sit amet diam et nunc malesuada scelerisque. Proin finibus odio sed fermentum pharetra. Proin in pellentesque.</p>
                    <p id="features">Features +</p>
                    <div class="features hideFeatures" id="outer">
                        <div id="inner">
                            <ul>
                                <li>Air Conditioning</li>
                                <li>Free Cable</li>
                                <li>Free Internet</li>
                                <li>Heating Included</li>
                                <li>Hydro Included</li>

                            </ul>

                        </div>
                    </div>


                    <hr/>

                </div>
            </div>
            <div class="row landlordProfile">
                <div class="col-sm-12 margin">
                    <h4>Properties Contact profile</h4>
                </div>
                <div class="col-sm-5">
                    <div class="profile"></div>
                </div>
                <div class="col-sm-7">
                    <h2>Jeff Yang</h2>
                    <p>Joined 1 day ago</p>

                    <p class="col-sm-6" id="sendMessage">Send a message</p>
                    <p class="col-sm-6" id="viewProfile">View Profile</p>

                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <h4>Similar Listings</h4>
            <div class="col-sm-12 similarListing">
            </div>
            <div class="col-sm-12 similarListing">
            </div>
            <div class="col-sm-12 similarListing">
            </div>

        </div>
    </div>
</div>


<script type="text/javascript" src="{!! asset('JS/houseTemplate.js') !!}"></script>



@stop
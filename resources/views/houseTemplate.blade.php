<link href="{!! asset('CSS/houseTemplate.css') !!}" media="all" rel="stylesheet" type="text/css" /> 

@extends('navbarTop') 

@section('content')

<div class="customWidth">
    <div class="row">
        <div class="col-sm-3">
            <h4>
                {{ $listingInfo->listing->location->street_address}}
                </br>{{ $listingInfo->listing->location->city}}, {{$listingInfo->listing->location->province}}
                @if ( $listingInfo->unit )
                    </br> Unit {{ $listingInfo->unit }} 
                @endif
            </h4>
            <h1>${{$listingInfo->price_monthly}}/mth</h1>
            <h4 class="style">
                {{$listingInfo->num_bedrooms_total}} Bedrooms, {{$listingInfo->num_bathrooms_total}} Bathrooms
                </br>
            </h4>
            <p>Added to our website 
                @if($date == 0)
                    today 
                @else
                    {{$date}} day(s) ago</p>
                @endif
            <p class="mls">MLS®: {{ $listingInfo->mls_number }}</p>

        </div>
        <div class="col-sm-6">
            <div class="imgGallery"></div>
            <div id="saveToFavourites" class="button col-sm-6" onClick="window.location ='../profileFavourites/{{$listingInfo->listing->listing_id}}'">Save to Favourites</div>
            <div id="callNow" class="button col-sm-6"><a id = "callNowLink"alt="Call Listing Owner" href="tel:{{$user->phone}}">Call Now!</a></div>
            <div class="row">
                <div class="col-sm-12">
                    <h4>Description</h4>
                    <p> {{$listingInfo->listing_description}}</p>
                    <p id="features">Features +</p>
                    <div class="features hidefeatures" id="outer">
                        <div id="inner">
                            <ul>
                                @if ($listingInfo->has_kitchen)
                                <li>Kitchen Access</li>
                                @endif
                                @if ($listingInfo->has_laundry)
                                <li>Laundry included</li>
                                @endif
                                @if ($listingInfo->owner_pays_internet)
                                <li>Free Internet</li>
                                @endif
                                @if ($listingInfo->owner_pays_water)
                                <li>Water bill paid</li>
                                @endif
                                @if ($listingInfo->owner_pays_hydro)
                                <li>Hydro Included</li>
                                @endif
                            </ul>
                        </div>
                    </div>


                    <hr/>

                </div>
            </div>
            <div class="row landlordProfile">
                <!--<div class="col-sm-12 margin">
                    <h4>Properties Contact profile</h4>
                </div>-->
                <div class="col-sm-5">
                    <div class="profile"></div>
                </div>
                <div class="col-sm-7">
                    <h2>{{ $listingInfo->listing->location->user->first_name}} {{ $listingInfo->listing->location->user->last_name}}</h2>
                    <p>Joined {{ $listingInfo->listing->location->user->created_at->diffInDays()}} day(s) ago</p>



                    <p class="col-sm-6" id="sendMessage">Send a message</p>
                    <p class="col-sm-6" id="viewProfile"><a alt="Navigate to rentors profile" href="../../profileView/{{$user->user_id}}">View Profile</a></p>

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



<script type="text/javascript" src="{!! asset('JS/map.js') !!}"></script>
<script type="text/javascript" src="{!! asset('JS/houseTemplate.js') !!}"></script>


@stop
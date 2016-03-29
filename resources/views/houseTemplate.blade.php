<link href="{!! asset('CSS/houseTemplate.css') !!}" media="all" rel="stylesheet" type="text/css" /> 


@extends('navbarTop') @section('content')

<div class="customWidth">
    <div class="row">
        <div class="col-sm-3">
            <h4>{{ $listingInfo->listing->location->street_num}} {{ $listingInfo->listing->location->street_name}} {{ $listingInfo->listing->location->city}}, {{$listingInfo->listing->location->province}}</h4>
            <h1>${{$listingInfo->price_monthly}}/mth</h1>
            <h4 class="style">{{$listingInfo->num_bedrooms_total}} Bedrooms</h4>
            <h4>{{$listingInfo->num_bathrooms_total}} Bathrooms</h4>
            <p>Added to our website 

                @if($date==0)
                today 
                @else
                {{$date}} day(s) ago</p>
                @endif
            <p class="mls">MLS®: {{ $listingInfo->mls_number }}</p>

        </div>
        <div class="col-sm-6">
            <div class="imgGallery"></div>
            <div id="requestViewing" class="button col-sm-5">Request Viewing</div>
            <div id="requestInfo" class="button col-sm-5">Request Info</div>
            <div id="callNow" class="button col-sm-2">Call Now!</div>
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
                <div class="col-sm-12 margin">
                    <h4>Properties Contact profile</h4>
                </div>
                <div class="col-sm-5">
                    <div class="profile"></div>
                </div>
                <div class="col-sm-7">
                    <h2>{{ $listingInfo->listing->user->first_name}} {{ $listingInfo->listing->user->last_name}}</h2>
                    <p>Joined {{ $listingInfo->listing->user->created_at->diffInDays()}} day(s) ago</p>



                    <p class="col-sm-6" id="sendMessage">Send a message</p>
                    <p class="col-sm-6" id="viewProfile"><a alt="Navigate to rentors profile" href="../../profileView/{{$listingInfo->listing->user->user_id}}">View Profile</a></p>

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
<link href="{!! asset('CSS/houseTemplate.css') !!}" media="all" rel="stylesheet" type="text/css" /> 
<link href="{!! asset('CSS/navbarLeft.css') !!}" media="all" rel="stylesheet" type="text/css" /> 

@extends('navbarTop') 

@section('content')


<script type="text/javascript">
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    // 
}
</script>


<div class="customWidth">
    <div class="row">
        <div class="col-sm-3">
            <h4>
                {{ $listingInfo->listing->location->street_address}}
                </br>{{ $listingInfo->listing->location->city}} {{$listingInfo->listing->location->province}}, {{$listingInfo->listing->location->country}}
                </br>
                @if ( $listingInfo->unit )
                    </br> Unit {{ $listingInfo->unit }} 
                @endif
                @if($listingInfo->room_level != null)
                    </br> Floor {{$listingInfo->room_level}}
                @endif
            </h4>
            <h1>${{$listingInfo->price_monthly}}/mth</h1>
            <h4 class="style">
                {{$listingInfo->num_bedrooms_total}} Bedrooms, {{$listingInfo->num_bathrooms_total}} Bathrooms </br>
                @if($listingInfo->room_size_sqft > 0)
                    {{$listingInfo->room_size_sqft}} sqft </br>
                @endif
            </h4>
            <p>Added to our website 
                @if($date <= 0)
                    today.
                @else
                    {{$date}} day(s) ago.</p>
                @endif
            <p class="mls">MLS®: {{ $listingInfo->mls_number }}</p>

        </div>
        <div class="col-sm-6">


@if(count($images) > 0)

            <div class="imgGallery">
            <a href="../{{$images->first()->image_filename}}" data-lightbox="image-1" data-title="">
                <div class="contain_first" style="height: 100%;
    position:relative;    background:   url('/{{$images->first()->image_filename}}')no-repeat;
    background-size: cover;
    background-position: center;">

                </div>
                </a>
            </div>


@foreach($images as $image)
    @if($image != $images->first())<a href="../{{$image->image_filename}}" data-lightbox="image-1" data-title=""></a>@endif
@endforeach

@else

            <div class="imgGallery">
            <a href="../images/houseDefault.jpeg" data-lightbox="image-1" data-title="">
                <div class="contain_first" style="height: 100%;
    position:relative;    background:   url('../images/houseDefault.jpeg')no-repeat;
    background-size: cover;
    background-position: center;">

                </div>
                </a>
            </div>


@endif





            <div id="saveToFavourites" class="button col-sm-6" onClick="window.location ='../profileFavourites/{{$listingInfo->listing->listing_id}}'">Save to Favourites</div>
            <div id="callNow" class="button col-sm-6"><a id = "callNowLink"alt="Call Listing Owner" href="tel:{{$user->phone}}">Call Now!</a></div>
            <div class="row">
                <div class="col-sm-12 borderBot">
                    @if($listingInfo->listing_description != '' && $listingInfo->listing_description != null)
                        <h4 class="borderBot"><b>About this Listing</b></h4>
                        <p> {{$listingInfo->listing_description}}</p>
                    @endif
                    @if($listingInfo->price_description != '' && $listingInfo->price_description != null)
                        <h4 class="borderBot"><b>Pricing Information</b></h4>
                        <p> {{$listingInfo->price_description}}</p>
                    @endif
                    <h4 class="borderBot"><b>Features</b></h4>
                    <div id="inner">
                        <ul>
                        @if ($listingInfo->smoke_free)<li>Smoke Free</li>@endif
                        @if ($listingInfo->has_kitchen)<li>Kitchen Access</li>@endif
                        @if ($listingInfo->has_laundry)<li>Laundry On-Site</li>@endif
                        @if ($listingInfo->has_yard)<li>Yard Access</li>@endif
                        </ul>
                        <ul>
                        @if ($listingInfo->has_furnishings)<li>Pre-Furnished</li>@endif
                        @if ($listingInfo->owner_pays_internet)<li>Internet Included</li>@endif
                        @if ($listingInfo->owner_pays_water)<li>Water Inluded</li>@endif
                        @if ($listingInfo->owner_pays_electricity)<li>Electricity Included</li>@endif
                        </ul>
                    </div>
                    @if ($listingInfo->details_pets)
                        <h4 class="borderBot"><b>Pet Details</b></h4>
                        <div id="inner">
                            <ul>
                                @if ($listingInfo->allowed_dogs)<li>Dogs Allowed</li>@else<li>NO Dogs Allowed</li>@endif
                                @if ($listingInfo->allowed_cats)<li>Cats Allowed</li>@else<li>NO Cats Allowed</li>@endif
                                @if ($listingInfo->allowed_other_pets)<li>Some Pets Allowed</li>@else<li>Some Pets NOT Allowed</li>@endif
                                @if ($listingInfo->owner_has_pets)<li>Other Pets In Building</li>@endif
                            </ul>
                        </div>
                        <p>{{$listingInfo->details_pets}}</p>
                    @endif
                </div>
            </div>
            </br>
            <div class="row landlordProfile">
                <!--<div class="col-sm-12 margin">
                    <h4>Properties Contact profile</h4>
                </div>-->
                <div class="col-sm-5">
                    <div class="profile">
                        <img id = "profilePic" class = "img-responsive" src="../{{$user->user_image_filename}}">
                    </div>
                </div>
                <div class="col-sm-7">
                    <h2>{{ $listingInfo->listing->location->user->first_name}} {{ $listingInfo->listing->location->user->last_name}}</h2>
                    <p>Joined {{ $listingInfo->listing->location->user->created_at->diffInDays()}} day(s) ago</p>
                    <form method="POST" id="sendContactInfo" style="display:none;" action="../sendContactEmail">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="recievingUser" value="{{$user->user_id}}">
                        <input type="hidden" name="listing_id" value="{{$listingInfo->listing_id}}">
                    </form>
                    <p class="col-sm-6" id="sendMessage">
                        <a onClick="sendEmailForm()">
                            Contact Owner
                        </a>
                    </p>                    
                    <p class="col-sm-6" id="viewProfile"><a alt="Navigate to realtors profile" href="../profileView/{{$user->user_id}}">View Profile</a></p>

                </div>
            </div>
        </div>
        <!--<div class="col-sm-3">
            <h4>Similar Listings</h4>
            <div class="col-sm-12 similarListing">
            </div>
            <div class="col-sm-12 similarListing">
            </div>
            <div class="col-sm-12 similarListing">
            </div>
        </div>-->
        </div>
    </div>
</div>



<script type="text/javascript" src="{!! asset('JS/map.js') !!}"></script>
<script type="text/javascript" src="{!! asset('JS/houseTemplate.js') !!}"></script>

<script type="text/javascript">
function sendEmailForm()
{
  document.getElementById("sendContactInfo").submit();
}
</script>
@stop
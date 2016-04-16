<link href="{!! asset('css/addListing.css') !!}" media="all" rel="stylesheet" type="text/css" />

@extends('navbarTop') @section('content')


<div class="container" style="width:700px;">
    <div class="row">
        </br>        
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class = "pageTitle"> Create a New Listing </div>    

        <form method="POST" id="addListingsForm" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="longitude_id" name="longitude_name" />
            <input type="hidden" id="latitude_id" name="latitude_name" />

            <!-- Title -->
            <div class="form-group col-sm-12">
                <label for="title_name">Listing Title:</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="title_id" name="title_name" placeholder="Enter Title" value="{{ old('title_name') }}" required>
                </div>
            </div>

            @if(!empty($locations))
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="location_name">Location:</label>
                    <select class="form-control" id="location_id" name="location_name" value="{{ old('location_name') }}" required>
                        @foreach ($locations as $loc)
                            <option value="{{$loc->location_id}}">{{$loc->street_address}}, {{$loc->city}}, {{$loc->province}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-3">
                    <label for="location_name">Floor Number</label>
                    <input type="text" class="form-control" id="floorNum_id" name="floorNum_name" value="{{ old('floorNum_name') }}">
                </div>

                <div class="form-group col-sm-3">
                    <label for="location_name">Unit Number</label>
                    <input type="text" class="form-control" id="unitNum_id" name="unitNum_name" value="{{ old('unitNum_name') }}">
                </div>
            </div>

            <div class="row" id = "registerInquiry">
                <div class="form-group col-sm-12">
                    <div class = "panel panel-default">
                        Address not listed above? <a href="../addProperty">Add a New Property.</a>
                    </div>
                </div>
            </div>
            @else
            <input type="hidden" id="location_id" name="location_name"/>
            <div class="row" id = "registerInquiry">
                <div class="form-group col-sm-12">
                    <div class = "panel panel-default">
                        No locations found! <a href="../addProperty">Add a New Property</a> to be able to post a listing.
                    </div>
                </div>
            </div>
            @endif

            <!--Rental Length-->
            <h2>Rental Length</h2>
            <hr>
            <div class="row">
                <div class="form-group col-sm-4">
                    <label>Available from:</label>
                    <div class='input-group date' id='dateFrom_id' name='dateFrom_name'>
                        <input type='text' id='dateFrom_id' name='dateFrom_name' class="form-control" value="{{ old('dateFrom_name') }}"/>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group col-sm-4">
                    <label>Available To:</label>
                    <div class='input-group date' id='dateTo_id' name='dateTo_name'>
                        <input type='text' id='dateTo_id' name='dateTo_name' class="form-control" value="{{ old('dateTo_name') }}"/>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group col-sm-4">
                    <label for="description">Min. Lease (Months)</label>
                    <input type="text" class="form-control" id="rentalLength_id" name="rentalLength_name" placeholder="12" value="{{ old('rentalLength_name') }}">
                </div>
            </div>

            <!-- Rent and Price Info -->
            <h2>Rental Pricing</h2>
            <hr>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="description">Rent (Monthly):</label>
                    <input type="text" class="form-control" id="rent_id" name="rent_name" placeholder="" value="{{ old('rent_name') }}" required>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="description">Pricing Information:</label>
                    <textarea class="form-control" rows="3" id="priceDescription_id" name="priceDescription_name" 
                        placeholder="First and last month rent required up front, yearly payments, etc.">{{ old('priceDescription_name') }}</textarea>
                </div>
            </div>

            <!-- House Details -->
            <h2>Property Details</h2>
            <hr>
            <div class="row">
                <div class="form-group col-sm-3">
                    <label>Square Footage:</label>
                    <input type="text" class="form-control" id="sqft_id" name="sqft_name" value="{{ old('sqft_name') }}"required>
                </div>
                <div class="form-group col-sm-3">
                    <label># Bedrooms:</label>
                    <input type="text" class="form-control" id="bedrooms_id" name="bedrooms_name" value="{{ old('bedrooms_name') }}" required>
                </div>
                <div class="form-group col-sm-3">
                    <label># Bathrooms:</label>
                    <input type="text" class="form-control" id="bathrooms_id" name="bathrooms_name" value="{{ old('bathrooms_name') }}"required>
                </div>
                <div class="form-group col-sm-3">
                    <label>Max # Roommates:</label>
                    <input type="text" class="form-control" id="bathrooms_id" name="bathrooms_name" value="{{ old('bathrooms_name') }}"required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-3">
                    <input type="checkbox" name="yard_name" value="{{ old('yard_name') }}">
                    <label>Yard?</label>
                </div>
                <div class="form-group col-sm-3">
                    <input type="checkbox" name="kitchen_name" value="{{ old('kitchen_name') }}">
                    <label>Kitchen?</label>
                </div>
                <div class="form-group col-sm-3">
                    <input type="checkbox" name="laundry_name" value="{{ old('laundry_name') }}">
                    <label>Laundry?</label>
                </div>
                <div class="form-group col-sm-3">
                    <input type="checkbox" name="furnishing_name" value="{{ old('furnishing_name') }}">
                    <label>Furnishings?</label>
                </div>
            </div>

             <div class="form-group col-sm-12">
                <label for="description_name">House and Listing Description:</label>
                <textarea class="form-control" rows="5" id="description_id" name="description_name">{{ old('description_name') }}</textarea>
            </div>
            
            <h2>Additional Information</h2>
            <hr>

            <div class="row">
                <div class="form-group col-sm-3">
                    <input type="checkbox" name="dogs_name" value="{{ old('dogs_name') }}">
                    <label>Dogs Allowed?</label>
                </div>
                <div class="form-group col-sm-3">
                    <input type="checkbox" name="cats_name" value="{{ old('furnishing_name') }}">
                    <label>Cats Allowed?</label>
                </div>
                <div class="form-group col-sm-3">
                    <input type="checkbox" name="otherPets_name" value="{{ old('furnishing_name') }}">
                    <label>Other Pets Allowed?</label>
                </div>
                <div class="form-group col-sm-3">
                    <input type="checkbox" name="allergy_name" value="{{ old('furnishing_name') }}">
                    <label>Allergy Concerns?</label>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
                    <label>Pet Information:</label>
                    <textarea class="form-control" rows="3" id="petDescription_id" name="petDescription_name" 
                        placeholder="Additional Pet information, allergy concerns, etc.">{{ old('petDescription_name') }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-3">
                    <input type="checkbox" name="internetCK_name">
                    <label>Internet Charge?</label>
                </div>
                <div class="form-group col-sm-3">
                    <input type="checkbox" name="electricityCK_name">
                    <label>Electricity Charge?</label>
                </div>
                <div class="form-group col-sm-3">
                    <input type="checkbox" name="waterCK_name">
                    <label>Water Charge?</label>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <input type="text" class="form-control" id="amenities_id" name="amenities_name" placeholder="Amenities" value="{{ old('amenities_name') }}">
            </div>

            <div class="row">
                <div class="form-group col-sm-3">
                    <input type="checkbox" name="smokeCK_name">
                    <label>Smoke Free?</label>
                </div>
            </div>

            <!--
            <div class="row">
                <div class="col-sm-12">
                    <div id="dropzoneFileUpload" class="dropzone dragPictures">
                        <p>Drag and drop images area</p>
                    </div>

                </div>
            </div>
            -->
            <br />
            <button class="btn btn-default">Submit</button>
        </form>
        <!-- Submits form info thrupostListing.js -->
        <!-- <button onClick="test(event)" class="btn btn-default">Save</button> -->
    </div>
</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5TYaJ1DT_MLRMhkoN6FKknWTkMh5Rg6Q"></script>

<script type="text/javascript">
    $(function () {
        $('#dateFrom_id').datetimepicker({
            format: 'DD/MM/YYYY',
            defaultDate: new Date()
        });
        $('#dateTo_id').datetimepicker({
            format: 'DD/MM/YYYY'
        });
    });
</script>

<script type="text/javascript" src="{!! asset('JS/postListing.js') !!}"></script>

@stop
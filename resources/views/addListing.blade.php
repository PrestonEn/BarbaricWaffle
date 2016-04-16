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
            <div class="form-group col-sm-12">
                <label for="description_name">Listing Description:</label>
                <textarea class="form-control" rows="5" id="description_id" name="description_name">{{ old('description_name') }}</textarea>
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
                    <input type="text" class="form-control" id="unitNum_id" name="unitNum_name" placeholder="" value="{{ old('unitNum_name') }}">
                </div>

                <div class="form-group col-sm-3">
                    <label for="location_name">Unit Number</label>
                    <input type="text" class="form-control" id="unitNum_id" name="unitNum_name" placeholder="" value="{{ old('unitNum_name') }}">
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
            <input type="hidden" id="location_id" name="location_name" />
            <div class="row" id = "registerInquiry">
                <div class="form-group col-sm-12">
                    <div class = "panel panel-default">
                        No locations found! <a href="../addProperty">Add a New Property</a> to be able to post a listing.
                    </div>
                </div>
            </div>
            @endif

            <!--Rental Length-->
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

            <!-- House Info -->
            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="description">Rent (Monthly):</label>
                    <input type="text" class="form-control" id="rent_id" name="rent_name" placeholder="" value="{{ old('rent_name') }}" required>
                </div>
                <div class="form-group col-sm-3">
                    <select class="form-control" id="houseType_id" name="houseType_name" value="{{ old('houseType_name') }}" required>
                        <option>House</option>
                        <option>Apartment</option>
                        <option>Condo</option>
                    </select>
                </div>
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" id="sqftSize_id" name="sqftSize_name" placeholder="Square Footage" value="{{ old('sqftSize_name') }}">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="description">Pricing Information:</label>
                    <textarea class="form-control" rows="3" id="priceDescription_id" name="priceDescription_name" 
                        placeholder="First and last month rent required up front, yearly payments, etc.">{{ old('priceDescription_name') }}</textarea>
                </div>
            </div>

            <div class="row">
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
                <div class="form-group col-sm-12">
                    <hr style="border-color: #000000;">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-3">
                    <input type="checkbox" name="pet" value="pet">
                    <label>Dogs Allowed?</label>
                </div>
                <div class="form-group col-sm-3">
                    <input type="checkbox" name="pet" value="pet">
                    <label>Cats Allowed?</label>
                </div>
                <div class="form-group col-sm-3">
                    <input type="checkbox" name="pet" value="pet">
                    <label>Other Pets Allowed?</label>
                </div>
                <div class="form-group col-sm-3">
                    <input type="checkbox" name="pet" value="pet">
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
                <div class="form-group col-sm-4">
                    <label>
                        <input type="checkbox" name="smoke" value="smoke"> Smoke Free</label>
                </div>
                <div class="checkbox col-sm-4">
                    <label>
                        <input type="checkbox" name="furnished" value="furnished">Furnished</label>
                </div>
                <div class="checkbox col-sm-4">
                    <label>
                        <input type="checkbox" name="kitchen" value="kitchen">Kitchen</label>
                </div>
                <div class="checkbox col-sm-4">
                    <label>
                        <input type="checkbox" name="laundry" value="laundry">Laundry</label>
                </div>
                <div class="checkbox col-sm-4">
                    <label>
                        <input type="checkbox" name="yard" value="yard">Yard</label>
                </div>
                <div class="checkbox col-sm-4">
                    <label>
                        <input type="checkbox" name="internet" value="internet">Internet</label>
                </div>
                <div class="checkbox col-sm-4">
                    <label>
                        <input type="checkbox" name="electricity" value="electricity">Electricity</label>
                </div>
                <div class="checkbox col-sm-4">
                    <label>
                        <input type="checkbox" name="water" value="water">Water</label>
                </div>
                <div class="checkbox col-sm-4">
                    <label>
                        <input type="checkbox" name="cat" value="cat">Cats</label>
                </div>
                <div class="checkbox col-sm-4">
                    <label>
                        <input type="checkbox" name="dog" value="dog">Dogs</label>
                </div>
                <div class="checkbox col-sm-4">
                    <label>
                        <input type="checkbox" name="otherPet" value="otherPet">Other Pets</label>
                </div>
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" id="amenities_id" name="amenities_name" placeholder="Amenities" value="{{ old('amenities_name') }}">
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
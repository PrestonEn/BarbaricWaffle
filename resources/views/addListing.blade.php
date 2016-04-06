<link href="{!! asset('css/addListing.css') !!}" media="all" rel="stylesheet" type="text/css" />

@extends('navbarTop') @section('content')


<div class="container" style="width:700px;">
    <div class="row">
        <h2>Create a New Listing</h2>

        <form method="POST" id="addListingsForm" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="longitude_id" name="longitude_name" />
            <input type="hidden" id="latitude_id" name="latitude_name" />

            <!-- Title -->
            <div class="form-group">
                <div class="form-group">
                    <input type="text" class="form-control" id="title_id" name="title_name" placeholder="Enter Title" required>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Listing Description:</label>
                <textarea class="form-control" rows="5" id="description_id" name="description_name"></textarea>
            </div>

            <!-- Address -->
            <div class="row">
                <div class="col-sm-12">
                    <p>Location</p>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-9">
                    <input type="text" class="form-control" id="address_id" name="address_name" placeholder="Street Address" required>
                </div>
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" id="unitNum_id" name="unitNum_name" placeholder="Unit Number">
                </div>
            </div>

            <!-- Country, Province, City, Postal/Zip -->
            <div class="row">
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" id="country_id" name="country_name" placeholder="Country" required>
                </div>
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" id="province_id" name="province_name" placeholder="State/Province" required>
                </div>
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" id="city_id" name="city_name" placeholder="City" required>
                </div>
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" id="postalCode_id" name="postalCode_name" placeholder="Postal/Zip Code" required>
                </div>
            </div>

            <!-- House Info -->
            <div class="row">
                <div class="col-sm-12">
                    <p><b>House Information</b></p>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" id="rent_id" name="rent_name" placeholder="Rental Price (Monthly)" required>
                </div>
                <div class="form-group col-sm-3">

                    <select class="form-control" id="houseType_id" name="houseType_name" required>
                        <option>House</option>
                        <option>Apartment</option>
                        <option>Condo</option>
                    </select>
                </div>
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" id="sqftsize_id" name="sqftsize_name" placeholder="Sqare Footage">
                </div>
            </div>
            <div class="form-group">
                <label for="description">Pricing Information:</label>
                <textarea class="form-control" rows="3" id="priceDescription_id" name="priceDescription_name" placeholder="First and last month rent required up front, yearly payments, etc."></textarea>
            </div>
            <div class="row">
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" id="bedrooms_id" name="bedrooms_name" placeholder="Number of Bedrooms" required>
                </div>
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" id="bathrooms_id" name="bathrooms_name" placeholder="Number of Bathrooms" required>
                </div>
            </div>
            <!--
            <div class="row">
                <div class="checkbox col-sm-4">
                    <label>
                        <input type="checkbox" name="pet" value="pet">Pets</label>
                </div>
                <div class="checkbox col-sm-4">
                    <label>
                        <input type="checkbox" name="smoke" value="smoke">Smoke Free</label>
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
            -->
            <div class="form-group">
                <input type="text" class="form-control" id="amenities_id" name="amenities_name" placeholder="Amenities">
            </div>
            <div class="row">
                <label class="col-sm-6">Available from</label>

                <label class="col-sm-6">To</label>
                <div class="form-group col-sm-6">
                    <div class='input-group date' id='dateFrom_id' name='dateFrom_name'>
                        <input type='text' id='dateFrom_id' name='dateFrom_name' class="form-control" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <div class='input-group date' id='dateTo_id' name='dateTo_name'>
                        <input type='text' id='dateTo_id' name='dateTo_name' class="form-control" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
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
        </form>
        <!-- Submits form info thrupostListing.js -->
        <button onClick="postListing(event)" class="btn btn-default">Submit</button>
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
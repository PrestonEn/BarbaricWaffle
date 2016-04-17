<link href="{!! asset('css/addListing.css') !!}" media="all" rel="stylesheet" type="text/css" />

@extends('navbarTop') @section('content')

<div class = "bHolder">
 <div id = "modalButtonHolder">
    <button type="button" class="btn btn-primary helpButton" data-toggle="modal" data-target=".bs-example-modal-sm" >?</button>
</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
           test
        </div>
    </div>
</div>

</div>

<div class="col-xs-0 col-sm-2"></div>
<div class="container col-sm-8">
    <div class="row">
        <h2>Create a New Listing</h2>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" id="addListingsForm" role="form" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="longitude_id" name="longitude_name" />
            <input type="hidden" id="latitude_id" name="latitude_name" />

            <!-- Title -->
            <div class="form-group">
                <div class="form-group">
                    <input type="text" class="form-control" id="title_id" name="title_name" placeholder="Enter Title" value="{{ old('title_name') }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Listing Description:</label>
                <textarea class="form-control" rows="5" id="description_id" name="description_name">{{ old('description_name') }}</textarea>
            </div>

            <!-- Location -->
            <div class="row">
                <div class="col-sm-12">
                    <p>Location</p>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-9">
                    <select class="form-control" id="location_id" name="location_name" value="{{ old('location_name') }}" required>
                        @foreach ($locations as $loc)
                            <option value="{{$loc->location_id}}">{{$loc->street_address}}, {{$loc->city}}, {{$loc->province}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" id="unitNum_id" name="unitNum_name" placeholder="Unit Number" value="{{ old('unitNum_name') }}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-9">  
                    <a href="../addProperty" class="list-group-item">Add a new Property</a>
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
                    <input type="text" class="form-control" id="rent_id" name="rent_name" placeholder="Rental Price (Monthly)" value="{{ old('rent_name') }}" required>
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
            <div class="form-group">
                <label for="description">Pricing Information:</label>
                <textarea class="form-control" rows="3" id="priceDescription_id" name="priceDescription_name" 
                    placeholder="First and last month rent required up front, yearly payments, etc.">{{ old('priceDescription_name') }}</textarea>
            </div>
            <div class="row">
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" id="bedrooms_id" name="bedrooms_name" placeholder="Number of Bedrooms" value="{{ old('bedrooms_name') }}" required>
                </div>
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" id="bathrooms_id" name="bathrooms_name" placeholder="Number of Bathrooms" value="{{ old('bathrooms_name') }}"required>
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
                <input type="text" class="form-control" id="amenities_id" name="amenities_name" placeholder="Amenities" value="{{ old('amenities_name') }}">
            </div>

             <div class="form-group">
                <label for="description">Pets:</label>
            </div>
            <div class="row">
                <div class ="col-xs-4 col-sm-2">Pet Friendly : </div>
                <div class ="col-xs-1 col-sm-1 checkPet"><input type= "checkbox" id = "pets" name="pets" value="0" onClick="getMoreCheckboxes(value)"></input></div>
            </div>
            <br>
            <div class = "row" id = "petsAdd">
                <div class = "col-xs-4 col-sm-2"> Dogs : </div>
                <div class ="col-xs-1 col-sm-1 checkPet"><input type= "checkbox" name="dogs" value="dogs"></input></div>
                <div class = "col-xs-4 col-sm-2"> Cats : </div>
                <div class ="col-xs-1 col-sm-1 checkPet"><input type= "checkbox" name="cats" value="cats"></input></div>
                <div class = "col-xs-4 col-sm-2"> Other : </div>
                <div class ="col-xs-1 col-sm-1 checkPet"><input type= "checkbox" name="other" value="other"></input></div>
            </div>
            <br>




            <div class="row">
                <label class="col-sm-6">Available from</label>

                <label class="col-sm-6">To</label>
                <div class="form-group col-sm-6">
                    <div class='input-group date' id='dateFrom_id' name='dateFrom_name'>
                        <input type='text' id='dateFrom_id' name='dateFrom_name' class="form-control" value="{{ old('dateFrom_name') }}"/>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <div class='input-group date' id='dateTo_id' name='dateTo_name'>
                        <input type='text' id='dateTo_id' name='dateTo_name' class="form-control" value="{{ old('dateTo_name') }}"/>
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
            <div class="row">
                <label class="col-sm-6">Images</label>

                <label class="col-sm-6">To</label>
                <div class="form-group col-sm-6">
                    <div class='input-group file' id='' name=''>
<input type="file" class="form-control" name="image[]" placeholder="Upload Image" multiple="true">
                    </div>
                </div>

            </div>

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
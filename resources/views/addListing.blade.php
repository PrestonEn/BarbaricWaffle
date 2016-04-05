<link href="{!! asset('css/addListing.css') !!}" media="all" rel="stylesheet" type="text/css" />

@extends('navbarTop') @section('content')


<div class="container" style="width:700px;">
    <div class="row">
        <h2>New Listing</h2>

        <form method="POST" action="addListing" id="ListingsForm" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <input type="hidden" id="longitude" name = "long" />
            <input type="hidden" id ="latitude" name = "lat" />

            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
            </div>

            <div class="row">

                <div class="form-group col-sm-6">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                </div>
                <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="rent" placeholder="Rent" required>
                </div>

            </div>
            <div class="row">

                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" name="postalCode" placeholder="Postal Code" required>
                </div>
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" name="province" placeholder="Province" required>
                </div>
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" name="city" placeholder="City" required>
                </div>
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" name="country" placeholder="Country" required>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p>Type</p>
                </div>
            </div>
            <div class="row">

                <div class="form-group col-sm-6">

                    <select class="form-control" name="houseType" required>
                        <option>House</option>
                        <option>Apartment</option>
                        <option>Condo</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">

                    <input type="text" class="form-control" name="size" placeholder="Sq/ft" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="bedrooms" placeholder="Bedrooms" required>
                </div>
                <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="bathrooms" placeholder="Bathrooms" required>
                </div>
            </div>
            <div class="row">
                <div class="checkbox col-sm-4 noMargin">
                    <label>
                        <input type="checkbox" name="pet" value="pet">Pets</label>
                </div>
                <div class="checkbox col-sm-4">
                    <label>
                        <input type="checkbox" name="smoke" value="smoke">Smoke free</label>
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
                <label for="description">Description:</label>
                <textarea class="form-control" rows="5" name="description" required></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="amenities" placeholder="Amenities">
            </div>
            <div class="row">
                <label class="col-sm-6">Available from</label>

                <label class="col-sm-6">To</label>
                <div class="form-group col-sm-6">
                    <div class='input-group date' id='dateFrom' name='dateFrom'>
                        <input type='text' id='dateFrom' name='dateFrom' class="form-control" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <div class='input-group date' id='dateTo' name='dateTo'>
                        <input type='text' id='dateTo' name='dateTo' class="form-control" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div id="dropzoneFileUpload" class="dropzone dragPictures">
                        <p>Drag and drop images area</p>
                    </div>

                </div>
            </div>


            <br />
            <button onClick="test(event)" id="submit" class="btn btn-default">Submit</button>
            <button onClick="test(event)" type="save" class="btn btn-default">Save</button>
        </form>


    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5TYaJ1DT_MLRMhkoN6FKknWTkMh5Rg6Q"></script>

<script type="text/javascript">
    $(function () {
        $('#dateFrom').datetimepicker({
            format: 'DD/MM/YYYY',
            defaultDate: new Date()
        });
        $('#dateTo').datetimepicker({
            format: 'DD/MM/YYYY'
        });
    });
</script>


<script type="text/javascript" src="{!! asset('JS/postListing.js') !!}"></script>


@stop
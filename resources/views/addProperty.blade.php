<link href="{!! asset('css/addListing.css') !!}" media="all" rel="stylesheet" type="text/css" />

@extends('navbarTop') @section('content')



<div class="container" style="width:700px;">

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
      <div class="modal-body">
        <div id="mapCanvas" style="width: 500px; height: 400px"></div>
      </div>
      <div class="modal-footer">
      </div>      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Edit Address Info</button>
        <button type="button" class="btn btn-primary" onClick="submitProperty()">Submit Property</button>
      </div>
    </div>
  </div>
</div>



    <div class="row">
        <h2>Add a New Property</h2>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" id="addPropertyForm" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="maps_json_name" id="maps_json_id">
            <!-- Address -->
            <div class="row">
                <div class="col-sm-12">
                    <p>Location</p>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <input type="text" class="form-control" id="address_id" name="address_name" placeholder="Street Address" value="{{ old('address_name') }}" required>
                </div>
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" id="postalCode_id" name="postalCode_name" placeholder="Postal/Zip Code" value="{{ old('postalCode_name') }}" required>
                </div>

            </div>

            <div class="row">
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" id="city_id" name="city_name" placeholder="City" value="{{ old('city_name') }}" required>
                </div>
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" id="province_id" name="province_name" placeholder="State/Province" value="{{ old('province_name') }}" required>
                </div>
                <div class="form-group col-sm-3">
                    <input type="text" class="form-control" id="country_id" name="country_name" placeholder="Country" value="{{ old('country_name') }}" required>
                </div>
            </div>
        </form>
        <!-- Submits form info thru postProperty.js -->
        <button onClick="postProperty(event)" class="btn btn-default">Submit</button>
    </div>
</div>

<!-- Scripts -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5TYaJ1DT_MLRMhkoN6FKknWTkMh5Rg6Q"></script>
<script type="text/javascript" src="{!! asset('JS/postProperty.js') !!}"></script>

@stop
<link href="{!! asset('css/addListing.css') !!}" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{!! asset('JS/postListing.js') !!}"></script>


@extends('navbarTop') @section('content')


<div class="container" style="width:700px;">
    <div class="row">
        <h2>New Listing</h2>

        <form onsubmit="checkAnswers()" id="my-awesome-dropzone" role="form">
            <div class="form-group">
                <input type="text" class="form-control" id="title" placeholder="Enter Title" required>
            </div>

            <div class="row">

                <div class="form-group col-sm-6">
                    <input type="text" class="form-control" id="address" placeholder="Enter Address" required>
                </div>
                <div class="form-group col-sm-6">
                    <input type="text" class="form-control" id="rent" placeholder="Rent" required>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p>Type</p>
                </div>
            </div>
            <div class="row">

                <div class="form-group col-sm-6">

                    <select class="form-control" id="houseType" required>
                        <option>House</option>
                        <option>Apartment</option>
                        <option>Condo</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">

                    <input type="text" class="form-control" id="size" placeholder="Sq/ft" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <input type="text" class="form-control" id="bedrooms" placeholder="Bedrooms" required>
                </div>
                <div class="form-group col-sm-6">
                    <input type="text" class="form-control" id="bathrooms" placeholder="Bathrooms" required>
                </div>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="pet">Pets</label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="smoke">Smoke free</label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="furnished">Furnished</label>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" rows="5" id="description" required></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="amenities" placeholder="Amenities">
            </div>

            <label>Availability:</label>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="availableNow">Now</label>
            </div>
            <div class="row">
                <div class="checkbox col-sm-3">
                    <label>
                        <input type="checkbox" value="availableFrom">Starting from</label>
                </div>

                <div class="form-group col-sm-3">

                    <select class="form-control" id="month">
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                    </select>
                </div>
                <div class="form-group col-sm-3">

                    <select class="form-control" id="day">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                    </select>
                </div>
                <div class="form-group col-sm-3">

                    <select class="form-control" id="Year">
                        <option>2016</option>
                        <option>2017</option>
                        <option>2018</option>
                        <option>2019</option>
                        <option>2020</option>

                    </select>
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
            <button onclick="checkSubmit()" class="btn btn-default">Submit</button>
            <button type="save" class="btn btn-default">Save</button>
        </form>


    </div>

</div>


@stop

        @foreach($listingInfo as $listing)
        <div id="subrow" class="row">

            <div class="col-xs-6" onclick="window.location = '../../houseTemplate/{{$listing->listing_id}}'">
                <div id="eg1">
                    <img class="housePic img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
                </div>
            </div>

            <div class="col-xs-6">
                <table class="table table-condensed" style="border-width: 20px;">
                    <tr>
                        <th colspan=2>
                            <label id="title"> {{$listing->listing_title}} </label>
                        </th>
                    </tr>

                    <tr>
                        <td colspan=2> {{ $listing->listing->location->street_address}}, {{ $listing->listing->location->city}} </td>
                    </tr>

                    <tr>
                        <td> Price </td>
                        <td> {{$listing->price_monthly}}/mth </td>
                    </tr>

                    <tr>
                        <td colspan=2> Other feature we deem important </td>
                    </tr>

                    <tr>
                        <td class="features">
                            @if ($listing->has_kitchen)
                            <img class="feature" src="../images/kitchen.jpeg"> @endif @if ($listing->allowed_dogs || $listing->allowed_cats || $listing->allowed_other_pets)
                            <img class="feature" src="../images/pets.jpeg"> @endif @if ($listing->has_furnishings)
                            <img class="feature" src="../images/furnished.jpeg"> @endif @if ($listing->has_laundry)
                            <img class="feature" src="../images/laundry.jpeg"> @endif @if ($listing->owner_pays_hydro)
                            <img class="feature" src="../images/water.jpeg"> @endif @if ($listing->owner_pays_electricity)
                            <img class="feature" src="../images/hydro.jpeg"> @endif @if ($listing->owner_pays_internet)
                            <img class="feature" src="../images/internet.jpeg"> @endif </td>
                    </tr>

                </table>
            </div>
        </div>
        @endforeach
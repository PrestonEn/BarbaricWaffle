<html lang = "en">
<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/profileMain.css') !!}" media="all" rel="stylesheet" type="text/css" />


@extends('navbarLeft')

@section('profileContent')

	<title> ProfileMain </title>


	<div class = "pageTitle"> {{$user->first_name}} {{$user->last_name}} </div>

		<div class = "backPane panel">
			<strong>Phone Number : </strong>
			<div class = "profileInfo"> 555-555-5555 </div>
		</div>


		<div class = "backPane panel">
			<strong>E-mail Address : </strong>
			<div class = "profileInfo"> {{$user->email}} </div>
		</div>


	<div class = "panel panel-default">
         <strong> User's Listings </strong>

			<div id = "listings">
				
                  @foreach ($listingsActive as $listing)
                    @foreach($listing->listing_info as $list)
                    @if($list->is_active)
                    <div class = "col-md-4">
                    <table class = "table table-bordered">
                    	<tr>
						<td class = "listingCell" onclick="window.location = '../../houseTemplate/{{$listing->listing_id}}'">
               				<img class="listImages" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
               				<table class = "listingData table table-condensed">	
               					<tr>
               						<td class = "dataTitle">
   										<h2> {{$list->listing_title}} <h2>
   									</td>
   								</tr>
				
								<tr>
               						<td class = "dataPrice">
   										<h2> {{$list->price_monthly}}/month <h2>
   									</td>
   								</tr>
   							</table>
   						</td>
   						</table>
   					</div>
                     @endif
                     @endforeach
                  @endforeach    			
				
			</div>
	</div>


<div class = "panel panel-default">
	<table  id = "commentsTable" class = "table table-bordered">
		<tr>
			<th class = "tableTitle"><strong> Comments </strong></th>
		</tr>

		<tr>
			<td>
				<div class = "panel default-panel">
				<div class = "commentorsName"> Commentor :</div>
				<div class = "actualComment">
					Comment.
				</div>
			</div>
			</td>
		</tr>
		

	</table>
</div>
@stop

@extends('navbarTop')

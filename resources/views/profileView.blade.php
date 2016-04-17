

@extends('navbarTop')

@section('content')

<head>
	<title> ProfileMain </title>
	<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<link href="{!! asset('CSS/profileMain.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<link href="{!! asset('CSS/profileView.css') !!}" media="all" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class = "pageTitle"> {{$user->first_name}} {{$user->last_name}} </div>

	<img src="../images/profilePicDefault.jpeg" id="profilePic" class="img-responsive img-circle">

		<div class = "backPane panel">
			<strong>Phone Number : </strong>
			<div class = "profileInfo"> {{$user->phone}} </div>
		</div>


		<div class = "backPane panel">
			<strong>E-mail Address : </strong>
			<div class = "profileInfo"> {{$user->email}} </div>
		</div>


	<div class = "panel panel-default">
         <strong> User's Listings </strong>

			<div class = "row" id = "listings">
				<table id = "listingTable" class = "table table-bordered">
					<tr>

                  @foreach ($locations as $location)
                  	@foreach($location->listing as $lists)
                  		@foreach($lists->listing_info as $list)
                   		@if($list->is_active)
						<td class = "listingCell" onclick="window.location = '../../houseTemplate/{{$list->listing_id}}'">
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
                     @endif
                     @endforeach
                  	@endforeach
                  @endforeach   			
				</table>
			</div>
	</div>


<div class = "panel panel-default">
	<table  id = "commentsTable" class = "table table-bordered">
		<tr>
			<th class = "tableTitle"> Comments </th>
		</tr>

		<tr>
			<td>
				<div class = "panel default-panel">
				<div class = "commentorsName"> Nicholas Cage :</div>
				<div class = "actualComment">
					This is a comment about how the person is a wonderful human being. Things are wonderful. Life is wonderful. It's a wonderful life.
				</div>
			</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class = "panel default-panel">
				<div class = "commentorsName"> Nicholas Cage :</div>
				<div class = "actualComment">
					This is a comment about how the person is a wonderful human being. Things are wonderful. Life is wonderful. It's a wonderful life.
				</div>
			</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class = "panel default-panel">
				<div class = "commentorsName"> Nicholas Cage :</div>
				<div class = "actualComment">
					This is a comment about how the person is a wonderful human being. Things are wonderful. Life is wonderful. It's a wonderful life.
				</div>
			</div>
			</td>
		</tr>		

	</table>
</div>

</body>
</html>

@stop


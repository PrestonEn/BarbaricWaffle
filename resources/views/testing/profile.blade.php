<!DOCTYPE html>
<html lang = "en">

@extends('testing.navbarLeft')

@section('profileContent')

<head>
	<title> ProfileMain </title>
	<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<link href="{!! asset('CSS/profileMain.css') !!}" media="all" rel="stylesheet" type="text/css" />
</head>

<body>
	<h1 id = "profileTitle"> Person's Name <h1>

	<div class = "row"> 
		<div class = "panel">
			<strong class = "tableTitle">Phone Number : </strong><br>
			<div class = "profileInfo"> 555-555-5555 </div>
		</div>
	</div>	

	<div class = "row"> 
		<div class = "panel panel-default">
			<strong class = "tableTitle">E-mail Address : </strong><br>
			<div class = "profileInfo"> someExceptionallyLongEmail@brocku.ca </div>
		</div>
	</div>	


	<div class = "panel panel-default">
		<h2 class = "tableTitle"> <strong> User's Listings </strong></h2>

			<div class = "row" id = "listings">
				<table id = "listingTable" class = "table table-bordered">
					<tr>
						<td class = "listingCell">
               				<img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
               				<table class = "table table-condensed">	
               					<tr>
               						<td>
   										<h2> Listing Title <h2>
   									</td>
   								</tr>
				
								<tr>
               						<td>
   										<h2> $$$$/month <h2>
   									</td>
   								</tr>
   							</table>
   						</td>

   						<td class = "listingCell">
             				<img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
               				<table class = "table table-condensed">	
               				<tr>
               					<td>
   									<h2> Listing Title <h2>
   								</td>
   							</tr>
				
							<tr>
               					<td>
   									<h2> $$$$/month <h2>
   								</td>
   							</tr>
   							</table>
   						</td>


   						<td class = "listingCell">
               				<img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
               				<table class = "table table-condensed">	
               				<tr>
               					<td>
   									<h2> Listing Title <h2>
   								</td>
   							</tr>
				
							<tr>
               					<td>
   									<h2> $$$$/month <h2>
   								</td>
   							</tr>
   						</table>
   						</td>

   						<td class = "listingCell">
               				<img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
               				<table class = "table table-condensed">	
               				<tr>
               					<td>
   									<h2> Listing Title <h2>
   								</td>
   							</tr>
				
							<tr>
               					<td>
   									<h2> $$$$/month <h2>
   								</td>
   							</tr>
   						</table>
   						</td>

   						<td class = "listingCell">
               				<img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
               				<table class = "table table-condensed">	
               				<tr>
               					<td>
   									<h2> Listing Title <h2>
   								</td>
   							</tr>
				
							<tr>
               					<td>
   									<h2> $$$$/month <h2>
   								</td>
   							</tr>
   						</table>
   						</td>   			

   						<td class = "listingCell">
               				<img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
               				<table class = "table table-condensed">	
               				<tr>
               					<td>
   									<h2> Listing Title <h2>
   								</td>
   							</tr>
				
							<tr>
               					<td>
   									<h2> $$$$/month <h2>
   								</td>
   							</tr>
   						</table>
					</tr>
				</table>
			</div>
	</div>


<div class = "panel default-panel">
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

@stop

@extends('testing.navbarTop')

</body>
</html>
<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/navbarLeft.css') !!}" media="all" rel="stylesheet" type="text/css" />

<div class = "row">
		<div class = "col-xs-12 col-sm-3" id = "baseCol">
			<img id = "profilePic" class = "img-responsive" src="../images/profilePicDefault.jpeg">
			<div id = "navbarLeft" class="list-group">
	  			<a id = "colourNavBar" href="../profile/2" class="list-group-item active">Profile</a>
	  			<a href="../profileSearches" class="list-group-item">Saved Searches</a>
	  			<a href="../profileFavourites/{{Auth::user()->user_id}}" class="list-group-item">Favourites</a>
	  			<!--<a href="../profileMessages" class="list-group-item">Messages</a>-->
	  			<a href="../profilePostings/2" class="list-group-item">Posted Listings</a>
	  			<a href="../profileSettings/{{Auth::user()->user_id}}" class="list-group-item">Profile Settings</a>
	  			<a href="../profileProperties/2" class="list-group-item">Properties</a>

			</div>
		</div>


	<div class = "col-xs-12 col-sm-9" id = "infoCol">
		@yield('profileContent')
	</div>
</div>


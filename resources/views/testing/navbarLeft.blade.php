<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/navbarLeft.css') !!}" media="all" rel="stylesheet" type="text/css" />


<div id = "baseRow" class = "row">
		<div class = "col-xs-4">
			<img id = "profilePic" class = "img-responsive" src="https://pmcmovieline.files.wordpress.com/2011/02/nicolas-cage.jpg?w=630">
           
			<div id = "navbarLeft" class="list-group">
	  			<a href="#" class="list-group-item active">Profile</a>
	  			<a href="#" class="list-group-item">Saved Searches</a>
	  			<a href="#" class="list-group-item">Favourites</a>
	  			<a href="#" class="list-group-item">Messages</a>
	  			<a href="#" class="list-group-item">Posted Listings</a>
	  			<a href="#" class="list-group-item">Profile Settings</a>

			</div>
		</div>

	<div class = "col-xs-8">
		@yield('profileContent')
	</div>
</div>

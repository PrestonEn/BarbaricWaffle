<style>
	
	#baseRow {
		margin-left: 1px;
	}	
	
	#navbarLeft {
		margin-top: 1em;
		font-size: 1.3em;
	}

	#profilePic{
		height :80%;
		width :100%;
		border: solid 8px navy;
	}


</style>

<div id = "baseRow" class = "row">
	<div class = "row">
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

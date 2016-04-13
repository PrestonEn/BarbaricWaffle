<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script> 


<html lang = "en">

<head>
  <title> Test template </title>

  <meta charset = "utf-8"> 
  <meta name = "viewport" content = "width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
  <link href="{!! asset('CSS/navbarTop.css') !!}" media="all" rel="stylesheet" type="text/css" />
  <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,700' rel='stylesheet' type='text/css'>
  
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>


<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class = "navbar-header"><a id = "siteName" href="../mapListing">Homestead</a>

        <button type="button-small" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style = "margin:0px;padding:0px">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
    </div>

    <div class="collapse navbar-collapse">
    <ul id = "navEl" class="nav navbar-nav">
      @if (Auth::check())
        <li><a href="../profile/{{Auth::user()->user_id}}">My Profile</a></li>
        <li><a href="../profileFavourites/{{Auth::user()->user_id}}">Favourites</a></li>
      @endif
      <li><a href="../addListing">Post Listing</a></li>
      <li><a href="../houseTemplate/1">house</a></li>
      <li><a href="../listingsList/1">Listings</a></li>
    </ul>
    <ul class = "nav navbar-nav navbar-right">
    @if(Auth::check())
      <li><a href="../profile/{{Auth::user()->user_id}}">{{Auth::user()->first_name}}</a></li>
      <li><a href="../logout">Logout</a></li>
    @else
      <li><a href="../signIn">Sign&nbspin</a></li>
    @endif
    </ul>
    </div>
  </div>
</nav>




<div>

@yield('content')
</div>

</body>

    
</html>










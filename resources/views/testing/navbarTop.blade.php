<!DOCTYPE html>
<html lang = "en">

<head>
  <title> Test template </title>

  <meta charset = "utf-8"> 
  <meta name = "viewport" content = "width=device-width, initial-scale=1">
  
  <link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
  <link href="{!! asset('CSS/navbarTop.css') !!}" media="all" rel="stylesheet" type="text/css" />

  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>


<body>
  <nav class="navbar navbar-inverse .navbar-fixed-top">
  <div class="container-fluid">
    <div class = "navbar-header">Fun Website Name

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
    </div>

    <div class="collapse navbar-collapse">
    <ul id = "navEl" class="nav navbar-nav">
      <li><a href="#">Link1</a></li>
      <li><a href="#">Link2</a></li>
      <li><a href="#">Link3</a></li>
      <li><a href="#">Link4</a></li>
      <li><a href="#">Link5</a></li>
    </ul>
    <ul class = "nav navbar-nav navbar-right">
      <li><a href="#">Sign&nbspin</a></li>
    </ul>
    </div>
  </div>
</nav>


<div>
@yield('content')
</div>

</body>
</html>










<!DOCTYPE html>
<html lang = "en">

@extends('navbarLeft')

@section('profileContent')

<head>
	<title> ProfileSearches </title>
	<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
	<link href="{!! asset('CSS/profileSearches.css') !!}" media="all" rel="stylesheet" type="text/css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script type="text/javascript" src="{!! asset('JS/profileSearches.js') !!}"></script>

</head>

<body>

   <div class = "col-xs-12">

   <div class = "pageTitle"> Saved Searches </div>


   <div class = "row" id = "buttonDiv">
      <div class = "col-xs-12">
         <label id = "buttonHolder"></label>
         <labeL><button id = 'editButton' class = "btn btn-primary" value = "0" onclick="edit(this)">edit</button></label>
      </div>
   </div>



   <div id = "tableDiv" class = "table-responsive">
      <table class = "table-bordered">
         <tr>
            <th><em id = "title"></em> Search Name </th>
            <th> Search Values </th>
            
         </tr>   
         <tr>
            <td class = "name"> someSearchName </td>
            <td colspan = "6"> Some little icons or something for search values</td>
         </tr>
         <tr>
            <td class = "name">  someSearchName asdfsajdkfajsdfkjsdkfk</td>
            <td colspan = "6"> test </td>
         </tr>
         <tr>
            <td class = "name">  someSearchName asdfsajdkfajsdfkjsdkfk</td>
            <td colspan = "6"> test </td>
         </tr>
      </table> 
   </div>

</div>

@stop

@extends('navbarTop')

</body>
</html>
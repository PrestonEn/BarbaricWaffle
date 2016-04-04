<!DOCTYPE html>
<html lang = "en">

@extends('navbarLeft')

@section('profileContent')

<head>
   <title> ProfileMessages </title>
   <link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
   <link href="{!! asset('CSS/profileMessages.css') !!}" media="all" rel="stylesheet" type="text/css" />
</head>

<body>
   <div class = "pageTitle"> Person's Name </div>

   <br>

<div class = "table-responsive">

      <table class = "table table-bordered">

         <tr>
            <td class = "imgHolder">
                  <img class = "img-responsive" src="images/personDefault.jpeg">
            </td>
            <td colspan = "5"> 
               <strong>Conversation with SomeRandom Person</strong>
               <div> <em> Last Update - 11/11/11 11:11 </em> </div>
               <div class ="linkHolder">
                  <a data-toggle="collapse" data-parent="#accordion" href="#t1">Expand</a>
               </div>
            </td>
         </tr>
      </table>

    <div id="t1" class="panel-collapse collapse">
      <ul class="list-group">
         <li class = "list-group-item">
            <div class = "col-xs-3">
              <strong>AName</strong>
              <br>
              <em> Last Message 
              <br>
              11/11/11 11:11 </em>
            </div>
            <div class = "col-xs-9">
               Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
            </div>
         </li>
         <li class = "list-group-item">
            <div class = "col-xs-3">
              <strong>AName</strong>
              <br>
              <em> Last Message 
            <br>
              11/11/11 11:11 </em>
            </div>
            <div class = "col-xs-9">
               Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </div>
         </li>
         <li class = "list-group-item">
            <div class = "col-xs-3">
              <strong>AName</strong>
              <br>
              <em> Last Message
              <br>
              11/11/11 11:11 </em>
            </div>
            <div class = "col-xs-9">
               Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </div>
         </li>
      </ul>
   </div>
      
</div>

<div class = "table-responsive">

      <table class = "table table-bordered">

         <tr>
            <td class = "imgHolder">
                  <img class = "img-responsive" src="images/personDefault.jpeg">
            </td>
            <td colspan = "5"> 
               <strong>Conversation with SomeRandom Person</strong>
               <div> <em> Last Update - 11/11/11 11:11 </em> </div>
               <div class ="linkHolder">
                  <a data-toggle="collapse" data-parent="#accordion" href="#t2">Expand</a>
               </div>
            </td>
         </tr>
      </table>

    <div id="t2" class="panel-collapse collapse">
      <ul class="list-group">
         <li class = "list-group-item">
            <div class = "col-xs-3">
              <strong>AName</strong>
              <br>
              <em> Last Message 
              <br>
              11/11/11 11:11 </em>
            </div>
            <div class = "col-xs-9">
               Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
            </div>
         </li>
         <li class = "list-group-item">
            <div class = "col-xs-3">
              <strong>AName</strong>
              <br>
              <em> Last Message 
            <br>
              11/11/11 11:11 </em>
            </div>
            <div class = "col-xs-9">
               Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </div>
         </li>
         <li class = "list-group-item">
            <div class = "col-xs-3">
              <strong>AName</strong>
              <br>
              <em> Last Message
              <br>
              11/11/11 11:11 </em>
            </div>
            <div class = "col-xs-9">
               Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </div>
         </li>
      </ul>
   </div>
      
</div>

<div class = "table-responsive">

      <table class = "table table-bordered">

         <tr>
            <td class = "imgHolder">
                  <img class = "img-responsive" src="images/personDefault.jpeg">
            </td>
            <td colspan = "5"> 
               <strong>Conversation with SomeRandom Person</strong>
               <div> <em> Last Update - 11/11/11 11:11 </em> </div>
               <div class ="linkHolder">
                  <a data-toggle="collapse" data-parent="#accordion" href="#t3">Expand</a>
               </div>
            </td>
         </tr>
      </table>

    <div id="t3" class="panel-collapse collapse">
      <ul class="list-group">
         <li class = "list-group-item">
            <div class = "col-xs-3">
              <strong>AName</strong>
              <br>
              <em> Last Message 
              <br>
              11/11/11 11:11 </em>
            </div>
            <div class = "col-xs-9">
               Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
            </div>
         </li>
         <li class = "list-group-item">
            <div class = "col-xs-3">
              <strong>AName</strong>
              <br>
              <em> Last Message 
            <br>
              11/11/11 11:11 </em>
            </div>
            <div class = "col-xs-9">
               Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </div>
         </li>
         <li class = "list-group-item">
            <div class = "col-xs-3">
              <strong>AName</strong>
              <br>
              <em> Last Message
              <br>
              11/11/11 11:11 </em>
            </div>
            <div class = "col-xs-9">
               Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </div>
         </li>
      </ul>
   </div>
      
</div>



@stop

@extends('navbarTop')

</body>
</html>

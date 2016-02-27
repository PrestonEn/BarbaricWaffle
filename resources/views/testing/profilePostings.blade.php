<!DOCTYPE html>
<html lang = "en">

@extends('testing.navbarLeft')

@section('profileContent')

<head>
  <title> ProfileMain </title>
  <link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
  <link href="{!! asset('CSS/profileFavourites.css') !!}" media="all" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="{!! asset('JS/profileFavourites.js') !!}"></script>

</head>

<body>
   
   <div id = "profileTitle"> Posted Listings </div>

      <div class = "row" id = "buttonDiv">
         <div class = "col-xs-12">
            <label id = "buttonHolder"></label>
            <labeL><button id = 'editButton' class = "btn btn-primary" value = "0" onclick="makeEditable(this)">edit</button></label>
         </div>
      </div>

      <div class = "col-md-4">
            <table class = "table">
               
                  <tr>
                     <th class = "removeable" colspan = 2> $listingTitle</th>
                  </tr>

                  <tr>
                     <td colspan = 2>
                        <img a class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
                     </td>   
                  </tr>         
    
                  <tr>
                     <td colspan = 2> $address </td>
                  </tr>
              
                  <tr>
                     <td> Price </td>
                     <td> $price </td>
                  </tr>

                  <tr>
                     <td colspan = 2> Other feature we deem important </td>
                  </tr>

                  <tr>
                     <td> little icons </td>
                  </tr>

            </table> 
      </div>


      <div class = "col-md-4">
            <table class = "table">
               
                  <tr>
                     <th class = "removeable" colspan = 2> $listingTitle</th>
                  </tr>

                  <tr>
                     <td colspan = 2>
                        <img a class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
                     </td>   
                  </tr>         
    
                  <tr>
                     <td colspan = 2> $address </td>
                  </tr>
              
                  <tr>
                     <td> Price </td>
                     <td> $price </td>
                  </tr>

                  <tr>
                     <td colspan = 2> Other feature we deem important </td>
                  </tr>

                  <tr>
                     <td> little icons </td>
                  </tr>

            </table> 
      </div>

      <div class = "col-md-4">
            <table class = "table">
               
                  <tr>
                     <th class = "removeable" colspan = 2> $listingTitle</th>
                  </tr>

                  <tr>
                     <td colspan = 2>
                        <img a class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
                     </td>   
                  </tr>         
    
                  <tr>
                     <td colspan = 2> $address </td>
                  </tr>
              
                  <tr>
                     <td> Price </td>
                     <td> $price </td>
                  </tr>

                  <tr>
                     <td colspan = 2> Other feature we deem important </td>
                  </tr>

                  <tr>
                     <td> little icons </td>
                  </tr>

            </table> 
      </div>

      <div class = "col-md-4">
            <table class = "table">
               
                  <tr>
                     <th class = "removeable" colspan = 2> $listingTitle</th>
                  </tr>

                  <tr>
                     <td colspan = 2>
                        <img a class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
                     </td>   
                  </tr>         
    
                  <tr>
                     <td colspan = 2> $address </td>
                  </tr>
              
                  <tr>
                     <td> Price </td>
                     <td> $price </td>
                  </tr>

                  <tr>
                     <td colspan = 2> Other feature we deem important </td>
                  </tr>

                  <tr>
                     <td> little icons </td>
                  </tr>

            </table> 
      </div>


      <div class = "row" style="border-bottom:3px solid black;"></div>
      <div id = "profileTitle"> Previously Posted Listings </div>

      <div class = "col-md-3">
                  <table class = "table tablePostHistory">
                     
                        <tr>
                           <th colspan = 2> $listingTitle</th>
                        </tr>

                        <tr>
                           <td colspan = 2>
                              <img a class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
                           </td>   
                        </tr>         
          
                        <tr>
                           <td colspan = 2> $address </td>
                        </tr>
                    
                        <tr>
                           <td> Price </td>
                           <td> $price </td>
                        </tr>

                        <tr>
                           <td colspan = 2> Other feature we deem important </td>
                        </tr>

                        <tr>
                           <td> little icons </td>
                        </tr>

                  </table> 
            </div>


            <div class = "col-md-3">
                  <table class = "table tablePostHistory">
                     
                        <tr>
                           <th colspan = 2> $listingTitle</th>
                        </tr>

                        <tr>
                           <td colspan = 2>
                              <img a class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
                           </td>   
                        </tr>         
          
                        <tr>
                           <td colspan = 2> $address </td>
                        </tr>
                    
                        <tr>
                           <td> Price </td>
                           <td> $price </td>
                        </tr>

                        <tr>
                           <td colspan = 2> Other feature we deem important </td>
                        </tr>

                        <tr>
                           <td> little icons </td>
                        </tr>

                  </table> 
            </div>

            <div class = "col-md-3">
                  <table class = "table tablePostHistory">
                     
                        <tr>
                           <th colspan = 2> $listingTitle</th>
                        </tr>

                        <tr>
                           <td colspan = 2>
                              <img a class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
                           </td>   
                        </tr>         
          
                        <tr>
                           <td colspan = 2> $address </td>
                        </tr>
                    
                        <tr>
                           <td> Price </td>
                           <td> $price </td>
                        </tr>

                        <tr>
                           <td colspan = 2> Other feature we deem important </td>
                        </tr>

                        <tr>
                           <td> little icons </td>
                        </tr>

                  </table> 
            </div>

            <div class = "col-md-3">
                  <table class = "table tablePostHistory">
                     
                        <tr>
                           <th colspan = 2> $listingTitle</th>
                        </tr>

                        <tr>
                           <td colspan = 2>
                              <img a class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
                           </td>   
                        </tr>         
          
                        <tr>
                           <td colspan = 2> $address </td>
                        </tr>
                    
                        <tr>
                           <td> Price </td>
                           <td> $price </td>
                        </tr>

                        <tr>
                           <td colspan = 2> Other feature we deem important </td>
                        </tr>

                        <tr>
                           <td> little icons </td>
                        </tr>

                  </table> 
            </div>


</body>
@stop

@extends('testing.navbarTop')

</body>
</html>
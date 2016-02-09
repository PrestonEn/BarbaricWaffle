	@extends('testing.navbarTop')

<style>	
.row {
  margin: 0px;
  padding: 0px;
}

#col1, #col2{
  margin: 0px;
  padding: 0px;
  height:100%
}

#col2>.row {
  height: 30%;
  width: 100%;
  margin-top: 0px;
  margin-top: 1.3em;
  margin-bottom: 1.3em;
}

#col2{
  overflow-y: scroll;
}

#col2 img {
  height: 80%;
  width: 80%;
} 

#col2 table {
  font-size: 80%;
}
</style>


	@section('content')



  <div class = "row" style="background-color: white; height:94%">
    <div id = "col1" class = "col-xs-8">

      <script>
        function initMap() {
          var mapDiv = document.getElementById("col1");
          var map = new google.maps.Map(mapDiv, {
            center: {lat: 43.1, lng: -79.3},
            zoom: 11
          });
        }
      </script>

    </div>

    <div id = "col2" class = "col-xs-4">

      <div id = "subrow" class = "row">
          
          <div class = "col-xs-6">
            <div id = "eg1">
                <img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
            </div>
          </div>
          
          <div class = "col-xs-6">
            <table class = "table table-condensed">
              <tr>
                <th colspan = 2> Title </th>
              </tr>
    
              <tr>
                <td colspan = 2> 123 address rd </td>
              </tr>
              
              <tr>
                <td> Price </td>
                <td> 450/mth </td>
              </tr>

              <tr>
                <td colspan = 2> Other feature we deem important </td>
              </tr>

              <tr>
                <td> little icons </td>
              </tr>

             </table> 
          </div>
      </div>

      <div id = "subrow" class = "row">
          
          <div class = "col-xs-6">
            <div id = "eg1">
                <img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
            </div>
          </div>
          
          <div class = "col-xs-6">
            <table class = "table table-condensed">
              <tr>
                <th colspan = 2> Title </th>
              </tr>
    
              <tr>
                <td colspan = 2> 123 address rd </td>
              </tr>
              
              <tr>
                <td> Price </td>
                <td> 450/mth </td>
              </tr>

              <tr>
                <td colspan = 2> Other feature we deem important </td>
              </tr>

              <tr>
                <td> little icons </td>
              </tr>

             </table> 
          </div>
      </div>



      <div id = "subrow" class = "row">
          
          <div class = "col-xs-6">
            <div id = "eg1">
                <img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
            </div>
          </div>
          
          <div class = "col-xs-6">
            <table class = "table table-condensed">
              <tr>
                <th colspan = 2> Title </th>
              </tr>
    
              <tr>
                <td colspan = 2> 123 address rd </td>
              </tr>
              
              <tr>
                <td> Price </td>
                <td> 450/mth </td>
              </tr>

              <tr>
                <td colspan = 2> Other feature we deem important </td>
              </tr>

              <tr>
                <td> little icons </td>
              </tr>

             </table> 
          </div>
      </div>


      <div id = "subrow" class = "row">
          
          <div class = "col-xs-6">
            <div id = "eg1">
                <img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
            </div>
          </div>
          
          <div class = "col-xs-6">
            <table class = "table table-condensed">
              <tr>
                <th colspan = 2> Title </th>
              </tr>
    
              <tr>
                <td colspan = 2> 123 address rd </td>
              </tr>
              
              <tr>
                <td> Price </td>
                <td> 450/mth </td>
              </tr>

              <tr>
                <td colspan = 2> Other feature we deem important </td>
              </tr>

              <tr>
                <td> little icons </td>
              </tr>

             </table> 
          </div>
      </div>


      <div id = "subrow" class = "row">
          
          <div class = "col-xs-6">
            <div id = "eg1">
                <img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
            </div>
          </div>
          
          <div class = "col-xs-6">
            <table class = "table table-condensed">
              <tr>
                <th colspan = 2> Title </th>
              </tr>
    
              <tr>
                <td colspan = 2> 123 address rd </td>
              </tr>
              
              <tr>
                <td> Price </td>
                <td> 450/mth </td>
              </tr>

              <tr>
                <td colspan = 2> Other feature we deem important </td>
              </tr>

              <tr>
                <td> little icons </td>
              </tr>

             </table> 
          </div>
      </div>


      <div id = "subrow" class = "row">
          
          <div class = "col-xs-6">
            <div id = "eg1">
                <img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
            </div>
          </div>
          
          <div class = "col-xs-6">
            <table class = "table table-condensed">
              <tr>
                <th colspan = 2> Title </th>
              </tr>
    
              <tr>
                <td colspan = 2> 123 address rd </td>
              </tr>
              
              <tr>
                <td> Price </td>
                <td> 450/mth </td>
              </tr>

              <tr>
                <td colspan = 2> Other feature we deem important </td>
              </tr>

              <tr>
                <td> little icons </td>
              </tr>

             </table> 
          </div>
      </div>



        <div id = "subrow" class = "row">
          
          <div class = "col-xs-6">
            <div id = "eg1">
                <img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
            </div>
          </div>
          
          <div class = "col-xs-6">
            <table class = "table table-condensed">
              <tr>
                <th colspan = 2> Title </th>
              </tr>
    
              <tr>
                <td colspan = 2> 123 address rd </td>
              </tr>
              
              <tr>
                <td> Price </td>
                <td> 450/mth </td>
              </tr>

              <tr>
                <td colspan = 2> Other feature we deem important </td>
              </tr>

              <tr>
                <td> little icons </td>
              </tr>

             </table> 
          </div>
      </div>

    </div>


<script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
        async defer></script>











	@stop

	




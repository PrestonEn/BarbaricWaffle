<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/listingsList.css') !!}" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{!! asset('JS/map.js') !!}"></script>


  @extends('testing.navbarTop')

  @section('content')


  <div class = "pageTitle">
    Available Properties
  </div>

  <div class = "pageBar row">
    <div class = "col-xs-6 col-sm-4">
      <strong> Listings Found : </strong> ##
    </div>
    <div id = "selDiv" class = "col-xs-6 col-sm-4">
      Sort by:
      <select>
        <option> Most Recent </option>
        <option> Lowest Price </option>
        <option> Highest Price </option>
      </select>
    </div>
    <div  id = "refineDiv" class = "panel panel-default col-xs-5 col-sm-4">
      <table class="table-condensed">
        <tr> <th> Search Listings </th> </tr>
        <tr> <td> <input type="text" name = "searchVal"> <button class="btn btn-sm" type = "submit" onClick="#">search</button> </td> </tr>
        <tr> <td> Some additional Search properties here </td> </tr>
      </table>
    </div>
  </div>


  <div class = "pageBody row">


      <div class = "listing col-xs-12">
        <div class = "col-xs-12 col-sm-4">
        <img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
        </div>
        <div class = "col-xs-12 col-sm-8">
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

              <tr>
                <td id = "description">Here is some fun little description about what the house is like and what's nearby and what the buses are like
                  to get from here to anywhere. Fun fun fun fun fun funfunfunfunfunfun.</td>
              </tr>
            </table> 
          </div>
        </div>


      <div class = "listing col-xs-12">
        <div class = "col-xs-12 col-sm-4">
        <img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
        </div>
        <div class = "col-xs-12 col-sm-8">
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

              <tr>
                <td id = "description">Here is some fun little description about what the house is like and what's nearby and what the buses are like
                  to get from here to anywhere. Fun fun fun fun fun funfunfunfunfunfun.</td>
              </tr>
            </table> 
          </div>
        </div>



     <div class = "listing col-xs-12">
        <div class = "col-xs-12 col-sm-4">
        <img class = "img-responsive" src="http://chicagorealestatedude.com/wp-content/uploads/2014/04/house-question.jpg">
        </div>
        <div class = "col-xs-12 col-sm-8">
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

              <tr>
                <td id = "description">Here is some fun little description about what the house is like and what's nearby and what the buses are like
                  to get from here to anywhere. Fun fun fun fun fun funfunfunfunfunfun.</td>
              </tr>
            </table> 
          </div>
        </div>




  </div>


  @stop

  




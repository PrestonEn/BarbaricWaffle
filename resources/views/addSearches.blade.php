<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/addSearches.css') !!}" media="all" rel="stylesheet" type="text/css" />

@extends('navbarTop') @section('content')

<div class = "main">

<div class = "pageTitle">
    Search Properties
  </div>


<div class = "backdrop panel panel-default">

<div class = "row">
	<div class = "col-xs-1"></div>

	<div class = "col-xs-5">
		<label> Region : </label>
		<select> 
			<option> test </option>
		</select>
	</div>
</div>



<div class = "row">

	<b>€ 10</b> <input id="ex2" type="text" class="span2" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]"/> <b>€ 1000</b>
</div>
</div>




@extends ('searchForm')







<script>
	function setValue(name, value){
		document.getElementById(name).value = value;		
	}

	function setSliderValue(value){
		document.getElementById('minRange').value = value;
		document.getElementById('rVal').value = value;
	}
</script>

















</div>
@stop
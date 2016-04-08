<script type="text/javascript" src="{!! asset('JS/nouislider.js') !!}"></script>
<script type="text/javascript" src="{!! asset('JS/nouislider.min.js') !!}"></script>
<link href="{!! asset('CSS/nouislider.css') !!}" media="all" rel="stylesheet" type="text/css" />


<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/addSearches.css') !!}" media="all" rel="stylesheet" type="text/css" />

@extends('navbarTop') @section('content')

<div class = "main">

<div class = "pageTitle">
    Search Properties
  </div>


<div class = "backdrop panel panel-default">




<div class = "row">
	<div class = 'col-sm-1'></div>
	<div class = "col-sm-4">
		<label class = "textLabel"> Region </label>
		<select name = "region">
			<option> All </option>
		</select>
	</div>
</div>

<div class = "row">
	<div class = "col-sm-1"></div>
	<div class = "col-sm-2">
		<label> Min. Price: </label>
		<label id = "lower">test</label>
	</div>
	<div class = "col-xs-10 col-sm-6">
		<div id = "slider"></div>
	</div>
	<div class = "col-xs-0 col-sm-1"></div>
	<div class = "col-sm-2">
		<label> Max. Price: </label>
		<label id = "upper">test</label>
	</div>
</div>

<div class = "row">
	<div class = 'col-sm-1'></div>
	<div class = "col-sm-2">
		<label class = "textLabel"> Pet Friendly </label>
		<input id = "pets" type = "checkbox" value = '0' onClick="getFurther(value)"/>
	</div>
	<div id = "petsBox" class = "col-sm-6">
		<div class = "col-sm-4">
			<label class = "textLabel">Dogs</label>
			<input id = "dogs" type = "checkbox" name = "dogs">
		</div>
		<div class = "col-sm-4">
			<label class = "textLabel">Cats</label>
			<input id = "cats" type = "checkbox" name = "cats">
		</div>
		<div class = "col-sm-4">
			<label class = "textLabel">Dogs</label>
			<input id = "other" type = "checkbox" name = "other">
		</div>
	</div>

</div>


<div class = "row">
	<div class = "col-sm-1"></div>
	<div class = "col-sm-2"><strong> Included in Price : </strong></div>
	<div class = "col-sm-8">
		<div class = "col-sm-3">
			<label class = "textLabel">Kitchen</label>
			<input id = "hasKitchen" type = "checkbox" name = "hasKitchen">
		</div>
		<div class = "col-sm-3">
			<label class = "textLabel">Hydro</label>
			<input id = "hydro" type = "checkbox" name = "hydro">
		</div>
		<div class = "col-sm-3">
			<label class = "textLabel">Internet</label>
			<input id = "internet" type = "checkbox" name = "internet">
		</div>
		<div class = "col-sm-3">
			<label class = "textLabel">Water</label>
			<input id = "water" type = "checkbox" name = "water">
		</div>
	</div>
</div>

<div class = "row">
	<div class = "col-sm-1"></div>
	<div class = "col-sm-2"><strong> Max. Number of Roommates : </strong></div>
	<div class = "col-sm-8">
		<div class = "col-sm-3">
			<select name = "MaxNumRoommates">
				<option value = "any"> Any </option>
				<option value = "5"> 5+ </option>
				<option value = "4"> 4 </option>
				<option value = "3"> 3 </option>
				<option value = "2"> 2 </option>
				<option value = "1"> 1  </option>
			</select>
		</div>
		<div class = "col-sm-2"></div>
		<div class = "col-sm-2">
			<strong>Laundry :</strong>
		</div>
		<div class = "col-sm-4">
			<select name = "Laundry">
				<option value = "any"> Any </option>
				<option value = "coinOper"> On Site (coin operated) </option>
				<option value = "noCost"> On Site (no cost) </option>
				<option value = "n/a"> Unavailable </option>
			</select>
		</div>
	</div>
</div>

<div class = "row">
	<div class = 'col-sm-1'></div>
	<div class = "col-sm-2"><strong> Room Level : </strong></div>
	<div class = "col-sm-8">
		<div class = "col-sm-3">
		<select name = "rmLevel">
			<option value = "any">Any</option>
			<option value = "basement">Basement</option>
			<option value = "mainFloor">Main Floor</option>
			<option value = "upper">Upper Floors</option>
		</select>
		</div>
	</div>
</div>




<!--@extends ('searchForm')-->







<script>


function getFurther(value){
	if (value == 0){
		document.getElementById('petsBox').style.display = 'block';
		document.getElementById('pets').value = 1;
	}
	else if (value == 1){
		document.getElementById('petsBox').style.display = 'none';
		document.getElementById('pets').value = 0;
	}
}



var slider = document.getElementById('slider');

var val = [
	document.getElementById('lower'),
	document.getElementById('upper')
];


var slider = document.getElementById('slider');

noUiSlider.create(slider, {
	start: [ 0, 2000 ],
	connect: true,
	range: {
		'min': [ 0 ],
		'max': [ 2000 ]
	}
});

slider.noUiSlider.on('update', function( values, handle ) {

	val[handle].innerHTML = values[handle];	

	if (document.getElementById('upper').innerHTML == "2000.00"){
		document.getElementById('upper').innerHTML = document.getElementById('upper').innerHTML + "+";
	}
});

</script>

















</div>
@stop
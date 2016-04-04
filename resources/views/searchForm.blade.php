
<link href="{!! asset('CSS/addSearches.css') !!}" media="all" rel="stylesheet" type="text/css" />

<form action="#" method="#">

<div class= "searchPanel img-rounded">

<button class = "btn btn-sm" data-toggle="collapse" data-target="#search">\/</button>
<div id = "search" class = "collapse">

	<div class = "row panel panel-default">
		<div class = "sub col-xs-12">
	<label> Region : </label>
		<select> 
			<option> ALL </option>
		</select>
		</div>

		<div class = "col-xs-12">
			<div class = "col-xs-4" style = "padding-left:0px; padding-right:0px">
				<label id = "minPrice"> Minimum Price : </label>
				<input id = "minVal" class = "textField img-rounded" type="text" value = "400" onChange="minRange.value = this.value"></input>
			</div>
			<div class = "col-xs-8" style = "padding-left:0px;padding-top:1vw">
				<input id = "minRange" type = "range" value = "400" min = "0" max="1500" step = "10" onChange="minVal.value = this.value"/>
			</div>
		</div>

		<div class = "col-xs-12">
			<div class = "col-xs-4" style = "padding-left:0px; padding-right:0px">
				<label id = ""> Maximum Price : </label>
				<input id = "maxVal" class = "textField img-rounded" type="text" value = "1500" onChange="maxRange.value = this.value"></input>
			</div>
			<div class = "col-xs-8" style = "padding-left:0px;padding-top:1vw">
				<input id = "maxRange" type = "range" value = "1500" min = "0" max="1500" step = "10" onChange="maxVal.value = this.value"/>
			</div>
		</div>

		<div class = "col-xs-12">
			<input type="submit"/>
		</div>
	</div>
	<br>
</div>

</div>

</form>
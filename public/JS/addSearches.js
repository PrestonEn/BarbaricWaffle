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



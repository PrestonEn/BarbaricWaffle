$(document).ready(function () {



    var slider = document.getElementById('slider');

    noUiSlider.create(slider, {
        start: [0, 2000],
        connect: true,
        range: {
            'min': [0],
            'max': [2000]
        }
    });

    slider.noUiSlider.on('update', function (values, handle) {

        val[handle].innerHTML = values[handle];

        if (document.getElementById('upper').innerHTML == "2000.00") {
            document.getElementById('upper').innerHTML = document.getElementById('upper').innerHTML + "+";
        }

    });
    
     $('.form-group').on('click', 'input[type=radio]', function () {
        $(this).closest('.form-group').find('.radio-inline, .radio').removeClass('checked');
        $(this).closest('.radio-inline, .radio').addClass('checked');
    });
    $('.form-group').on('click', 'input[type=checkbox]', function () {
        $(this).closest('.checkbox-inline, .checkbox').toggleClass('checked');
    });
    $('.additional-info-wrap input[type=checkbox]').click(function () {
        if ($(this).is(':checked')) {
            $(this).closest('.additional-info-wrap').find('.additional-info').removeClass('hide').find('input,select').removeAttr('disabled');
        } else {
             }
    });
    $('input[type=radio]').click(function () {
        $(this).closest('.form-group').find('.additional-info-wrap .additional-info').addClass('hide').find('input,select').val('').attr('disabled', 'disabled');
        if ($(this).closest('.additional-info-wrap').length > 0) {
            $(this).closest('.additional-info-wrap').find('.additional-info').removeClass('hide').find('input,select').removeAttr('disabled');
        }
    });

});
//extra---------------------
/*
$(document).ready(function () {
    $('.form-group').on('click', 'input[type=radio]', function () {
        $(this).closest('.form-group').find('.radio-inline, .radio').removeClass('checked');
        $(this).closest('.radio-inline, .radio').addClass('checked');
    });
    $('.form-group').on('click', 'input[type=checkbox]', function () {
        $(this).closest('.checkbox-inline, .checkbox').toggleClass('checked');
    });
    $('.additional-info-wrap input[type=checkbox]').click(function () {
        if ($(this).is(':checked')) {
            $(this).closest('.additional-info-wrap').find('.additional-info').removeClass('hide').find('input,select').removeAttr('disabled');
        } else {
            $(this).closest('.additional-info-wrap').find('.additional-info').addClass('hide').find('input,select').val('').attr('disabled', 'disabled');
        }
    });
    $('input[type=radio]').click(function () {
        $(this).closest('.form-group').find('.additional-info-wrap .additional-info').addClass('hide').find('input,select').val('').attr('disabled', 'disabled');
        if ($(this).closest('.additional-info-wrap').length > 0) {
            $(this).closest('.additional-info-wrap').find('.additional-info').removeClass('hide').find('input,select').removeAttr('disabled');
        }
    });
});

*/


//-------------------------
function getFurther(value) {
    if (value == 0) {
        document.getElementById('petsBox').style.display = 'block';
        document.getElementById('pets').value = 1;
    } else if (value == 1) {
        document.getElementById('petsBox').style.display = 'none';
        document.getElementById('pets').value = 0;
    }
}



var val = [
	document.getElementById('lower'),
	document.getElementById('upper')
];
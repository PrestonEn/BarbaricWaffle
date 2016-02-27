$(document).ready(function () {

    $("#features").click(function () {
        
        var outer = $("#outer");
        
         
        if(outer.hasClass("hideFeatures")){
            outer.css({ "max-height": $('#inner').outerHeight() + 'px' });
        }
        else{
            outer.css({ "max-height": "0px;"; "text-align": "center" });
        }
         outer.toggleClass('hideFeatures');
    });
     

});
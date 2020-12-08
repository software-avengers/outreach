$(document).ready(function(){
    //utilities
    $("#needs-utilities").change(function(){
        var util = $("#utilities-warning");
        if(this.checked){
            util.removeClass("d-none");
        } else {
            util.addClass("d-none");
        }
    });
    //gas
    $("#needs-gas").change(function(){
        var gas = $("#gas-warning");
        if(this.checked){
            gas.removeClass("d-none");
        } else{
            gas.addClass("d-none");
        }
    });

    //rent
    $("#needs-rent").change(function(){
        var rent = $("#rent-warning");
        if(this.checked){
            rent.removeClass("d-none");
        } else{
            rent.addClass("d-none");
        }
    });
});
$(document).ready(function(){
    var button = $("#form-switch");
    button.on("click", function(){
        if(button.text()=="Enable Form"){
            if(confirm("Are you sure you want to enable the form?")){
                //if(true){
                updateDatabase();
            }
        } else{
            if(confirm("Are you sure you want to disable the form?")){
                //if(true){
                updateDatabase();
            }
        }
    });

    function updateDatabase(){
        $.post("php/form-switch.php", function(){
            if(button.text()=="Enable Form"){
                button.text("Disable Form");
                button.removeClass("btn-success");
                button.addClass("btn-danger");
            } else{
                button.text("Enable Form");
                button.removeClass("btn-danger");
                button.addClass("btn-success");
            }
        });
    }
});
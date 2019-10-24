$(document).ready(function(){

    $("#precio").keyup(function(){
        if($("#precio").val() >= window.monto){
            $("#precio").val(window.monto);
        }
    });
    
});
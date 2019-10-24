$(document).ready(function(){
    if(window.location.href.includes("Realizados")){
        $("#titulo").text("Pedidos Realizados");
    }
    else{
        $("#titulo").text("Pedidos En Curso");
    }
});
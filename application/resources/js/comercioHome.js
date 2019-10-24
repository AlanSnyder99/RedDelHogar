$(document).ready(function(){

//---Pasar Parámetros al Controlador -----

    $("#botonEliminar").click(function(){
        var id = parseInt($("#menuId").text());
        //window.location = "menu/eliminar";
        $.ajax({
            type:'POST',
            url: 'menu/eliminar',
            data: {'datos': id},
            success:function(resp){
                alert(resp);
            }
        });
    });


});

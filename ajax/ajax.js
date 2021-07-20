
$("#nombre_registro").change(function(){

    //console.log( $("#nombre_registro").val() ); se hace para ver que info trae
    var nombre = $("#nombre_registro").val();
    var datos = new FormData();
    datos.append("nombre", nombre);

    $.ajax({
        url: "ajax/ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        before: function (){

        },
        success: function(respuesta){

            console.log(respuesta);
            if(respuesta == "1" || respuesta === 1){
                $("#nombre_registro").val("");
                $("#nombre_registro").select();
                document.querySelector("div[for='mensaje_error']").innerHTML = "El nombre de usuario ya existe";
            }else{
                document.querySelector("div[for='mensaje_error']").innerHTML = "";
            }

        },
        error:  function(respuesta){

            console.log("ocurrio un error: " + respuesta);

        },
        complete: function(){

        }

    });

});

$("#email_registro").change(function(){

    //console.log( $("#nombre_registro").val() ); se hace para ver que info trae
    var email = $("#email_registro").val();
    var datos = new FormData();
    datos.append("email", email);

    $.ajax({
        url: "ajax/ajax.php",
        method: "POST",
        data: datos,
        cache: true,
        contentType: false,
        processData: false,
        before: function (){

        },
        success: function(respuesta){

            console.log(respuesta);
            if(respuesta == "1" || respuesta === 1){
                $("#email_registro").val("");
                $("#email_registro").select();
                document.querySelector("div[for='mensaje_error']").innerHTML = "El email ingresado ya existe";
            }else{
                document.querySelector("div[for='mensaje_error']").innerHTML = "";
            }

        },
        error:  function(respuesta){

            console.log("ocurrio un error: " + respuesta);

        },
        complete: function(){

        }

    });

});


$(document).ready(function() {
    $("#Institucion").on("change", function(){
        let datoId = $(this).val();
        let otraInstitucion = $(".otraInstitucion");
        if(datoId === "OTRO"){
            otraInstitucion.css("display", "block");
        } else {
            otraInstitucion.css("display", "none");
        }
    });
})
$(document).ready(function(){
    $('#licencecode').on('input', function() {
        var charCount = $(this).val().length;
        if(charCount >= 8){
            var texto = $(this).val();
            $.ajax({
                url: 'comprobarCodigoLicencia.php',
                type: 'POST',
                data: {
                    texto: texto
                },
                success: function(data){
                    if(data != "NO"){
                        $("#ErrCodigos").html(data);
                    }else{
                        $("#ErrCodigos").html("");
                    }
                }
            });
        }
    });
});
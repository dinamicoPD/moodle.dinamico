function rangoInput(input){
    let valorRango = $("#"+input).val();
    $("#"+input+"Span").html(valorRango);

    if(valorRango < 1){
        $("#"+input+"NA").prop("checked", true);
    }else{
        $("#"+input+"NA").prop("checked", false);
    }
}

function rangoInputNA(input){
    if($("#"+input+"NA").prop('checked')){
        $("#"+input).val(0);
        $("#"+input+"Span").html(0);
    }else{
        $("#"+input+"NA").prop("checked", true);
    }
}
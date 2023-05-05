$(document).ready(function(){
var myObject;
var fieldHTML = '<div><select name="field_name[]" id="curso" required class="inputD"><option disabled selected>Curso*</option><option value="1">Primero</option><option value="2">Segundo</option><option value="3">Tercero</option><option value="4">Cuarto</option><option value="5">Quinto</option></select><input type="text" placeholder="sigla" name="field_name2[]" class="inputI"><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="img/remove-icon.png"/></div>'; //New input field html
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        myObject = JSON.parse(this.responseText);
        //alert(myObject[0].id);
      }
    };
    xmlhttp.open("GET","CourseController.php",true);
    xmlhttp.send();

    //var maxField = 10; // Numero maximo de campos*/
    var addButton = $('.add_button'); // Selector del boton de Insertar
    var wrapper = $('.field_wrapper'); // Contenedor de campos
    
    var x = 1; // Iniciamos el contador a 1
    $(addButton).click(function(){ // Una vez que se haga clic en el boton
        $selectfound= $("#curso").get(0).outerHTML;
        fieldHTML = '<div>'+$selectfound+'<input type="text" placeholder="sigla" name="field_name2[]" class="inputI"><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="img/remove-icon.png"/></div>'
        /*if(x < maxField){ //Comprobamos el maximo*/
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Añadimos el HTML
        /*}*/
    });
    $(wrapper).on('click', '.remove_button', function(e){ // Una vez se ha hecho clic en el boton de eliminar
        e.preventDefault();
        $(this).parent('div').remove(); //Eliminamos el div
        x--; // Reducimos el contador a 1
    });

    $("#inscripciondocenteForm").submit(function(e){
        $("body").addClass("loading");
    });
     $("#ResumenForm").submit(function(e){
        $("body").addClass("loading");
    });
});
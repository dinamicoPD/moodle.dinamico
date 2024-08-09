$(document).ready(function() {
    $("#btnSolicitud").click(function() {

        var Departamento = $("#Departamento").val();
        var Ciudad = $("#Ciudad").val();
        var Institucion = $("#Institucion").val();
        var institucionOtro = $("#institucionOtro").val();
        var Nombrecontacto = $("#Nombrecontacto").val();
        var Numerocontacto = $("#Numerocontacto").val();
        var CienciasNaturales = $("#CienciasNaturales").is(':checked');
        var Lenguaje = $("#Lenguaje").is(':checked');
        var Matematicas = $("#Matematicas").is(':checked');
        var Ingles = $("#Ingles").is(':checked');
        var Sociales = $("#Sociales").is(':checked');
        var RolFinanciero = $("#RolFinanciero").is(':checked');
        var RolEmprendimiento = $("#RolEmprendimiento").is(':checked');
        var RallyFinanciero = $("#RallyFinanciero").is(':checked');
        var Prueba= $("#Prueba").is(':checked');
        var ActividadSalon = $("#ActividadSalon").is(':checked');
        var Rally = $("#Rally").is(':checked');

        var Prejar = $("#Prejar").val();
        var Jardin = $("#Jardin").val();
        var Transicion = $("#Transicion").val();
        var PrejarNA = $("#PrejarNA").is(':checked');
        var JardinNA = $("#JardinNA").is(':checked');
        var TransicionNA = $("#TransicionNA").is(':checked');
        var numPres = $("#numPres").val();
        var Primero = $("#Primero").val();
        var Segundo = $("#Segundo").val();
        var Tercero = $("#Tercero").val();
        var Cuarto = $("#Cuarto").val();
        var Quinto = $("#Quinto").val();
        var PrimeroNA = $("#PrimeroNA").is(':checked');
        var SegundoNA = $("#SegundoNA").is(':checked');
        var TerceroNA = $("#TerceroNA").is(':checked');
        var CuartoNA = $("#CuartoNA").is(':checked');
        var QuintoNA = $("#QuintoNA").is(':checked');
        var numPri = $("#numPri").val();
        var Sexto = $("#Sexto").val();
        var Septimo = $("#Septimo").val();
        var Octavo = $("#Octavo").val();
        var Noveno = $("#Noveno").val();
        var Decimo = $("#Decimo").val();
        var Once = $("#Once").val();
        var SextoNA = $("#SextoNA").is(':checked');
        var SeptimoNA = $("#SeptimoNA").is(':checked');
        var OctavoNA = $("#OctavoNA").is(':checked');
        var NovenoNA = $("#NovenoNA").is(':checked');
        var DecimoNA = $("#DecimoNA").is(':checked');
        var OnceNA = $("#OnceNA").is(':checked');
        var numbach = $("#numbach").val();
        var logDecimo = $("#logDecimo").is(':checked');
        var LogUndecimo = $("#LogUndecimo").is(':checked');
        var LogOtro = $("#LogOtro").val();
        var Abono = $("#Abono").val();
        var fechaCapacitacion = $("#fechaCapacitacion").val();
        var PersonalCapacitacionDef = $("#PersonalCapacitacionDef").val();
        var fechaFestival = $("#fechaFestival").val();
        var eventoCapacitacionDef = $("#eventoCapacitacionDef").val();

        var mensaje = "";
        var mensajeErr = "";
        var btn = "";
        
        if(Departamento === null){
            mensajeErr += "Ingrese departamento.<br>";
        }
        if(Ciudad === null){
            mensajeErr += "Ingrese ciudad.<br>";
        }
        if(Institucion === null){
            if(institucionOtro === ""){
                mensajeErr += "Ingrese una institución.<br>";
            }
        }
        if(Nombrecontacto === ""){
            mensajeErr += "Ingrese el nombre del docente.<br>";
        }
        if(Numerocontacto === ""){
            mensajeErr += "Ingrese el número de contacto del docente.<br>";
        }
        if(CienciasNaturales === false && Lenguaje === false && Matematicas === false && Ingles === false && Sociales === false && RolFinanciero === false && RolEmprendimiento === false && RallyFinanciero === false){
            mensajeErr += "Falta seleccionar algún área<br>";
        }
        if(Prueba === false && ActividadSalon === false && Rally === false){
            mensajeErr += "Falta seleccionar alguna actividad<br>";
        }
        if(Prejar != 0 || Jardin != 0 || Transicion != 0){
            if(numPres === "" || numPres == 0){
                mensajeErr += "Ingrese la cantidad promedio de estudiantes en Preescolar<br>";
            }
        }
        if(PrejarNA === true && JardinNA === true && TransicionNA === true){
            if(numPres != ""){
                mensajeErr += "Se determino una cantidad de estudiantes en preescolar pero no habilito los cursos correspondientes<br>";
            }
        }
        if(Primero != 0 || Segundo != 0 || Tercero != 0 || Cuarto != 0 || Quinto !=0 ){
            if(numPri === "" || numPri == 0){
                mensajeErr += "Ingrese la cantidad promedio de estudiantes en Primaria<br>";
            }
        }
        if(PrimeroNA === true && SegundoNA === true && TerceroNA === true && CuartoNA === true && QuintoNA === true){
            if(numPri != ""){
                mensajeErr += "Se determino una cantidad de estudiantes en primaria pero no habilito los cursos correspondientes<br>";
            }
        }
        if(Sexto != 0 || Septimo != 0 || Octavo != 0 || Noveno != 0 || Decimo != 0 || Once != 0){
            if(numbach === "" || numbach == 0){
                mensajeErr += "Ingrese la cantidad promedio de estudiantes en Bachillerato<br>";
            }
        }
        if(SextoNA === true && SeptimoNA === true && OctavoNA === true && NovenoNA === true && DecimoNA === true && OnceNA === true){
            if(numbach != ""){
                mensajeErr += "Se determino una cantidad de estudiantes en bachillerato pero no habilito los cursos correspondientes<br>";
            }
        }
        if(PrejarNA === true && JardinNA === true && TransicionNA === true && PrimeroNA === true && SegundoNA === true && TerceroNA === true && CuartoNA === true && QuintoNA === true && SextoNA === true && SeptimoNA === true && OctavoNA === true && NovenoNA === true && DecimoNA === true && OnceNA === true){
            mensajeErr += "Seleccione los cursos con los que se va realizar el festival<br>";
        }
        if(logDecimo === false && LogUndecimo === false && LogOtro === ""){
            mensajeErr += "Seleccione los estudiantes encargados de la logística<br>";
        }
        if(Abono === ""){
            mensajeErr += "Ingrese el valor del anticipó (Abono)<br>";
        }
        if(fechaCapacitacion === "" || PersonalCapacitacionDef === ""){
            mensajeErr += "Debe ingresar fecha de capacitación<br>";
        }
        if(fechaFestival === "" || eventoCapacitacionDef === ""){
            mensajeErr += "Debe ingresar fecha para el festival<br>";
        }
        
        if(mensajeErr === ""){
            Swal.fire({
                title: 'Crear solicitud:',
                text: 'Está a punto de solicitar el festival. Antes de continuar, le solicitamos que verifique cuidadosamente la información de la solicitud. Le pedimos encarecidamente que tenga en cuenta que, una vez aceptada, no podrá realizar cambios. Si tiene alguna duda, por favor comuníquese al teléfono +57 314 4705547.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                confirmButtonColor: '#F8C62F',
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#formSolicitud').submit();
                }
            });
        }else{
            mensaje = "<div class='px-3 py-5 bg-gradient-danger text-white'><h3>Oops...</h3><p>"+mensajeErr+"</p></div>";
            btn = "<button class='btn btn-secondary' type='button' data-dismiss='modal'>Cancel</button>";
            $("#mensajeModalSolicitud").html(mensaje);
            $("#btnSolicitudModal").html(btn);
            $("#btntituloModal").html("Error");
            $("#enviarSolicitud").modal("show");
        }
        
    });
});
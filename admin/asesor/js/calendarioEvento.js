document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        headerToolbar: {
            start: 'title',
            center: 'prev,next',
            end: 'today multiMonthYear,dayGridMonth'
        },
        buttonText: {
            today: 'Hoy',
            month: 'Mes',
            year: 'Año'
        },
        selectable: true,
        select: function(arg) {
            var selectedDate = arg.startStr;
            const fechaActual = new Date();
            const fechaAgendar = new Date(selectedDate);
            disponible(selectedDate, function(disponibleFestival) {
                if (fechaActual <= fechaAgendar) {
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: 'Seleccione el tipo de evento para la fecha ' + selectedDate,
                        icon: 'question',
                        showDenyButton: true,
                        showCancelButton: true,
                        showCloseButton: true,
                        confirmButtonColor: '#9DD177',
                        denyButtonColor: '#80D2E5',
                        confirmButtonText: 'Capacitación',
                        denyButtonText: 'Festival'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            if(parseInt($("#personalCapacitacion").val()) > disponibleFestival){
                                Swal.fire({
                                    title: "Oops...",
                                    text: "No hay personal disponible en la cantidad solicitada para la capacitación; solo hay "+disponibleFestival+" personas a disposición.",
                                    icon: "error"
                                });
                            }else{
                                if($("#fechaCapacitacion").val()){
                                    Swal.fire({
                                        title: "Oops...",
                                        text: "No puedes programar otra capacitación. Si deseas cambiar la fecha, elimina el evento haciendo clic en él en el calendario y luego vuelve a programarlo.",
                                        icon: "error"
                                    });
                                }else if(fechaAgendar >= new Date($("#fechaFestival").val())){
                                    Swal.fire({
                                        title: "Oops...",
                                        text: "No puedes programar un festival antes de la capacitación",
                                        icon: "error"
                                    });
                                }else{
                                    Swal.fire({
                                    title: 'Capacitación:',
                                    text: 'Está a punto de programarla para el día ' + selectedDate,
                                    showCancelButton: true,
                                    confirmButtonText: 'Guardar',
                                    confirmButtonColor: '#9DD177',
                                    showLoaderOnConfirm: true,
                                    preConfirm: () => {
                                        return new Promise((resolve) => {
                                            $("#fechaCapacitacion").val(selectedDate);
                                            $("#PersonalCapacitacionDef").val($("#personalCapacitacion").val());
                                            calendar.addEvent({
                                                title: "PERSONAL: " + $("#personalCapacitacion").val(),
                                                start: arg.start,
                                                end: arg.end,
                                                allDay: arg.allDay,
                                                color: "#9DD177",
                                                deletable: true
                                            });
                                                resolve();
                                        });
                                    }
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        calendar.unselect();
                                    }
                                });
                                }
                            }
                        }else if (result.isDenied){
                            if(parseInt($("#personalActividad").val()) > disponibleFestival){
                                Swal.fire({
                                    title: "Oops...",
                                    text: "No hay personal disponible en la cantidad solicitada para el festival; solo hay "+disponibleFestival+" personas a disposición.",
                                    icon: "error"
                                });
                            }else{
                                if($("#fechaFestival").val()){
                                    Swal.fire({
                                        title: "Oops...",
                                        text: "No puedes programar otro festival. Si deseas cambiar la fecha, elimina el evento haciendo clic en él en el calendario y luego vuelve a programarlo.",
                                        icon: "error"
                                    });
                                }else if(fechaAgendar <= new Date($("#fechaCapacitacion").val())){
                                    Swal.fire({
                                        title: "Oops...",
                                        text: "No puedes programar un festival antes de la capacitación",
                                        icon: "error"
                                    });
                                }else{
                                    Swal.fire({
                                        title: 'Evento:',
                                        text: 'Está a punto de programarla para el día ' + selectedDate,
                                        showCancelButton: true,
                                        confirmButtonText: 'Guardar',
                                        confirmButtonColor: '#80D2E5',
                                        showLoaderOnConfirm: true,
                                        preConfirm: () => {
                                        $("#fechaFestival").val(selectedDate);
                                        $("#eventoCapacitacionDef").val($("#personalActividad").val());
                                            calendar.addEvent({
                                                title: "PERSONAL: " + $("#personalActividad").val(),
                                                start: arg.start,
                                                end: arg.end,
                                                allDay: arg.allDay,
                                                color: "#80D2E5",
                                                deletable: true
                                            });
                                        },
                                        allowOutsideClick: () => !Swal.isLoading()
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            calendar.unselect();
                                        }
                                    });
                                }
                            }
                        }
                    });
                }else{
                    Swal.fire({
                        title: "Oops...",
                        text: "Fecha inferior al actual",
                        icon: "error"
                    });
                }
            });
        },
        eventClick: function(arg) {
            if (arg.event.extendedProps.deletable !== "false") {
                var fechaAEliminar = new Date(arg.event.start);
                fechaAEliminar = formatearFecha(fechaAEliminar);
                fechaAEliminar = fechaAEliminar;

                var fechaCapacitacion = $("#fechaCapacitacion").val();
                var fechaFestival = $("#fechaFestival").val();

                Swal.fire({
                    title: 'Eliminar evento:',
                    text: '¿Estás seguro de que quieres eliminar este evento?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar',
                    confirmButtonColor: '#F7746D',
                    showLoaderOnConfirm: true,
                }).then((result) => {
                    if (fechaAEliminar === fechaCapacitacion) {
                        $("#fechaCapacitacion").val("");
                        $("#PersonalCapacitacionDef").val("");
                    } else if (fechaAEliminar === fechaFestival) {
                        $("#fechaFestival").val("");
                        $("#eventoCapacitacionDef").val("");
                    }
                    arg.event.remove();
                });

            } else {
                Swal.fire({
                    title: "Oops...",
                    text: "Este evento no se puede eliminar.",
                    icon: "error"
                });
            }
        },
        events: 'get_events.php'
    });
    calendar.render();
});

function formatearFecha(fecha) {
    var dia = fecha.getDate();
    var mes = fecha.getMonth() + 1;
    var anio = fecha.getFullYear();

    if (dia < 10) {
        dia = '0' + dia;
    }
    if (mes < 10) {
        mes = '0' + mes;
    }

    return anio + '-' + mes + '-' + dia;
}

function disponible(selectedDate, callback) {
    $.ajax({
        url: 'festivalesDisponibilidad.php',
        method: 'POST',
        data: {
            selectedDate: selectedDate
        },
        success: function(data) {
            callback(data);
        }
    });
}
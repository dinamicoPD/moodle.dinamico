$('#descargar-contenido').click(function() {
    if ($('#cantidadHojas').val() != '') {
        var divIds = [];
        totalDivs = Number($('#cantidadHojas').val());
        //descargarDiplomas(1, totalDivs);
        descargarDiplomas(1, 20);
    } else {
        alert("Debe generarlos antes de descargar");
    }
});

function descargarDiplomas(i, totalDivs) {
    var zip = new JSZip();
    var promises = [];

    function canvasToBase64(canvas) {
        return new Promise((resolve) => {
            canvas.toBlob((blob) => {
                const reader = new FileReader();
                reader.onload = () => resolve(reader.result.split(',')[1]);
                reader.readAsDataURL(blob);
            });
        });
    }

    for (let j = i; j <= totalDivs; j++) {
        var objetivo = document.querySelector('#tabla_' + j);
        var promise = html2canvas(objetivo, { pixelRatio: 3 }).then(function(canvas) {
            return canvasToBase64(canvas).then((base64Data) => {
                zip.file('tabla_' + j + '.png', base64Data, { base64: true });
            });
        });
        promises.push(promise);
    }

    Promise.all(promises)
    .then(function() {
        zip.generateAsync({ type: 'blob' })
        .then(function(content) {
            saveAs(content, 'codigos.zip');
        });
        console.log('Todos los codigos han sido descargados en un archivo .zip');
    })
    .catch(function(error) {
        console.error('Error al descargar los codigos:', error);
    });
}
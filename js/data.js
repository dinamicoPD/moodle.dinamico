$(document).ready(function(){
	var licenceData = $('#licenceList').DataTable({
		dom: 'Blfrtip',
        buttons: [
            'excelHtml5'
        ],
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'listUser'},
			dataType:"json"
		},
		"columnDefs":[
			{
				"targets":[0, 10, 11,12,13],
				"orderable":false,
			},
		],
		'pageLength': 10,
		'lengthMenu': [[10, 20, 25, 50,100,300,400, 2000,-1], [10, 20, 25, 50,100,300,400, 2000, 'All']]
	});		
	$('#addLicence').click(function(){
		$('#licenceModal').modal('show');
		$('#licenceForm')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Crear Licencia");
		var today = new Date(Date.now());
		var year=today.getFullYear()+1;
		var month = today.getMonth();
		var day = today.getDate();
		var c = new Date(year, month, day);
		$('#licExpr').val(String(formatDate(c,'yyyy-mm-dd')));
		$('#action').val('addLicence');
		$('#save').val('Crear');
	});
	$('#exportLicences').click(function(){
		var action = "exportFile";
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{action:action},
			success:function(data){			
				window.open('http://192.168.0.253/dinapage/LicenceManager.php','_blank' );
				/*var $a = $("<a>");
			    $a.attr("href",data);
			    $a.append("Descargar");
			    $("body").append($a);
			    $a.attr("download","file.xls");*/
			    //$a[0].click();
			    //$a.remove();
			}
		})
	});
	$('#showRowsToExport').click(function(){
		//debugger;
		//licenceData.paging = false;
		/*$('#licenceList').DataTable().destroy();
		licenceData = $('#licenceList').DataTable({
		dom: 'Bfrtip',
        buttons: [
            'excelHtml5'
        ],
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'listUser'},
			dataType:"json"
		},
		"columnDefs":[
			{
				"targets":[0, 10, 11,12,13],
				"orderable":false,
			},
		],
		"paging": false
		});	
		licenceData.ajax.reload();	*/
		//$.fn.DataTable.ext.pager.numbers_length = 0;
	});
	$('#addSeveralLicences').click(function(){
		$('#modalMultipleLicences').modal('show');
		$('#multipleLicenceForm')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Crear Licencias (Masivo)");
		var today = new Date(Date.now());
		var year=today.getFullYear()+1;
		var month = today.getMonth();
		var day = today.getDate();
		var c = new Date(year, month, day);
		$('#licExprMassive').val(String(formatDate(c,'yyyy-mm-dd')));
		$('#multipleLicenceForm #action').val('addLicences');
		$('#saveMassive').val('Crear');
	});
	$("#modalMultipleLicences").on('submit','#multipleLicenceForm', function(event){
		//alert("Hello, you are at the right place");
		event.preventDefault();
		$('#saveMassive').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#multipleLicenceForm')[0].reset();
				$('#modalMultipleLicences').modal('hide');				
				$('#saveMassive').attr('disabled', false);
				licenceData.ajax.reload();
			},
			error: function(xhr, ajaxOptions, thrownError){
				$('#saveMassive').attr('disabled', false);
				alert(eval(xhr.responseJSON).message);
				//alert(eval(ajaxOptions));
			}
		})

	});
	$("#licenceModal").on('submit','#licenceForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#licenceForm')[0].reset();
				$('#licenceModal').modal('hide');				
				$('#save').attr('disabled', false);
				licenceData.ajax.reload();
			},
			error: function(xhr, ajaxOptions, thrownError){
				$('#save').attr('disabled', false);
				alert(eval(xhr.responseJSON).message);
				//alert(eval(ajaxOptions));
			}
		})
	});		
	$("#licenceList").on('click', '.update', function(){
		var licId = $(this).attr("id");
		var action = 'getLicence';
		$.ajax({
			url:'action.php',
			method:"POST",
			data:{licId:licId, action:action},
			dataType:"json",
			success:function(data){
				$('#licenceModal').modal('show');
				$('#licId').val(data.LicenceId);
				if(data.Type == "E"){
					$('#licRol').val("Estudiante");
				}else{
					$('#licRol').val("Profesor");
				}
				$('#licCode').val(data.Code);
				$('#licName').val(data.Title);				
				$('#address').val(data.address);
				$('#licExpr').val(data.FinishDate);	
				$('.modal-title').html("<i class='fa fa-plus'></i> Actualizar Licencia");
				$('#action').val('updateLicence');
				$('#save').val('Actualizar');
			},
			error: function(xhr, ajaxOptions, thrownError){
				$('#save').attr('disabled', false);
				alert(eval(xhr.responseJSON).message);
				//alert(eval(ajaxOptions));
			}
		})
	});
		
	$("#licenceList").on('click', '.delete', function(){
		var licId = $(this).attr("id");
		var action = "deleteLicence";
		if(confirm("Está seguro que quiere "+ $(this).html() +" la Licencia?")) {
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{licId:licId, action:action},
				success:function(data) {					
					licenceData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});
	$("#licenceList").on('click', '.passchange', function(){
		var licenceId =  $(this).attr("id");
		var action = "forcePasswordChange";
		if(confirm("Está seguro que quiere forzar el cambio de contraseña?")){
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{licenceId:licenceId, action:action},
				success:function(data) {					
					alert("Se ha cambiado la contraseña del usuario y ahora tendrá que cambiar la constraseña");
				},
				error: function(xhr, ajaxOptions, thrownError){
					alert(eval(xhr.responseJSON).message);
				}
			})
		} else {
			return false;
		}
	});
	$("#licenceModal").on('click', '.generate', function(){
		
		var action = 'getNewCode';
		$.ajax({
			url:'action.php',
			method:"POST",
			data:{action:action},
			dataType:"json",
			success:function(data){
				$('#licCode').val(data.LicCode);
			}
		})
	});
	$("#licenceList").on('click', '.description-student', function(){
		var idStudent = $(this).attr("id");
		//alert(idStudent);
		$('#groupListStudent').DataTable().clear();
		$('#groupListStudent').DataTable().destroy();
		$('#groupListStudent').DataTable({
		"searching": false, 
		"paging": false,
		"info": false,
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{idStudent:idStudent,action:'listStudentGroup'},
			dataType:"json"
		},
		"columnDefs":[
			{
				"targets":[0, 1, 2],
				"orderable":false,
			},
		],
		"pageLength": 5
	})

	$('#groupsModalStudent').modal('show');
	});
	$("#licenceList").on('click', '.description-teacher', function(){
		var idTeacher = $(this).attr("id");
		//alert(idTeacher);
		$('#groupListTeacher').DataTable().clear();
		$('#groupListTeacher').DataTable().destroy();
		$('#groupListTeacher').DataTable({
		"searching": false, 
		"paging": false,
		"info": false,
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{idTeacher:idTeacher,action:'listTeacherGroup'},
			dataType:"json"
		},
		"columnDefs":[
			{
				"targets":[0, 1, 2],
				"orderable":false,
			},
		],
		"pageLength": 5
	})
	$('#groupsModalTeacher').modal('show');
	});

});
function formatDate(date, format) {
    const map = {
        mm: parseInt(String(date.getMonth() + 1)) < 10 ? "0"+(date.getMonth() + 1):(date.getMonth() + 1),
        //mm: date.getMonth() + 1,
        dd:  parseInt(String(date.getDate())) < 10 ? "0"+(date.getDate()):(date.getDate()),
        yy: date.getFullYear().toString().slice(-2),
        yyyy: date.getFullYear()
    }

    return format.replace(/mm|dd|yyyy/gi, matched => map[matched])
}
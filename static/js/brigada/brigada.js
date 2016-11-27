$(function(){


	//--------CREAR BRIGADA------//
	
	//checkbox para paciente
	var btnsOpTblModels = "<input type='checkbox' id='check'' data-horcod='' data-dmhcod='0'>";	

	$.renderizeRow = function( nRow, aData, iDataIndex ) {
	    
	    $(nRow).append("<td class='text-center'>"+btnsOpTblModels+"</td>");
		$(nRow).attr('id',aData['pac_id']); //codigo
		/*$(nRow).attr('data-pac_sex',aData['pac_sex']);
		$(nRow).attr('data-pac_fec_nac',aData['pac_fec_nac']);
		$(nRow).attr('data-pac_tip_san',aData['pac_tip_san']);
		$(nRow).attr('data-pac_est_civ',aData['pac_est_civ']);
		$(nRow).attr('data-pac_est',aData['pac_est']);*/
	};
	
	//checkbox para medico
	var btnsOpTblModels2 = "<input type='checkbox' id='check'' data-horcod='' data-dmhcod='0'>";	

	$.renderizeRow2 = function( nRow, aData, iDataIndex ) {
	    
	    $(nRow).append("<td class='text-center'>"+btnsOpTblModels2+"</td>");
		$(nRow).attr('id',aData['med_cod']); //codigo
		/*$(nRow).attr('data-pac_sex',aData['pac_sex']);
		$(nRow).attr('data-pac_fec_nac',aData['pac_fec_nac']);
		$(nRow).attr('data-pac_tip_san',aData['pac_tip_san']);
		$(nRow).attr('data-pac_est_civ',aData['pac_est_civ']);
		$(nRow).attr('data-pac_est',aData['pac_est']);*/
	};

	var lngEsp = {
		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		}
	};

	//Llenar tabla de datos
	//Funcion que carga los datos
	$('#tbPaciente').DataTable({
		ordering: true,
		"ajax":{
			"url": "/ceup/cbrigada/getPacientes/",
			"dataSrc": "datos"
		},
		"columns":[{data:"pac_ced"},{data:"pac_nom"},{data:"pac_ape"}],
		"columnDefs": [
			{
				"targets": [2],
				"visivle": false,
				"searchable": false
			}
		],
		"fnCreatedRow": $.renderizeRow,
		"languaje": lngEsp
	});

	$('#tbMedico').DataTable({
		ordering: true,
		"ajax":{
			"url": "/ceup/cbrigada/getMedicos/",
			"dataSrc": "datos"
		},
		"columns":[{data:"med_ced"},{data:"med_nom"},{data:"med_ape"}],
		"columnDefs": [
			{
				"targets": [2],
				"visivle": false,
				"searchable": false
			}
		],
		"fnCreatedRow": $.renderizeRow2,
		"languaje": lngEsp
	});



});
$(function(){

	//$('table').DataTable();

	$('#frmPac').on("submit",function(){
		event.preventDefault();
		$.ajax({
			type:"POST",
			url: "/ceup/cpaciente/save/",
			dataType: 'json',
			data:$(this).serialize(),
			
			success: function(response){
				limp_form_paciente();
				toastr.options={"progressBar": true}
				toastr.success('Paciente registrado con Exito!','Estado');
				//$('#table').DataTable().ajax.reload();
			},

			error: function(){
				toastr.options={"progressBar": true}
				toastr.error('Paciente registrado con Exito!','Estado');
			}
		});
	});
	
	function limp_form_paciente(){
		$('#pac_ced').val("");
		$('#pac_nom').val("");
		$('#pac_ape').val("");
		$('#pac_dir').val("");
		$('#pac_sex').val("");
		$('#pac_fec_nac').val("");
		$('#pac_tip_san').val("");
		$('#pac_est_civ').val("");
	}

	var btnsOpTblModels = "<button style='border: 0; background: transparent' data-target='#modalPaciente' data-toggle='modal' onclick='$.editarModal($(this).parent())'>"+
							"<span class='glyphicon glyphicon-edit' title='Modificar'></span>"+
						  "</button>"+
						  "<button style='border: 0; background: transparent' onclick='$.eliminar($(this).parent())'>"+
							"<span class='glyphicon glyphicon-trash' title='Eliminar'></span>"+
						  "</button>";

	$.renderizeRow = function( nRow, aData, iDataIndex ) {
	    if(aData['pac_est']=='t')
	    {
	   		$(nRow).append("<td class='text-center'>"+
							"<button style='border: 0; background: transparent' onclick='$.eliminar($(this).parent());' id='btnEliminar'>"+
						  	"<span class='glyphicon glyphicon-remove-circle' title='Desactivar'></span>"+
						  	"</button></td>");
	    }
	    else
	    {
	    	$(nRow).append("<td class='text-center'>"+
							"<button style='border: 0; background: transparent' onclick='$.activar($(this).parent());' id='btnActivar'>"+
						  	"<span class='glyphicon glyphicon-ok-circle' title='Activar'></span>"+
						  	"</button></td>");
	    }
	    $(nRow).append("<td class='text-center'>"+btnsOpTblModels+"</td>");
		$(nRow).attr('id',aData['pac_id']); //codigo
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
			"url": "/ceup/cpaciente/get/",
			"dataSrc": "datos"
		},
		"columns":[{data:"pac_ced"},{data:"pac_nom"},{data:"pac_ape"},{data:"pac_dir"},{data:"pac_cor"}],
		"columnDefs": [
			{
				"targets": [5],
				"visivle": false,
				"searchable": false
			}
		],
		"fnCreatedRow": $.renderizeRow,
		"languaje": lngEsp
	});
	
	$("#ltPaciente").click(function(){
			event.preventDefault();
			$('#tbPaciente').DataTable().ajax.reload();
	});

	$.eliminar = function(td){
		var cedula = $(td).parent().children()[0].textContent;//cedula
		$.ajax({
			type: "POST",
			data: {"id":cedula},
			url: "/ceup/cpaciente/delete/", 
			dataType: 'json',
			success: function(response){
				$.notify("Eliminado con exito","success");
				$(td).parent().remove(); // remove a tr
				$('#tbPaciente').DataTable().ajax.reload();
			},

			error: function(response){
				$.notify("Error al eliminar","error");
			}

		});
	};

	$.activar = function(td){
		event.preventDefault();
		var cedula = $(td).parent().children()[0].textContent; //cedula
		$.ajax({
			type: "POST",
			url: "/ceup/cpaciente/activar/", 
			dataType: 'json',
			data: {"id":cedula},			
			success: function(response){
				$.notify("Activado con exito","success");
				$('#tbPaciente').DataTable().ajax.reload();
			},
			error: function(response){
				$.notify("Error al activar","error");
			}
		});
	};

	$.editarModal = function(td)
	{
		var tr = $(td).parent().children();
		var ced = tr[0].textContent;
		var nom = tr[1].textContent;
		var ape = tr[2].textContent;
		var dir = tr[3].textContent;
		var tel = tr[4].textContent;
		var eml = tr[5].textContent;
		$('#myModalLabel').html("Editar");
		$('#mmed_nom').val(nom);
		$('#mmed_ape').val(ape);
		$('#mmed_dir').val(dir);
		$('#mmed_tel').val(tel);
		$('#mmed_eml').val(eml);
		$('#txtId').val(ced);
	};

	$('#btnModalGuardar').click(function(){
		event.preventDefault();
		$.ajax({
			type: "POST",
			data: { 
					"med_ced": $('#txtId').val(),
					"med_nom": $('#mmed_nom').val(), 
					"med_ape": $('#mmed_ape').val(), 
					"med_dir": $('#mmed_dir').val(),
					"med_tel": $('#mmed_tel').val(),
					"med_eml": $('#mmed_eml').val()
					},
			url: "/sgcm/cmedico/update/",
			dataType: 'json',			
			
			success: function(response){
				$('#modalPaciente').modal('hide');				
				$.notify("Medico editado con exito","success");
				$('#tbPaciente').DataTable().ajax.reload();
			},

			error: function(response){
				$.notify("Error al editar","error");
			}

		});
	});
			
	$('#modalPaciente').bind('shown.bs.modal' , function(){
		med_nom.focus();
	});
	
	
});


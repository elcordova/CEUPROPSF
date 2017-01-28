$(function(){

	$('#frmEsp').on("submit",function(){
		event.preventDefault();
		$.ajax({
			type:"POST",
			url: "/ceup/cespecialidad/save/",
			dataType: 'json',
			data:$(this).serialize(),
			success: function(response){
				$('#esp_des').val("");
				$('#esp_des').focus();
				$.notify("Guardado con exito","success");
			},

			error: function(){
				$.notify("Error","error");
			}
		});

	});

	var btnsOpTblModels = "<button style='border: 0; background: transparent' data-target='#modalEspecialidad' data-toggle='modal' onclick='$.editarModal($(this).parent())'>"+
							"<span class='glyphicon glyphicon-edit' title='Modificar'></span>"+
						  "</button>"+
						  "<button style='border: 0; background: transparent' onclick='$.eliminar($(this).parent())'>"+
							"<span class='glyphicon glyphicon-trash' title='Eliminar'></span>"+
						  "</button>";

	$.renderizeRow = function( nRow, aData, iDataIndex ) {
	   $(nRow).append("<td class='text-center'>"+btnsOpTblModels+"</td>");
	   //$(nRow).attr('id',aData['med_cod']); //
	};

	//Llenar tabla de datos
		$('#tbEspecialidad').DataTable({
			ordering: true,
			"ajax":{
				"url": "/ceup/cespecialidad/get/",
				"dataSrc": "datos"
			},
			"columns":[{data:"esp_cod"},{data: "esp_des"}],
	        "fnCreatedRow": $.renderizeRow

		});

	$("#ltEspecialidad").click(function(){
			event.preventDefault();
			$('#tbEspecialidad').DataTable().ajax.reload();
	});


	$.editarModal = function(td)
	{
		var tr = $(td).parent().children();
		var cod = tr[0].textContent;
		var des = tr[1].textContent;
		$('#myModalLabel').html("Editar");
		$('#mesp_des').val(des);
		$('#txtId').val(cod);
	};

	$('#btnModalGuardar').click(function(){
		event.preventDefault();
		$.ajax({
			type: "POST",
			data: {
					"esp_cod":$('#txtId').val() ,
					"esp_des": $('#mesp_des').val()
				  },
			url: "/ceup/cespecialidad/update/",
			dataType: 'json',

			success: function(response){
				$('#modalEspecialidad').modal('hide');
				$.notify("Modificado con exito","success");
				$('#tbEspecialidad').DataTable().ajax.reload();

			},

			error: function(response){
				$.notify("Error al editar","error");
			}

		});
	});

	$.eliminar = function(td){
		var cedula = $(td).parent().children()[0].textContent; //cedula
		$.ajax({
			type: "POST",
			url: "/ceup/cespecialidad/delete/",
			data: {"id":cedula},
			dataType: 'json',
			success: function(response){
				$.notify("Eliminado con exito","success");
				$('#tbEspecialidad').DataTable().row($(td).parent()).remove().draw(); // remove a tr
			},

			error: function(response){
				$.notify("Error al eliminar, contactarse con el Administrador","error");
			}

		});
	};

	$('#modalEspecialidad').bind('shown.bs.modal' , function(){
		mesp_des.focus();
	});


});

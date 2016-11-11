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
	//Funcion que carga los datos
	$.fnTbl('#tbEspecialidad',
			"/ceup/cespecialidad/get/",
			[	{data:"esp_cod"},
				{data:"esp_des"}
			],
			$.renderizeRow);
	
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
				$(td).parent().remove(); // remove a tr				
			},

			error: function(response){
				$.notify("Error al eliminar","error");
			}

		});
	};
			
	$('#modalEspecialidad').bind('shown.bs.modal' , function(){
		mesp_des.focus();
	});
	
	
});


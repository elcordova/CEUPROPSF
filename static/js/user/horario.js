$(function(){

	$('#frmNewHorario').on("submit",function(){
		event.preventDefault(); // no permite recarga
		$.ajax({
			type: "POST",
			url: "/ceup/chorario/save/",
			dataType: 'json',
			data: $(this).serialize(),
			success: function(response){
				$.notify("Guardado Correctamente","success");
				$('#hor_des').val("");
				hor_des.focus();
			},

			error: function(){
				$.notify("Error","error");
			}

			});		
	});

	$.editarModal = function(td)
	{
		var tr = $(td).parent().children();
		var hor_des = tr[0].textContent;
		$('#myModalLabel').html("Editar");
		$('#mhor_des').val(hor_des);
		$('#txtId').val($(td).parent().attr('id'));
	};

	$.eliminar = function(td)
	{
		$.ajax({
			type: "POST",
			url: "/ceup/chorario/delete/", 
			data: {"hor_cod":$(td).parent().attr('id')},
			dataType: 'json',
			success: function(response){
				$.notify("Eliminado con exito","success");
				$('#tbHorario').DataTable().row($(td).parent()).remove().draw(); // remove a tr
			},

			error: function(response){
				$.notify("El horario esta asignado, NO se puede eliminar","error");
			}

		});
	};


	var btnsOpTblModels = "<button style='border: 0; background: transparent' data-target='#modalHorario' data-toggle='modal' title='Editar' onclick='$.editarModal($(this).parent())'>"+
							"<span class='glyphicon glyphicon-edit'></span>"+
						  "</button>"+
						  "<button style='border: 0; background: transparent' title='Eliminar' onclick='$.eliminar($(this).parent())'>"+
							"<span class='glyphicon glyphicon-remove'></span>"+
						  "</button>";

	$.renderizeRow = function( nRow, aData, iDataIndex ) {
	   $(nRow).append("<td class='text-center'>"+btnsOpTblModels+"</td>");
	   $(nRow).attr('id',aData['hor_cod']); // 
	   $($(nRow).children('td')).addClass("text-center"); //centra el texto
	};
	
	var flagLoadTable = true;
	$("#ltHorario").click(function(){
			event.preventDefault();
			if(flagLoadTable)
			{
				//Funcion que carga los datos
				$.fnTbl('#tbHorario',"/ceup/chorario/get/",[{data:"hor_des"}],$.renderizeRow);
				flagLoadTable = false;
			}
			else
			{
				$('#tbHorario').DataTable().ajax.reload();	
			}
	});


	$('#btnModalGuardar').click(function(){
		event.preventDefault();
		$.ajax({
			type: "POST",
			data: {
					"hor_cod":$('#txtId').val() , 
					"hor_des":$('#mhor_des').val()
				},
			url: "/ceup/chorario/update/",
			dataType: 'json',
			
			success: function(response){
				$('#modalHorario').modal('hide');
				$.notify("Horario editado con exito","success");
				$('#tbHorario').DataTable().ajax.reload();
			},

			error: function(response){
				$.notify("Error al editar","error");
			}

		});
	});

});
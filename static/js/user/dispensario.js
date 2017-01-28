$(function(){
	
	/***************
	* GUARDAR
	****************/
	$('#frmDispensario').on("submit",function(){
		event.preventDefault();
		$.ajax({
			type:"POST",
			url: "/ceup/cdispensario/save/",
			dataType: 'json',
			data:$(this).serialize(),
			
			success: function(response){
				$.notify("Guardado Correctamente","success");				
				$('#dis_nom').val("");				
				$('#dis_dir').val("");
				$('#dis_tel').val("");
				$('#dis_eml').val("");
			},

			error: function(){
				$.notify("Error","error");
			}
		});
	});

	/***************
	* LISTAR
	****************/
	var btnsOpTblModels = "<button style='border: 0; background: transparent' data-target='#modalMedico' data-toggle='modal' onclick='$.editarModal($(this).parent())' title='Editar'>"+
							"<span class='glyphicon glyphicon-edit'></span>"+
						  "</button>";

	$.renderizeRow = function( nRow, aData, iDataIndex ) 
	{
		if (aData['dis_est'] === "t")
			{
				$(nRow).append("<td>"+
									"<label class='switch'>"+
									"<input class='switch-input' type='checkbox' checked value='true' id=check"+aData['dis_cod']+" name="+aData['dis_cod']+" data-check='p'>"+
									"<span class='switch-label' data-on='Activo' data-off='Inactivo'></span>"+
									"<span class='switch-handle'></span>"+
									"</label>"+
								"</td>");
			}
			else
			{
				$(nRow).append("<td>"+
								"<label class='switch'>"+
									"<input class='switch-input' type='checkbox' value='false' id=check"+aData['dis_cod']+" name="+aData['dis_cod']+" data-check='p'>"+
									"<span class='switch-label' data-on='Activo' data-off='Inactivo'></span>"+
									"<span class='switch-handle'></span>"+
									"</label>"+
								"</td>");
			}	
	   $(nRow).append("<td class='text-center'>"+btnsOpTblModels+"</td>");
	   $(nRow).attr('id',aData['dis_cod']);
	   $(nRow).attr('data-dis_nom',aData['dis_nom']);
	   $(nRow).attr('data-dis_dir',aData['dis_dir']);
	};
	
	
	var flagLoadTable = true;
	$("#ltDispensario").click(function(){
			event.preventDefault();
			if (flagLoadTable)
			{
				//Funcion que carga los datos
				$.fnTbl('#tbDispensario',"/ceup/cdispensario/get/",[{data:"dis_nom"},{data:"dis_dir"},{data:"dis_tel"},{data:"dis_eml"}],$.renderizeRow);
				flagLoadTable=false;
			}
			else
			{
				$('#tbDispensario').DataTable().ajax.reload();	
			}
	});

	/***************
	* EDITAR
	****************/

	$.editarModal = function(td)
	{
		var tr = $(td).parent().children();		
		var nom = $(td).parent().attr('data-dis_nom');
		var dir = $(td).parent().attr('data-dis_dir');
		var tel = tr[2].textContent;
		var eml = tr[3].textContent;
		$('#myModalLabel').html("Editar");
		$('#mdis_nom').val(nom);
		$('#mdis_dir').val(dir);
		$('#mdis_tel').val(tel);
		$('#mdis_eml').val(eml);
		$('#mdis_est').val($($(tr[4]).children().children()[0]).val());
		$('#txtId').val($(td).parent().attr('id'));
	};

	$('#btnModalGuardar').click(function(){
		event.preventDefault();
		$.ajax({
			type: "POST",
			data: { 
					"dis_cod": $('#txtId').val(),
					"dis_nom": $('#mdis_nom').val(), 					
					"dis_dir": $('#mdis_dir').val(),
					"dis_tel": $('#mdis_tel').val(),
					"dis_eml": $('#mdis_eml').val(),
					"dis_est": $('#mdis_est').val()
					},
			url: "/ceup/cdispensario/update/",
			dataType: 'json',			
			
			success: function(response){
				$('#modalMedico').modal('hide');				
				$.notify("Medico editado con exito","success");
				$('#tbDispensario').DataTable().ajax.reload();
			},

			error: function(response){
				$.notify("Error al editar","error");
			}

		});
	});
			
	$('#modalMedico').bind('shown.bs.modal' , function(){
		dis_nom.focus();
	});

	/******************
	* ACTUALIZAR ESTADO
	* CONTROLA LOS EVENTOS DE LOS CHECKBOXES
	*******************/	
	$(document).on('change', '[type=checkbox]', function(e){

		if ($(this).attr('data-check') === 'p')
		{
			($(this).val() === "true") ?$(this).val(false):$(this).val(true);
			var id 		= $(this).attr('name');
			var estado 	= $(this).val();
			var url 	= '/ceup/cdispensario/delete/';
			$.ajax({
					type	:"POST",
					url		: url,
					dataType: 'json',
					data:{
							"dis_cod"	: id,
							"dis_e"		: estado
						},
					success: function(response){
						$.notify("Estado actualizado correctamente","success");
					},

					error: function(){
						$.notify("Error al editar","error");
					}
			});
		}
	}); // FIN CONTROL DE CHECKBOXES

});
$(function(){

	$('#frmMed').on("submit",function(){
		event.preventDefault();
		$.ajax({
			type:"POST",
			url: "/ceup/cmedico/save/",
			dataType: 'json',
			data:$(this).serialize(),

			success: function(response){

				$('#med_ced').val("");
				$('#med_nom').val("");
				$('#med_ape').val("");
				$('#med_dir').val("");
				$('#med_tel').val("");
				$('#med_eml').val("");
				toastr.success('Medico guardado con Exito!', 'Estado');
			},

			error: function(){
				toastr.error('Error en el servidor!', 'Estado');
			}
		});

	});

	var btnsOpTblModels = "<button style='border: 0; background: transparent' data-target='#modalMedico' data-toggle='modal' onclick='$.editarModal($(this).parent())'>"+
							"<span class='glyphicon glyphicon-edit' title='Modificar'></span>"+
						  "</button>"+
						  "<button style='border: 0; background: transparent' onclick='$.eliminar($(this).parent())'>"+
							"<span class='glyphicon glyphicon-trash' title='Eliminar'></span>"+
						  "</button>";

	$.renderizeRow = function( nRow, aData, iDataIndex ) {
	   $(nRow).append("<td class='text-center'>"+btnsOpTblModels+"</td>");
	   $(nRow).attr('id',aData['med_cod']); //
	   $(nRow).attr('data-dir',aData['med_dir']);
	};


			//Llenar tabla de datos
			$('#tbMedico').DataTable({
				ordering: true,
				"ajax":{
					"url": "/ceup/cmedico/get/",
					"dataSrc": "datos"
				},
				"columns":[	{data:"med_ced"},
										{data:"med_nom"},
										{data:"med_ape"},
										{data:"med_tel"},
										{data:"med_eml"}
									],
		        "fnCreatedRow": $.renderizeRow

			});

	$("#ltMedico").click(function(){
			event.preventDefault();
			$('#tbMedico').DataTable().ajax.reload();
	});

	$.eliminar = function(td){
		var tr = $(td).parent().children();
		var med_ced = tr[0].textContent;
		var med_e = 'FALSE';
		$.ajax({
			type: "POST",
			data: {"med_ced":med_ced,"med_e":med_e},
			url: "/ceup/cmedico/delete/",
			dataType: 'json',
			success: function(response){
				event.preventDefault();
				toastr.success('Medico eliminado con Exito!', 'Estado');
				$('#tbMedico').DataTable().row($(td).parent()).remove().draw();
			},

			error: function(response){
				toastr.error('Error en el servidor!', 'Estado');
			}

		});
	};

	$.editarModal = function(td)
	{
		var tr = $(td).parent().children();
		var ced = tr[0].textContent;
		var nom = tr[1].textContent;
		var ape = tr[2].textContent;
		var tel = tr[3].textContent;
		var eml = tr[4].textContent;
		$('#myModalLabel').html("Editar");
		$('#mmed_nom').val(nom);
		$('#mmed_ape').val(ape);
		$('#mmed_dir').val($(td).parent().attr('data-dir'));
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
			url: "/ceup/cmedico/update/",
			dataType: 'json',

			success: function(response){
				$('#modalMedico').modal('hide');
				toastr.success('Medico editado con Exito!', 'Estado');
				$('#tbMedico').DataTable().ajax.reload();
			},

			error: function(response){
				toastr.success('Error del servidor !', 'Estado');
			}

		});
	});

	$('#modalMedico').bind('shown.bs.modal' , function(){
		med_nom.focus();
	});


});

$(function(){

		var dataNoticias = {};
		/**+++++++++++++++++++
		*	CARGA COMBO BOX DE NOTICIAS
		*+++++++++++++++++++++
		*/
		$.getDataForNoticia = function(response)
		{
			dataNoticias = response;
			$("#noticia").select2({
					data: response
				})
				/*
			*/
		};
		$.post("/ceup/cevento/get_noticias/",$.getDataForNoticia);
		//***********************************************************
		$('#frmEvento').on("submit",function(e){
			event.preventDefault();
			console.log($(this).serialize());
			$.ajax({
				type:"POST",
				url: "/ceup/cevento/save/",
				dataType: 'json',
				data:$(this).serialize(),
				success: function(response){
					$('#eve_tit').val("");
					$('#eve_res').val("");
					$('#eve_dir').val("");
					$('#eve_fec_ini').val("");
					$('#eve_fec_fin').val("");
					toastr.options={"progressBar": true}
					toastr.success('Evento Agregado con Exito!','Estado');
				},

				error: function(){
					toastr.error('Error','Estado');
				}
			});
		})

		var btnsOpTblModels = "<button style='border: 0; background: transparent' data-target='#eventoModal' data-toggle='modal' onclick='$.editarModal($(this).parent())'>"+
								"<span class='glyphicon glyphicon-edit' title='Modificar'></span>"+
							  "</button>"+
							  "<button style='border: 0; background: transparent' onclick='$.eliminar($(this).parent())'>"+
								"<span class='glyphicon glyphicon-trash' title='Eliminar'></span>"+
							  "</button>";

		$.renderizeRow = function( nRow, aData, iDataIndex ) {
		   $(nRow).append("<td class='text-center'>"+btnsOpTblModels+"</td>");
		   $(nRow).attr('data-id',aData['eve_id']);
			 $(nRow).attr('data-ini',aData['eve_fec_ini']);
			 $(nRow).attr('data-fin',aData['eve_fec_fin']);
			 $(nRow).attr('data-not-id',aData['not_id']);
		};

			//Llenar tabla de datos
			$('#tbEvento').DataTable({
				ordering: true,
				"ajax":{
					"url": "/ceup/cevento/get/",
					"dataSrc": "datos"
				},
				"columns":[	{data:"fecha"},
										{data:"eve_tit"},
										{data:"eve_dir"},
										{data:"eve_res"}
									],
						"fnCreatedRow": $.renderizeRow

			});

		$("#ltEvento").click(function(){
				event.preventDefault();
				$('#tbEvento').DataTable().ajax.reload();
		});

		$.editarModal = function(td)
		{
			var tr = $(td).parent().children();
			$('#eve_id_edt').val($(td).parent().attr('data-id'));
			$('#eve_tit_edt').val(tr[1].textContent);
			$('#eve_dir_edt').val(tr[2].textContent);
			$('#eve_fec_ini_edt').val($(td).parent().attr('data-ini'));
			$('#eve_fec_fin_edt').val($(td).parent().attr('data-fin'));
			$('#eve_res_edt').val(tr[3].textContent);
			$('#noticia_edt').val($(td).parent().attr('data-not-id'));
		};

		$('#eventoModal').bind('shown.bs.modal' , function(){
			eve_tit_edt.focus();
			$("#noticia_edt").select2({
				data: dataNoticias
			});

		});

});

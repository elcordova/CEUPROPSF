$(document).ready(function(){

	$('#btn_pc').click(function(){

		$('#modal_pc').modal('show');
		$.ajax({
			url:'/ceup/Cconsultas/get_pc/',
			type:'POST',
			dateType:'json',
			data:{'con_id':$('#cod_consulta').val()},
			success:function(res){
				console.info(res);
				$('#pc_id').val('pc_id');
				$('#pc_olfatorio').val(res['pc_olfatorio']);
				$('#pc_optico').val(res['pc_optico']);
				$('#pc_moc').val(res['pc_moc']);
				$('#pc_patetico').val(res['pc_patetico']);
				$('#pc_trigemino').val(res['pc_trigemino']);
				$('#pc_moe').val(res['pc_moe']);
				$('#pc_fascial').val(res['pc_fascial']);
				$('#pc_vestibulococlear').val(res['pc_vestibulococlear']);
				$('#pc_glosofaringeo').val(res['pc_glosofaringeo']);
				$('#pc_neumogastrico').val(res['pc_neumogastrico']);
				$('#pc_espinal').val(res['pc_espinal']);
				$('#pc_hipogloso').val(res['pc_hipogloso']);

			},
			error:function(res){
				console.info(res);

			}

		});
	
	});


	$('#btn_guardar_pc').click(function(){

		if (!$('#pc_id').val()){
			$.ajax({
				type:'POST',
				data:{'con_id':$('#cod_consulta').val(),
					  'pc_olfatorio':$('#pc_olfatorio').val(),
					  'pc_optico':$('#pc_optico').val(),
					  'pc_moc':$('#pc_moc').val(),
					  'pc_patetico':$('#pc_patetico').val(),
					  'pc_trigemino':$('#pc_trigemino').val(),
					  'pc_moe':$('#pc_moe').val(),
					  'pc_fascial':$('#pc_fascial').val(),
					  'pc_vestibulococlear':$('#pc_vestibulococlear').val(),
					  'pc_glosofaringeo':$('#pc_glosofaringeo').val(),
					  'pc_neumogastrico':$('#pc_neumogastrico').val(),
					  'pc_neumogastrico':$('#pc_neumogastrico').val(),
					  'pc_espinal':$('#pc_espinal').val(),
					  'pc_hipogloso':$('#pc_hipogloso').val()
				},
				dataType:'json',
				url:'/ceup/Cconsultas/add_pc/',
				success:function(res){
					console.info(res);
					toastr.options={"progressBar": true}
					toastr.success('Datos Guardados','Estado');
					$('#pc_id').val(res);
					$('#btn_pc').removeClass("btn-info");
					$('#btn_pc').addClass("btn-success");
					$('#modal_pc').modal('toggle');

				},
				error:function(res){
					console.info(res);
					toastr.options={"progressBar": true};
					toastr.error('Error al Guardar valores','Estado');
				}

			});
	
		}else {

			$.ajax({
				type:'POST',
				data:{'con_id':$('#cod_consulta').val(),
					  'pc_olfatorio':$('#pc_olfatorio').val(),
					  'pc_optico':$('#pc_optico').val(),
					  'pc_moc':$('#pc_moc').val(),
					  'pc_patetico':$('#pc_patetico').val(),
					  'pc_trigemino':$('#pc_trigemino').val(),
					  'pc_moe':$('#pc_moe').val(),
					  'pc_fascial':$('#pc_fascial').val(),
					  'pc_vestibulococlear':$('#pc_vestibulococlear').val(),
					  'pc_glosofaringeo':$('#pc_glosofaringeo').val(),
					  'pc_neumogastrico':$('#pc_neumogastrico').val(),
					  'pc_neumogastrico':$('#pc_neumogastrico').val(),
					  'pc_espinal':$('#pc_espinal').val(),
					  'pc_hipogloso':$('#pc_hipogloso').val()
				},
				dataType:'json',
				url:'/ceup/Cconsultas/edit_pc/',
				success:function(res){
					console.info(res);
					toastr.options={"progressBar": true};
					toastr.success('Datos Editados','Estado');
					$('#btn_pc').removeClass("btn-info");
					$('#btn_pc').addClass("btn-success");
					$('#modal_pc').modal('toggle');

				},
				error:function(res){
					console.info(res);
					toastr.options={"progressBar": true};
					toastr.error('Error al Editar valores','Estado');
				}

			});
				

		}



	});

});
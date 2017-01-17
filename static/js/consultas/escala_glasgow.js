$(document).ready(function(){

	$('#btn_eg').click(function(){
				$('#eg_o').val("");
				$('#eg_m').val("");
				$('#eg_v').val("");
				$('#eg_total').val("");
		$('#modal_eg').modal('show');
		$.ajax({
			url:'/ceup/Cconsultas/get_eg/',
			type:'POST',
			dataType:'json',
			data:{'con_id':$('#cod_consulta').val() },
			success:function(res){
				console.info(res);
        $('#eg_id').val(res['eg_id']);
				$('#eg_o').val(res['eg_o']);
				$('#eg_m').val(res['eg_m']);
				$('#eg_v').val(res['eg_v']);
				$('#eg_total').val(res['eg_total']);
			}
		});
	});

	$('#btn_guardar_eg').click(function(){
		if (!$('#eg_id').val()){
			
			$.ajax({
				type:'POST',
				data:{'con_id':$('#cod_consulta').val(),
					  'eg_o':$('#eg_o').val(),
					  'eg_m':$('#eg_m').val(),
					  'eg_v':$('#eg_v').val(),
					  'eg_total':$('#eg_total').val()
				},
				dataType:'json',
				url:'/ceup/Cconsultas/add_eg/',
				success:function(res){
					console.info(res);
					toastr.options={"progressBar": true}
					toastr.success('Datos Guardados','Estado');
					$('#eg_id').val(res);
					$('#btn_eg').removeClass("btn-info");
					$('#btn_eg').addClass("btn-success");
					$('#modal_eg').modal('toggle');

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
					  'eg_o':$('#eg_o').val(),
					  'eg_m':$('#eg_m').val(),
					  'eg_v':$('#eg_v').val(),
					  'eg_total':$('#eg_total').val()
				},
				dataType:'json',
				url:'/ceup/Cconsultas/edit_eg/',
				success:function(res){
					console.info(res);
					toastr.options={"progressBar": true};
					toastr.success('Datos Editados','Estado');
					$('#btn_eg').removeClass("btn-info");
					$('#btn_eg').addClass("btn-success");
					$('#modal_eg').modal('toggle');

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
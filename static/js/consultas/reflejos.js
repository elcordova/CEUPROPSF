$(document).ready(function(){
	$('#btn_reflejos').click(function(){
		$('#modal_reflejos').modal('show');
		cargar_reflejos();
		
		
		
	});

	$('#btn_guardar_reflejos').click(function(){
		if($('#reflejos_id').val()){
			editar_reflejos();
		}else {
			agregar_reflejos();
		}
	});

	function cargar_reflejos(){
		$.ajax({
		url:'/ceup/Cconsultas/get_reflejos/',
		type: 'POST',
		dataType:'json',
		data:{'con_id': $('#cod_consulta').val()},
			success:function(res){
				//console.info(res);
				if (res) {
					$('#reflejos_id').val(res['ref_id']);	
					$('#ref_bicipital').val(res['ref_bicipital']);
					$('#ref_tricipital').val(res['ref_tricipital']);
					$('#ref_rotuliano').val(res['ref_rotuliano']);
				}
			}	
		});

	}


	function editar_reflejos(){
		$.ajax({
			url:'/ceup/Cconsultas/edit_reflejos/',
			type: 'POST',
			dataType:'json',
			data:{'con_id': $('#cod_consulta').val(),
				  'ref_bicipital':$('#ref_bicipital').val(),
				  'ref_tricipital':$('#ref_tricipital').val(),
				  'ref_rotuliano':$('#ref_rotuliano').val()
				},
			success:function(res){
				toastr.options={"progressBar": true}
				toastr.success('Datos Editados','Estado');
				$('#btn_reflejos').removeClass("btn-info");
				$('#btn_reflejos').addClass("btn-success");
				$('#modal_reflejos').modal('toggle');
			},
			error:function(res){
				toastr.options={"progressBar": true};
				toastr.error('Error al Editar valores','Estado');
			}

		});
	}

	function agregar_reflejos(){
		$.ajax({
			url:'/ceup/Cconsultas/add_reflejos/',
			type: 'POST',
			dataType:'json',
			data:{'con_id': $('#cod_consulta').val(),
				  'ref_bicipital':$('#ref_bicipital').val(),
				  'ref_tricipital':$('#ref_tricipital').val(),
				  'ref_rotuliano':$('#ref_rotuliano').val()
				},
			success:function(res){
				$('#reflejos_id').val(res);
				toastr.options={"progressBar": true}
				toastr.success('Datos Agregados','Estado');
				$('#btn_reflejos').removeClass("btn-info");
				$('#btn_reflejos').addClass("btn-success");
				$('#modal_reflejos').modal('toggle');
			},
			error:function(res){
				toastr.options={"progressBar": true};
				toastr.error('Error al agregar valores','Estado');
			}
		});
	}

});
$(document).ready(function(){

	$('#btn_motilidad').click(function(){
		cargar_motilidad();
		$('#modal_motilidad').modal('show');
	});

	$('#btn_guardar_motilidad').click(function(){
		if($('#motilidad_id').val()){
			editar_motilidad();
		}else {
			agregar_motilidad();
		}
	});

	function cargar_motilidad(){
		$.ajax({
			url:'/ceup/Cconsultas/get_motilidad/',
			type:'POST',
			dataType:'json',
			data:{'con_id':$('#cod_consulta').val()},
			success:function(res){
				if (res) {
					$('#motilidad_id').val(res['mot_id']);
					$('#mod_activa_pasiva').val(res['mod_activa_pasiva']);
					$('#mot_fuerza_muscular').val(res['mot_fuerza_muscular']);
					
				}
				console.info(res);
			},
			error:function(res){
				console.info(res);
			}
		});
	}

	function agregar_motilidad(){
		$.ajax({
			url:'/ceup/Cconsultas/add_motilidad/',
			type:'POST',
			dataType:'json',
			data:{
				'con_id':$('#cod_consulta').val(),
				'mod_activa_pasiva':$('#mod_activa_pasiva').val(),
				'mot_fuerza_muscular':$('#mot_fuerza_muscular').val()
			},
			success:function(res){
				$('#motilidad_id').val(res);
				console.info(res);
				toastr.options={"progressBar": true}
				toastr.success('Datos Agregados','Estado');
				$('#btn_motilidad').removeClass("btn-info");
				$('#btn_motilidad').addClass("btn-success");
				$('#modal_motilidad').modal('toggle');
			},
			error:function(res){
				console.info(res);
				toastr.options={"progressBar": true};
				toastr.error('Error al agregar valores','Estado');
			}
		});
	}

	function editar_motilidad(){
		$.ajax({
			url:'/ceup/Cconsultas/edit_motilidad/',
			type:'POST',
			dataType:'json',
			data:{
				'con_id':$('#cod_consulta').val(),
				'mod_activa_pasiva':$('#mod_activa_pasiva').val(),
				'mot_fuerza_muscular':$('#mot_fuerza_muscular').val()
			},
			success:function(res){
				console.info(res);
				toastr.options={"progressBar": true}
				toastr.success('Datos Editados','Estado');
				$('#btn_motilidad').removeClass("btn-info");
				$('#btn_motilidad').addClass("btn-success");
				$('#modal_motilidad').modal('toggle');
			},
			error:function(res){
				console.info(res);
				toastr.options={"progressBar": true};
				toastr.error('Error al Editar valores','Estado');
			}
		});
	}

});
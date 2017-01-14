$(document).ready(function(){

	$('#btn_sensibilidad').click(function(){
		$('#modal_sensibilidad').modal('show');
		cargar_sensibilidad();
	});

	$('#btn_guardar_sensibilidad').click(function(){
		if($('#sensibilidad_id').val()){
			edit_sensibilidad();
		}else {
			agregar_sensibilidad();
		}
	});


	function cargar_sensibilidad(){
		$.ajax({
			url:'/ceup/Cconsultas/get_sensibilidad/',
			type:'POST',
			dataType:'json',
			data:{'con_id':$('#cod_consulta').val()},
			success:function(res){
				if (res) {
					$('#sensibilidad_id').val(res['sen_id']);
					$('#sen_tactil').val(res['sen_tactil']);
					$('#sen_termica').val(res['sen_termica']);
					$('#sen_dolorosa').val(res['sen_dolorosa']);
					$('#sen_palestesia').val(res['sen_palestesia']);
					$('#sen_batiestesia').val(res['sen_batiestesia']);
					$('#sen_barognosia').val(res['sen_barognosia']);
					$('#sen_taxia').val(res['sen_taxia']);
					$('#sen_praxia').val(res['sen_praxia']);
				}
				console.info(res);
			},
			error:function(res){
				console.info(res);
			}
		});
	}


	function edit_sensibilidad () {
		$.ajax({
			url:'/ceup/Cconsultas/edit_sensibilidad/',
			type:'POST',
			dataType:'json',
			data:{
				'con_id':$('#cod_consulta').val(),
				'sen_tactil':$('#sen_tactil').val(),
				'sen_termica':$('#sen_termica').val(),
				'sen_dolorosa':$('#sen_dolorosa').val(),
				'sen_palestesia':$('#sen_palestesia').val(),
				'sen_batiestesia':$('#sen_batiestesia').val(),
				'sen_barognosia':$('#sen_barognosia').val(),
				'sen_taxia':$('#sen_taxia').val(),
				'sen_praxia':$('#sen_praxia').val(),
			},
			success:function(res){
				console.info(res);
				toastr.options={"progressBar": true}
				toastr.success('Datos Editados','Estado');
				$('#btn_sensibilidad').removeClass("btn-info");
				$('#btn_sensibilidad').addClass("btn-success");
				$('#modal_sensibilidad').modal('toggle');
			},
			error:function(res){
				console.info(res);
				toastr.options={"progressBar": true};
				toastr.error('Error al Editar valores','Estado');
			}
		});
	}


	function agregar_sensibilidad () {
		$.ajax({
			url:'/ceup/Cconsultas/add_sensibilidad/',
			type:'POST',
			dataType:'json',
			data:{
				'con_id':$('#cod_consulta').val(),
				'sen_tactil':$('#sen_tactil').val(),
				'sen_termica':$('#sen_termica').val(),
				'sen_dolorosa':$('#sen_dolorosa').val(),
				'sen_palestesia':$('#sen_palestesia').val(),
				'sen_batiestesia':$('#sen_batiestesia').val(),
				'sen_barognosia':$('#sen_barognosia').val(),
				'sen_taxia':$('#sen_taxia').val(),
				'sen_praxia':$('#sen_praxia').val(),
			},
			success:function(res){
				$('#sensibilidad_id').val(res);
				console.info(res);
				toastr.options={"progressBar": true}
				toastr.success('Datos Guardados','Estado');
				$('#btn_sensibilidad').removeClass("btn-info");
				$('#btn_sensibilidad').addClass("btn-success");
				$('#modal_sensibilidad').modal('toggle');
			},
			error:function(res){
				console.info(res);
				toastr.options={"progressBar": true};
				toastr.error('Error al Editar valores','Estado');
			}
		});
	}


});
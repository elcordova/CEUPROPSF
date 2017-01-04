$(document).ready(function(){

	
	
	$("#btn_sv").click(function(){
		$('#txt_fc').val("");
					$('#txt_ta').val("");
					$('#txt_tem').val("");
					$('#txt_fr').val("");
					$('#txt_peso').val("");
					$('#txt_talla').val("");
					$('#txt_imc').val("");
					$('#txt_cintura').val("");
					$('#txt_cadera').val("");
					$('#txt_icc').val("");
 		$.ajax({
			type:'post',
			dataType:"json",
			url:"/ceup/Cconsultas/get_sv/",
			data:{'con_id':$('#cod_consulta').val()},
			success:function(res){
				if(res){

					console.log(res['fc']+" "+res['ta'])

					$('#txt_fc').val(res['fc']);
					$('#txt_ta').val(res['ta']);
					$('#txt_tem').val(res['t']);
					$('#txt_fr').val(res['fr']);
					$('#txt_peso').val(res['peso']);
					$('#txt_talla').val(res['talla']);
					$('#txt_imc').val(res['imc']);
					$('#txt_cintura').val(res['cintura']);
					$('#txt_cadera').val(res['cadera']);
					$('#txt_icc').val(res['icc']);
				}
			},
			error:function(res){
				console.error(res);
				toastr.options={"progressBar": true}
				toastr.error('Error','Estado');
			}
				});
 	$('#modal_sv').modal('show');
 	});



	$('#btn_guardar').click(function(){
		if(!$('#id_sv').val()){
			$.ajax({
			type:'post',
			dataType:"json",
			url:"/ceup/Cconsultas/add_sv/",
			data:{	'fc':$('#txt_fc').val(), 'ta':$('#txt_ta').val(),
					't':$('#txt_tem').val(), 'fr':$('#txt_fr').val(),
					'peso':$('#txt_peso').val(), 'talla':$('#txt_talla').val(),
					'imc':$('#txt_imc').val(), 'cintura':$('#txt_cintura').val(),
					'cadera':$('#txt_cadera').val(), 'icc':$('#txt_icc').val(),
					'con_id':$('#cod_consulta').val()},
			success:function(res){
				alert(res);
				toastr.options={"progressBar": true}
				toastr.success('Datos de Signos Vitales Guardados','Estado');
				$('#id_sv').val(res)
				$('#btn_sv').removeClass("btn-info");
				$('#btn_sv').addClass("btn-success");
				$('#modal_sv').modal('toggle')
					
			},
			error:function(res){
				toastr.options={"progressBar": true}
				toastr.error('Error al Guardar Signos Vitales','Estado');
			}
				});
			



			}else {
				
				$.ajax({
			type:'post',
			dataType:"json",
			url:"/ceup/Cconsultas/editar_sv/",
			data:{	'fc':$('#txt_fc').val(), 'ta':$('#txt_ta').val(),
					't':$('#txt_tem').val(), 'fr':$('#txt_fr').val(),
					'peso':$('#txt_peso').val(), 'talla':$('#txt_talla').val(),
					'imc':$('#txt_imc').val(), 'cintura':$('#txt_cintura').val(),
					'cadera':$('#txt_cadera').val(), 'icc':$('#txt_icc').val(),
					'con_id':$('#cod_consulta').val()},
			success:function(res){
				alert(res);
				toastr.options={"progressBar": true}
				toastr.success('Datos de Signos Vitales Guardados','Estado');
				$('#btn_sv').removeClass("btn-info");
				$('#btn_sv').addClass("btn-success");
				$('#modal_sv').modal('toggle')
					
			},
			error:function(res){
				toastr.options={"progressBar": true}
				toastr.error('Error al Guardar Signos Vitales','Estado');
			}
				});
			

			}

	});
});	
		
$(document).ready(function(){

	
	
	$("#btn_sg").click(function(){
		alert("message");

					$('#sg_apariencia').val("");
					$('#sg_facie').val("");
					$('#sg_biotipo').val("");
					$('#sg_en').val("");
					$('#sg_actitud').val("");
					$('#sg_deambula').val("");
					$('#sg_ap').val("");
					$('#sg_piel').val("");
					$('#sg_unias').val("");
					$('#sg_pelo').val("");
 		$.ajax({
			type:'post',
			dataType:"json",
			url:"/ceup/Cconsultas/get_sg/",
			data:{'con_id':$('#cod_consulta').val()},
			success:function(res){
				if(res){

					console.log(res['sg_apariencia']+" "+res['sg_facie'])

					$('#sg_apariencia').val(res['sg_apariencia']);
					$('#sg_facie').val(res['sg_facie']);
					$('#sg_biotipo').val(res['sg_biotipo']);
					$('#sg_en').val(res['sg_en']);
					$('#sg_actitud').val(res['sg_actitud']);
					$('#sg_deambula').val(res['sg_deambula']);
					$('#sg_ap').val(res['sg_ap']);
					$('#sg_piel').val(res['sg_piel']);
					$('#sg_unias').val(res['sg_unias']);
					$('#sg_pelo').val(res['sg_pelo']);
				}
			},
			error:function(res){
				console.error(res);
				toastr.options={"progressBar": true}
				toastr.error('Error','Estado');
			}
				});
 			$('#modal_sg').modal('show');
 	});



	$('#btn_guardar_sg').click(function(){
		if(!$('#sg_id').val()){
			$.ajax({
			type:'post',
			dataType:"json",
			url:"/ceup/Cconsultas/add_sg/",
			data:{	'sg_apariencia':$('#sg_apariencia').val(), 'sg_facie':$('#sg_facie').val(),
					'sg_biotipo':$('#sg_biotipo').val(), 'sg_en':$('#sg_en').val(),
					'sg_actitud':$('#sg_actitud').val(), 'sg_deambula':$('#sg_deambula').val(),
					'sg_ap':$('#sg_ap').val(), 'sg_piel':$('#sg_piel').val(),
					'sg_unias':$('#sg_unias').val(), 'sg_pelo':$('#sg_pelo').val(),
					'con_id':$('#cod_consulta').val()},
			success:function(res){
				alert(res);
				toastr.options={"progressBar": true}
				toastr.success('Datos Guardados','Estado');
				$('#sg_id').val(res)
				$('#btn_sg').removeClass("btn-info");
				$('#btn_sg').addClass("btn-success");
				$('#modal_sg').modal('toggle')
					
			},
			error:function(res){
				toastr.options={"progressBar": true}
				toastr.error('Error al Guardar valores','Estado');
			}
				});
			



			}else {
				
				$.ajax({
			type:'post',
			dataType:"json",
			url:"/ceup/Cconsultas/editar_sg/",
			data:{	'sg_apariencia':$('#sg_apariencia').val(), 'sg_facie':$('#sg_facie').val(),
					'sg_biotipo':$('#sg_biotipo').val(), 'sg_en':$('#sg_en').val(),
					'sg_actitud':$('#sg_actitud').val(), 'sg_deambula':$('#sg_deambula').val(),
					'sg_ap':$('#sg_ap').val(), 'sg_piel':$('#sg_piel').val(),
					'sg_unias':$('#sg_unias').val(), 'sg_pelo':$('#sg_pelo').val(),
					'con_id':$('#cod_consulta').val()},
			success:function(res){
				alert(res);
				toastr.options={"progressBar": true}
				toastr.success('Datos Editados','Estado');
				$('#btn_sg').removeClass("btn-info");
				$('#btn_sg').addClass("btn-success");
				$('#modal_sg').modal('toggle')
					
			},
			error:function(res){
				toastr.options={"progressBar": true}
				toastr.error('Error al Guardar Signos Vitales','Estado');
			}
				});
			

			}

	});
});	
		
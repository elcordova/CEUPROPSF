$(document).ready(function(){

	
	
	$("#btn_efr").click(function(){
		

					$('#efr_cabeza').val("");
					$('#efr_oidos').val("");
					$('#efr_ojos').val("");
					$('#efr_nariz').val("");
					$('#efr_boca').val("");
					$('#efr_cuello').val("");
 		$.ajax({
			type:'post',
			dataType:"json",
			url:"/ceup/Cconsultas/get_efr/",
			data:{'con_id':$('#cod_consulta').val()},
			success:function(res){
				if(res){

					console.log(res['efr_cabeza']+" "+res['efr_oidos']);
          $('#efr_id').val(res['efr_id']);
					$('#efr_cabeza').val(res['efr_cabeza']);
					$('#efr_oidos').val(res['efr_oidos']);
					$('#efr_ojos').val(res['efr_ojos']);
					$('#efr_nariz').val(res['efr_nariz']);
					$('#efr_boca').val(res['efr_boca']);
					$('#efr_cuello').val(res['efr_cuello']);
				}
			},
			error:function(res){
				console.error(res);
				toastr.options={"progressBar": true}
				toastr.error('Error','Estado');
			}
				});
 			$('#modal_fr').modal('show');
 	});



	$('#btn_guardar_efr').click(function(){
		if(!$('#efr_id').val()){
			$.ajax({
			type:'post',
			dataType:"json",
			url:"/ceup/Cconsultas/add_efr/",
			data:{	'efr_cabeza':$('#efr_cabeza').val(), 'efr_oidos':$('#efr_oidos').val(),
					'efr_ojos':$('#efr_ojos').val(), 'efr_nariz':$('#efr_nariz').val(),
					'efr_boca':$('#efr_boca').val(), 'efr_cuello':$('#efr_cuello').val(),
					'con_id':$('#cod_consulta').val()},
			success:function(res){
				
				toastr.options={"progressBar": true}
				toastr.success('Datos Guardados','Estado');
				$('#efr_id').val(res)
				$('#btn_efr').removeClass("btn-info");
				$('#btn_efr').addClass("btn-success");
				$('#modal_fr').modal('toggle');
					
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
					url:"/ceup/Cconsultas/editar_efr/",
					data:{	'efr_cabeza':$('#efr_cabeza').val(), 'efr_oidos':$('#efr_oidos').val(),
							'efr_ojos':$('#efr_ojos').val(), 'efr_nariz':$('#efr_nariz').val(),
							'efr_boca':$('#efr_boca').val(), 'efr_cuello':$('#efr_cuello').val(),
							'con_id':$('#cod_consulta').val()},
			success:function(res){
				alert(res);
				toastr.options={"progressBar": true}
				toastr.success('Datos Editados','Estado');
				$('#btn_efr').removeClass("btn-info");
				$('#btn_efr').addClass("btn-success");
				$('#modal_fr').modal('toggle');
					
			},
			error:function(res){
				toastr.options={"progressBar": true}
				toastr.error('Error al Guardar Signos Vitales','Estado');
			}
				});
			

			}

	});
});	
		
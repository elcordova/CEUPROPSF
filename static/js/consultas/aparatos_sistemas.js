$(document).ready(function(){

	$('#sel_aparato').on('change', function() {
    cargar_datos();
	});

  function verificar_sistema(){
    habilitar_divs();
    if ($('#sel_aparato').val()==1){  //RESPIRATORIO
      $('#div_tacto').css("display", "none");
      $('#div_sistema_ner').css("display", "none");
    }
    if ($('#sel_aparato').val()==2){ //CARDIACO
      $('#div_tacto').css("display", "none");
      $('#div_sistema_ner').css("display", "none");
    }
    if ($('#sel_aparato').val()==3){  //DIGESTIVO
      $('#div_tacto').css("display", "none");
      $('#div_sistema_ner').css("display", "none");
    }
    if ($('#sel_aparato').val()==4){ //GENITO URINARIO
       $('#div_sistema_ner').css("display", "none");
    }
    if ($('#sel_aparato').val()==5){  //SOMA
       $('#div_tacto').css("display", "none");
       $('#div_percusion').css("display", "none");
       $('#div_auscultacion').css("display", "none");
    }
  }

  function habilitar_divs(){
    $('#div_tacto').css("display", "block");
    $('#div_sistema_ner').css("display", "block");
    $('#div_percusion').css("display", "block");
    $('#div_auscultacion').css("display", "block");
    $('#div_inspeccion').css("display", "block");
    $('#div_palpacion').css("display", "block");
  }

	function cargar_aparatos () {
		$('#sel_aparato').empty();
		console.log('se borro el dropdown');
		 $.ajax({
		 	type:'post',
			dataType:"json",
			url:"/ceup/Cconsultas/get_aparatos/",
			success:function(res){
				for (var i = res.length - 1; i >= 0; i--) {
					$('#sel_aparato').append($('<option>',
			     {
			        value: ""+res[i]['as_id'],
			        text : ""+res[i]['as_descripcion'] 
			    }));
				}
				$('#sel_aparato').selectpicker('refresh');
				cargar_datos();
				
			}
		 });
	}


	function cargar_datos () {
		   $.ajax({
		   		type:'post',
		   		url:'/ceup/Cconsultas/get_ras/',
		   		data:{'as_id':$('#sel_aparato').val(),'con_id':$('#cod_consulta').val()},
		   		dataType:'json',
		   		success:function(res){
            verificar_sistema();
		   			console.info(res);
		   			$('#ras_inspeccion').val(res['ras_inspeccion']);
					$('#ras_palpacion').val(res['ras_palpacion']);
					$('#ras_percusion').val(res['ras_percusion']);
					$('#ras_auscultacion').val(res['ras_auscultacion']);
					$('#ras_tacto_rectal').val(res['ras_tacto_rectal']);
					$('#ras_sistema_nervioso').val(res['ras_sistema_nervioso']);
		   		},
		   		error:function(res){
		   			console.info(res);
		   		}
		   });
	}


	
	$("#btn_ras").click(function(){
		$('#ras_inspeccion').val("");
		$('#ras_palpacion').val("");
		$('#ras_percusion').val("");
		$('#ras_auscultacion').val("");
		$('#ras_tacto_rectal').val("");
		$('#ras_sistema_nervioso').val("");
		$('#sel_aparato').empty();
		cargar_aparatos();
 			$('#modal_ras').modal('show');

 	});



	$('#btn_guardar_ras').click(function(){

		console.log('as_id:'+$('#sel_aparato').val()+'  ras_inspeccion:'+$('#ras_inspeccion').val()+ '  ras_palpacion:'+$('#ras_palpacion').val()+
					'  ras_percusion:'+$('#ras_percusion').val()+ '  ras_auscultacion:'+$('#ras_auscultacion').val()+
					'  ras_tacto_rectal:'+$('#ras_tacto_rectal').val()+ '  ras_sistema_nervioso:'+$('#ras_sistema_nervioso').val()+
					'  con_id:'+$('#cod_consulta').val());
			$.ajax({
			type:'get',
			dataType:"json",
			url:"/ceup/Cconsultas/editar_ras/",
			data:{	'as_id':$('#sel_aparato').val(),'ras_inspeccion':$('#ras_inspeccion').val(), 'ras_palpacion':$('#ras_palpacion').val(),
					'ras_percusion':$('#ras_percusion').val(), 'ras_auscultacion':$('#ras_auscultacion').val(),
					'ras_tacto_rectal':$('#ras_tacto_rectal').val(), 'ras_sistema_nervioso':$('#ras_sistema_nervioso').val(),
					'con_id':$('#cod_consulta').val()},
			success:function(res){
				console.info(res);
				toastr.options={"progressBar": true}
				toastr.success('Datos Editados','Estado');
				$('#ras_id').val(res)
				$('#btn_ras').removeClass("btn-info");
				$('#btn_ras').addClass("btn-success");
				$('#sel_aparato').empty();
				$('#sel_aparato').selectpicker('refresh');
				$('#modal_ras').modal('toggle');
				
			},
			error:function(res){
				toastr.options={"progressBar": true}
				toastr.success('Datos Nuevos Agregados','Estado');
				$('#ras_id').val(res)
				$('#btn_ras').removeClass("btn-info");
				$('#btn_ras').addClass("btn-success");
				$('#sel_aparato').empty();
				$('#sel_aparato').selectpicker('refresh');
				$('#modal_ras').modal('toggle');
			}
				});
	});
});	
		
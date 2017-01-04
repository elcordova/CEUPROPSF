$(document).ready(function(){

	consultar_Brigadas();
	$('#divExamenes').hide();	

	function consultar_Brigadas(){
	$('#sel_medico').empty();
	$.ajax({
		url:"/ceup/Cbrigada/get/",
		success:function(res){
			

			for(i=0;i<res.datos.length; i++){
				$('#sel_brigada').append($('<option>',
			     {
			        value: ""+res.datos[i]['bri_id'],
			        text : ""+res.datos[i]['bri_des'] 
			    }));
			}
			$('#sel_brigada').selectpicker('refresh');
			consultar_Especialidad();
			
		}
	});
}

function consultar_Especialidad(){
	$('#sel_especialidad').empty();
	$('#sel_medico').empty();
	$.ajax({
  			type:"GET",
  			data: {"id": $('#sel_brigada').val()},
			url:"/ceup/Cconsultas/get_especialidad/",
			dataType: 'json',
			success: function(res){
			if(res.datos.length>0){
				for(i=0;i<res.datos.length; i++){
				$('#sel_especialidad').append($('<option>',
			     {
			        value: ""+res.datos[i]['esp_cod'],
			        text : ""+res.datos[i]['esp_des'] 
			    }));
			}
			}else {
				$('#sel_medico').empty();
				$('#dbm_id').val("");
				toastr.options={"progressBar": true}
                toastr.error('No se encontraron medicos Disponibles','Estado');
				
				
			}
			$('#sel_especialidad').selectpicker('refresh');
			$('#sel_medico').selectpicker('refresh');
			consultar_Medico();
			
			}
		});
}

function consultar_Medico(){
	$('#sel_medico').empty();
  		$.ajax({
  			type:"GET",
  			data: {"id": $('#sel_brigada').val(),"id_es":$('#sel_especialidad').val()},
			url:"/ceup/Cconsultas/get_medico/",
			dataType: 'json',
			success: function(res){
			if(res.datos.length>0){
				for(i=0;i<res.datos.length; i++){
				$('#sel_medico').append($('<option>',
			     {
			        value: ""+res.datos[i]['med_cod'],
			        text : ""+res.datos[i]['med_nom'] +" "+res.datos[i]['med_ape']
			    }));
			}
			}else {
				$('#sel_medico').empty();
				toastr.options={"progressBar": true}
                toastr.error('No se encontraron medicos Disponibles','Estado');
			}
			$('#sel_medico').selectpicker('refresh');
			consultar_dmb();
			}
		});
}


function consultar_dmb(){
	$('#dbm_id').val("");
  		$.ajax({
  			type:"GET",
  			data: {"bri_id": $('#sel_brigada').val(),"med_id":$('#sel_medico').val()},
			url:"/ceup/Cconsultas/get_dbm/",
			dataType: 'json',
			success: function(res){
			if(res.datos.length>0){
				for(i=0;i<res.datos.length; i++){
				$('#dbm_id').val(res.datos[i]['dbm_id']);
			}
			}else {
				
				toastr.options={"progressBar": true}
                toastr.error('No se encontraron ','Estado');
			}
			}
		});
}

	
	$('#sel_brigada').on('change', function() {
  	
  		consultar_Especialidad();

	});





	$('#dat_paci').hide();
	$('#btn_buscar').click(function(){
		$('#pac_cod').val("");
		$.ajax({
  			type:"GET",
  			data: {"ced_pac": $('#input_ced_pac').val()},
			url:"/ceup/Cpaciente/get_one/",
			dataType: 'json',
			success: function(res){
			if(res.datos.length>0){
				$('#dat_paci').empty();
				$('#dat_paci').show();
				for(i=0;i<res.datos.length; i++){
				$('#dat_pac').empty();
				$('#dat_paci').append("<h4>Datos de paciente</h4><p>nombres :"+res.datos[i]['pac_nom']+"</p> <p>Apellidos :"+res.datos[i]['pac_ape']+"</p><p> sexo :"+res.datos[i]['pac_sex']+"</p>");
				$('#pac_cod').val(res.datos[i]['pac_id'])
				$('#dat_paci').show(3000);
				toastr.options={"progressBar": true}
                toastr.success('Datos de paciente cargados','Estado');
			}
			}else {
				$("#dat_paci").empty();
				$('#dat_paci').hide("slow");
				$('#pac_cod').val("");
				toastr.options={"progressBar": true}
                toastr.error('No se encuentra registrado el paciente','Estado');
			}
			}
		});

	});



		$('#sel_especialidad').on('change', function() {
  			consultar_Medico();
		});


		$('#sel_medico').on('change', function() {
  			consultar_dmb();
		});



$(function(){
        $("#frmConsulta").validate({
                rules: {
                    sel_brigada: { required: true},
                    sel_especialidad: { required: true},
                    sel_medico: { required: true},
                    id_pac:{required: true}
                },
                messages: {
                    input: { required: "required" },
                    sel_brigada: { required: "seleccione una brigada"},
                    sel_especialidad: { required: "seleccione una especialidad"},
                    sel_medico: { required: "seleccione un medico"},
                    id_pac:{required: "seleccione un paciente"}
                },
                ignore:      "",
                errorClass:  'fieldError',
                onkeyup:     false,
                onblur:      false,
                errorElement:'label',
                submitHandler: function() {                        
                    
    				$.ajax({
    					url:"/ceup/Cconsultas/add/",
    					type: "POST",
              			data: {'dbm_id':$('#dbm_id').val(),
              					'pac_id':$('#pac_cod').val(),
              					'con_observacion':$('#con_observacion').val()},
              			dataType:"json",
              			success:function(res){
              				$('#dat_paci').append("<h4>Datos de Consulta</h4><p>codigo de Consulta :"+res+"</p>")
              				$('#cod_consulta').val(res);
              				$('#divFrmEsp').hide("slow");
              				$('#divExamenes').show();
              				toastr.options={"progressBar": true}
							toastr.success('Nueva Consulta Generada','Estado');
							
              			},
              			error: function(response){
							//$.notify("Error al editar paciente","error");
						toastr.options={"progressBar": true}
						toastr.error('Error al Guardar la Consulta','Estado');
			}

    				});
                }
            });

        $("#sub_boton").click(function(){
            $("#frmConsulta").submit();
            return false;
        });
    });








});
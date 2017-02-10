$(document).ready(function(){

  get_consultas();
  function get_consultas(){
    $.ajax({
            type:"GET",
            url:"/ceup/Cconsultas/get_consultas/",
            dataType: 'json',
            success:function(res){
              $('#contenedor_tabla').empty();
              var contenido="";
              if (res) {
                for (i = 0; i < res.length; i++){
                  contenido+="<tr data-observacion='"+res[i]['con_observcion']+"' data-id="+res[i]['con_id']+">"+
                          "<td>"+res[i]['con_id']+"</td>"+
                          "<td>"+res[i]['fecha']+"</td>"+
                          "<td> Dr(a). "+res[i]['med_ape']+" "+res[i]['med_nom']+"</td>"+
                          "<td> Sr(a). "+res[i]['pac_ape']+" "+res[i]['pac_nom']+"</td>"+
                          "<td>"+res[i]['bri_des']+"</td>"+
                          "<td>"+
                              "<div class='btn-group'>"+
                                "<button type='button' class='btn btn-default' data-conid='"+res[i]['con_id']+"'  data-pacnom='"+res[i]['pac_nom']+"' data-pacape='"+res[i]['pac_ape']+"' data-pacsex='"+res[i]['pac_sex']+"'  data-pacid='"+res[i]['pac_id']+"' onclick=carga_consulta_id($(this))>"+
                                "<span class='glyphicon glyphicon-edit'></span>"+
                                "</button>"+

                                "<button type='button' data-target='#modalObservacion' data-toggle='modal' class='btn btn-default' onclick=$.verObservacion($(this).parent())>"+
                                "<span class='glyphicon glyphicon-comment'></span>"+
                                "</button>"+

                              "</div>"+
                          "</td>"+
                        "</tr>";
                };
              }
              var tabla="<table id='table_consultas' class='table table-striped table-bordered' cellspacing='0' width='100%'>"+
                        "<thead>"+
                          "<tr>"+
                            "<th>Identificador</th>"+
                            "<th>Fecha</th>"+
                            "<th>Medico</th>"+
                            "<th>Paciente</th>"+
                            "<th>Brigada</th>"+
                            "<th>Accion</th>"+
                          "</tr>"+
                        "</thead>"+
                        "<tbody>"+contenido
                        "</tbody>"+
                        "</table>";
              $('#contenedor_tabla').append(tabla);
              $('table').DataTable({"order": [[ 0, "desc" ]]} );
              limp_form_consulta();

            }
    });
  }


  function limp_form_consulta(){
    $('#cod_consulta').val('');
  }



  $('#btn_salir_gen').click(function(){
    $(location).attr('href','/ceup/cconsultas/start');

  });

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

$.verObservacion = function(td){
    var tr = $(td).parent().parent();
    $('#con_obs').val($(tr).attr('data-observacion'));
    $('#con_id').val($(tr).attr('data-id'));

  }


$('#guardarObservacion').on('click',function(){
   $.ajax({
      type:'POST',
      data:{'observacion':$('#con_obs').val(),'id_consulta':$('#con_id').val()},
      dataType:'json',
      url:'/ceup/Cconsultas/save_observacion/',
      success:function(data){
        toastr.options={"progressBar": true}
        toastr.success('Observcion Editada ','Estado');
        $('#modalObservacion').modal('hide');
        get_consultas();
      },error:function(textStatus){
        toastr.options={"progressBar": true}
        toastr.error('Error al Editar Observacion ','Estado');
      }
  });
});


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
		buscar_paciente();
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
              				$('#btn_salir').removeClass("hidden");
                      toastr.options={"progressBar": true}
							        toastr.success('Nueva Consulta Generada','Estado');
                      $('#btn_salir_gen').removeClass("hidden");
							         
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


function buscar_paciente () {
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
}





});
  

  function carga_consulta_id(boton) {
    $('#dat_paci').empty();
    $('#dat_paci').show();
    $('#dat_pac').empty();
    $('#dat_paci').append("<h4>Datos de paciente</h4><p>nombres :"+$(boton).attr("data-pacnom")+"</p> <p>Apellidos :"+$(boton).attr("data-pacape")+"</p><p> sexo :"+$(boton).attr("data-pacsex")+"</p>");
    $('#pac_cod').val($(boton).attr("data-pacid"));
    $('#dat_paci').show(3000);
    $('#dat_paci').append("<h4>Datos de Consulta</h4><p>codigo de Consulta :"+$(boton).attr("data-conid")+"</p>");
    $('#cod_consulta').val($(boton).attr("data-conid"));
    $('#divFrmEsp').hide("slow");
    $('#divExamenes').show();
    $('#btn_salir').removeClass("hidden");
    $('#btn_salir_gen').removeClass("hidden");

  }
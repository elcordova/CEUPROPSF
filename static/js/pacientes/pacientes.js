$(function(){

	//$('table').DataTable();

	$('#frmPac').on("submit",function(){
		event.preventDefault();
		$.ajax({
			type:"POST",
			url: "/ceup/cpaciente/save/",
			dataType: 'json',
			data:$(this).serialize(),
			
			success: function(response){
				limp_form_paciente();
				toastr.options={"progressBar": true}
				toastr.success('Paciente registrado con Exito!','Estado');
				//$('#table').DataTable().ajax.reload();
			},

			error: function(response){
				console.log(response);
				toastr.options={"progressBar": true}
				toastr.error('Error al registrar paciente','Estado');
			}
		});
	});
	
	function limp_form_paciente(){
		$('#pac_ced').val("");
		$('#pac_nom').val("");
		$('#pac_ape').val("");
		$('#pac_dir').val("");
		$('#pac_cor').val("");
		$('#pac_sex').val("");
		$('#pac_fec_nac').val("");
		$('#pac_tip_san').val("");
		$('#pac_est_civ').val("");
	}


	var lngEsp = {
		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		}
	};
	
	var btnsOpTblModels = "<button style='border: 0; background: transparent' data-target='#modalPaciente' data-toggle='modal' onclick='$.editarModal($(this).parent())'>"+
							"<span class='glyphicon glyphicon-edit' title='Modificar'></span>"+
						  "</button>";

	$.renderizeRow = function( nRow, aData, iDataIndex ) {
	    if(aData['pac_est']=='t')
	    {
	   		$(nRow).append("<td class='text-center'>"+
							"<button style='border: 0; background: transparent' onclick='$.eliminar($(this).parent());' id='btnEliminar'>"+
						  	"<span class='glyphicon glyphicon-remove-circle' title='Desactivar'></span>"+
						  	"</button></td>");
	    }
	    else
	    {
	    	$(nRow).append("<td class='text-center'>"+
							"<button style='border: 0; background: transparent' onclick='$.activar($(this).parent());' id='btnActivar'>"+
						  	"<span class='glyphicon glyphicon-ok-circle' title='Activar'></span>"+
						  	"</button></td>");
	    }
	    $(nRow).append("<td class='text-center'>"+btnsOpTblModels+"</td>");
		$(nRow).attr('id',aData['pac_id']); //codigo
		$(nRow).attr('data-pac_sex',aData['pac_sex']);
		$(nRow).attr('data-pac_fec_nac',aData['pac_fec_nac']);
		$(nRow).attr('data-pac_tip_san',aData['pac_tip_san']);
		$(nRow).attr('data-pac_est_civ',aData['pac_est_civ']);
		$(nRow).attr('data-pac_est',aData['pac_est']);
	};
	

	//Llenar tabla de datos
	//Funcion que carga los datos
	$('#tbPaciente').DataTable({
		ordering: true,
		"ajax":{
			"url": "/ceup/cpaciente/get/",
			"dataSrc": "datos"
		},
		"columns":[{data:"pac_ced"},{data:"pac_nom"},{data:"pac_ape"},{data:"pac_dir"},{data:"pac_cor"}],
		"columnDefs": [
			{
				"targets": [4],
				"visivle": false,
				"searchable": false
			}
		],
		"fnCreatedRow": $.renderizeRow,
		"languaje": lngEsp
	});
	
	$("#ltPaciente").click(function(){
			event.preventDefault();
			$('#tbPaciente').DataTable().ajax.reload();
	});

	$.eliminar = function(td){
		var cedula = $(td).parent().children()[0].textContent;//cedula
		$.ajax({
			type: "POST",
			data: {"id":cedula},
			url: "/ceup/cpaciente/delete/", 
			dataType: 'json',
			success: function(response){
				//$.notify("Eliminado con exito","success");
				toastr.options={"progressBar": true}
				toastr.success('Paciente Desactivado con Exito!','Estado');
				$(td).parent().remove(); // remove a tr
				$('#tbPaciente').DataTable().ajax.reload();
			},
			error: function(response){
				//$.notify("Error al eliminar","error");
				toastr.options={"progressBar": true}
				toastr.error('Error al desactivar paciente!','Estado');
			}
		});
	};

	$.activar = function(td){
		event.preventDefault();
		var cedula = $(td).parent().children()[0].textContent; //cedula
		$.ajax({
			type: "POST",
			url: "/ceup/cpaciente/activar/", 
			dataType: 'json',
			data: {"id":cedula},			
			success: function(response){
				//$.notify("Activado con exito","success");
				toastr.options={"progressBar": true}
				toastr.success('Paciente Activado con Exito!','Estado');
				$('#tbPaciente').DataTable().ajax.reload();
			},
			error: function(response){
				//$.notify("Error al activar","error");
				toastr.options={"progressBar": true}
				toastr.error('Error al activar paciente!','Estado');
			}
		});
	};

	$.editarModal = function(td)
	{
		var tr = $(td).parent().children();
		var id  = $(td).parent().attr('id')
		var ced = tr[0].textContent;
		var nom = tr[1].textContent;
		var ape = tr[2].textContent;
		var dir = tr[3].textContent;
		var eml = tr[4].textContent;
		var sex = $(td).parent().attr('data-pac_sex')
		var fec = $(td).parent().attr('data-pac_fec_nac')
		var san = $(td).parent().attr('data-pac_tip_san')
		var civ = $(td).parent().attr('data-pac_est_civ')
		var est = $(td).parent().attr('data-pac_est')
		$('#myModalLabel').html("Editar");
		$('#pac_ced2').val(ced);
		$('#pac_nom2').val(nom);
		$('#pac_ape2').val(ape);
		$('#pac_dir2').val(dir);
		$('#pac_cor2').val(eml);
		$('#pac_sex2').val(sex);
		$('#pac_fec_nac2').val(fec);
		$('#pac_tip_san2').val(san);
		$('#pac_est_civ2').val(civ);
		//$('#pac_est2').val(est);
		$("#pac_est2").prop("checked", est);
	};

	$('#btnModalGuardar').click(function(){
		event.preventDefault();
		$.ajax({
			type: "POST",
			data: { 
					"pac_ced": $('#pac_ced2').val(),
					"pac_nom": $('#pac_nom2').val(), 
					"pac_ape": $('#pac_ape2').val(), 
					"pac_dir": $('#pac_dir2').val(),
					"pac_cor": $('#pac_cor2').val(),
					"pac_sex": $('#pac_sex2').val(),
					"pac_fec_nac": $('#pac_fec_nac2').val(),
					"pac_tip_san": $('#pac_tip_san2').val(),
					"pac_est_civ": $('#pac_est_civ2').val(),
					"pac_est": $('#pac_est2').prop('checked')
					},
			url: "/ceup/cpaciente/update/",
			dataType: 'json',			
			
			success: function(response){
				$('#modalPaciente').modal('hide');				
				//$.notify("Medico editado con exito","success");
				toastr.options={"progressBar": true}
				toastr.success('Paciente modificado con Exito!','Estado');
				$('#tbPaciente').DataTable().ajax.reload();
			},

			error: function(response){
				//$.notify("Error al editar paciente","error");
				toastr.options={"progressBar": true}
				toastr.error('Error al editar paciente!','Estado');
			}

		});
	});
			
	$('#modalPaciente').bind('shown.bs.modal' , function(){
		pac_nom.focus();
	});
	
	function validarFormulario(){

            document.getElementById("frmPac").onsubmit=function(){

                var cedula =  document.getElementById("pac_ced").value;
                //Preguntamos si la cedula consta de 10 digitos
                if(cedula.length == 10){
                    if(cedula==2222222222){
                        var box = bootbox.alert("La cedula "+cedula+" es incorrecta");
                                    box.find('.modal-content').css({ color: '#0000', 'font-size': '1.5em'});
                                    box.find('.btn-primary').css({'background-color': '#33CF64','border': '#33CF64 1px solid'});

                        return false
                    }
                    //Obtenemos el digito de la region que sonlos dos primeros digitos
                    var digito_region = cedula.substring(0,2);
                    //Pregunto si la region existe ecuador se divide en 24 regiones
                    if( digito_region >= 1 && digito_region <=24 ){
                        // Extraigo el ultimo digito
                        var ultimo_digito = cedula.substring(9,10);
                        //Agrupo todos los pares y los sumo
                        var pares = parseInt(cedula.substring(1,2)) + parseInt(cedula.substring(3,4)) + parseInt(cedula.substring(5,6)) + parseInt(cedula.substring(7,8));
                        //Agrupo los impares, los multiplico por un factor de 2, si la resultante es > que 9 le restamos el 9 a la resultante
                        var numero1 = cedula.substring(0,1);
                        var numero1 = (numero1 * 2);
                        if( numero1 > 9 ){ var numero1 = (numero1 - 9); }
                        var numero3 = cedula.substring(2,3);
                        var numero3 = (numero3 * 2);
                        if( numero3 > 9 ){ var numero3 = (numero3 - 9); }
                        var numero5 = cedula.substring(4,5);
                        var numero5 = (numero5 * 2);
                        if( numero5 > 9 ){ var numero5 = (numero5 - 9); }
                        var numero7 = cedula.substring(6,7);
                        var numero7 = (numero7 * 2);
                        if( numero7 > 9 ){ var numero7 = (numero7 - 9); }
                        var numero9 = cedula.substring(8,9);
                        var numero9 = (numero9 * 2);
                        if( numero9 > 9 ){ var numero9 = (numero9 - 9); }
                        var impares = numero1 + numero3 + numero5 + numero7 + numero9;
                        //Suma total
                        var suma_total = (pares + impares);
                        //extraemos el primero digito
                        var primer_digito_suma = String(suma_total).substring(0,1);
                        //Obtenemos la decena inmediata
                        var decena = (parseInt(primer_digito_suma) + 1) * 10;
                        //Obtenemos la resta de la decena inmediata - la suma_total esto nos da el digito validador
                        var digito_validador = decena - suma_total;
                        //Si el digito validador es = a 10 toma el valor de 0
                        if(digito_validador == 10)
                            var digito_validador = 0;

                        //Validamos que el digito validador sea igual al de la cedula
                        /*if(digito_validador == ultimo_digito){
                            var usu =document.getElementById('pac_ced').value;
                            usu=""+usu.slice(-9)
                            {% for a in paci %}
                                var ced=""+{{a.cedula}}
                                if(usu == ced) {

                                    var box = bootbox.alert("El numero de cedula ya existe");
                                    box.find('.modal-content').css({ color: '#0000', 'font-size': '1.5em'});
                                    box.find('.btn-primary').css({'background-color': '#33CF64','border': '#33CF64 1px solid'});
                                    return false
                                }
                            {% endfor %}
                            return true
                        }else{

                            var box = bootbox.alert("la cedula " + cedula + " es incorrecta");
                            box.find('.modal-content').css({ color: '#0000', 'font-size': '1.5em'});
                            box.find('.btn-primary').css({'background-color': '#33CF64','border': '#33CF64 1px solid'});
                            return false
                        }*/
                    }else{
                        // imprimimos en consola si la region no pertenece

                        var box = bootbox.alert("Esta cedula no pertenece a ninguna region");
                        box.find('.modal-content').css({ color: '#0000', 'font-size': '1.5em'});
                        box.find('.btn-primary').css({'background-color': '#33CF64','border': '#33CF64 1px solid'});
                        return false
                    }
                }else{
                    //imprimimos en consola si la cedula tiene mas o menos de 10 digitos
                    var box = bootbox.alert("Esta cedula no tiene 10 digitos");
                    box.find('.modal-content').css({ color: '#0000', 'font-size': '1.5em'});
                    box.find('.btn-primary').css({'background-color': '#33CF64','border': '#33CF64 1px solid'});
                    return false
                }

            }
        }
});


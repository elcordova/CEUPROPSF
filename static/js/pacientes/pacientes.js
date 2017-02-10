$(function(){

	//$('table').DataTable();
	var pacientes ;

	$.getDataPac = function(response){
		pacientes = response.datos;
		//se agrego data-horcod y data-dmhcod
	};
	$.post("/ceup/cpaciente/get2/",$.getDataPac);

	$('#frmPac').on("submit",function(){
		event.preventDefault();
		if(validarCedula()){
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
		}
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
		$('#pac_g').val("");
		$('#pac_p').val("");
		$('#pac_c').val("");
		$('#pac_a').val("");
		$('#pac_hv').val("");
		$('#pac_hm').val("");
		$('#pac_fup').val("");
		$('#pac_fuc').val("");
		$('#pac_menar').val("");
		$('#pac_cic_men').val("");
		$('#pac_fum').val("");
		$('#pac_menos').val("");
		$('#pac_pap').val("");
		$('#pac_mam').val("");
		$('#pac_ant').val("");
		$('#pac_met_ant').val("");
		$('#pac_ivs').val("");
		$('#pac_par_sex').val("");
		$('#pac_ali').val("");
		$('#pac_alc').val("");
		$('#pac_act_fis').val("");
		$('#pac_tab').val("");
		$('#pac_sue').val("");
		$('#pac_dro').val("");
		$('#pac_hig').val("");
		$('#pac_otr').val("");
		$('#pac_mic').val("");
		$('#pac_dep').val("");
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
						  "</button>"+
						  "<button style='border: 0; background: transparent' data-target='#modalPacienteAntecedente' data-toggle='modal' onclick='$.editarModalAntecedentes($(this).parent())'>"+
							"<span class='glyphicon glyphicon-folder-open' title='Editar Antecedentes'></span>"+
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
		$(nRow).attr('data-pac_ali',aData['pac_ali']);
		$(nRow).attr('data-pac_act_fis',aData['pac_act_fis']);
		$(nRow).attr('data-pac_sue',aData['pac_sue']);
		$(nRow).attr('data-pac_hig',aData['pac_hig']);
		$(nRow).attr('data-pac_mic',aData['pac_mic']);
		$(nRow).attr('data-pac_dep',aData['pac_dep']);
		$(nRow).attr('data-pac_alc',aData['pac_alc']);
		$(nRow).attr('data-pac_tab',aData['pac_tab']);
		$(nRow).attr('data-pac_dro',aData['pac_dro']);
		$(nRow).attr('data-pac_otr',aData['pac_otr']);
		$(nRow).attr('data-pac_g',aData['pac_g']);
		$(nRow).attr('data-pac_p',aData['pac_p']);
		$(nRow).attr('data-pac_c',aData['pac_c']);
		$(nRow).attr('data-pac_a',aData['pac_a']);
		$(nRow).attr('data-pac_hv',aData['pac_hv']);
		$(nRow).attr('data-pac_hm',aData['pac_hm']);
		$(nRow).attr('data-pac_fup',aData['pac_fup']);
		$(nRow).attr('data-pac_fuc',aData['pac_fuc']);
		$(nRow).attr('data-pac_menar',aData['pac_menar']);
		$(nRow).attr('data-pac_cic_men',aData['pac_cic_men']);
		$(nRow).attr('data-pac_fum',aData['pac_fum']);
		$(nRow).attr('data-pac_menos',aData['pac_menos']);
		$(nRow).attr('data-pac_pap',aData['pac_pap']);
		$(nRow).attr('data-pac_mam',aData['pac_mam']);
		$(nRow).attr('data-pac_ant',aData['pac_ant']);
		$(nRow).attr('data-pac_met_ant',aData['pac_met_ant']);
		$(nRow).attr('data-pac_ivs',aData['pac_ivs']);
		$(nRow).attr('data-pac_par_sex',aData['pac_par_sex']);
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
		"language": lngEsp
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
		$("#pac_est2").prop("checked", est);
		$('#pac_g2').val($(td).parent().attr('data-pac_g'));
		$('#pac_p2').val($(td).parent().attr('data-pac_p'));
		$('#pac_c2').val($(td).parent().attr('data-pac_c'));
		$('#pac_a2').val($(td).parent().attr('data-pac_a'));
		$('#pac_hv2').val($(td).parent().attr('data-pac_hv'));
		$('#pac_hm2').val($(td).parent().attr('data-pac_hm'));
		$('#pac_fup2').val($(td).parent().attr('data-pac_fup'));
		$('#pac_fuc2').val($(td).parent().attr('data-pac_fuc'));
		$('#pac_menar2').val($(td).parent().attr('data-pac_menar'));
		$('#pac_cic_men2').val($(td).parent().attr('data-pac_cic_men'));
		$('#pac_fum2').val($(td).parent().attr('data-pac_fum'));
		$('#pac_menos2').val($(td).parent().attr('data-pac_menos'));
		$('#pac_pap2').val($(td).parent().attr('data-pac_pap'));
		$('#pac_mam2').val($(td).parent().attr('data-pac_mam'));
		$('#pac_ant2').val($(td).parent().attr('data-pac_ant'));
		$('#pac_met_ant2').val($(td).parent().attr('data-pac_met_ant'));
		$('#pac_ivs2').val($(td).parent().attr('data-pac_ivs'));
		$('#pac_par_sex2').val($(td).parent().attr('data-pac_par_sex'));

		if(sex == 'Femenino'){
			$('#mujer2').show();
		}else{
			$('#mujer2').hide();
		}

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
					"pac_est": $('#pac_est2').prop('checked'),
					"pac_otr": $('#pac_otr2').val(),
					"pac_g": $('#pac_g2').val(),
					"pac_p": $('#pac_p2').val(),
					"pac_c": $('#pac_c2').val(),
					"pac_a": $('#pac_a2').val(),
					"pac_hv": $('#pac_hv2').val(),
					"pac_hm": $('#pac_hm2').val(),
					"pac_fup": $('#pac_fup2').val(),
					"pac_fuc": $('#pac_fuc2').val(),
					"pac_menar": $('#pac_menar2').val(),
					"pac_cic_men": $('#pac_cic_men2').val(),
					"pac_fum": $('#pac_fum2').val(),
					"pac_menos": $('#pac_menos2').val(),
					"pac_pap": $('#pac_pap2').val(),
					"pac_mam": $('#pac_mam2').val(),
					"pac_ant": $('#pac_ant2').val(),
					"pac_met_ant": $('#pac_met_ant2').val(),
					"pac_ivs": $('#pac_ivs2').val(),
					"pac_par_sex": $('#pac_par_sex2').val()
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
	
	$('#pac_sex').change(function(){
		var valor = $(this).val();
		if(valor == 'Femenino'){
			$('#mujer').show();
		}else{
			$('#mujer').hide();
		}
	});

	$('#pac_sex2').change(function(){
		var valor = $(this).val();
		if(valor == 'Femenino'){
			$('#mujer2').show();
		}else{
			$('#mujer2').hide();
		}
	});

	var cedula;
	$.editarModalAntecedentes = function(td)
	{
		var tr = $(td).parent().children();
		cedula = tr[0].textContent;
		var id  = $(td).parent().attr('id')
		var ali = $(td).parent().attr('data-pac_ali')
		var act_fis = $(td).parent().attr('data-pac_act_fis')
		var sue = $(td).parent().attr('data-pac_sue')
		var hig = $(td).parent().attr('data-pac_hig')
		var mic = $(td).parent().attr('data-pac_mic')
		var dep = $(td).parent().attr('data-pac_dep')
		var alc = $(td).parent().attr('data-pac_alc')
		var tab = $(td).parent().attr('data-pac_tab')
		var dro = $(td).parent().attr('data-pac_dro')
		var otr = $(td).parent().attr('data-pac_otr')
		$('#myModalLabel2').html("Editar Antecedentes");
		$('#pac_ali2').val(ali);
		$('#pac_act_fis2').val(act_fis);
		$('#pac_sue2').val(sue);
		$('#pac_hig2').val(hig);
		$('#pac_mic2').val(mic);
		$('#pac_dep2').val(dep);
		$('#pac_alc2').val(alc);
		$('#pac_tab2').val(tab);
		$('#pac_dro2').val(dro);
		$('#pac_otr2').val(otr);
		
	}

	$('#btnModalAntecedenteGuardar').click(function(){
		event.preventDefault();
		$.ajax({
			type: "POST",
			data: { 
					"pac_ced": cedula,
					"pac_ali": $('#pac_ali2').val(),
					"pac_act_fis": $('#pac_act_fis2').val(), 
					"pac_sue": $('#pac_sue2').val(), 
					"pac_hig": $('#pac_hig2').val(),
					"pac_mic": $('#pac_mic2').val(),
					"pac_dep": $('#pac_dep2').val(),
					"pac_alc": $('#pac_alc2').val(),
					"pac_tab": $('#pac_tab2').val(),
					"pac_dro": $('#pac_dro2').val(),
					"pac_otr": $('#pac_otr2').val(),
					"pac_otr": $('#pac_otr2').val()
					},
			url: "/ceup/cpaciente/update2/",
			dataType: 'json',			
			
			success: function(response){
				$('#modalPacienteAntecedente').modal('hide');				
				//$.notify("Medico editado con exito","success");
				toastr.options={"progressBar": true}
				toastr.success('Antecedentes de Paciente modificado con Exito!','Estado');
				$('#tbPaciente').DataTable().ajax.reload();
			},

			error: function(response){
				//$.notify("Error al editar paciente","error");
				toastr.options={"progressBar": true}
				toastr.error('Error al editar antecedentes de paciente!','Estado');
			}

		});
	});

	function validarCedula(){
		$.post("/ceup/cpaciente/get2/",$.getDataPac);
        var cedula =  document.getElementById("pac_ced").value;
        //Preguntamos si la cedula consta de 10 digitos
        if(cedula.length == 10){
        	console.log("igual a 10");
            if(cedula==2222222222){
            	console.log("222222");
                toastr.options={"progressBar": true}
				toastr.info("La cedula "+cedula+" es incorrecta",'Aviso');
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

            
                if(digito_validador == ultimo_digito){
                	var usu =document.getElementById('pac_ced').value;
                	for(p in pacientes){
                    	var ced = pacientes[p].pac_ced
                    	if(usu==ced){
                    		toastr.options={"progressBar": true}
							toastr.info('El numero de cedula ya existe','Aviso');
                    		return false
                    	}
                    }
                	return true
                }else{
                	toastr.options={"progressBar": true}
					toastr.info('la cédula: ' + cedula + ' es incorrecta','Aviso');
                	return false
                }
            }else{
                // imprimimos en consola si la region no pertenece
                toastr.options={"progressBar": true}
				toastr.info('Esta cedula no pertenece a ninguna region','Aviso');
                return false
            }
        }else{
            //imprimimos en consola si la cedula tiene mas o menos de 10 digitos
           	toastr.options={"progressBar": true}
			toastr.info('Esta cedula no tiene 10 digitos','Aviso');
            return false
        }

    }
});


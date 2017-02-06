$(function(){
	
	
	var usuarios ;

	$.getDataUsu = function(response){
		usuarios = response.datos;
		//se agrego data-horcod y data-dmhcod
	};
	$.post("/ceup/cusuario/get2/",$.getDataUsu);
	/*============== 
	* GUARDAR USUARIO
	*===============	
	*/

	$('#frmUsu_save').on("submit",function(){
		event.preventDefault();
		//console.log('pasa');
		if(validarCedula()){
			$.ajax({
				type:"POST",
				url: "/ceup/cusuario/save/",
				dataType: 'json',
				data:$(this).serialize(),
				success: function(response){
					toastr.success('Usuario guardado con Exito!', 'Estado');
					$('#usu_ced').val("");
					$('#usu_nom').val("");
					$('#usu_ape').val("");
					$('#usu_dir').val("");
					$('#usu_eml').val("");
					$('#usu_pas').val("");
				},
				error: function(){
					toastr.error('Error!', 'Estado');
				}
			});
		}
	});

	var btnsOpTblModels = "<button style='border: 0; background: transparent' data-target='#modalUsuario' data-toggle='modal' onclick='$.editarModal($(this).parent())'>"+
							"<span class='glyphicon glyphicon-edit' title='Modificar'></span>"+
						  "</button>";

	$.renderizeRow = function( nRow, aData, iDataIndex )
	{
		if(aData['usu_est'] == 't')
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
		$(nRow).attr('id',aData['usu_cod']); //codigo
		$(nRow).attr('data-usudir',aData['usu_dir']);
		$(nRow).attr('data-tipcod',aData['tip_cod']);
		//$(nRow).attr('data-usupas',aData['usu_pas']);
	};
	
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
	
	$('#tbUsuario').DataTable({
		ordering: true,
		"ajax":{
			"url": "/ceup/cusuario/get/",
			"dataSrc": "datos"
		},
		"columns":[{data:"usu_ced"},{data: "usu_nom"}, {data:"usu_ape"},{data:"usu_eml"},{data:"tipo"},{data:"usu_dir"}],
		"columnDefs": [
            {
                "targets": [5],
                "visible": false,
                "searchable": false
            }
        ],
        "fnCreatedRow": $.renderizeRow,
        "language": lngEsp
        
	});
	
	$("#ltUsuario").click(function(){
		event.preventDefault();
		$('#tbUsuario').DataTable().ajax.reload();
	});

	$.eliminar = function(td){
		var cedula = $(td).parent().children()[0].textContent; //cedula
		$.ajax({
			type: "POST",
			url: "/ceup/cusuario/delete/", 
			data: {"id":cedula},
			dataType: 'json',
			success: function(response){
				toastr.success('Eliminado con Exito!', 'Estado');
				$(td).parent().remove(); // remove a tr
				$('#tbUsuario').DataTable().ajax.reload();				
			},

			error: function(response){
				toastr.error('Error al eliminar !', 'Estado');
			}

		});
	};

	$.activar = function(td){
		event.preventDefault();
		var cedula = $(td).parent().children()[0].textContent; //cedula
		$.ajax({
			type: "POST",
			url: "/ceup/cusuario/activar/", 
			dataType: 'json',
			data: {"id":cedula},			
			success: function(response){
				toastr.success('Activado con exito !', 'Estado');
				$('#tbUsuario').DataTable().ajax.reload();
			},
			error: function(response){
				toastr.success('Error al activar', 'Estado');
			}
		});
	};

	$.editarModal = function(td)
	{
		var trChildren 	= $(td).parent().children();
		var ced 		= trChildren[0].textContent;
		var nom 		= trChildren[1].textContent;
		var ape 		= trChildren[2].textContent;
		var dir 		= $(td).parent().attr('data-usudir');
		var eml 		= trChildren[3].textContent;
		//var pas 		= $(td).parent().attr('data-usupas');
		var est 		= trChildren[4].textContent;
		var tip 		= trChildren[5].textContent;
		var tip_user	= $(td).parent().attr('data-tipcod');
		
		$('#myModalLabel').html("Editar");
		$('#txtnombre2').val(nom);
		$('#txtapellido2').val(ape);
		$('#txtdireccion2').val(dir);
		$('#txtemail2').val(eml);
		//$('#txtpassword2').val(pas);
		$('#selectUser2').val(tip_user);
		$('#txtcedula2').val(ced);
	};

	$('#btnModalGuardar').click(function(){
		event.preventDefault();
		$.ajax({
			type: "POST",
			data: {
					"cedula":$('#txtcedula2').val() , 
					"nombre":$('#txtnombre2').val() , 
					"apellido": $('#txtapellido2').val() , 
					"direccion":$('#txtdireccion2').val(),
					"email": $('#txtemail2').val(), 
					//"password": $('#txtpassword2').val(), 
					"tipo": $('#selectUser2').val()
					},
			url: "/ceup/cusuario/update/",
			dataType: 'json',
			
			success: function(response){
				$('#modalUsuario').modal('hide');
				toastr.success('Editado con exito !', 'Estado');
				$('#tbUsuario').DataTable().ajax.reload();
			},

			error: function(response){
				toastr.error('Error al Editar', 'Estado');;
			}

		});
	});
			
	$('#modalUsuario').bind('shown.bs.modal' , function(){
		txtnombre2.focus();
	});
	

	function validarCedula(){
		$.post("/ceup/cusuario/get2/",$.getDataMed);
        var cedula =  document.getElementById("usu_ced").value;
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
                	var usu =document.getElementById('usu_ced').value;
                    for(m in usuarios){
                    	var ced = usuarios[m].usu_ced
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
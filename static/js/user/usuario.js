$(function(){
	
	/*============== 
	* GUARDAR USUARIO
	*===============	
	*/
	$('#frmUsu_save').on("submit",function(){
		event.preventDefault();
		//console.log('pasa');
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
	
});
$(function(){


	var flag=0;

	/***********************
	* ONLOAD PAGE
	**********************/
	var keywords= [] , keymedico =[];
	function inicio ()
	{
		$.getCed = function(response){
			$.each(response.cedula, function(key, value){
				keywords[key] = value.med_ced;			
			});
		};

		$.getMed = function(response){
			$.each(response.medico , function(key, value){
				keymedico[key] = value.nombre;
			});
		};

		$.post("/ceup/cmedico/autocompletarCedMedico/",$.getCed);
		$.post("/ceup/cmedico/autocompletarMedico/",$.getMed);

		cargarTablaEspecialidadModal();
	}

	window.onload = inicio;

	function cargarTablaEspecialidadModal()
	{
		/******************************************
		* LLENAR TABLA ESPECIALIDAD EN MODAL					
		******************************************/
		$.ajax({
			url: '/ceup/cespecialidad/get/',
			type: 'POST',
			dataType: 'json',
			success : function(response){
				var espData = "";
				if(response.datos.length > 0)
				{
					$.each(response.datos,function(i,item){
						espData +="<tr id="+(i+1)+" data-espcod="+item.esp_cod+">"+
									"<td>"+item.esp_des+"</td>"+										
									"<td> <input type='checkbox' id='check"+i+"' data-espcod="+item.esp_cod+" data-esp='esp2' data-dmecod='0'></td>"+
									"</tr>";
					});								
				}
				$('#bodyTbAsig').html(espData);
			},
			error: function(response)
			{
				toastr.options={"progressBar": true}
				toastr.error('Error al cargar Especialidades','Estado');

			}
		});
	}

	/****************
	* AUTOCOMPLETADO
	*****************/
	var auto = function(response){
			$("#amed_ced").val(response.medico.med_ced);
			$("#amed_nom").val(response.medico.nombre);
			$("#amed_dir").val(response.medico.med_dir);
			$("#amed_tel").val(response.medico.med_tel);
			$("#amed_eml").val(response.medico.med_eml);
			med_cod_global = response.medico.med_cod;
		};

		$('#amed_ced').autocomplete({
			source: keywords , 
			select: function(){
				
				/*============================================
				*	COMPRUEBA SI YA TIENE ESPECIALIDAD ASIGNADA
				***********************************************/
				$.ajax({
					url: '/ceup/cmedico/validarAsignacion/',
					type: 'POST',
					data: 	{
								"med_ced":$('#amed_ced').val()
							},
					success: function(response){
							if (response === "1")
							{
								/***************************************
								* NO TIENE ASIGNADO NINGUNA ESPECIALIDAD
								****************************************/
								//$('#btnGuardarAsignacion').prop('disabled',false);
								$.ajax({
										url: "/ceup/cmedico/getMedicoByCed/",
										type: "POST",
										data: {
												"med_ced":$("#amed_ced").val()
											  },
										dataType : "json",
										success: function(response){
											auto(response);
										},
									});
							}
							else
							{
								//$('#btnGuardarAsignacion').prop('disabled',true);
								cleanBoxesAsig();
								toastr.options={"progressBar": true};
								toastr.error('El medico ya tiene asignada(s) especialidad (s)!','Estado');
							}
					},
					error: function(response){

					}
				});	
			},
		});

		$('#amed_nom').autocomplete({
			source: keymedico , 
			select: function(){

				/*============================================
				*	COMPRUEBA SI YA TIENE ESPECIALIDAD ASIGNADA
				***********************************************/
				$.ajax({
					url: '/ceup/cmedico/validarAsignacionNombre/',
					type: 'POST',
					data: 	{
								"med_nom":$('#amed_nom').val()
							},
					success: function(response){
							if (response === "1")
							{
								/***************************************
								* NO TIENE ASIGNADO NINGUNA ESPECIALIDAD
								****************************************/
								//$('#btnGuardarAsignacion').prop('disabled',false);
								$.ajax({
										url: "/ceup/cmedico/getMedicoByNom/",
										type: "POST",
										data: {
												"med_nom":$("#amed_nom").val()
											  },
										dataType : "json",
										success: function(response){
											auto(response);
										},
									});								
							}
							else
							{
								//$('#btnGuardarAsignacion').prop('disabled',true);
								cleanBoxesAsig();
								toastr.options={"progressBar": true};
								toastr.error('El medico ya tiene asignada(s) especialidad (s)!','Estado');
							}
					},
					error: function(response)
					{
						toastr.options={"progressBar": true};
						toastr.error('Error en el servidor contactese con el Administrador','Estado');
					}
				});	
			},
		});

	function cleanBoxesAsig()
	{
		$('#amed_nom').val("");
		$('#amed_ape').val("");
		$('#amed_dir').val("");
		$('#amed_tel').val("");
		$('#amed_eml').val("");
		$('#amed_ced').val("");
	}

	/***********************
	* GUARDAR MEDICO
	**********************/
	$('#frmMed').on("submit",function(){
		event.preventDefault();
		$.ajax({
			type:"POST",
			url: "/ceup/cmedico/save/",
			dataType: 'json',
			data:$(this).serialize(),

			success: function(response){
				$('#med_ced').val("");
				$('#med_nom').val("");
				$('#med_ape').val("");
				$('#med_dir').val("");
				$('#med_tel').val("");
				$('#med_eml').val("");
				toastr.success('Medico guardado con Exito!', 'Estado');
			},

			error: function(){
				toastr.error('Error en el servidor!', 'Estado');
			}
		});

	});

	var btnsOpTblModels = "<button style='border: 0; background: transparent' data-target='#modalMedico' data-toggle='modal' onclick='$.editarModal($(this).parent())'>"+
							"<span class='glyphicon glyphicon-edit' title='Modificar'></span>"+
						  "</button>"+
						  "<button style='border: 0; background: transparent' onclick='$.eliminar($(this).parent())'>"+
							"<span class='glyphicon glyphicon-trash' title='Eliminar'></span>"+
						  "</button>";

	$.renderizeRow = function( nRow, aData, iDataIndex ) {
	   $(nRow).append("<td class='text-center'>"+btnsOpTblModels+"</td>");
	   $(nRow).attr('id',aData['med_cod']); //
	   $(nRow).attr('data-dir',aData['med_dir']);
	};


			//Llenar tabla de datos
			$('#tbMedico').DataTable({
				ordering: true,
				"ajax":{
					"url": "/ceup/cmedico/get/",
					"dataSrc": "datos"
				},
				"columns":[	{data:"med_ced"},
										{data:"med_nom"},
										{data:"med_ape"},
										{data:"med_tel"},
										{data:"med_eml"}
									],
		        "fnCreatedRow": $.renderizeRow

			});

	$("#ltMedico").click(function(){
			event.preventDefault();
			$('#tbMedico').DataTable().ajax.reload();
	});

	$.eliminar = function(td){
		var tr = $(td).parent().children();
		var med_ced = tr[0].textContent;
		var med_e = 'FALSE';
		$.ajax({
			type: "POST",
			data: {"med_ced":med_ced,"med_e":med_e},
			url: "/ceup/cmedico/delete/",
			dataType: 'json',
			success: function(response){
				event.preventDefault();
				toastr.success('Medico eliminado con Exito!', 'Estado');
				$('#tbMedico').DataTable().row($(td).parent()).remove().draw();
			},

			error: function(response){
				toastr.error('Error en el servidor!', 'Estado');
			}

		});
	};

	$.editarModal = function(td)
	{
		var tr = $(td).parent().children();
		var ced = tr[0].textContent;
		var nom = tr[1].textContent;
		var ape = tr[2].textContent;
		var tel = tr[3].textContent;
		var eml = tr[4].textContent;
		$('#myModalLabel').html("Editar");
		$('#mmed_nom').val(nom);
		$('#mmed_ape').val(ape);
		$('#mmed_dir').val($(td).parent().attr('data-dir'));
		$('#mmed_tel').val(tel);
		$('#mmed_eml').val(eml);
		$('#txtId').val(ced);
	};

	$('#btnModalGuardar').click(function(){
		event.preventDefault();
		$.ajax({
			type: "POST",
			data: {
					"med_ced": $('#txtId').val(),
					"med_nom": $('#mmed_nom').val(),
					"med_ape": $('#mmed_ape').val(),
					"med_dir": $('#mmed_dir').val(),
					"med_tel": $('#mmed_tel').val(),
					"med_eml": $('#mmed_eml').val()
					},
			url: "/ceup/cmedico/update/",
			dataType: 'json',

			success: function(response){
				$('#modalMedico').modal('hide');
				toastr.success('Medico editado con Exito!', 'Estado');
				$('#tbMedico').DataTable().ajax.reload();
			},

			error: function(response){
				toastr.success('Error del servidor !', 'Estado');
			}

		});
	});

	$('#modalMedico').bind('shown.bs.modal' , function(){
		med_nom.focus();
	});

	/*=====================================
	* FUNCIONES PARA EL AUTOCOMPLETADO
	* ====================================*/
	var med_cod_global, flagLoad = true;
	$.renderizeRow2 = function( nRow, aData, iDataIndex ) 
	{	    
	    $(nRow).append("<td class='text-center'><input type='checkbox' id='check2M"+(iDataIndex)+"' data-espcod="+aData['esp_cod']+" data-esp='esp1' data-dbmcod='0'></td>");
		$(nRow).attr('data-esp_cod',aData['esp_cod']); //codigo
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

	/*************************************
	* EVENTO CLICK EN ASIGNAR ESPECIALIDAD
	**************************************/

	$('#AsigEsp').click(function(e){
		e.preventDefault();
		if (flagLoad)
		{
			flagLoad = false;
			$('#tbEsp1').DataTable({
				ordering: true,
				"ajax":{
					"url": "/ceup/cespecialidad/get/",
					"dataSrc": "datos"
				},
				"columns":[{data:"esp_des"}],
				"fnCreatedRow": $.renderizeRow2,
				"language": lngEsp
			});
		}
		
	});

	/*******************************************************
	* CONTROLA EVENTOS EN TABLA ESPECIALIDAD 1 Y EN EL MODAL
	********************************************************/
	var data2 = [];
	$(document).on('change', '[type=checkbox]', function(e){
		
		if ($(this).attr('data-esp') === 'esp1') // guardar asignacion
		{
			var id=$(this).attr('data-espcod');			
			if($(this).is(':checked')) 
			{	            
	            data2.push(id);  
	        } 
	        else 
	        {  
	            
	            $.each(data2, function (idx, item) { 
				 	if(item == id){
				 		//delete item;
				 		data2.splice(idx,1);
				 	} 
				});
	        } 
		}

		//-----checkbox para la tabla MODAL especialidad -elimina 
		if ( $(this).attr('data-esp') === 'esp2')
		{
			if( $(this).is(':checked'))
			{
				data2.push($(this).attr('data-espcod'));
			}
			else
			{
				
				if(flag == 1) // si editar
				{
					if(	!($(this).is(':checked')) && $(this).attr('data-dmecod')!== "0") //unchecked y tiene data-dmecod elimina
					{
						var dme_id = $(this).attr('data-dmecod');
						//alert(dme_id);
						var check = $(this);
						$.ajax({
							type: "POST",
							url: "/ceup/cmedico/deleteDme/",
							dataType: 'json',
							data: {
								"dme_id" : dme_id								
								},
							success: function(response){
								$(check).attr('data-dmecod','0');						
								//toastr.options={"progressBar": true};
								toastr.success('Asignacion eliminada correctamente!','Estado');
								//flag = 0;
							},
							error: function(response)
							{
								$(check).prop("checked",true);
								$.notify("error","error");
							}				
						});
					}
					else
					{
						///siempre que entra a un ajax o $.each se pierde el control hay que guardar el valor antes
						var id = $(this).attr('data-espcod');
						$.each(data2, function (idx, item) { 
						 	if(item === id){
						 		//delete item;
						 		data2.splice(idx,1);
						 	} 
						});
					}					
				}
			}
		}
		
	});

	/**========================
	* GUARDAR LA ASIGNACION 
	*=========================*/

	$('#btnGuardarAsignacion').click(function(){
		event.preventDefault();
		//aki ejecutar gif
		if( $('#amed_ced').val() !== "" && $('#amed_nom').val() !== "" && data2.length > 0)
		{
			$("#wait").css("display", "block");			
			$.ajax({
				type:"POST",
				url:"/ceup/cmedico/saveDme/",
				data: {
						"med_cod": med_cod_global,					
						"data2": data2,
						},
				dataType:'json',
				success: function(response){			
					data2 = [];
					cleanBoxesAsig();
					cleanBoxes('tbEsp1');				
					toastr.options={"progressBar": true}
					toastr.success('Asignacion Guardada correctamente!','Estado');

					/*********************************
					* RECARGA LA TABLA DE ASIGNACIONES
					**********************************/
					$.ajax({
						url: '/ceup/cmedico/getAsig/',
						type: 'POST',
						dataType : 'json',
						success: function(response){
							var datos = "";
							if (response.datos.length > 0)
							{
								$.each(response.datos, function(i,item){
									
									datos += "<tr id="+(i+1)+" data-medcod="+item.med_cod+">"+
												"<td>"+item.med_ced+"</td>"+
												"<td>"+item.medico+"</td>"+
												"<td>"+btnEditar+"</td>"+
											"</tr>";
								});
								flagLoadAsig = false;
								$('#tblEsp2').html(datos);
							}
						}
					});
				},
				error:function(){
					toastr.options={"progressBar": true}
					toastr.error('Error al registrar la(s) Asignaciones','Estado');
				}
			});
			$("#wait").css("display", "none");//termina gif
		}
		else
		{
			toastr.error('No ha sido asignado Medico o Especialidad !','Estado');
		}
	});

	/**********************************************
	* GUARDA DESDE EL EDITAR LA NUEVA ASIGNACION
	*********************************************/
	$('#abtnGuardar').click(function(e){
		e.preventDefault();
		//if ( $('#amed_ced').val() !== "")
		//{
			$("#wait").css("display", "block");
			$.ajax({
				type:"POST",
				url:"/ceup/cmedico/saveDme/",
				data: {
						"med_cod": med_cod_global,
						"data2": data2,
						},
				dataType:'json',
				success: function(response){			
					data2 = [];
					toastr.options={"progressBar": true}
					toastr.success('Asignacion Guardada correctamente!','Estado');
					$('#modalAsig').modal('hide');
					/*********************************
					* RECARGA LA TABLA DE ASIGNACIONES
					**********************************/
					$.ajax({
						url: '/ceup/cmedico/getAsig/',
						type: 'POST',
						dataType : 'json',
						success: function(response){
							var datos = "";
							if (response.datos.length > 0)
							{
								$.each(response.datos, function(i,item){
									
									datos += "<tr id="+(i+1)+" data-medcod="+item.med_cod+">"+
												"<td>"+item.med_ced+"</td>"+
												"<td>"+item.medico+"</td>"+
												"<td>"+btnEditar+"</td>"+
											"</tr>";
								});
								flagLoadAsig = false;
								$('#tblEsp2').html(datos);
							}
						}
					});				
				},
				error:function(){
					toastr.options={"progressBar": true}
					toastr.error('Error al registrar la(s) Asignaciones','Estado');
				}
			});
			$("#wait").css("display", "none");//termina gif
		//}
		//else{
		//	toastr.options={"progressBar": true}
		//	toastr.error('Asegurese de elegir un medico','Estado');
		//}
	});

	/*****************************
	* LIMPIAR CHECK BOX EN TABLAS 
	******************************/
	function cleanBoxes(tabla)
	{
		var table = $('#'+tabla).dataTable();
		var nNodes = table.fnGetNodes();

		$(table.fnGetNodes()).each(function(i,v)
		{	
			if( $($($(v).children('td')[1]).children()[0]).is(':checked') )
			{	
				$($($(v).children('td')[1]).children()[0]).prop("checked", false);
				$($($(v).children('td')[1]).children()[0]).attr("data-dbmcod",0);
			}
		});
	}

	/*****************************
	* LISTAR ASIGNACIONES
	******************************/
	var btnEditar = "<button style='border: 0; background: transparent' data-target='#modalAsig' data-toggle='modal' title='Editar' onclick='$.editarAsig($(this).parent())'>"+
							"<span class='glyphicon glyphicon-edit'></span>"+
						  "</button>";

	var flagLoadAsig = true;
	$('#ltAsig').click(function(e){
		e.preventDefault();
		if(flagLoadAsig)
		{
			$.ajax({
				url: '/ceup/cmedico/getAsig/',
				type: 'POST',
				dataType : 'json',
				success: function(response){
					var datos = "";
					if (response.datos.length > 0)
					{
						$.each(response.datos, function(i,item){
							
							datos += "<tr id="+(i+1)+" data-medcod="+item.med_cod+">"+
										"<td>"+item.med_ced+"</td>"+
										"<td>"+item.medico+"</td>"+
										"<td>"+btnEditar+"</td>"+
									"</tr>";
						});
						flagLoadAsig = false;
						$('#tblEsp2').html(datos);
					}
				},
				error: function(response)
				{
					toastr.options={"progressBar": true}
					toastr.error('Error al registrar la(s) Asignaciones','Estado');
				}

			});
		}
	});

	/****************************
	* 	EDITAR ASIGNACION
	****************************/
	$.editarAsig = function(td)
	{
		flag = 1;
		med_cod_global= $(td).parent().attr('data-medcod');
		$('#tema').html("Especialidades de "+$(td).parent().children()[1].textContent);
		$.post("/ceup/cmedico/getDme/", 
				{"med_cod" : med_cod_global},
				 function(response){
				 	if(response.datos.length > 0)
				 	{				 						 		
				 		$.each(response.datos, function(j,value){

				 			for (var i=0 ; i < $('#bodyTbAsig >tr').length ; i++)
				 			{
				 				if( $("#check"+i).attr('data-espcod') == value.esp_cod)// si es igual al hor_cod activa el checkbox y establece data-dmhcod
				 				{				 					
				 					$('#check'+i).prop("checked",true);
				 					$('#check'+i).attr("data-dmecod",value.dme_id);
				 				}
				 			}
				 			
				 		});
				 	}
		},"json");
	};

	//Evento al Cerrar el Modal - borra todos los checks
	$('#modalAsig').on('hidden.bs.modal', function(){
		var rows = $('#bodyTbAsig >tr');
		for(var i=0 ; i < $(rows).length ; i++)
		{
			if($('#check'+i).is(':checked'))
			{
				$('#check'+i).prop("checked",false); //unchecked
				$('#check'+i).attr('data-dmecod',0); //detalle_medico_especialidad a cero
			}
		}
		data2 = [];
		flag = 0;
	});

});

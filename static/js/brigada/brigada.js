$(function(){

	var data2= [];
	var flag=0;

	//******************************************GUARDAR BRIGADA****************************************************
	$('#btnGuardarBigrada').click(function(){
		event.preventDefault();		
		//aki ejecutar gif
		$("#wait").css("display", "block");
		console.log(data2);
		$.ajax({
			type:"POST",
			url:"/ceup/cbrigada/save/",
			data: {
					"bri_des": $('#bri_des').val(),
					"bri_res": $('#bri_res').val(),
					"bri_fec_ini": $('#bri_fec_ini').val(),
					"bri_fec_fin": $('#bri_fec_fin').val(),
					"bri_dir": $('#bri_dir').val(),
					"data2": data2,
					},
			dataType:'json',
			success: function(response){
				limp_form_brigada();
				$('#tbMedico').DataTable().ajax.reload();
				toastr.options={"progressBar": true}
				toastr.success('Brigada registrada con Exito!','Estado');
			},
			error:function(){
				toastr.options={"progressBar": true}
				toastr.error('Error al registrar Brigada','Estado');
			}
		});
		$("#wait").css("display", "none");//termina gif
	});


	//****************************************************GUARDAR MEDICO*****************************************************
	$('#btnModalGuardarMedico').click(function(){
		event.preventDefault();
		var v1 = document.getElementById("med_ced").value;
		var v2 = document.getElementById("med_nom").value;
		var v3 = document.getElementById("med_ape").value;
		var v4 = document.getElementById("med_dir").value;
		var v5 = document.getElementById("med_tel").value;
		var v6 = document.getElementById("med_eml").value;
        if( v1 == null || v1.length == 0 || /^\s+$/.test(v1) || v2 == null || v2.length == 0 || /^\s+$/.test(v2) || v3 == null || v3.length == 0 || /^\s+$/.test(v3) || v4 == null || v4.length == 0 || /^\s+$/.test(v4)  || v5 == null || v5.length == 0 || /^\s+$/.test(v5) ) {
            toastr.options={"progressBar": true}
            toastr.info('Faltan campos de llenar','Error');
        }
        else{
        	$.ajax({
				type:"POST",
				url: "/ceup/cbrigada/saveMedico/",
				data: { 
						"med_ced": $('#med_ced').val(),
						"med_nom": $('#med_nom').val(), 
						"med_ape": $('#med_ape').val(), 
						"med_dir": $('#med_dir').val(),
						"med_tel": $('#med_tel').val(),
						"med_eml": $('#med_eml').val()
						},
				dataType: 'json',
				success: function(response){
					$('#modalMedico').modal('hide');
					limp_form_medico();
					toastr.options={"progressBar": true}
					toastr.success('Medico registrado con Exito!','Estado');
					$('#tbMedico').DataTable().ajax.reload();
				},
				error: function(){
					toastr.options={"progressBar": true}
					toastr.error('Error al registrar Medico','Estado');
				}
			});
        }
	});


	//*************************************LIMPIAR FORMULARIOS**************************************************
	function limp_form_brigada(){
		$('#bri_des').val("");
		$('#bri_res').val("");
		$('#bri_dir').val("");
		$('#bri_fec_ini').val("");
		$('#bri_fec_fin').val("");
	}

	function limp_form_medico(){
		$('#med_ced').val("");
		$('#med_nom').val(""); 
		$('#med_ape').val(""); 
		$('#med_dir').val("");
		$('#med_tel').val("");
		$('#med_eml').val("");
	}
	

	//---------------------------------------------CARGAR TABLA MEDICOS--------------------------------------------//	
	$.renderizeRow1 = function( nRow, aData, iDataIndex ) {
	    
	    $(nRow).append("<td class='text-center'><input type='checkbox' id='check1M"+(iDataIndex)+"' data-med='med1' data-medcod="+aData['med_cod']+" data-dbmcod='0'></td>");
		$(nRow).attr('id',aData['med_cod']); //codigo
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
	
	$('#tbMedico').DataTable({
		ordering: true,
		"ajax":{
			"url": "/ceup/cbrigada/getMedicos/",
			"dataSrc": "datos"
		},
		"columns":[{data:"med_ced"},{data:"med_nom"},{data:"med_ape"}],
		"columnDefs": [
			{
				"targets": [2],
				"visivle": false,
				"searchable": false
			}
		],
		"fnCreatedRow": $.renderizeRow1,
		"language": lngEsp
	});
	//*********************************************CARGAR TABLA MODAL MEDICOS**************************************//
	$.renderizeRow2 = function( nRow, aData, iDataIndex ) 
	{    
	    $(nRow).append("<td class='text-center'><input type='checkbox' id='check2M"+(iDataIndex)+"' data-medcod="+aData['med_cod']+" data-med='med2' data-dbmcod='0'></td>");
		$(nRow).attr('data-id_med',aData['med_cod']); //codigo
	};

	$('#tbMedico2').DataTable({
		ordering: true,
		"ajax":{
			"url": "/ceup/cbrigada/getMedicos/",
			"dataSrc": "datos"
		},
		"columns":[{data:"med_ced"},{data:"med_nom"},{data:"med_ape"}],
		"columnDefs": [
			{
				"targets": [2],
				"visivle": false,
				"searchable": false
			}
		],
		"fnCreatedRow": $.renderizeRow2,
		"language": lngEsp
	});

	//---------------------------------------------CARGAR TABLA BRIGADA--------------------------------------------//

	var btnsOpTblModels = "<button style='border: 0; background: transparent' data-target='#modalBrigada' data-toggle='modal' title='Editar' onclick='$.editarModal($(this).parent());'>"+
						  "<span class='glyphicon glyphicon-edit'></span>"+
						  "</button>";
		
	

	$.renderizeRow = function( nRow, aData, iDataIndex ) {
	   $(nRow).append("<td class='text-center'>"+btnsOpTblModels+"</td>");
	   $(nRow).attr('id',aData['bri_id']); //

	};

	$('#tbBrigada').DataTable({
		ordering: true,
		"ajax":{
			"url": "/ceup/cbrigada/get/",
			"dataSrc": "datos"
		},
		//"columns":[{data:"bri_res"},{data:"bri_des"},{data:"bri_dir"},{data:"bri_fec_ini"},{data:"bri_fec_fin"}],
		"columns":[{data:"bri_fec_ini"},{data:"bri_fec_fin"},{data:"bri_res"},{data:"bri_des"},{data:"bri_dir"}],
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
	
	$("#ltBrigada").click(function(){
		event.preventDefault();
		$('#tbBrigada').DataTable().ajax.reload();
	});

	

	//************************************EDITAR BRIGADA****************************************************//
	var id_bri='';
	$.editarModal = function(td)
	{
		flag=1;
		var tr = $(td).parent().children();
		id_bri = $(td).parent().attr('id');
		var res = tr[2].textContent;
		var des = tr[3].textContent;
		var dir = tr[4].textContent;
		var fec_ini = tr[0].textContent;
		var fec_fin = tr[1].textContent;
		//$('#myModalLabelB').html("Editar");
		$('#bri_res2').val(res);
		$('#bri_des2').val(des);
		$('#bri_dir2').val(dir);
		$('#bri_fec_ini2').val(fec_ini);
		$('#bri_fec_fin2').val(fec_fin);
		var table = $('#tbMedico2').dataTable();
		var nNodes = table.fnGetNodes();
		//var data = table.rows();
		$.ajax({
			type: "POST",
			data: {"id": id_bri },
			url: "/ceup/cbrigada/getMedicos2/",
			dataType: 'json',
			success: function(response){
				console.log(response.datos);
				if (response.datos !== null)
				{
					$(table.fnGetNodes()).each(function(i,v)
					{
						$.each(response.datos, function(j,value)
						{		
							if( $($($(v).children('td')[3]).children()[0]).attr('data-medcod') == value.med_cod )
							{	
								console.log("entro zeta");
								$($($(v).children('td')[3]).children()[0]).prop("checked", true);
								$($($(v).children('td')[3]).children()[0]).attr("data-dbmcod",value.bri_id);
							}
						});
					})	
				}
			}
		});
	};


	//----------------------GUARDAR EDICION BRIGADA
	$('#btnModalGuardarBrigada').click(function(){
		event.preventDefault();
		var table = $('#tbMedico2').dataTable();
		var nNodes = table.fnGetNodes();
		var contador = 0;
		var bandera = false;
		

		$(table.fnGetNodes()).each(function(i,v)
		{
			var check = $($($(v).children('td')[3]).children()[0]);
			if ( check.is(':checked') && check.attr('data-dbmcod') === '0' )
			{
				contador++;
				bandera=true;
				var med_cod = check.attr('data-medcod');
				$.ajax({
					type: "POST",
					url:  "/ceup/cbrigada/saveDetalleBriMed",
					dataType: 'json',
					data:{
						"bri_id": id_bri,
						"med_cod": med_cod, 
					}
				});
			}
		})
		
		
		$.ajax({
			type: "POST",
			data: { 
					"bri_id": id_bri,
					"bri_des": $('#bri_des2').val(),
					"bri_res": $('#bri_res2').val(), 
					"bri_fec_ini": $('#bri_fec_ini2').val(), 
					"bri_fec_fin": $('#bri_fec_fin2').val(),
					"bri_dir": $('#bri_dir2').val(),
					},
			url: "/ceup/cbrigada/update/",
			dataType: 'json',			
			success: function(response){
				$('#modalBrigada').modal('hide');
				//$.notify("Medico editado con exito","success");
				bandera=true;
				toastr.options={"progressBar": true}
				toastr.success('Brigada modificado con Exito!','Estado');
				$('#tbBrigada').DataTable().ajax.reload();
			},
			error: function(response){
				//$.notify("Error al editar paciente","error");
				toastr.options={"progressBar": true}
				toastr.error('Error al editar Brigada!','Estado');
			}
		});
		
		
	});

	
	

	

	


	/*
	---------------------------------------------CONTROLA LOS EVENTOS DE LOS CHECKBOXES------------------------------------------------------
	*/
	$(document).on('change', '[type=checkbox]', function(e){
		//-----checkbox para la tabla medico
		if ($(this).attr('data-med') === 'med1')
		{
			var id=$(this).parent().parent().attr('id');
			//alert("esto es medico"+id);
			if($(this).is(':checked')) {  
	            //alert("Está activado");
	            data2.push(id);  
	        } else {  
	            //alert("No está activado");
	            $.each(data2, function (idx, item) { 
				 	if(item == id){
				 		//delete item;
				 		data2.splice(idx,1);
				 	} 
				});
	        } 
		}
		//-----checkbox para la tabla MODAL medico
		if ( $(this).attr('data-med') === 'med2')
		{
			if( $(this).is(':checked'))
			{

			}
			else
			{
				
				if(flag == 1) // si editar
				{
					if(	!($(this).is(':checked')) && $(this).attr('data-dbmcod')!== "0") //unchecked y tiene data-dbmcod
					{	
						console.log("entro elimina 1 de table detalle-bri-med");
						var bri_id = $(this).attr('data-dbmcod');
						var med_cod = $(this).attr('data-medcod');
						console.log(bri_id+"   "+med_cod);
						$(this).attr('data-dbmcod','0');
						$.ajax({
							type: "POST",
							url: "/ceup/cbrigada/deleteCustom/",
							dataType: 'json',
							data: {
								"bri_id" : bri_id,
								"med_cod": med_cod,
								},
							success: function(response){
								console.log(response);
								$.notify("Eliminado","success");
							},
							error: function(response)
							{
								$.notify("error","error");
							}				
						});
					}
				}
			}
		}
		
	}); // FIN CONTROL DE CHECKBOXES

	//Evento al Cerrar el Modal Brigrada - borra todos los checks
	$('#modalBrigada').on('hidden.bs.modal', function(){

		var table = $('#tbMedico2').dataTable();
		var nNodes = table.fnGetNodes();

		$(table.fnGetNodes()).each(function(i,v)
		{	
			if( $($($(v).children('td')[3]).children()[0]).is(':checked') )
			{	
				$($($(v).children('td')[3]).children()[0]).prop("checked", false);
				$($($(v).children('td')[3]).children()[0]).attr("data-dbmcod",0);
			}
		})
	});
});
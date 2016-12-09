$(function(){

	var data2= [];

	//******************************************GUARDAR BRIGADA****************************************************
	$('#btnGuardarBigrada').click(function(){
		event.preventDefault();
						/**console.log("tamaño: "+data2.length);
						$.each(data2, function (idx, item) { 
						 	console.log("Indice: "+idx+"   Valor: "+ item);
						});
						console.log("tamaño: "+data2.length);*/
		
		//aki ejecutar gif
		$("#wait").css("display", "block");
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
				//$('#tbMedico').DataTable().ajax.reload();
				toastr.options={"progressBar": true}
				toastr.success('Brigada registrada con Exito!','Estado');
			},
			error:function(){
				toastr.options={"progressBar": true}
				toastr.error('Error al registrar Brigada','Estado');
			}
		});
		$("#wait").css("display", "none");
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
					console.log(response);
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
	
	//checkbox para medico
	var btnsOpTblModels2 = "<input type='checkbox' id='check'' data-med='m' data-dmhcod='0'>";	

	$.renderizeRow2 = function( nRow, aData, iDataIndex ) {
	    
	    $(nRow).append("<td class='text-center'>"+btnsOpTblModels2+"</td>");
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
		"fnCreatedRow": $.renderizeRow2,
		"languaje": lngEsp
	});
	//*********************************************CARGAR TABLA MODAL MEDICOS**************************************//
	var btnsOpTblModels3 = "<input type='checkbox' id='check'' data-med='mm' data-dmhcod='0'>";

	$.renderizeRow3 = function( nRow, aData, iDataIndex ) {
	    
	    $(nRow).append("<td class='text-center'>"+btnsOpTblModels3+"</td>");
		$(nRow).attr('id',aData['med_cod']); //codigo
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
		"fnCreatedRow": $.renderizeRow3,
		"languaje": lngEsp
	});

	//---------------------------------------------CARGAR TABLA BRIGADA--------------------------------------------//

	var btnsOpTblModels = "<button style='border: 0; background: transparent' data-target='#modalBrigada' data-toggle='modal' onclick='$.editarModal($(this).parent());'>"+
						  "<img src='/sgcm/static/img/edit.png' title='Editar'>"+
						  "</button>"+
						  "<button style='border: 0; background: transparent' onclick='$.eliminar($(this).parent())'>"+
							"<img src='/sgcm/static/img/delete.png' title='Eliminar'>"+
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
		"columns":[{data:"bri_res"},{data:"bri_des"},{data:"bri_dir"},{data:"bri_fec_ini"},{data:"bri_fec_fin"}],
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




	/// Llena Tabla Horarios
	$.getDataMed = function(response){
		
		var datos = "";
		//se agrego data-horcod y data-dmhcod
		$.each(response.datos,	function(i , item)
		{
			 datos+= "<tr id="+item.hor_cod+">"+
			  		 "<td>"+item.hor_des+"</td>"+ 
			  		 "<td> <input type='checkbox' id='check"+i+"' data-horcod="+item.hor_cod+" data-dmhcod='0'></td>"+
			  		 "</tr>";				
		});
		$('#bodyTbAsig').html(datos);
	};

	//llamada ComboBox Especialidad
	//llamada tabla asignar Horarios
	$.post("/sgcm/chorario/get/",$.getDataForHor);



	//************************************EDITAR BRIGADA****************************************************//
	var id_med='';
	$.editarModal = function(td)
	{
		var tr = $(td).parent().children();
		id_med = $(td).parent().attr('id');
		var res = tr[0].textContent;
		var des = tr[1].textContent;
		var dir = tr[2].textContent;
		var fec_ini = tr[3].textContent;
		var fec_fin = tr[4].textContent;
		//$('#myModalLabelB').html("Editar");
		$('#bri_res2').val(res);
		$('#bri_des2').val(des);
		$('#bri_dir2').val(dir);
		$('#bri_fec_ini2').val(fec_ini);
		$('#bri_fec_fin2').val(fec_fin);
		$.ajax({
			type: "POST",
			data: {"id": id_med },
			url: "/ceup/cbrigada/getMedicos2/",
			dataType: 'json',
			success: function(datos){
				console.log(datos);
				var rows = $('#tblBodyModalMedico >tr');
				console.log($(rows).length)
			},
			error: function(){

			}
		});
		//$('#pac_est2').val(est);
		//$("#pac_est2").prop("checked", est);
	};


	$('#btnModalGuardarBrigada').click(function(){
		event.preventDefault();
		$.ajax({
			type: "POST",
			data: { 
					"bri_id": id_med,
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
	CONTROLA LOS EVENTOS DE LOS CHECKBOXES
	*/
	$(document).on('change', '[type=checkbox]', function(e){
		if ($(this).attr('data-med') === 'm')
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
	}); // FIN CONTROL DE CHECKBOXES

});
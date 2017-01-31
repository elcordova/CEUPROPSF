$(function(){

	var med_ced_global, esp_cod_global , dmh_cod_global, cit_tur_global ,usuario = [],usu_cod_com = [];
	var usu_cod_global = $('#usu_cod').attr('data-usucod'); 

	// LLENA EL COMBO BOX ESPECIALIDAD
	$.getDataForCmbEsp = function(response)
	{
		var datos = "";
		$.each(response.datos, function(i,value){
			if (i == "0")
			{
				datos+= "<option value=0>---</option>";
			}
			datos+= "<option value="+value.esp_cod+">"+value.esp_des+"</option>";
		});

		$('#cmbEsp').html(datos);
	};
	
	// FUNCION QUE SE EJECUTA AL LLAMAR AL MODAL
	$.cita = function(td)
	{
		event.preventDefault();
		esp_cod_global = $('#cmbEsp').val();
		med_ced_global = $(td).parent().children()[0].textContent;
		$('#myModalLabel').html("Horarios Disponibles para "+$(td).parent().children()[1].textContent);
	};


	var btnsOpTblModels = "<button type='button' class='btn btn-primary' data-target='#modalCita' data-toggle='modal' onclick='$.cita($(this).parent());'>"+
						  "<span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span>  Horario"+
						  "</button>";

	var tablaCita = $('#tbCita').dataTable();

	/************************************************************
	* 	EVENTO QUE CONTROLA EL CAMBIO EN EL COMBOBOX ESPECIALIDAD
	* 	RETORNA EL MEDICO DEPENDIENDO DE LA ESPECIALIDAD ELEGIDA
	*************************************************************/	
	$('#cmbEsp').change(function(){
		event.preventDefault();		
		if($(this).val() !== "0")
		{
			$.ajax({
				type: "POST",
				url: "/ceup/ccita/getMedico/",
				dataType: 'json',
				data: {
					"esp_cod" : $(this).val(),
					"usu_cod" : $('#usu_cod').attr('data-usutip')
				},
				success: function(s)
				{
					loadMedicos(s);						
				},
				error: function(response)
				{
					$.notify("error","error");
				}				
			});
		}
 		else
 		{
 			tablaCita.fnClearTable();
 		}
	});
	
	/****************************************
	*EVENTO AL CAMBIAR DE FECHA EN EL CONTROL
	*****************************************/
	$('#cit_fec').on("change",function(){
		if( $("#cit_fec").val() < getCurrentDate() )
		{
			$.notify("La Fecha no puede ser menor que la actual","error");
			$('#btnGuardar').prop('disabled',true);
			var rows = $('#bodyTbCita >tr');
			deleteRows(rows);
		}
		else
		{
			$('#btnGuardar').prop('disabled',false);
			$.ajax({
				type: "POST",
				url: "/ceup/ccita/getHorarioDisponible/", 
				data: {			
						"med_ced" : med_ced_global,
						"esp_cod" : esp_cod_global,
						"cit_fec" : $(this).val()
					},
				dataType: 'json',

				success: function(response){
					var datos ="";
					if(response.datos.length > 0)
					{
						$.each(response.datos, function(i,item){
							datos+= "<tr>"+
					  				"<td>"+item.hor_des+"</td>"+ 
					  				"<td> <input type='checkbox' id='check"+i+"' data-horcod="+item.hor_cod+" data-dmhcod="+item.dmh_cod+"></td>"+
					  				"</tr>";
						});
						$('#bodyTbCita').html(datos);						
					}				
				},
				error: function(response){
					$.notify("Error al cargar Horario Disponible","error");
				}

			});
		}		
	});

	/*************************************************
	*Evento al Cerrar el Modal - borra todas las filas
	**************************************************/
	$('#modalCita').on('hidden.bs.modal', function(){
		var rows = $('#bodyTbCita >tr');
		deleteRows(rows);
	});

	/**************************
	* Funciones automatizadoras
	***************************/
	function deleteRows(rows)
	{
		for(var i=0 ; i < $(rows).length ; i++)
		{
			$(rows)[i].remove();
		}
	}

	function loadMedicos(s)
	{
		tablaCita.fnClearTable();
		for(var i= 0 ; i < s.datos.length ; i++)
		{
			tablaCita.fnAddData([	s.datos[i]["med_ced"],
									s.datos[i]["medico"],
									s.datos[i]["dis_nom"],
									"<td class='text-center'>"+btnsOpTblModels+"</td>"
							]);
		}
	}

	//Controla el evento change en un checkbox
	$(document).on('change', '[type=checkbox]', function (e) {
		
		dmh_cod_global = $(this).attr("data-dmhcod"); //
		var rows = $('#bodyTbCita >tr');

		if($(this).is(":checked"))
		{
			for(var i=0 ; i < $(rows).length ; i++)
			{
				if(!($("#check"+i).is(':checked')))  //unchecked y tiene data-dmhcod
				{
					$("#check"+i).prop("disabled",true);
				}			
			}
		}
		else
		{
			for(var j=0 ; j < $(rows).length ; j++)
			{
				$('#check'+j).prop("disabled",false);			
			}

		}
	});

	/************************
	* GUARDA LAS CITAS MEDICAS
	*************************/
	$('#btnGuardar').on("click", function(){
		console.log("Usuario Id : "+usu_cod_global);
		if( $("#cit_fec").val() >= getCurrentDate() )
		{
			$.ajax({
				type: "POST",
				url: "/ceup/ccita/getTc/", 
				dataType: 'json',
				async: false,				
				success : function(response)
				{
					$('#modalCita').modal('hide');
					if(response.datos.turno !== null)
					{
						cit_tur_global = response.datos.turno;	
					}
					else
					{
						cit_tur_global =1;
					}
					
				},

				error : function(response)
				{
					$('#modalCita').modal('hide');
					$.notify("Error al guardar","error");						
				}
			});//ajax

		//***********************GUARDA LA CITA ********************************************************
			$.ajax({
					type: "POST",
					url: "/ceup/ccita/save/", 
					dataType: 'json', 
					data:{
							"cit_dmh_cod" 	: dmh_cod_global,
							"cit_est" 		: true,
							"cit_fec" 		: $("#cit_fec").val(),
							"cit_tur"		: cit_tur_global,
							"usu_cod"		: usu_cod_global
						},
					success : function(response)
					{
						$('#modalCita').modal('hide');
						$.notify("Cita Guardada Correctamente","success");
						$('#usuario').val("");
						$('#cmbEsp').val("0");
						$("input[type=date]").val("");
						dmh_cod_global = 0;
						cit_tur_global = 0;
						//usu_cod_global = 0;
						tablaCita.fnClearTable();
					},

					error : function(response)
					{
						$('#modalCita').modal('hide');
						$.notify("Error al guardar","error");						
					}
				});//
		}		
	});	
	

//***************************************************CARGAR TABLAS*****************************************************************

	$.verComentario = function(td){
		var tr = $(td).parent();
		$('#cit_cmt').val($(tr).attr('data-cit_cmt'));
		$('#mcit_id').val($(tr).attr('data-cit_cod'));
	};

	$.verCita = function(td){
		var tr = $(td).parent();
		var codCita = $(tr).attr('data-cit_cmt');
		var d = new Date();
        var fecha = d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear()+' --- '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
        var autor = 'CEUPROPSF';
		window.open('<?= base_url()?>static/reporte/reporte_h3.php?reporte=CITA&fecha='+fecha+'&codigo='+codCita+'','_blank');
	};

	var printReport ="<button style='border: 0; background: transparent' data-target='#modalComentario' data-toggle='modal' onclick='$.verComentario($(this).parent())' title='Comentario'>"+		
						  "<span class='glyphicon glyphicon-comment'></span>"+
						  "</button>"+
						  "<button style='border: 0; background: transparent' data-target='#modalVerCita' data-toggle='modal' onclick='$.verCita($(this).parent())' 		title='Imprimir'>"+
						  "<span class='glyphicon glyphicon-print'></span>"+
						  "</button>";

	$.renderizeRow = function( nRow, aData, iDataIndex ) {
	   if (aData['fec_act'] > aData['cit_fec']) 
	   {
	   		$($(nRow).children('td')[0]).css({"background-color":"red"});
	   }
	   $(nRow).append("<td class='text-center'>"+printReport+"</td>");   
	   $($(nRow).children('td')).addClass("text-center"); //centra el texto
	   $(nRow).attr('data-cit_cod',aData['cit_cod']);
	   $(nRow).attr('data-cit_cmt',aData['cit_cmt']);
	};
	
	var tbCitDet = $('#tbCitDet');
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

	var flagLoadTable = true;

	$("#ltCita").click(function(){
			event.preventDefault();
			var flagTipUser = true; // Bandera, si el tipo de Usuario es Admin
			var flagMedico = true;
			if (flagLoadTable) 
			{
				if($('#usu_cod').attr('data-usutip') === "2")
				{
					flagTipUser = false;
				}
				
				if($('#usu_cod').attr('data-usutip') === "3")
				{
					flagMedico = false;
				}
				//DATATABLE CON FILTROS 
				tbCitDet.DataTable({
			        ordering : true,
			        "ajax": {
			        	"type": 'POST',
			            "url": "/ceup/ccita/getCita/",
			            "data": {usu_cod: usu_cod_global,
			            		 tip_usu: $('#usu_cod').attr('data-usutip')},
			            "dataSrc": 'datos'
			        },
			        "columns": [{data:"cit_tur"},
			            		{data:"fecha_hora"},			            		
			            		{data:"usuario"},
			            		{data:"medico"},
			            		{data:"esp_des"},
			            		{data:"dis_nom"}
			            		],
			        "columnDefs":[{"visible":flagTipUser, "targets":2}, {"visible":flagMedico , "targets":3}],
			        "fnCreatedRow": $.renderizeRow,
			        "language": lngEsp
			        });
				flagLoadTable = false;
			}
			else
			{
				tbCitDet.DataTable().ajax.reload();
			}
	});	
	
	/**==========================
	* AUTOCOMPLETAR PACIENTE
	**==========================*/
	$('#usuario').autocomplete({
		source: usuario , 
		select: function(t){
			for(var i = 0 ; i < usuario.length ; i++)
			{
				if(usuario[i] == $(this).val())
				{
					usu_cod_global = usu_cod_com[i];
					break;
				}
			}
			
		},
	});

	$.getUser = function(response)
	{
		if(response.datos.length !== 0)
		{
			$.each(response.datos,function(i,value){
				usuario[i] 		= value.usuario;
				usu_cod_com[i]	= value.usu_cod;
			});
		}
	};

	$.post("/ceup/cusuario/getUserByNom/",$.getUser);

	/*******************
	* OnLoad Pagina
	********************/

	function start()
	{
		if($('#usu_cod').attr('data-usutip') === "3")//si es medico
		{
			$.post("/ceup/cespecialidad/getForCita/",$.getDataForCmbEsp);
		}
		else
		{
			//llamada ComboBox Especialidad
			$.post("/ceup/cespecialidad/get/",$.getDataForCmbEsp);
		}
	}

	window.onload = start;

	/*******************
	* GET FECHA ACTUAL
	********************/
	function getCurrentDate()
	{
		var d 		= new Date();
		var month 	= d.getMonth()+1;
		var day 	= d.getDate();
		if (month < 10 ){
			month = '0'+month;
		}
		return d.getFullYear()+ '-' + month + '-'+ day;
	}

	/**************************************
	*	COMENTAR CITA
	***************************************/
	$('#btnComentar').click(function(e){
		e.preventDefault();
		var cod = $('#mcit_id').val();
		var cmt = $('#cit_cmt').val();
		$.ajax({
			type: 'POST',
			url : '/ceup/ccita/saveComment/',
			dataType : 'json',
			data: {	cit_cod: cod,
					cit_cmt: cmt
				  },
			success: function (response)
			{				
				$.notify("Observacion guardada correctamente","success");
				$('#modalComentario').modal('hide');
				tbCitDet.DataTable().ajax.reload();
			},

			error: function (response)
			{
				$.notify("Error en el servidor", "error");
			}					
		});
	});
});//final
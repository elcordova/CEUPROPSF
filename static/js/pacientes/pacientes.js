$(function(){

	$('table').DataTable();

	$('#frmPac').on("submit",function(){
		event.preventDefault();
		$.ajax({
			type:"POST",
			url: "Pacientes/save/",
			dataType: 'json',
			data:$(this).serialize(),
			
			success: function(response){
				toastr.options={"progressBar": true}
				toastr.success('Paciente registrado con Exito!','Estado');
				limp_form_paciente();
				$('#table').DataTable().ajax.reload();
			},

			error: function(){
				toastr.options={"progressBar": true}
				toastr.error('Paciente registrado con Exito!','Estado');
			}
		});

	})
	
	function limp_form_paciente(){
		$('#pac_ced').val("");
		$('#pac_nom').val("");
		$('#pac_ape').val("");
		$('#pac_dir').val("");
		$('#pac_sex').val("");
		$('#pac_fec_nac').val("");
		$('#pac_tip_san').val("");
		$('#pac_est_civ').val("");
	}

	
	/**$.eliminar = function(td){
		var tr = $(td).parent().children();
		var med_ced = tr[0].textContent;
		var med_e = 'FALSE';
		$.ajax({
			type: "POST",
			data: {"med_ced":med_ced,"med_e":med_e},
			url: "/sgcm/cmedico/delete/", 
			dataType: 'json',
			success: function(response){
				event.preventDefault();
				$.notify("Eliminado con exito","success");

			},

			error: function(response){
				$.notify("Error al eliminar","error");
			}

		});
	};

	$.editarModal = function(td)
	{
		var tr = $(td).parent().children();
		var ced = tr[0].textContent;
		var nom = tr[1].textContent;
		var ape = tr[2].textContent;
		var dir = tr[3].textContent;
		var tel = tr[4].textContent;
		var eml = tr[5].textContent;
		$('#myModalLabel').html("Editar");
		$('#mmed_nom').val(nom);
		$('#mmed_ape').val(ape);
		$('#mmed_dir').val(dir);
		$('#mmed_tel').val(tel);
		$('#mmed_eml').val(eml);
		$('#txtId').val(ced);
	};*/

	/*$('#btnModalGuardar').click(function(){
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
			url: "/sgcm/cmedico/update/",
			dataType: 'json',			
			
			success: function(response){
				$('#modalMedico').modal('hide');				
				$.notify("Medico editado con exito","success");
				$('#tbMedico').DataTable().ajax.reload();
			},

			error: function(response){
				$.notify("Error al editar","error");
			}

		});
	});
			
	$('#modalMedico').bind('shown.bs.modal' , function(){
		med_nom.focus();
	});*/
	
	
});


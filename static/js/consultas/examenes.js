$(document).ready(function(){


$('#btn_examenes').on('click', function(){
	cargar_examenes();
});


$('#btn_guardar_exam').on('click', function(){
	guardar_examenes();
});

function guardar_examenes(){
	$.ajax({
		url:'/ceup/Cconsultas/save_examenes/',
		data:{'id_consulta':$('#cod_consulta').val(),'laboratorio':$('#exam_laboratorio').val(),'diagnostico':$('#exam_diagnostico').val()},
		dataType:'json',
		type:'POST',
		success:function(data){
			toastr.options={"progressBar": true}
      toastr.success('Datos de Examenes guardados','Estado');
      $('#modal_examenes').modal('hide');
		},
		error:function(textStatus){
			toastr.options={"progressBar": true}
      toastr.error('Error al Guardar Examenes','Estado');
		}
	});
}

function cargar_examenes(){
  $.ajax({
    url:'/ceup/Cconsultas/cargar_examenes/',
    data:{'id_consulta':$('#cod_consulta').val()},
    dataType:'json',
    type:'POST',
    success:function(data){
      console.info(data);
      $('#exam_laboratorio').val(data.examen_laboratorio)
      $('#exam_diagnostico').val(data.examen_diagnostico)
      $('#modal_examenes').modal('show');
    },
    error:function(textStatus){
      toastr.options={"progressBar": true}
      toastr.error('Error al cargar Examenes','Estado');
    }
  });
}

});
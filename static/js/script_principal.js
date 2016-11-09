function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}


function verNoticia(idNoticia){

	 $.ajax({
	 	type: "POST",
	 	url: "index.php/Noticias/obtener",
	 	data: {id:idNoticia},
	 	dataType: 'json',
	 	
	 	success:function(data){
	 		$('#n_imagen').attr("src","public/img/notices/"+data.not_ban);
	 		$('#n_imagen').attr("onclick","window.open('public/img/notices/"+data.not_ban+"', '_blank')");
	 		$('#n_titulo').html(data.not_tit);
	 		$('#n_contenido').html(data.not_con);
	 		$('#n_fecha').html(data.not_fec_pub);
	 		$('#not_codigo').val(idNoticia);
	 	}
	});

	 $.ajax({
	 	type: "POST",
	 	url: "index.php/Comentario/obtener",
	 	data: {id:idNoticia},
	 	dataType: 'json',
	 	
	 	success:function(data){
	 		var cantidad = data.length;
	 		if(!cantidad>0) cantidad = 0;
	 		$('#n_comentario').html(cantidad+' Comentario(s)');
	 		$('#n_comentario2').html(cantidad+' Comentario(s)');
	 		var comentarios = '';
	 		for (var i = 0; i < data.length; i++) {
	 			comentarios += '<div class="media"><div class="media-body"><div class="well" align="justify">'+
	 			'<div class="media-heading"><strong>'+data[i].com_nom+'</strong>&nbsp; <small>'+data[i].com_fec+'</small>'+
	 			'</div><p>'+data[i].com_con+'</p></div></div></div>';
	 		};
	 		$('#lista_comentarios').html(comentarios);
	 	}
	});

}

function agregarComentario(){

	$.ajax({
		type: "POST",
		url: "index.php/Comentario/insert",
		data: {
			com_con : $('#come_contenido').val(),
			com_nom : $('#come_nombre').val(),
			com_eml : $('#come_correo').val(),
			not_id : $('#not_codigo').val()
		},
		dataType: 'html',

		success:function(data)
		{
			if (data==='0')
			{
				
	            toastr.success('Comentario Agregado con Exito!','Estado');
	            $('#lista_comentarios').append('<div class="media"><div class="media-body"><div class="well" align="justify">'+
	 			'<div class="media-heading"><strong>'+$("#come_nombre").val()+'</strong>&nbsp; <small>Ahora</small>'+
	 			'</div><p>'+$("#come_contenido").val()+'</p></div></div></div>');
	            //Limpiar campos
	            $('#come_contenido').val('');
	            $('#come_nombre').val('');
	            $('#come_correo').val('');
			}
			else
			{
			  	alert(data);
			}
		}
	});
}
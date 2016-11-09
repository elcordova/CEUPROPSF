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
	 		$('#n_titulo').html(data.not_tit);
	 		$('#n_contenido').html(data.not_con);
	 		$('#n_fecha').html(data.not_fec_puc);
	 	}
	});

}

$(document).ready(function(){

	$('#form_comentario').submit(function(e) {
	    e.preventDefault();
	  }).validate({
	    debug: true,
	    rules: {
	      "come_nombre": {
	        required: true
	      },
	      "come_contenido": {
	        required: true
	      }
	    },
	    messages: {
	      "come_nombre": {
	        required: "Introduce tu nombre"
	      },
	      "come_contenido": {
	        required: "Introduce tu comentario"
	      }
	    },
	    submitHandler: function(){
	   
	    $.ajax({
			type: "POST",
			url: "Comentario/insert",
			data: {
				contenido : $('#come_contenido').val(),
				nombre : $('#come_nombre').val(),
				correo : $('#come_correo').val(),
				id_noticia : 5
			},
			dataType: 'html',
			cache: false,
			contentType: false,
			processData: false,

			success:function(data)
			{
				if (data==='0')
				{
				  	noty({
						text: 'NOTY - a jquery notification library!',
						animation: {
							open: {height: 'toggle'}, // jQuery animate function property object
							close: {height: 'toggle'}, // jQuery animate function property object
							easing: 'swing', // easing
							speed: 500 // opening & closing animation speed
						}
					});
				}
				else
				{
				  	alert(data);
				}
			}
	    });
	 }
	});
}); 
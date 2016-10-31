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

	ajax = objetoAjax();
	ajax.open("POST", "Noticias/obtener", true);
	ajax.onreadystatechange=function() {
	if (ajax.readyState==4) {
	  var mensajeRespuesta = ajax.responseText;

	  if(mensajeRespuesta == 'BIEN'){
	    alert('BIEN');
	    
	  }else{
	   	alert('MAL');
	  }
	}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send();

	$('#n_titulo').html(idNoticia);
}
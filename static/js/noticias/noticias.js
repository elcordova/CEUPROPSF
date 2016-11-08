
$(document).ready(function(){

  $('table').DataTable();

  $('#form_noticia').submit(function(e) {
    e.preventDefault();
  }).validate({
    debug: true,
    rules: {
      "titulo": {
        required: true,
        minlength: 5
      },
      "contenido": {
        required: true,
        minlength: 5
      }
    },
    messages: {
      "titulo": {
        required: "Introduce titulo a la noticia.",
        minlength:"El titulo de la noticia debe tener mas de 5 caracteres"
      },
      "contenido": {
        required: "Introduce Contenido de la noticia",
        minlength:"El contenido de una noticia debe tener mas de 5 caracteres"
      }
    },
    submitHandler: function(){
    var formData = new FormData(document.getElementById("form_noticia"));
    $.ajax({
              type: "POST",
              url: "Noticias/insert",
              data: formData,
              dataType: 'html',
              cache: false,
              contentType: false,
              processData: false,

              success:function(res){
                if (res==='exito'){
                  actualizar_tabla_noticias();
                }else {
                  alert('ocurrio algun error en el proceso');
                }
              }
    });
  }});

  
  $(function() {
    $('#file').change(function(e) {
      addImage(e); 
    });

    function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;


      if (!file.type.match(imageType))
       return;

     var reader = new FileReader();
     reader.onload = fileOnload;
     reader.readAsDataURL(file);
   }

   function fileOnload(e) {
    var result=e.target.result;
    $('#list').attr("src",result);
  }
});

  function actualizar_tabla_noticias(){
    $.ajax({
            type:"GET",
            url:"Noticias/consultar_noticias",
            dataType: 'json',
            success:function(res){
              $('#contenedor_tabla').empty();
              var contenido="";
              if (res) {
                for (i = 0; i < res.length; i++){
                  contenido+="<tr>"+
                          "<td>"+res[i]['not_id']+"</td>"+
                          "<td>"+res[i]['not_tit']+"</td>"+
                          "<td>"+res[i]['not_fec_pub']+"</td>"+
                          "<td>"+
                              "<div class='btn-group'>"+
                                "<button type='button' class='btn btn-default' onclick=carga_noticia("+res[i]['not_id']+")>"+
                                "<span class='glyphicon glyphicon-edit'></span>"+
                                "</button>"+
                                "<button type='button' class='btn btn-default'>"+
                                "<span class='glyphicon glyphicon-trash'></span>"+
                                "</button>"+
                              "</div>"+
                          "</td>"+
                        "</tr>";
                };
              }
              var tabla="<table class='table table-striped table-bordered' cellspacing='0' width='100%'>"+
                        "<thead>"+
                          "<tr>"+
                            "<th>Identificador</th>"+
                            "<th>Titulo</th>"+
                            "<th>Fecha</th>"+
                            "<th>Acciones</th>"+       
                          "</tr>"+
                        "</thead>"+
                        "<tbody>"+contenido
                        "</tbody>"+
                        "</table>";
              $('#contenedor_tabla').append(tabla);
              limp_form_noticia();
              $('html,body').animate({
                scrollTop: $("#contenedor_tabla").offset().top
                }, 2000);
              toastr.options={"progressBar": true}
              toastr.success('Noticia Agregada con Exito!','Estado');
            }
    });
  }



  


  $("#guardar").click(function(){
    // alert("se ha enviado el formulario");
  });

}); 

function carga_noticia(id_noticia){
  $.ajax({
          type:"GET",
            url:"Noticias/consultar_noticias",
            data:{'not_id':id_noticia},
            dataType: 'json',
            success:function(res){
              $('#titulo').val(res['not_tit']);
              $('#contenido').val(res['not_con']);
              $('#file').val("./public/img/notices/"+res['not_ban']);
            }
  })
}

function limp_form_noticia(){
    $('#titulo').val('');
    $('#contenido').val('');
    $('#file').val('');
    $('#list').removeAttr("src");
  }
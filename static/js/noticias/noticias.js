
$(document).ready(function(){
  $('#collapseTwo').removeClass("in");
  $('#collapseOne').removeClass("in");
  actualizar_tabla_noticias();

  $('#checkbox_edit_img').click(function() {
    if($(this).is(':checked')) {
      $('#bloque_file').fadeIn(1000);
      $('#bloque_imagen_new').fadeIn(1000);
      $('#bloque_imagen_ant').fadeOut(1000);
    } else {
      $('#bloque_file').fadeOut(1000);
      $('#bloque_imagen_new').fadeOut(1000);
      $('#bloque_imagen_ant').fadeIn(1000);
    }
  });

// esto ess una pruebagit
  $('table').DataTable({
        "order": [[ 0, "desc" ]]
    } );

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
    console.info(formData);
    $.ajax({
              type: "POST",
              url: "/ceup/Noticias/insert",
              data: formData,
              dataType: 'html',
              cache: false,
              contentType: false,
              processData: false,

              success:function(res){
                if (res==='exito'){
                  actualizar_tabla_noticias();
                  toastr.options={"progressBar": true}
                  toastr.success('Noticia Agregada con Exito!','Estado');
                }else {
                  toastr.options={"progressBar": true}
                  toastr.error('Agregar Imagen de Noticia!','Estado');
                }
              }
    });
  }});







  $('#form_noticia_edit').submit(function(e) {
    e.preventDefault();
  }).validate({
    debug: true,
    rules: {
      "titulo_edit": {
        required: true,
        minlength: 5
      },
      "contenido_edit": {
        required: true,
        minlength: 5
      }
    },
    messages: {
      "titulo_edit": {
        required: "Introduce titulo a la noticia.",
        minlength:"El titulo de la noticia debe tener mas de 5 caracteres"
      },
      "contenido_edit": {
        required: "Introduce Contenido de la noticia",
        minlength:"El contenido de una noticia debe tener mas de 5 caracteres"
      }
    },
    submitHandler: function(){
    var formData = new FormData(document.getElementById("form_noticia_edit"));
    console.info(formData);
    $.ajax({
              type: "POST",
              url: "Noticias/actualizar",
              data: formData,
              dataType: 'html',
              cache: false,
              contentType: false,
              processData: false,

              success:function(res){
                if (res==='exito'){
                  $('#modal-editar_noticia').modal('toggle');
                  actualizar_tabla_noticias();
                  toastr.options={"progressBar": true}
                  toastr.success('Noticia Editada con Exito!','Estado');
                }else {
                  toastr.options={"progressBar": true}
                  toastr.error('Agregar Imagen de Noticia!','Estado');
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

  $(function() {
    $('#file_edit').change(function(e) {
      addImage_2(e);
    });

    function addImage_2(e){
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
    $('#list_edit_new').attr("src",result);
  }
});


  function actualizar_tabla_noticias(){
    $.ajax({
            type:"GET",
            url:"/ceup/Noticias/consultar_noticias",
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

                                "<button class='btn btn-primary' type='button'>"+
                                  "Comentarios <span class='badge'>"+cont_comentarios_noti(res[i]['not_id'])+"</span>"+
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
              $('table').DataTable({"order": [[ 0, "desc" ]]} );
              limp_form_noticia();
              $('html,body').animate({
                scrollTop: $("#contenedor_tabla").offset().top
                }, 2000);

            }
    });
  }






  $("#guardar").click(function(){
    // alert("se ha enviado el formulario");
  });

});

function carga_noticia(id_noticia){
  limp_form_noticia_edit();
  $('#bloque_imagen_new').fadeOut(1);
  $('#bloque_imagen_ant').fadeIn(1);
  $('#bloque_file').fadeOut(1);
  $('#modal-editar_noticia').modal('show');
  $.ajax({
          type:"GET",
            url:"/ceup/Noticias/consultar_noticias",
            data:{'not_id':id_noticia},
            dataType: 'json',
            success:function(res){
              $('#id_noticia').val(res['not_id'])
              $('#titulo_edit').val(res['not_tit']);
              $('#contenido_edit').val(res['not_con']);
              $('#list_edit').attr("src",("../public/img/notices/"+res['not_ban']));
            }
  });
}


function cont_comentarios_noti(id_noticia){
  var cant=0;
  // console.info(id_noticia);
  $.ajax({
            type:"GET",
            url:"/ceup/Noticias/cantidad_comentarios",
            data: {'not_id':5},
            dataType: 'html',
            success:function(res){
              console.info(res);
              cant= res;
            }
  });

  return cant;
}



function limp_form_noticia(){
    $('#titulo').val('');
    $('#contenido').val('');
    $('#file').val('');
    $('#list').removeAttr("src");
  }

function limp_form_noticia_edit(){
    $('#titulo_edit').val('');
    $('#contenido_edit').val('');
    $('#file_edit').val('');
    $('#list_edit').removeAttr("src");
    $('#list_edit_new').removeAttr("src");
    $('#checkbox_edit_img').attr('checked',false);
  }

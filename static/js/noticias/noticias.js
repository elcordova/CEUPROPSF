
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
                  noty({
    text: 'NOTY - a jquery notification library!',
    animation: {
        open: {height: 'toggle'}, // jQuery animate function property object
        close: {height: 'toggle'}, // jQuery animate function property object
        easing: 'swing', // easing
        speed: 500 // opening & closing animation speed
    }
});
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




  $("#guardar").click(function(){
    // alert("se ha enviado el formulario");
  });

}); 


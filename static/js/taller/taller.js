$(function(){

	
    /**====================================
     *	CARGA COMBO BOX DE EVENTOS
     * ====================================
     */
    var dataEvento = {};
    $.getDataForEvento = function(response) {
        dataEvento = response;
        $("#evento").select2({
            data: response
        });
    };
    $.post("/ceup/ctaller/getEvento/", $.getDataForEvento);

    function limpiarFormulario() {
        document.getElementById("frmTaller").reset();
        desmove();
        $('#files').html("");
    }
    //a lo q carga archivos carga los nombres en un bloque div
    $("input[name='archivo[]'").change(function() {
       var input = document.getElementById('archivo');
        var file = input.files;
        var tam = file.length;
        var cad ="";
        if(tam>0){
            
            for (var i = 0; i < tam; i++) {
                cad +=""+ file[i]['name'] + "<br>";
            };
            move(cad);
            
        }else{
            desmove();
            $('#files').html("");
        }
    });
  
    //funcion para ejecutar el progres bar
    function move(cad) {
        var elem = document.getElementById("myBar");   
        var width = 0;
        var id = setInterval(frame, 0);
        function frame() {
            if (width >= 100) {
              clearInterval(id);
            } else {
              width++; 
              elem.style.width = width + '%'; 
            }
        }
        $('#files').html(cad);
    }

    function desmove(){
        var elem = document.getElementById("myBar");
        elem.style.width = 0 + '%';
    }

	/**====================================
     *  CARGA DATOS
     * ====================================
     */
	$('#frmTaller').submit(function(e){
        e.preventDefault();
        var formData = new FormData(document.getElementById("frmTaller"));
        $.ajax({
            url: "/ceup/ctaller/save/",
            type: "POST",
            data: formData,
            contentType:false,
            processData:false,
            cache:false,
            success:function(resp){
                console.log(resp);
                console.log("exito");
                limpiarFormulario();
                toastr.options={"progressBar": true}
                toastr.success('Taller registrado con Exito!','Estado');
            },
            error:function(){
                toastr.options={"progressBar": true}
                toastr.error('Error al registrar Taller','Estado');
            }
        });
    });

	/**====================================
     *  CARGA DATOS
     * ====================================
     */
     var btnsOpTblModels = "<button style='border: 0; background: transparent' data-target='#tallerModal' data-toggle='modal' onclick='$.editarModalTaller($(this).parent())'>" +
    "<span class='glyphicon glyphicon-edit' title='Modificar'></span>" +
    "</button>" +
    "<button style='border: 0; background: transparent' onclick='$.eliminar($(this).parent())'>" +
    "<span class='glyphicon glyphicon-trash' title='Eliminar'></span>" +
    "</button>";

    $.renderizeRow = function(nRow, aData, iDataIndex) 
    {
        $(nRow).append("<td class='text-center'>" + btnsOpTblModels + "</td>");
        $(nRow).attr('data-id', 	aData['tal_id']);
        $(nRow).attr('data-des', 	aData['tal_des']);
        $(nRow).attr('data-eve-id', aData['eve_id']);
        $(nRow).attr('data-fec', 	aData['tal_fec']);
    };

    var flagLoadTable = true; 
    $("#ltTaller").click(function() {
        event.preventDefault();
        if (flagLoadTable) 
        {
            //Llenar tabla de datos
            $('#tbTaller').DataTable({
                ordering: true,
                "ajax": {
                    "url": "/ceup/ctaller/get/",
                    "dataSrc": "datos"
                },
                "columns": [{data: "tal_fec"}, {data: "tal_tem"}, {data: "eve_tit"}],
                "fnCreatedRow": $.renderizeRow
            });

            flagLoadTable = false;
        }
        else
        {
            $('#tbTaller').DataTable().ajax.reload();
            
        }
    });

    /**====================================
     *  EDITAR
     * ====================================
     */
     $.editarModalTaller = function(td) {
        var tr = $(td).parent().children();
        $('#mtal_id').val($(td).parent().attr('data-id'));
        $('#mtal_tem').val(tr[1].textContent);
        $('#mtal_des').val($(td).parent().attr('data-des'));
		$('#mevento').val($(td).parent().attr('data-eve-id'));
        $('#mtal_fec').val($(td).parent().attr('data-fec')); 
    };

    $('#tallerModal').bind('shown.bs.modal', function() {
        mtal_tem.focus();
        /*
        $("#mevento").select2({
            data: dataEvento
        });*/
    });

    $('#frmMdTaller').on("submit", function(e) {
        e.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            type: "POST",
            url: "/ceup/ctaller/update/",
            dataType: 'json',
            data: $(this).serialize(),
            success: function(response) {
                $('#mtal_id').val("");
                $('#mtal_tem').val("");
                $('#mtal_fec').val("");
                $('#mtal_des').val("");                
                $('#tallerModal').modal('hide');
                toastr.options = {
                    "progressBar": true
                };
                toastr.success('Taller Actualizado con Exito!', 'Estado');
                $('#tbTaller').DataTable().ajax.reload();
            },

            error: function() {
                toastr.error('Error', 'Estado');
            }
        });
    });
});
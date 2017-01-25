$(function() {

    var dataNoticias = {};
    /**====================================
     *	CARGA COMBO BOX DE NOTICIAS
     * ====================================
     */
    $.getDataForNoticia = function(response) {
        var datos = "";
        $.each(response, function(i,item){
                datos+= "<option value = "+item.id+">"+item.titulo+"</option>";
            });
        $('#noticia').html(datos);
        $('#noticia_edt').html(datos);
    };
    $.post("/ceup/cevento/get_noticias/", $.getDataForNoticia);
    
    /**====================================
     *  GUARDA
     * ====================================
     */
    $('#frmEvento').on("submit", function(e) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/ceup/cevento/save/",
            dataType: 'json',
            data: $(this).serialize(),
            success: function(response) {
                $('#eve_tit').val("");
                $('#eve_res').val("");
                $('#eve_dir').val("");
                $('#eve_fec_ini').val("");
                $('#eve_fec_fin').val("");
                toastr.options = {
                    "progressBar": true
                }
                toastr.success('Evento Agregado con Exito!', 'Estado');
                $.post("/ceup/ctaller/getEvento/", $.getDataForEvento);
            },

            error: function() {
                toastr.error('Error', 'Estado');
            }
        });
    });

   

    /**====================================
     *  CARGA DATOS
     * ====================================
     */
    var btnsOpTblModels = "<button style='border: 0; background: transparent' data-target='#eventoModal' data-toggle='modal' onclick='$.editarModal($(this).parent())'>" +
    "<span class='glyphicon glyphicon-edit' title='Modificar'></span>" +
    "</button>" +
    "<button style='border: 0; background: transparent' onclick='$.eliminar($(this).parent())'>" +
    "<span class='glyphicon glyphicon-trash' title='Eliminar'></span>" +
    "</button>";

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

    $.renderizeRow = function(nRow, aData, iDataIndex) 
    {
        $(nRow).append("<td class='text-center'>" + btnsOpTblModels + "</td>");
        $(nRow).attr('data-id', aData['eve_id']);
        $(nRow).attr('data-ini', aData['eve_fec_ini']);
        $(nRow).attr('data-fin', aData['eve_fec_fin']);
        $(nRow).attr('data-not-id', aData['not_id']);
    };

    var flagLoadTable = true; 
    $("#ltEvento").click(function() {
        event.preventDefault();
        if (flagLoadTable) 
        {
            //Llenar tabla de datos
            $('#tbEvento').DataTable({
                ordering: true,
                "ajax": {
                    "url": "/ceup/cevento/get/",
                    "dataSrc": "datos"
                },
                "columns": [{data: "fecha"}, {data: "eve_tit"}, {data: "eve_dir"}, {data: "eve_res"}],
                "fnCreatedRow": $.renderizeRow,
                "language": lngEsp
            });

            flagLoadTable = false;
        }
        else
        {
            $('#tbEvento').DataTable().ajax.reload();
            
        }
    });

    /**====================================
     *  EDITAR
     * ====================================
     */

     $.editarModal = function(td) {
        var tr = $(td).parent().children();
        $('#eve_id_edt').val($(td).parent().attr('data-id'));
        $('#eve_tit_edt').val(tr[1].textContent);
        $('#eve_dir_edt').val(tr[2].textContent);
        $('#eve_fec_ini_edt').val($(td).parent().attr('data-ini'));
        $('#eve_fec_fin_edt').val($(td).parent().attr('data-fin'));
        $('#eve_res_edt').val(tr[3].textContent);
        $('#noticia_edt').val($(td).parent().attr('data-not-id'));
    };

    $('#eventoModal').bind('shown.bs.modal', function() {
        eve_tit_edt.focus();
        $("#noticia_edt").select2({
            data: dataNoticias
        });
    });

    $('#frmMdEvento').on("submit", function(e) {
        e.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            type: "POST",
            url: "/ceup/cevento/update/",
            dataType: 'json',
            data: $(this).serialize(),
            success: function(response) {
                $('#eve_tit_edt').val("");
                $('#eve_res_edt').val("");
                $('#eve_dir_edt').val("");
                $('#eve_fec_ini_edt').val("");
                $('#eve_fec_fin_edt').val("");
                $('#eventoModal').modal('hide');
                toastr.options = {
                    "progressBar": true
                };
                toastr.success('Evento Actualizado con Exito!', 'Estado');
                $('#tbEvento').DataTable().ajax.reload();
            },

            error: function() {
                toastr.error('Error', 'Estado');
            }
        });
    });

    /**====================================
     *  ELIMINAR
     * ====================================
     */

    $.eliminar = function(td) {
    var eve_id = $(td).parent().attr('data-id');
    $.ajax({
        type: "POST",
        url: "/ceup/cevento/delete/",
        data: {
            "eve_id": eve_id
        },
        dataType: 'json',
        success: function(response) {
            if (response.delete_evento === "1") {
                toastr.options = {
                    "progressBar": true
                };
                toastr.success('Evento Eliminado con Exito!', 'Estado');
                $('#tbEvento').DataTable().row($(td).parent()).remove().draw(); // remove a tr
            }
        },

        error: function(response) {
            toastr.options = {
                "progressBar": true
            };
            toastr.success('Error en el servidor!', 'Estado');
        }

    });
};

});

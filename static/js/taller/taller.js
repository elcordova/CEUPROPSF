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

	/**====================================
     *  CARGA DATOS
     * ====================================
     */
	$('#frmTaller').on("submit",function(e){
		e.preventDefault();
		$.ajax({
            type: "POST",
            url: "/ceup/ctaller/save/",
            dataType: 'json',
            data: $(this).serialize(),
            success: function(response) {
                $('#tal_tem').val("");
                $('#tal_fec').val("");
                $('#tal_des').val("");
                toastr.success('Taller Agregado con Exito!', 'Estado');
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
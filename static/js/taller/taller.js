$(function(){
	
   	/**====================================
     *  CARGA COMBO BOX DE EVENTOS
     * ====================================
     */
   	var dataEvento = {};
	$.getDataForEvento = function(response) {	        
        var datos = "";
        $.each(response, function(i,item){
                datos+= "<option value = "+item.id+">"+item.titulo+"</option>";
            });
            $("#evento").html(datos);
            $("#mevento").html(datos);
    	};
	    
	$.post("/ceup/ctaller/getEvento/", $.getDataForEvento);

	/**====================================
     *  GUARDA
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
     var btnAccion = "<button style='border: 0; background: transparent' data-target='#tallerModal' data-toggle='modal' onclick='$.editarModalTaller($(this).parent())'>" +
    "<span class='glyphicon glyphicon-edit' title='Modificar'></span>" +
    "</button>" +
    "<button style='border: 0; background: transparent' onclick='$.eliminar($(this).parent())'>" +
    "<span class='glyphicon glyphicon-trash' title='Eliminar'></span>" +
    "</button>";

    $.afterLoad = function(nRow, aData, iDataIndex) 
    {
        $(nRow).append("<td class='text-center'>" + btnAccion + "</td>");
        $(nRow).attr('data-tal-id', 	aData['tal_id']);
        $(nRow).attr('data-tal-des', 	aData['tal_des']);
        $(nRow).attr('data-eve-id', 	aData['eve_id']);
        $(nRow).attr('data-tal-fec', 	aData['tal_fec']);
    };

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

    var flagLoadTableTaller = true; 
    $("#collapseListMarks").on("shown.bs.collapse",function(event){
        event.preventDefault();
        if (flagLoadTableTaller) 
        {
            //Llenar tabla de datos
            $('#tbTaller').DataTable({
                ordering: true,
                "ajax": {
                    "url": "/ceup/ctaller/get/",
                    "dataSrc": "datos"
                },
                "columns": [{data: "tal_fec"}, {data: "tal_tem"}, {data: "eve_tit"}],
                "fnCreatedRow": $.afterLoad,
                "language": lngEsp
            });

            flagLoadTableTaller = false;
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
        $('#mtal_id').val($(td).parent().attr('data-tal-id'));
        $('#mtal_des').val($(td).parent().attr('data-tal-des'));
        $('#mtal_tem').val(tr[1].textContent);        
		$('#mevento').val($(td).parent().attr('data-eve-id'));
        $('#mtal_fec').val($(td).parent().attr('data-tal-fec')); 
    };

    $('#tallerModal').bind('shown.bs.modal', function() {
        mtal_tem.focus();
        
        $("#mevento").select2({
            data: dataEvento
        });
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
                toastr.success('Taller Actualizado con Exito!', 'Estado');
                $('#tbTaller').DataTable().ajax.reload();
            },

            error: function() {
                toastr.error('Error', 'Estado');
            }
        });
    });

    /**====================================
     *  AL ABRIR CREAR TALLER
     * ====================================
     */
    $('#crearTaller').on("shown.bs.collapse",function(){
     	 tal_tem.focus();
	});
});
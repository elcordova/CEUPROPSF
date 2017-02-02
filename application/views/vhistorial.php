  <style>
  .feedback { font-size: 1.4em; }
  .selectable .ui-selecting { background: #FECA40; }
  .selectable .ui-selected { background: #F39814; color: white; }
  .selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  .selectable li { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }
  </style>


<!-- Page Content -->
        <div id="page-content-wrapper">

            <div class="container-fluid">
              <div class="well panel panel-default" style="margin-top: 1%">
                <!-- ************** ACORDIONES *****************-->
                <div class="panel-group" id="accordion">
  
                  <div class="panel panel-primary">
                    <div class="panel-heading panel-heading-custom">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        <i class="fa fa-file">  </i><span class="nav-label"> CREAR REPORTE</span></a>
                      </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                      
                        <div class="panel-body">
                            <div class="row">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1">Paciente</span>
                                            <input type="text" class="form-control" id="txt_paciente" placeholder="paciente" aria-describedby="sizing-addon1">
                                        </div>
                                        <br>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon2">Desde</span>
                                            <input type="text" class="form-control" id="date_desde" placeholder="fecha de referencia" aria-describedby="sizing-addon2">
                                        </div>
                                        <br>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3">Hasta</span>
                                            <input type="text" class="form-control" id='date_hasta' placeholder="fecha de referencia" aria-describedby="sizing-addon2">
                                        </div>
                            

                        </div> <!-- ********************PANEL BODY CLOSE**************************** -->   
                    </div>
                    </div>           
                
                <div class="panel panel-primary">
                    <div class="panel-heading panel-heading-custom">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        <i class="fa fa-file">  </i><span class="nav-label">CONSULTAS</span></a>
                      </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                      
                        <div class="panel-body">
                            <div class="col-md-12">
                                <table data-order='[[ 2, "asc" ]]' class="table table-hovered table-bordered" cellspacing="0" width="100%" id="tbConsultas">
                                    <thead>
                                        <tr>
                                            <th class="text-center"> Codigo </th>
                                            <th class="text-center"> Fecha </th>
                                            <th class="text-center"> Observacion </th>
                                            <th class="text-center"> Doctor </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tblBody" class="text-justify">
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- ********************PANEL BODY CLOSE**************************** -->   
                    </div>
                    </div>           


                     <div class="panel panel-primary">
                    <div class="panel-heading panel-heading-custom">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        <i class="fa fa-file">  </i><span class="nav-label">ANALISIS</span></a>
                      </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                      
                        <div class="panel-body">
                            <div class="col-md-12">
                                
                            </div>
                        </div> <!-- ********************PANEL BODY CLOSE**************************** -->   
                    </div>
                    </div>  




                  
                </div>
              <!-- ************************************* ACORDIONES ****************************-->
                </div>
            </div><!-- /#container-fluid -->
        </div>
  <!-- /#page-content-wrapper -->
      
  </body>

    <script type="text/javascript">
    $(document).ready(function(){
        var t=$('#tbConsultas').DataTable();
        $('#tblBody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            t.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
        } );
        $('#date_desde').datepicker({dateFormat: "dd-mm-yy"});
        $('#date_hasta').datepicker({dateFormat: "dd-mm-yy"});
        $('#lista_consultas').selectable();    
        $('#txt_paciente').on('input',function(e){
            $.ajax({
                type:"POST",
                data:{"user_txt":$('#txt_paciente').val()},
                dataType:"json",
                url:"/ceup/chistorial/consultar_pacientes/",
                success:function(data){
                    var tags=[];
                    $.each(data.datos, function(index,paciente){
                        tags.push({label:paciente.pac_nom+" "+paciente.pac_ape+" - "+paciente.pac_ced ,value:paciente.pac_ced});
                    });
                    $('#txt_paciente').autocomplete({source:tags})
                },error:function(textStatus){
                    console.log('error');
                }
                
            });
        });
    
        $( "#txt_paciente").on( "autocompleteselect", function( event, ui ) {
            console.info(ui.item.value);
            console.info(ui);
            $.ajax({
                url:"/ceup/chistorial/cosnsulta_consultas/",
                type:"POST",
                dataType:"json",
                data:{"cedula":ui.item.value},
                success:function(data){
                    
                    $.each(data.datos, function(index,consulta){
                        t.row.add([""+consulta.con_id,""+consulta.fecha,""+consulta.con_observcion,consulta.med_nom+" "+consulta.med_ape ]).draw( false );;
                    });
                },
                error:function(textStatus){
                    console.info(textStatus);
                }
            });
        } );







    });
        
    </script>
</html>


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
                                <div class="table table-responsive">
                                	<table id="signos_vitales" class="table table-hovered table-bordered" cellspacing="0" width="100%" ></table>
                                </div>
                                <div class="table table-responsive">
                                	<table id="somatico_general" class="table table-hovered table-bordered" cellspacing="0" width="100%" ></table>
                                </div>
                                <div >
                                	<table id="fisico_regional" class="table table-hovered table-bordered" cellspacing="0" width="100%" ></table>
                                </div>
                                <div class="table table-responsive">
                                	<table id="revision_" class="table table-hovered table-bordered" cellspacing="0" width="100%" ></table>
                                </div>
                                <div class="table table-responsive">
                                	<table id="escala" class="table table-hovered table-bordered" cellspacing="0" width="100%" ></table>
                            	</div>
                            	<div class="table table-responsive">
                            		<table id="pares_craneales" class="table table-hovered table-bordered" cellspacing="0" width="100%" ></table>
								</div>
								<div class="table table-responsive">
									<table id="reflejos" class="table table-hovered table-bordered" cellspacing="0" width="100%"></table>
								</div>
								<div class="table table-responsive">
									<table id="motilidad" class="table table-hovered table-bordered" cellspacing="0" width="100%" ></table>
								</div>
								<div class="table table-responsive">
									<table id="sensibilidad" cclass="table table-hovered table-bordered" cellspacing="0" width="100%" ></table>
                            	</div>
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
	        var data = t.row( this ).data();
	        if ( $(this).hasClass('selected') ) {
	            $(this).removeClass('selected');
	        }
	        else {
	            t.$('tr.selected').removeClass('selected');
	            $(this).addClass('selected');
	        }
	       consultar_examenes(data[0]);
        } );

        function consultar_examenes(id_consulta){
        	$.ajax({
        		type:"POST",
                data:{"consulta_id":id_consulta},
                dataType:"json",
                url:"/ceup/chistorial/consultar_examenes/",
                success:function(data){
                	if (data.somatico_general.length) {
                		$('#somatico_general').css("display", "block");
                		$sg=data.somatico_general;
                		$detalle=[];
                		$.each($sg,function(index,det){
                			$detalle.push(det.sg_apariencia,
                							det.sg_facie,
                							det.sg_biotipo,
                							det.sg_en,
                							det.sg_actitud,
                							det.sg_deambula,
                							det.sg_ap,
                							det.sg_piel,
                							det.sg_unias
                							,det.sg_pelo);
                		});
                		$('#somatico_general').DataTable({
                			responsive: true,
                			data:[$detalle],
                			columns:[	{title:"APARIENCIA"},
                						{title:"FASCIE"},
                						{title:"BIOTIPO"},
                						{title:"ESTADO NUTRICIONAL"},
                						{title:"ACTITUD"},
                						{title:"DEAMBULA"},
                						{title:"ACTIVIDAD PSICOMOTRIZ"},
                						{title:"PIEL"},
                						{title:"UÑAS"},
                						{title:"PELO"}
                					]
                		});
                	}else{
                		$('#somatico_general').css("display", "none");
                	}
                if (data.signos_vitales.length) {
                	$('#signos_vitales').css("display", "block");
                	$sv=data.signos_vitales;
                	$detalle=[];
                	$.each($sv,function(index,det){
                		$detalle.push(	det.fc,
                						det.ta,
                						det.t,
                						det.fr,
                						det.peso,
                						det.talla,
                						det.imc,
                						det.cintura,
                						det.cadera,
                						det.icc);
                		});	
                	console.info($detalle);
                	$('#signos_vitales').DataTable({
                			responsive: true,
                			data:[$detalle],
                			columns:[	{title:"FRECUENCIA CARDIACA"},
                						{title:"TENSION ARTERIAL"},
                						{title:"TEMPERATURA"},
                						{title:"FRECUENCIA RESPIRATORIA"},
                						{title:"PESO"},
                						{title:"TALLA"},
                						{title:"INDICE DE MASA CORPORAL"},
                						{title:"CINTURA"},
                						{title:"CADERA"},
                						{title:"ICC"}
                					]
                		});
                } else{
                	$('#signos_vitales').css("display", "none");
                };

                //revision por aparatos y sistemas

                if (data.aparatos.length) {
                	$('#revision_').css("display", "block");
                	$sv=data.aparatos;
                	$detalle=[];
                	$.each($sv,function(index,det){
                		$detalle.push(	det.descripcion,
                						det.inspeccion,
                						det.palpacion,
                						det.percusion,
                						det.auscultacion,
                						det.tacto_rectal,
                						det.sistema_nervioso
                					);
                		});	
                	console.info($detalle);
                	$('#revision_').DataTable({
                			responsive: true,
                			data:[$detalle],
                			columns:[	{title:"APARATO O SISTEMA"},
                						{title:"INSPECCION"},
                						{title:"PALPACION"},
                						{title:"PERCUSION"},
                						{title:"AUSCULTACION"},
                						{title:"TACTO RECTAL"},
                						{title:"SISTEMA NERVIOSO"}
                					]
                		});
                } else{
                	$('#revision_').css("display", "none");
                };

                //fisico_regional


                if (data.fisico.length) {
                	$('#fisico_regional').css("display", "block");
                	$fr=data.fisico;
                	$detalle=[];
                	$.each($fr,function(index,det){
                		$detalle.push(	det.efr_cabeza,
                						det.efr_oidos,
                						det.efr_ojos,
                						det.efr_nariz,
                						det.efr_boca,
                						det.efr_cuello
                					);
                		});	
                	console.info($detalle);
                	$('#fisico_regional').DataTable({
                			responsive: true,
                			data:[$detalle],
                			columns:[	{title:"CABEZA"},
                						{title:"OIDOS"},
                						{title:"OJOS"},
                						{title:"NARIZ"},
                						{title:"BOCA"},
                						{title:"CUELLO"}
                					]
                		});
                } else{
                	$('#fisico_regional').css("display", "none");
                };


                //ESCALA DE GLASGOW


                if (data.escala.length) {
                	$('#escala').css("display", "block");
                	$fr=data.escala;
                	$detalle=[];
                	$.each($fr,function(index,det){
                		$detalle.push(	det.eg_o,
                						det.eg_m,
                						det.eg_v,
                						det.eg_total
                					);
                		});	
                	console.info($detalle);
                	$('#escala').DataTable({
                			responsive: true,
                			data:[$detalle],
                			columns:[	{title:"O"},
                						{title:"M"},
                						{title:"V"},
                						{title:"TOTAL"}
                					]
                		});
                } else{
                	$('#escala').css("display", "none");
                };


                //PARES CRANEALES

                if (data.pares_craneales.length) {
                	$('#pares_craneales').css("display", "block");
                	$fr=data.pares_craneales;
                	$detalle=[];
                	$.each($fr,function(index,det){
                		$detalle.push(	det.pc_olfatorio,
                						det.pc_optico,
                						det.pc_moc,
                						det.pc_patetico,
                						det.pc_trigemino,
                						det.pc_moe,
                						det.pc_fascial,
                						det.pc_vestibulococlear,
                						det.pc_glosofaringeo,
                						det.pc_neumogastrico,
                						det.pc_espinal,
                						det.pc_hipogloso
                					);
                		});	
                	console.info($detalle);
                	$('#pares_craneales').DataTable({
                			data:[$detalle],
                			columns:[	{title:"OLFATORIO"},
                						{title:"OPTICO"},
                						{title:"MOC"},
                						{title:"PATETICO"},
                						{title:"TRIGEMINO"},
                						{title:"MOE"},
                						{title:"FASCIAL"},
                						{title:"VESTIBULOCOCLEAR"},
                						{title:"GLOSOFARINGEO"},
                						{title:"NEUMOGASTRICO"},
                						{title:"ESPINAL"},
                						{title:"HIPOGLOSO"}
                					]
                		});
                } else{
                	$('#pares_craneales').css("display", "none");
                };

                //REFLEJOS

                 if (data.reflejos.length) {
                	$('#reflejos').css("display", "block");
                	$fr=data.reflejos;
                	$detalle=[];
                	$.each($fr,function(index,det){
                		$detalle.push(	det.ref_bicipital,
                						det.ref_tricipital,
                						det.ref_rotuliano
                						
                						
                					);
                		});	
                	console.info($detalle);
                	$('#reflejos').DataTable({
                			data:[$detalle],
                			columns:[	{title:"BICIPITAL"},
                						{title:"TRICIPITAL"},
                						{title:"ROTULIANO"}
                					]
                		});
                } else{
                	$('#reflejos').css("display", "none");
                };


                //motilidad

                if (data.motilidad.length) {
                	$('#motilidad').css("display", "block");
                	$fr=data.motilidad;
                	$detalle=[];
                	$.each($fr,function(index,det){
                		$detalle.push(	det.ref_bicipital,
                						det.ref_tricipital,
                						det.ref_rotuliano
                						
                						
                					);
                		});	
                	console.info($detalle);
                	$('#motilidad').DataTable({
                			data:[$detalle],
                			columns:[	{title:"BICIPITAL"},
                						{title:"TRICIPITAL"},
                						{title:"ROTULIANO"}
                					]
                		});
                } else{
                	$('#motilidad').css("display", "none");
                };


                //sensibilidad

                if (data.sensibilidad.length) {
                	$('#sensibilidad').css("display", "block");
                	$fr=data.sensibilidad;
                	$detalle=[];
                	$.each($fr,function(index,det){
                		$detalle.push(	det.ref_bicipital,
                						det.ref_tricipital,
                						det.ref_rotuliano	
                					);
                		});	
                	console.info($detalle);
                	$('#sensibilidad').DataTable({
                			data:[$detalle],
                			columns:[	{title:"BICIPITAL"},
                						{title:"TRICIPITAL"},
                						{title:"ROTULIANO"}
                					]
                		});
                } else{
                	$('#sensibilidad').css("display", "none");
                };


                },error:function(textStatus){
                	console.info(textStatus);
                }
        	});

        }







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
                    t.clear().draw();
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


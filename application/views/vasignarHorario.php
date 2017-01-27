	<script src="<?php echo base_url() ?>static/js/user/asignarHorario.js"></script>
	<link href="<?php echo base_url()?>/static/css/pnotify.custom.min.css" rel="stylesheet" type="text/css">
	<script src="<?php echo base_url() ?>static/js/pnotify.custom.min.js"></script>
	<link href="<?php echo base_url()?>/static/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
	<script src="<?php echo base_url()?>static/js/jquery-ui.min.js"></script>

        <div id="page-content-wrapper">
            <div class="container-fluid">
              <div class="well panel panel-default" style="margin-top: 1%">
            	<!-- ************** ACORDIONES *****************-->
            	<div class="panel-group" id="accordion">
  
				  <div class="panel panel-primary">
				    <div class="panel-heading panel-heading-custom">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" id="acAsig">
				        ASIGNAR HORARIOS</a>
				      </h4>
				    </div>
				    <div id="collapse1" class="panel-collapse collapse in">
				      <!-- ******************** PANEL BODY********************************-->
				      <div class="panel-body">
				      	<div class="row">
					        <div id="divFrmInvoice" class="col-xs-12 col-sm-10 col-sm-offset-1" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;"> 
					          
					            <fieldset class="scheduler-border">
					              <legend class="scheduler-border">Datos del Medico</legend>
					              
					              <div class="form-group col-xs-6">
					              <label for="txtCedula">C.I.</label>
					              <input type="text" required="true" class="form-control" id="med_ced" name="med_ced" placeholder="Ingrese C.I." maxlength="13" />
					              </div>

					              <div class="form-group col-xs-6">
					              <label for="txtNombre">Medico:</label>
					              <input type="text" required="true" class="form-control" id="med_nom" name="med_nom" placeholder="Apellido Nombre"/>
					              </div>

					              <div class="form-group col-xs-6">
					              <label for="txtEmail">E-mail:</label>
					              <input type="email"  class="form-control" id="med_eml" name="med_eml" placeholder="Ingrese Email"/>
					              </div>

					              <div class="form-group col-xs-6">
					              <label for="txtDireccion">Dirección:</label>
					              <input type="text" required="true" class="form-control" id="med_dir" name="med_dir" placeholder="Ingrese Dirección"/>
					              </div>

					              <div class="form-group col-xs-6">
					              <label for="txtTelefono">Teléfono:</label>
					              <input type="text" class="form-control" id="med_tel" name="med_tel" placeholder="Ingrese Telefono"/>
					              </div>

					              <div class="form-group col-xs-6">
                                    <label for="cmbDispensario">Dispensario:</label>
                                    <select class="form-control" id="dis_cod" name="dis_cod">
                                    </select>
                                  </div>

					            </fieldset>
					            
					            <div class="row">
					              <div align="center">
					              <button class="btn btn-primary btn-large" id="btnAsig" data-target="#modalAsignar" data-toggle="modal">Asignar</button>
					              </div>
					            </div>
					        </div>
					      </div>
				      </div>
				      <!-- ******************** PANEL BODY ********************************-->
				    </div>
				  
				  </div><!-- ******************** PANEL PRIMARY ASIGNAR HORARIOS********************************-->

				  <div class="panel panel-primary">
				    <div class="panel-heading panel-heading-custom">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" id="ltAsig">
				        LISTAR ASIGNACIONES</a>
				      </h4>
				    </div>
				    <div id="collapse2" class="panel-collapse collapse">
				      
				      <div class="panel-body">
				      	<div class="row">
			                <div class="col-md-12">
			                    <table data-order='[[ 1, "asc" ]]' class="table table-hovered table-bordered" cellspacing="0" width="100%" id="tbAsig">
			                        <thead>
			                            <tr>
			                                <th class="text-center">Cedula</th>
			                                <th class="text-center">Medico</th>
			                                <th class="text-center">Especialidad</th>
			                                <th class="text-center">esp_cod</th>
			                                <th class="text-center">med_cod</th>
			                                <th class="text-center">Dispensario</th>
			                                <th class="text-center">Accion</th>
			                            </tr>
			                        </thead>
			                        <tbody id="tblBody" class="text-justify">
			                            
			                        </tbody>

			                    </table>
			                </div>
            			</div>
				      </div>

				    </div>
				  </div>

  
				</div>
              <!-- ************************************* ACORDIONES ****************************-->
       		</div>
       		</div><!-- /#container-fluid -->
    	</div>
  <!-- /#page-content-wrapper -->

<!-- MODAL NUEVA ASIGNACION -->
		<div class="modal fade" id="modalAsignar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            	 <div class="modal-dialog" style="width:400px ;">				
              <div class="modal-content panel panel-primary">

                <div class="modal-header panel panel-heading">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title" id="myModalLabel" style="text-align: center;"></h4>
                </div>
              
                <div class="modal-body">
                	<div class="row">
                		<div class="col-xs-12" id="divCmb">
			  				<label>Especialidad:</label>
  							<select class="form-control input-xs" id="cmbEsp" name="cmbEsp" style="font-size: 12px"> </select>
  						</div> 
                	</div>                	
                </div>
                	
                	<div class="row">
	  					<div class="col-xs-10 col-xs-offset-1" id="divTablaFiltros">
								<div class="panel panel-primary filterable table-responsive">
		            				<div class="panel-heading" >
		                				<h3 class="panel-title" style="text-align: center;">Horario</h3>	                
		            				</div>
				            		<div style="max-height: 200px; 	overflow-y:auto;">
					            		<table class="table text-justified table-hover table-bordered table-condensed col-xs-12" id="tabla" style="text-align: center; font-size: 12px">
								            <thead>						            	
								            	<th class="text-center">Horario</th>
								            	<th class="text-center">Seleccionar</th>
								            </thead>
								            <tbody id="bodyTbAsig">
								            	
								            </tbody>
					            		</table>
				            		</div>
		        				</div>
	    				</div>	  						
	  				</div><!-- final row tabla -->ç

	  				<div class="modal-footer" >
                		<button type="button" class="btn btn-default" data-dismiss="modal" id="btnCancelar">Cancelar</button>
                		<button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
                	</div>

                </div>           
              </div>
              </div>
             </div>
       </div>
 <!--MODAL NUEVA ASIGNACION -->
</body>
</html>
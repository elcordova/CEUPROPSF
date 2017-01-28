<script src="<?php echo base_url()?>static/js/brigada/brigada.js"></script>
		<!-- Page Content -->
	    <div id="page-content-wrapper">
			<!-- CONTAINER FLUID -->
	    	<div class="container-fluid">

	    		<div class="well panel panel-default" style="margin-top:1%;min-height:590px;">
	    			<div class="panel-body">
	    				<div class=""><!--class='nav nav-tabs'-->
	    					<!--<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#sectionA">Brigada</a></li>
								
							</ul>-->
							<div class="tab-content">
								<!-- BRIGADA -->
								<div id="sectionA" class="tab-pane fade in active">
									<br>
									<div class="panel-group" id="accordionBrigada" role="tablist" aria-multiselectable="true">
										<!-- CREAR BRIGADA -->
										<div class="panel panel-primary">
											<div class="panel-heading" role="tab" id="headingSaveBrigada">
									  			<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordionBrigada" href="#collapseSaveBrigada" aria-expanded="true" aria-controls="collapseSaveBrigada">
										  			CREAR BRIGADA
													</a>
									  			</h4>
											</div>

											<div id="collapseSaveBrigada" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSaveBrigada">
												<div class="panel-body">
													<span id="ars"></span>
													<div class="row">
														<div class="col-md-10 col-md-offset-1" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">	
															<div class="col-md-1"></div>
															<div class="col-md-10">
																<form id="frmEvento" class="form-horizontal">
																	<fieldset class="scheduler-border">
																		<div align="center">
																			<legend class="scheduler-border">Nueva Brigada</legend> 
																		</div>
									                                  
																		<div class="form-group">
										                                    <label class="label-control col-sm-2">Responsable: </label>
										                                    <div class="col-sm-4">
										                                    	<input class="form-control" id="bri_res" name="bri_res" style="font-size: 14px" placeholder="Ingrese el Responsable" required="true">
										                                    </div>
										                                </div>
									                                  	<div class="form-group">
										                                    <label for="txtTitulo" class="label-control col-sm-2">Descripción:</label>
										                                    <div class="col-sm-10">
										                                    	<input class="form-control" id="bri_des" name="bri_des" style="font-size: 14px" placeholder="Ingrese alguna descripcion" required="true">
										                                    </div>
									                                  	</div>
									                                  	<div class="form-group">
										                                    <label for="txtDireccion" class="label-control col-sm-2">Dirección:</label>
																			<div class="col-sm-10">
										                                    	<input class="form-control" id="bri_dir" name="bri_dir" style="font-size: 14px" placeholder="Ingrese la Direccion" required="true">
										                                  	</div>
									                                  	</div>
										                                <div class="form-group">
										                                    <label for="txtFecIni" class="label-control col-sm-2">Fecha Inicio:</label>
										                                    <div class="col-sm-4">
										                                    	<input type="date" class="form-control" id="bri_fec_ini" name="bri_fec_ini" style="font-size: 14px" required="true">
										                                  	</div>
										                                  	<label for="txtFecFin" class="label-control col-sm-2">Fecha Fin:</label>
										                                  	<div class="col-sm-4">
										                                  		<input type="date" class="form-control" id="bri_fec_fin" name="bri_fec_fin" style="font-size: 14px" required="true">
										                                  	</div>
										                                </div>
									                                </fieldset>													
																</form>
															</div>
															<!--<div class="col-md-3"></div>-->
															<br>
															<hr>
															<br>
															
                        									<div class="row">
																<br>
																<br>
																<legend class="scheduler-border"></legend>
																<legend class="scheduler-border">Asignación de Médicos</legend>
									                            <button type="button" class="btn btn-primary" id="buttonAddMedico" data-target='#modalMedico' data-toggle='modal' style="border-radius: 8px 8px 8px 8px;">Agregar Medico</button>
									                            <br>
									                            <br>
									                            <div class="col-md-10 col-md-offset-1">
									                                <div class="table-responsive">
									                                <table data-order='[[ 0, "asc" ]]' class="table table-hovered table-bordered" cellspacing="0" width="100%" id="tbMedico">
									                                    <thead>
									                                        <tr>
									                                            
									                                            <th class="text-center">Cedula </th>
									                                            <th class="text-center">Nombre</th>
									                                            <th class="text-center">Apellido</th>
									                                                                                      
									                                            <th class="text-center">Asignar</th>
									                                        </tr>
									                                    </thead>
									                                    <tbody id="tblBodyMedico" class="text-justify">
									                                        
									                                    </tbody>
									                                </table>
									                                </div>
									                            </div>
                        									</div>
                        									<div class="row">
                        										<br>
                        										<br>
                        										<button type="button" class="btn btn-primary btn-large col-md-offset-9" id="btnGuardarBigrada" style="border-radius: 8px 8px 8px 8px;">
                        											<i class="fa fa-save"></i>
                        											GUARDAR BIGRADA
                        										</button>
                        									</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- END CREAR BRIGADA -->
										<!-- LISTAR BRIGADA -->
										<div class="panel panel-primary">
											<div class="panel-heading" role="tab" id="headingListCar">
											 	<h4 class="panel-title">
													<a class="collapsed" id="ltBrigada" data-toggle="collapse" data-parent="#accordionBrigada" href="#collapseListBrigada" aria-expanded="false" aria-controls="collapseListBrigada">
												  	LISTAR BRIGADA
													</a>
											  	</h4>
											</div>
											<div id="collapseListBrigada" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingListCar">
											 	<div class="panel-body">
												
													<div class="row">
														<div class="col-md-10 col-md-offset-1">
															<div class="table-responsive">
															<table data-order='[[ 0, "asc" ]]' class="table table-hovered table-bordered" cellspacing="0" width="100%" id="tbBrigada">
																<thead>
																	<tr>
																		<th class="text-center">Fecha Inicio</th>
																		<th class="text-center">Fecha Fin	</th>
																		<th class="text-center">Responsable	</th>
																		<th class="text-center">Descripción	</th>
																		<th class="text-center">Dirección	</th>
																		<th class="text-center">Acción		</th>
																	</tr>
																</thead>
																<tbody id="tblBodyBrigada" class="text-justify">
                                        
                                    							</tbody>
																
															</table>
															</div>
														</div>
													</div>
											  	</div>
											</div>
										</div>

										<!-- END LISTAR BRIGDADA -->
									</div>
								</div>
								<!-- END BRIGADA -->
						
								<!--Modal Medico-->
								<div class="row">
									<div class="modal fade"  id="modalMedico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog" style="width:400px">
											<div class="modal-content panel panel-primary">
												<div class="modal-header panel panel-heading">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						                            <h4 class="modal-title" id="myModalLabel" style="text-align: center;">NUEVO MÉDICO</h4>
												</div>
												<div class="modal-body">
													<form id="frmMed">
					                                    <!--*************************FORMULARIO*************************** -->
					                                    <fieldset class="scheduler-border">     
					                                      <div class="form-group">
					                                        <label for="txtName">Cédula:</label>
					                                        <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" pattern="[0-9]*" class="form-control" id="med_ced" name="med_ced" placeholder="Ingrese C.I" maxlength="10" required="true">
					                                      </div>
					                                      <div class="form-group">
					                                        <label for="txtName">Nombre:</label>
					                                        <input type="text" class="form-control" id="med_nom" name="med_nom" placeholder="Ingrese Nombre" required="true">
					                                      </div>
					                                      <div class="form-group">
					                                        <label for="txtName">Apellido:</label>
					                                        <input type="text" class="form-control" id="med_ape" name="med_ape" placeholder="Ingrese Apellido" required="true">
					                                      </div>
					                                      <div class="form-group">
					                                        <label for="txtName">Dirección:</label>
					                                        <input type="text" class="form-control" id="med_dir" name="med_dir" placeholder="Ingrese Dirección" required="true">
					                                      </div>
					                                      <div class="form-group">
					                                        <label for="txtName">Teléfono:</label>
					                                        <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" pattern="[0-9]*"  class="form-control" id="med_tel" name="med_tel" placeholder="Ingrese Telefono" maxlength="10" required="true">
					                                      </div>
					                                      <div class="form-group">
					                                        <label for="txtName">Email:</label>
					                                        <input type="email"  class="form-control" id="med_eml" name="med_eml" placeholder="Ingrese Email" required="true">
					                                      </div>
					                                    </fieldset>
					                                </form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						                            <a href="" type="button" class="btn btn-primary" id="btnModalGuardarMedico">Guardar</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--END Modal Medico-->

								<div class="form-group col-xs-12 col-sm-10">
								  	<div id="wait" style="display:none;width:50px;height:50px;position:absolute;top:50%;left:50%;padding:1px;">
		                                <img src="<?=base_url()?>static/images/espera.gif" width="50" height="50" />
		                            </div>
								</div>
								
								<!-- MODAL BRIGADA -->
								<div class="row">
									<div class="modal fade"  id="modalBrigada" tabindex="-1" role="dialog" aria-labelledby="myModalLabelB" aria-hidden="true">
										<div class="modal-dialog" style="width:700px">
											<div class="modal-content panel panel-primary">
												<div class="modal-header panel panel-heading">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						                            <h4 class="modal-title" id="myModalLabel" style="text-align: center;">EDITAR</h4>
												</div>
												<div class="modal-body">
													<div class="col-md-10 col-md-offset-1">
													<form id="frmEvento" class="form-horizontal" style="text-align: center; font-size: 12px">
														<fieldset class="scheduler-border">						                                  
															<div class="form-group">
							                                    <label class="label-control col-sm-2">Responsable: </label>
							                                    <div class="col-sm-4">
							                                    	<input class="form-control" id="bri_res2" name="bri_res2" style="font-size: 14px" placeholder="Ingrese el Responsable" required="true">
							                                    </div>
							                                </div>
						                                  	<div class="form-group">
							                                    <label for="txtTitulo" class="label-control col-sm-2">Descripción:</label>
							                                    <div class="col-sm-10">
							                                    	<input class="form-control" id="bri_des2" name="bri_des2" style="font-size: 14px" placeholder="Ingrese alguna descripcion" required="true">
							                                    </div>
						                                  	</div>
						                                  	<div class="form-group">
							                                    <label for="txtDireccion" class="label-control col-sm-2">Dirección:</label>
																<div class="col-sm-10">
							                                    	<input class="form-control" id="bri_dir2" name="bri_dir2" style="font-size: 14px" placeholder="Ingrese la Direccion" required="true">
							                                  	</div>
						                                  	</div>
							                                <div class="form-group">
							                                    <label for="txtFecIni" class="label-control col-sm-2">Fecha Inicio:</label>
							                                    <div class="col-sm-4">
							                                    	<input type="date" class="form-control" id="bri_fec_ini2" name="bri_fec_ini2" style="font-size: 14px" required="true">
							                                  	</div>
							                                  	<label for="txtFecFin" class="label-control col-sm-2">Fecha Fin:</label>
							                                  	<div class="col-sm-4">
							                                  		<input type="date" class="form-control" id="bri_fec_fin2" name="bri_fec_fin2" style="font-size: 14px" required="true">
							                                  	</div>
							                                </div>
						                                </fieldset>													
													</form>	
													</div>
									  				<div class="row">
														<div class="col-xs-12" id="divTablaFiltros">
															<div class="panel panel-primary filterable table-responsive" style="width:">
									            				<div class="panel-heading" >
									                				<h3 class="panel-title" style="text-align: center;">Médicos</h3>	                
									            				</div>
										            			<div style="max-height: 200px; 	overflow-y:auto;">
									                                <br>
									                                <div class="table-responsive">
										                                <table class="table table-hovered table-bordered" cellspacing="0" width="100%" id="tbMedico2" style="text-align: center; font-size: 12px">
										                                    <thead>
										                                        <tr>
										                                            
										                                            <th class="text-center">Cedula </th>
										                                            <th class="text-center">Nombre</th>
										                                            <th class="text-center">Apellido</th>
										                                                                                      
										                                            <th class="text-center">Asignar</th>
										                                        </tr>
										                                    </thead>
										                                    <tbody id="tblBodyModalMedico" class="text-justify">
										                                        
										                                    </tbody>
										                                </table>
									                                </div>
							                            		</div>

										            		</div>
										            	</div>
							 						</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						                            <a href="" type="button" class="btn btn-primary" id="btnModalGuardarBrigada">Guardar</a>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- END MODAL BRIGADA -->
	
								




								
								<!-- EVENTO -->
								<div id="sectionB" class="tab-pane fade">
									<br>
								</div>
								<!-- END EVENTO -->
							</div>
	    				</div>
	    			</div>
	    			
	    		</div>
	    		
	    	</div>
	    	<!-- END CONTAINER FLUID -->
	    </div>
	    <!-- END Page Content -->
	</body>
</html>
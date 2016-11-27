<script src="<?php echo base_url()?>static/js/brigada/brigada.js"></script>
		<!-- Page Content -->
	    <div id="page-content-wrapper">
			<!-- CONTAINER FLUID -->
	    	<div class="container-fluid">

	    		<div class="well panel panel-default" style="margin-top:1%;min-height:590px;">
	    			<div class="panel-body">
	    				<div class="nav nav-tabs">
	    					<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#sectionA">Brigada</a></li>
								<li><a data-toggle="tab" href="#sectionB">Talleres</a></li>
							</ul>
							<div class="tab-content">
								<!-- BRIGADA -->
								<div id="sectionA" class="tab-pane fade in active">
									<br>
									<div class="panel-group" id="accordionBrigada" role="tablist" aria-multiselectable="true">
										<!-- CREAR SERVICIO -->
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
															<div class="col-md-3"></div>
															<div class="col-md-6">
																<form id="frmEvento">
																	<fieldset class="scheduler-border">
																		<div align="center">
																			<legend class="scheduler-border">Nueva Brigada</legend> 
																		</div>
									                                  <div class="form-group">
									                                    <label for="txtTitulo">Descripicon:</label>
									                                    <input class="form-control" id="bri_des" name="bri_des" style="font-size: 14px" placeholder="Ingrese alguna descripcion" required="true">
									                                  </div>
									                                  <div class="col-md-6">
										                                  <div class="form-group">
										                                    <label for="txtFecIni">Fecha Inicio:</label>
										                                    <input type="date" class="form-control" id="bri_fec_ini" name="bri_fec_ini" style="font-size: 14px" required="true">
										                                  </div>	
									                                  </div>
									                                
									                                  <div class="col-md-6">
									                                  	<div class="form-group">
									                                    	<label for="txtFecFin">Fecha Fin:</label>
									                                    	<input type="date" class="form-control" id="bri_fec_fin" name="bri_fec_fin" style="font-size: 14px" required="true">
									                                  	</div>
									                                  </div>

									                                  <div class="form-group">
									                                    <label for="txtResponsable">Responsable:</label>
									                                    <input class="form-control" id="bri_res" name="bri_res" style="font-size: 14px" placeholder="Ingrese el Responsable" required="true">
									                                  </div>

									                                  <div class="form-group">
									                                    <label for="txtDireccion">Direccion:</label>
									                                    <input class="form-control" id="bri_dir" name="bri_dir" style="font-size: 14px" placeholder="Ingrese el Direccion" required="true">
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
																<legend class="scheduler-border">Asigancion de Pacientes</legend>
									                            <button type="button" class="btn btn-primary " id="buttonAddPaciente" data-target='#modalPaciente' data-toggle='modal' style="border-radius: 10px 10px 10px 10px;">Agregar Paciente</button>
									                            <br>
									                            <br>
									                            <div class="col-md-11">
									                                <div class="">
									                                <table data-order='[[ 2, "asc" ]]' class="table table-bordered"  id="tbPaciente">
									                                    <thead>
									                                        <tr>
									                                            
									                                            <th class="text-center">Cedula </th>
									                                            <th class="text-center">Nombre</th>
									                                            <th class="text-center">Apellido</th>
									                                                                                      
									                                            <th class="text-center">Asignar</th>
									                                        </tr>
									                                    </thead>
									                                    <tbody id="tblBody" class="text-justify">
									                                        
									                                    </tbody>
									                                </table>
									                                </div>
									                            </div>
                        									</div>
                        									<div class="row">
																<br>
																<br>
																<legend class="scheduler-border">Asigancion de Medicos</legend>
									                            <button type="button" class="btn btn-primary" id="buttonAddMedico" data-target='#modalMedico' data-toggle='modal' style="border-radius: 8px 8px 8px 8px;">Agregar Medico</button>
									                            <br>
									                            <br>
									                            <div class="col-md-11">
									                                <div class="table-responsive">
									                                <table data-order='[[ 2, "asc" ]]' class="table table-bordered" cellspacing="" width="100%" id="tbMedico">
									                                    <thead>
									                                        <tr>
									                                            
									                                            <th class="text-center">Cedula </th>
									                                            <th class="text-center">Nombre</th>
									                                            <th class="text-center">Apellido</th>
									                                                                                      
									                                            <th class="text-center">Asignar</th>
									                                        </tr>
									                                    </thead>
									                                    <tbody id="tblBody" class="text-justify">
									                                        
									                                    </tbody>
									                                </table>
									                                </div>
									                            </div>
                        									</div>
                        									<div class="row">
                        										<br>
                        										<br>
                        										<button type="button" class="btn btn-primary btn-large col-md-offset-9" id="btnGuardarBitacora" style="border-radius: 8px 8px 8px 8px;">
                        											<i class="fa fa-save"></i>
                        											
                        											GUARDAR BITACORA
                        										</button>
                        									</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- END CREAR SERVICIO -->
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
														<div class="col-md-8 col-md-offset-2">
															<table data-order='[[ 0, "asc" ]]' class="table table-hovered table-bordered" cellspacing="0" width="100%" id="tbBrigada">
																<thead>
																	<tr>
																		<th class="text-center"> Nombre </th>
																		<th class="text-center">Acción</th>
																	</tr>
																</thead>
																
															</table>
														</div>
													</div>
											  	</div>
											</div>
										</div>

										<!-- END LISTAR BRIGDADA -->
									</div>
								</div>
								<!-- END BRIGADA -->
								<!--Modal Paciente-->
								<div class="row">
						            <div class="modal fade"  id="modalPaciente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						                <div class="modal-dialog" style="width:800px">
						                    <div class="modal-content panel panel-primary">
						                        <div class="modal-header panel panel-heading">
						                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						                            <h4 class="modal-title" id="myModalLabel" style="text-align: center;">NUEVO PACIENTE</h4>
						                        </div>                   
						                        <div class="modal-body" >
						                            <form id="frmPac2" class="form-horizontal">
						                                <div class="form-group">
						                                    <label class="label-control col-sm-2" for="">Cedula:</label>
						                                    <div class="col-sm-4">
						                                        <input type="text" required="true" class="form-control" id="pac_ced2" name="pac_ced2" placeholder="Ingrese C.I" maxlength="10">
						                                    </div>
						                                    <div hidden="hidden">
						                                        <label aria-hidden="hidden" class="label-control col-sm-2" for="">Estado:</label>
						                                        <div class="col-sm-4">
						                                            <input hiden="hiden" type="checkbox" required="true" value="Cat" class="form-control" id="pac_est2" name="pac_est2">
						                                        </div>
						                                    </div>
						                                </div>
						                                <div class="form-group">
						                                    <label class="label-control col-sm-2" for="">Nombre:  </label>
						                                    <div class="col-sm-4">
						                                        <input type="text" required="true" class="form-control" id="pac_nom2" name="pac_nom2" placeholder="Ingrese Nombre"/>
						                                    </div>
						                                    <label class="label-control col-sm-2" for="">Apellido:</label>
						                                    <div class="col-sm-4">
						                                        <input type="text" required="true" class="form-control" id="pac_ape2" name="pac_ape2" placeholder="Ingrese Apellido"/>
						                                    </div>
						                                </div>
						                                <div class="form-group">
						                                    <label class="label-control col-sm-2" for="">Fecha Nacimiento:</label>
						                                    <div class="col-sm-4">
						                                        <input type="date" required="true" class="input-field col s4 form-control" id="pac_fec_nac2" name="pac_fec_nac2"/>
						                                    </div>
						                                    <label class="label-control col-sm-2" for="">Sexo:</label>
						                                    <div class="col-sm-4">
						                                        <select id="pac_sex2" class="input-field col s12 form-control" name="pac_sex2" required="true">
						                                            <option value="" disabled selected>------</option>
						                                            <option value="Masculino">Masculino</option>
						                                            <option value="Femenino">Femenino</option>
						                                        </select>
						                                    </div>
						                                </div>
						                                <div class="form-group">
						                                    <label class="label-control col-sm-2" for="">Direccion:</label>
						                                    <div class="col-sm-10">
						                                        <input type="text"  class="form-control" id="pac_dir2" name="pac_dir2" placeholder="Ingrese la direccion.." required="true"/>
						                                    </div>
						                                </div>
						                                <div class="form-group">
						                                    <label class="label-control col-sm-2" for="">Email:</label>
						                                    <div class="col-sm-10">
						                                        <input type="email"  class="form-control" id="pac_cor2" name="pac_cor2" placeholder="Ingrese el email.. " required="true"/>
						                                    </div>
						                                </div> 
						                                <div class="form-group">
						                                    <label class="label-control col-sm-2" for="">Tipo Sangre:</label>
						                                    <div class="col-sm-4">
						                                        <select id="pac_tip_san2" class="input-field col s12 form-control" name="pac_tip_san2" required="true">
						                                            <option value="" disabled selected>------</option>
						                                            <option value="AB">AB</option>
						                                            <option value="AB-">AB-</option>
						                                            <option value="A">A</option>
						                                            <option value="A-">A-</option>
						                                            <option value="B">B</option>
						                                            <option value="B-">B-</option>
						                                            <option value="O">O</option>
						                                            <option value="O-">O-</option>
						                                        </select>
						                                    </div>
						                                    <label class="label-control col-sm-2" for="">Estado Civil:</label>
						                                    <div class="col-sm-4">
						                                        <select id="pac_est_civ2" class="input-field col s12 form-control" name="pac_est_civ2" required="true">
						                                            <option value="" disabled selected>------</option>
						                                            <option value="Soltero">Soltero</option>
						                                            <option value="Comprometido">Comprometido</option>
						                                            <option value="Casado">Casado</option>
						                                            <option value="Divorciado">Divorciado</option>
						                                            <option value="Viudo">Viudo</option>
						                                        </select>
						                                    </div>
						                                </div>
						                            </form>
						                        </div>           
						                        <div class="modal-footer">
						                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						                            <a href="" type="button" class="btn btn-primary" id="btnModalGuardarPaciente">Guardar</a>
						                        </div>                
						                    </div>
						                 </div>
						            </div>    
						        </div> 
								<!--END Modal Paciente-->
								<!--Modal Medico-->
								<div class="row">
									<div class="modal fade"  id="modalMedico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog" style="width:400px">
											<div class="modal-content panel panel-primary">
												<div class="modal-header panel panel-heading">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						                            <h4 class="modal-title" id="myModalLabel" style="text-align: center;">NUEVO MEDICO</h4>
												</div>
												<div class="modal-body">
													<form id="frmMed">
					                                    <!--*************************FORMULARIO*************************** -->
					                                    <fieldset class="scheduler-border">     
					                                      <div class="form-group">
					                                        <label for="txtName">Cedula:</label>
					                                        <input type="text" required="true" class="form-control" id="med_ced" name="med_ced" placeholder="Ingrese C.I" maxlength="10"/>
					                                      </div>
					                                      <div class="form-group">
					                                        <label for="txtName">Nombre:</label>
					                                        <input type="text" required="true" class="form-control" id="med_nom" name="med_nom" placeholder="Ingrese Nombre"/>
					                                      </div>
					                                      <div class="form-group">
					                                        <label for="txtName">Apellido:</label>
					                                        <input type="text" required="true" class="form-control" id="med_ape" name="med_ape" placeholder="Ingrese Apellido"/>
					                                      </div>
					                                      <div class="form-group">
					                                        <label for="txtName">Dirección:</label>
					                                        <input type="text" required="true" class="form-control" id="med_dir" name="med_dir" placeholder="Ingrese Dirección"/>
					                                      </div>
					                                      <div class="form-group">
					                                        <label for="txtName">Telefono:</label>
					                                        <input type="text"  class="form-control" id="med_tel" name="med_tel" placeholder="Ingrese Telefono" maxlength="10" />
					                                      </div>
					                                      <div class="form-group">
					                                        <label for="txtName">Email:</label>
					                                        <input type="email"  class="form-control" id="med_eml" name="med_eml" placeholder="Ingrese Email"/>
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
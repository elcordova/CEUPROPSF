<script src="<?php echo base_url()?>static/js/user/evento.js"></script>
		<!-- PAGE CONTENT WRAPPER -->
		<div id="page-content-wrapper">
			<!-- CONTAINER FLUID -->
			<div class="container-fluid">
				<div class="well panel panel-default" style="margin-top:1%;min-height:590px;">
				  <div class="panel-body">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#sectionA">Evento</a></li>
						<li><a data-toggle="tab" href="#sectionB">Talleres</a></li>
					</ul>
					<div class="tab-content">
						
						<!-- EVENTO -->
						<div id="sectionA" class="tab-pane fade in active">
							<br>
							<div class="panel-group" id="accordionEvento" role="tablist" aria-multiselectable="true">
							  
							  <!-- CREAR SERVICIO -->
							  <div class="panel panel-primary">
								<div class="panel-heading" role="tab" id="headingSaveEvento">
								  <h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordionEvento" href="#collapseSaveEvento" aria-expanded="true" aria-controls="collapseSaveEvento">
									  CREAR EVENTO
									</a>
								  </h4>
								</div>
								<div id="collapseSaveEvento" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSaveEvento">
									<div class="panel-body">
										<span id="ars"></span>
										<div class="row">
											<div class="col-md-8 col-md-offset-2" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">	
												<form id="frmEvento">
													<fieldset class="scheduler-border">
					                                  <legend class="scheduler-border">Nuevo Evento</legend>         
					                                  
					                                  <div class="form-group">
					                                    <label for="txtTitulo">Titulo:</label>
					                                    <input class="form-control" id="eve_tit" name="eve_tit" style="font-size: 14px" placeholder="Ingrese el Titulo">
					                                  </div>
					                                  
					                                  <div class="col-md-6">
						                                  <div class="form-group">
						                                    <label for="txtFecIni">Fecha Inicio:</label>
						                                    <input type="date" class="form-control" id="eve_fec_ini" name="eve_fec_ini" style="font-size: 14px">
						                                  </div>	
					                                  </div>
					                                  
					                                  <div class="col-md-6">
					                                  	<div class="form-group">
					                                    	<label for="txtFecFin">Fecha Fin:</label>
					                                    	<input type="date" class="form-control" id="eve_fec_fin" name="eve_fec_fin" style="font-size: 14px">
					                                  	</div>
					                                  </div>

					                                  <div class="form-group">
					                                    <label for="txtResponsable">Responsable:</label>
					                                    <input class="form-control" id="eve_resp" name="eve_resp" style="font-size: 14px" placeholder="Ingrese el Responsable">
					                                  </div>

					                                  <div class="form-group">
					                                    <label for="txtDireccion">Direccion:</label>
					                                    <input class="form-control" id="eve_dir" name="eve_dir" style="font-size: 14px" placeholder="Ingrese el Direccion">
					                                  </div>

					                                  <div class="form-group">
					                                  	<label for="txtNoticia">Noticia:</label>
					                                  	<input class="form-control" type="text" list="countries" />
					                                  	<datalist id="countries">
															<option value="Noticia # 1">
															<option value="Noticia # 2">
															<option value="Noticia # 3">
															<option value="Noticia # 4">
															<option value="Noticia # 5">
														</datalist>
					                                  </div>

					                                  <div class="row">
														  <div align="center">
															<button type="submit" class="btn btn-primary btn-large">Guardar</button>
														  </div>
													  </div>

					                                </fieldset>													
												</form>
											</div>
										</div>
									</div>
								</div>
								
							  </div>
							  <!-- END CREAR SERVICIO -->
							  
							  <!-- LISTAR SERVICIO -->
							  <div class="panel panel-primary">
								<div class="panel-heading" role="tab" id="headingListCar">
								  <h4 class="panel-title">
									<a class="collapsed" id="ltService" data-toggle="collapse" data-parent="#accordionEvento" href="#collapseListService" aria-expanded="false" aria-controls="collapseListService">
									  LISTAR EVENTO
									</a>
								  </h4>
								</div>
								<div id="collapseListService" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingListCar">
								  <div class="panel-body">
									
									<div class="row">
										<div class="col-md-8 col-md-offset-2">
											<table data-order='[[ 0, "asc" ]]' class="table table-hovered table-bordered" cellspacing="0" width="100%" id="tbService">
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
							  <!-- END LISTAR SERVICIO -->
							</div>
						</div>
						<!-- Modal Evento -->
						<div id="servicioModal" class="modal fade">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h4 class="modal-title">Editar Servicio</h4>
									</div>
									<form role="form" id='frmMdServicio'>
										<div class="modal-body">		
											<span id="spIdServicio"></span>
											<div class="form-group">
												<label for="txtNameServicioEdit">Nombre:</label>
												<input type="text" class="form-control" id="txtNameServicioEdit" name="txtNameServicioEdit" placeholder="Ingrese Nombre">
											</div>
											<fieldset class="scheduler-border">
											<legend class="scheduler-border">Detalle de trabajo</legend>
												<div id="edit_contenedor_servicios" name="edit_cotenedor_servicios">
													<!--carga dinamica por ajax-->
												</div>
											</fieldset>
											<fieldset class="scheduler-border">
											<legend class="scheduler-border">Precios</legend>
												<div>
													<?php
														if ( ! empty($categorias))
														{
															$contador=1;
															$artId="";
															$separador="";
															foreach ($categorias as $key => $value) 
															{
																$class=$contador%3==0?"":"borderRight";
																echo "<div class='form-group col-md-4 ".$class."'>
																<label for='editprc".$value['cat_id']."'>".$value['cat_nom']."</label>
																<input type='number' step='0.01' class='form-control' id='editprc".$value['cat_id']."' name='editprc".$value['cat_id']."' value='0.00' >
																</div>";
																$contador++;
																$artId=$artId.$separador.$value['cat_id'];
																$separador=",";
															}
															echo "<span id='ctg' data-toggle=\"".$artId."\"></span>";
														}
														else
														{
															echo "<a class='btn btn-info' role='button' href='".base_url()."car/start'>No cuentas con ninguna categoría disponible. ¡Crealos!</a>";
														}
													?>
												</div>
											</fieldset>
											</div>
									
										<div class="modal-footer">
											<div class="row">
												<div align="center" id="buttonsActionEdit">
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- End Modal Evento -->
						<!-- END EVENTO -->
						
						<!-- AREAS DE TRABAJO -->
						<div id="sectionB" class="tab-pane fade">
							<br>
							<div class="panel-group" id="accordionMarks" role="tablist" aria-multiselectable="true">
							  
							  <!-- CREAR MARCA -->
							  <div class="panel panel-primary">
								<div class="panel-heading" role="tab" id="headingSaveMark">
								  <h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordionMarks" href="#collapseSaveMark" aria-expanded="true" aria-controls="collapseSaveMark">
									  CREAR TALLER
									</a>
								  </h4>
								</div>
								<div id="collapseSaveMark" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSaveMark">
									<div class="panel-body">
										<div class="row">
											<div id="divFrmAreaTrab" class="col-md-6 col-md-offset-3" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">	
												<form id="frmTaller">
												  <fieldset class="scheduler-border">
					                                  <legend class="scheduler-border">Nuevo Taller</legend>         
					                                  
					                                  <div class="form-group">
					                                    <label for="txtTema">Tema:</label>
					                                    <input class="form-control" id="tal_tem" name="tal_tem" style="font-size: 14px" placeholder="Ingrese el Tema">
					                                  </div>
					                                  
					                                  <label for="txtFec">Fecha:</label>
					                                  <div class="col-md-12">
						                                  <div class="form-group">
						                                    
						                                    <input type="date" class="form-control" id="tal_fec" name="tal_fec" style="font-size: 14px">
						                                  </div>	
					                                  </div>
					                                  
					                                  
					                                  <div class="form-group">
					                                    <label for="txtDescripcion">Descripcion:</label>
					                                    <textarea class="form-control" rows="5" id="tal_des" name="tal_des"></textarea>
					                                  </div>

					                                  <div class="form-group">
					                                  	<label for="txtEvento">Evento:</label>
					                                  	<input class="form-control" type="text" list="eventos" />
					                                  	<datalist id="eventos">
															<option value="Evento # 1">
															<option value="Evento # 2">
															<option value="Evento # 3">
															<option value="Evento # 4">
															<option value="Evento # 5">
														</datalist>
					                                  </div>

					                                  <div class="row">
														  <div align="center">
															<button type="submit" class="btn btn-primary btn-large">Guardar</button>
														  </div>
													  </div>

					                                </fieldset>	
												</form>
											</div>
										</div>
									</div>
								</div>
								
							  </div>
							  <!-- END CREAR AREA DE TRABAJO -->
							  
							  <!-- LISTAR AREA DE TRABAJO -->
							  <div class="panel panel-primary">
								<div class="panel-heading" role="tab" id="headingListMarks">
								  <h4 class="panel-title">
									<a class="collapsed" id="ltArea" data-toggle="collapse" data-parent="#accordionMarks" href="#collapseListMarks" aria-expanded="false" aria-controls="collapseListMarks">
									  LISTAR TALLER
									</a>
								  </h4>
								</div>
								<div id="collapseListMarks" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingListMarks">
								  <div class="panel-body">
									
									<div class="row">
										<div class="col-md-8 col-md-offset-2">
											<table data-order='[[ 0, "asc" ]]' class="table table-hovered table-bordered" cellspacing="0" width="100%" id="tbAreaTrab">
												<thead>
													<tr>
														<th class="text-center"> Nombre </th>
														<th class="text-center"> Disponible </th>
														<th class="text-center">Acción</th>
													</tr>
												</thead>
												
											</table>
										</div>
									</div>

								  </div>
								</div>
							  </div>
							  <!-- END LISTAR AREA DE TRABAJO -->
							</div>
								
						</div>
						
						<!-- Modal AREA DE TRABAJO HTML -->
						<div id="areaModal" class="modal fade">
							<div class="modal-dialog modal-sm">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h4 class="modal-title">Editar Detalle de Trabajo</h4>
									</div>
									<form role="form" id='frmMdArea'>
										<div class="modal-body">		
											<span id="spIdArea"></span>
											<div class="form-group">
												<label for="txtNameAreaEdit">Nombre:</label>
												<input type="text" class="form-control" id="txtNameAreaEdit" name="txtNameAreaEdit" placeholder="Ingrese Nombre">
											</div>
											<div class="form-group">
												<label for="chkEstEdit">Disponible:</label>
												<input type="checkbox" class="form-control" id="chkEstEdit" name="chkEstEdit" value="true" style="display:table-cell; height:auto; width:auto;">
											</div>
											</div>
									
										<div class="modal-footer">
											<div class="row">
												<div align="center">
													<button type="button" class="button button-3d button-rounded" data-dismiss="modal">Cancelar</button>
													<button type="submit"  class="button button-3d-primary button-rounded">Guardar</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- End Modal HTML -->
						<!-- END AREA DE TRABAJO -->
					</div>
				  </div>
				</div>
				
			</div>
			<!-- END CONTAINER FLUID -->
		</div>
		<!-- END PAGE CONTENT WRAPPER -->
	</body>
</html>


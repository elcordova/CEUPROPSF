<script src="<?php echo base_url()?>static/js/select2.min.js"></script>
<link href="<?php echo base_url()?>static/css/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url()?>static/js/evento/evento.js"></script>
<script src="<?php echo base_url()?>static/js/taller/taller.js"></script>
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

							  <!-- CREAR EVENTO -->
							  <div class="panel panel-primary">
								<div class="panel-heading" role="tab" id="headingSaveEvento">
								  <h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordionEvento" href="#collapseSaveEvento" aria-expanded="true" aria-controls="collapseSaveEvento">
									  <i class="fa fa-dedent">  </i><span class="nav-label"> CREAR EVENTO</span>
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
					                                  <legend class="scheduler-border"><i class="fa fa-dedent">  </i><span class="nav-label"> Nuevo Evento</span></legend>

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
					                                    <input class="form-control" id="eve_res" name="eve_res" style="font-size: 14px" placeholder="Ingrese el Responsable">
					                                  </div>

					                                  <div class="form-group">
					                                    <label for="txtDireccion">Direccion:</label>
					                                    <input class="form-control" id="eve_dir" name="eve_dir" style="font-size: 14px" placeholder="Ingrese el Direccion">
					                                  </div>

					                                  <div class="form-group">
					                                  	<label for="txtNoticia">Noticia:</label>
					                                  	<select class="form-control" name="noticia" id="noticia">
					                                  	</select>
					                                  </div>

					                                  <div class="row">
														<div align="center">
														<button type="submit" class="btn btn-primary btn-large"> <i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></button>
														</div>
													  </div>
					                    </fieldset>
												</form>
											</div>

										</div>
									</div>
								</div>

							  </div>
							  <!-- END CREAR EVENTO -->

							  <!-- LISTAR EVENTO -->
							  <div class="panel panel-primary">
								<div class="panel-heading" role="tab" id="headingListCar">
								  <h4 class="panel-title">
									<a class="collapsed" id="ltEvento" data-toggle="collapse" data-parent="#accordionEvento" href="#collapseListService" aria-expanded="false" aria-controls="collapseListService">
									  <i class="fa fa-th-list">  </i><span class="nav-label">LISTAR EVENTO</span>
									</a>
								  </h4>
								</div>
								<div id="collapseListService" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingListCar">
								  <div class="panel-body">

									<div class="row">
										<div class="col-md-12">
											<table data-order='[[ 0, "asc" ]]' class="table table-hovered table-bordered" cellspacing="0" width="100%" id="tbEvento">
												<thead>
													<tr>
														<th class="text-center"> Fecha </th>
														<th class="text-center"> Titulo</th>
														<th class="text-center"> Direccion</th>
														<th class="text-center"> Responsable</th>
														<th class="text-center"> Accion</th>
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
						<div id="eventoModal" class="modal fade">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h4 class="modal-title"><i class="fa fa-pencil-square-o">  </i><span class="nav-label"> Editar Evento</span></h4>
									</div>
									<form role="form" id='frmMdEvento'>
										<div class="modal-body">
											<input type="hidden" name="eve_id_edt" id="eve_id_edt" value="">

											<div class="form-group">
												<label for="txtName">Titulo:</label>
												<input type="text" class="form-control" id="eve_tit_edt" name="eve_tit_edt" placeholder="Ingrese el Titulo">
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label for="txtFecIni">Fecha Inicio:</label>
													<input type="date" class="form-control" id="eve_fec_ini_edt" name="eve_fec_ini_edt" style="font-size: 14px">
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label for="txtFecFin">Fecha Fin:</label>
													<input type="date" class="form-control" id="eve_fec_fin_edt" name="eve_fec_fin_edt" style="font-size: 14px">
												</div>
											</div>

											<div class="form-group">
												<label for="txtResponsable">Responsable:</label>
												<input class="form-control" id="eve_res_edt" name="eve_res_edt" style="font-size: 14px" placeholder="Ingrese el Responsable">
											</div>

											<div class="form-group">
												<label for="txtDireccion">Direccion:</label>
												<input class="form-control" id="eve_dir_edt" name="eve_dir_edt" style="font-size: 14px" placeholder="Ingrese el Direccion">
											</div>

											<div class="form-group">
												<label for="txtNoticiaEdt">Noticia:</label>
												<select class="form-control" name="noticia_edt" id="noticia_edt">

												</select>
											</div>

											<div class="row">
												<div align="center">
												<button type="submit" class="btn btn-primary btn-large"><i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></button>
												</div>
											</div>
											
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
									  <i class="fa fa-qrcode">  </i><span class="nav-label"> CREAR TALLER</span>
									</a>
								  </h4>
								</div>
								<div id="collapseSaveMark" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSaveMark">
									<div class="panel-body">
										<div class="row">
											<div id="divFrmAreaTrab" class="col-md-6 col-md-offset-3" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">
												<form id="frmTaller">
												  <fieldset class="scheduler-border">
					                                  <legend class="scheduler-border"><i class="fa fa-qrcode">  </i><span class="nav-label"> Nuevo Taller</span></legend>

					                                  <div class="form-group">
					                                    <label for="txtTema">Tema:</label>
					                                    <input class="form-control" id="tal_tem" name="tal_tem" style="font-size: 14px" placeholder="Ingrese el Tema" required>
					                                  </div>

					                                  
					                                  <div class="form-group">
						                                  <div class="">
						                                  	<label for="txtFec">Fecha:</label>
						                                    <input type="date" class="form-control" id="tal_fec" name="tal_fec" style="font-size: 14px" required>
						                                  </div>
					                                  </div>


					                                  <div class="form-group">
					                                    <label for="txtDescripcion">Descripcion:</label>
					                                    <textarea class="form-control" rows="3" id="tal_des" name="tal_des" required></textarea>
					                                  </div>

					                                  
													
													<div class="form-group">
														<label for="txtEvento">Evento:</label>
														<select class="form-control" name="evento" id="evento" required></select>
													</div>

													
													<div class="form-group">
														
														<span class="btn btn-success fileinput-button">
													        <i class="glyphicon glyphicon-plus"></i>
													        <span>Select files...</span>
													        <!-- The file input field used as target for the file upload widget -->
													        <input name="archivo[]" type="file" multiple="multiple" id="archivo" />
													    </span>
													</div>
													<!-- The global progress bar -->
													<div id="progress" class="progress">
														<div id="myBar" class="progress-bar progress-bar-success"></div>
													</div>
													<!-- The container for the uploaded files -->
													<br>
													<div id="files" class="files"></div>
													<br>
					                                  <div class="row">
														  <div align="center">
															<button type="submit" class="btn btn-primary btn-large"><i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></button>
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
									<a class="collapsed" id="ltTaller" data-toggle="collapse" data-parent="#accordionMarks" href="#collapseListMarks" aria-expanded="false" aria-controls="collapseListMarks">
									 <i class="fa fa-th-list">  </i><span class="nav-label"> LISTAR TALLER</span>
									</a>
								  </h4>
								</div>
								<div id="collapseListMarks" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingListMarks">
								  <div class="panel-body">

									<div class="row">
										<div class="col-md-10 col-md-offset-1">
											<table data-order='[[ 0, "asc" ]]' class="table table-hovered table-bordered" cellspacing="0" width="100%" id="tbTaller">
												<thead>
													<tr>
														<th class="text-center"> Fecha  </th>
														<th class="text-center"> Titulo </th>
														<th class="text-center"> Evento </th>
														<th class="text-center"> Accion </th>
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
						<div id="tallerModal" class="modal fade">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h4 class="modal-title"><i class="fa fa-pencil-square-o">  </i><span class="nav-label"> Editar Taller</span></h4>
									</div>
									<form role="form" id='frmMdTaller'>
										<div class="modal-body">
											
											<input type="hidden" name="mtal_id" id="mtal_id" value="">

											<div class="form-group">
												<label for="mtxtNameAreaEdit">Titulo:</label>
												<input type="text" class="form-control" id="mtal_tem" name="mtal_tem" placeholder="Ingrese Titulo">
											</div>

											<label for="mtxtFec">Fecha:</label>
			                                  <div class="col-md-12">
				                                  <div class="form-group">
				                                    <input type="date" class="form-control" id=" mtal_fec" name=" mtal_fec" style="font-size: 14px">
				                                  </div>
			                                  </div>


			                                  <div class="form-group">
			                                    <label for="mtxtDescripcion">Descripcion:</label>
			                                    <textarea class="form-control" rows="3" id=" mtal_des" name=" mtal_des"></textarea>
			                                  </div>

			                                  
											<label for="mtxtEvento">Evento:</label>
											<div class="col-md-12">
												<div class="form-group">
													<select class="" name="mevento" id="mevento"></select>
												</div>
											</div>

											
											</div>

										<div class="modal-footer">
											<div class="row">
												<div align="center">
													<button type="button" class="button button-3d button-rounded" data-dismiss="modal"><i class="fa fa-ban">  </i><span class="nav-label"> Cancelar</span></button>
													<button type="submit"  class="button button-3d-primary button-rounded"><i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></button>
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

		<!-- The template to display files available for upload -->
		
	</body>
</html>

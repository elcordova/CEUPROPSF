<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
<script type="text/javascript" src="<?=base_url()?>static/js/consultas/somatico_general.js"></script>
<div class="modal fade" id="modal_sg">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">Examen Somatico General</h4>
					</div>
					<form>
					<div class="modal-body">
						<div class="panel-body">
                     		<div class="row">
														
											
												<input type="text" class="form-control hidden" id="id_consulta" name="id_noticia">
												<input type="text" class="form-control hidden" id="sg_id" name="sg_id">
												
												<div class="form-group">
													<label for="sg_apariencia">Apariencia :</label>
													<input type="text" class="form-control" id="sg_apariencia" name="sg_apariencia">
												</div>


												
												<div class="form-group">
													<label for="sg_facie">Facie :</label>
													<input type="text" class="form-control" id="sg_facie" name="sg_facie">
												</div>


												<div class="form-group">
													<label for="sg_biotipo">Biotipo :</label>
													<input type="text" class="form-control" id="sg_biotipo" name="sg_biotipo">
												</div>


												<div class="form-group">
													<label for="sg_en">Estado Nutricional :</label>
													<input type="text" class="form-control" id="sg_en" name="sg_en">
												</div>


												<div class="form-group">
													<label for="sg_actitud">Actitud :</label>
													<input type="text" class="form-control" id="sg_actitud" name="sg_actitud">
												</div>
												
												
												<div class="form-group">
													<label for="sg_deambula">Deambula:</label>
													<input type="text" class="form-control" id="sg_deambula" name="sg_deambula">
												</div>

												<div class="form-group">
													<label for="sg_ap">Actividad Psicomotriz :</label>
													<input type="text" class="form-control" id="sg_ap" name="sg_ap">
												</div>

												<div class="form-group">
													<label for="sg_piel">Piel :</label>
													<input type="text" class="form-control" id="sg_piel" name="sg_piel">
												</div>

												
												<div class="form-group">
													<label for="sg_unias">Uñas :</label>
													<input type="text" class="form-control" id="sg_unias" name="sg_unias">
												</div>



												<div class="form-group">
													<label for="sg_pelo">Pelo :</label>
													<input type="text" class="form-control" id="sg_pelo" name="sg_pelo">
												</div>


												


									</div>
								</div>
							</div>
					<div class="modal-footer">
													<button id="btn_guardar_sg" type="button" value="Guardar" class="btn btn-lg  btn-primary "><i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></button>
													<button id="btn_cancelar" value="Cancelar" name='cancelar' data-dismiss="modal"  class="btn  btn-primary btn-lg "> <i class="fa fa-ban">  </i><span class="nav-label"> Cancelar</span></button>
					</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
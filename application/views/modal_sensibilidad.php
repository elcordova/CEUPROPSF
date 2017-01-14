<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
<script type="text/javascript" src="<?=base_url()?>static/js/consultas/sensibilidad.js"></script>
<div class="modal fade" id="modal_sensibilidad">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">Sensibilidad</h4>
					</div>
					<form>
					<div class="modal-body">
						<div class="panel-body">
                     		<div class="row">
														
												<input type="text" class="form-control hidden" id="id_consulta" name="id_noticia">
												<input type="text" class="form-control hidden" id="sensibilidad_id" name="reflejos_id">
												
												<div class="form-group">
													<label for="ref_bicipital">Tactil: </label>
													<input type="text" class="form-control" id="sen_tactil" name="ref_bicipital">
												</div>

												<div class="form-group">
													<label for="ref_tricipital">Térmica: </label>
													<input type="text" class="form-control" id="sen_termica" name="ref_tricipital">
												</div>

												
												<div class="form-group">
													<label for="ref_bicipital">Dolorosa: </label>
													<input type="text" class="form-control" id="sen_dolorosa" name="ref_bicipital">
												</div>


												<div class="form-group">
													<label for="ref_bicipital">Palestesia: </label>
													<input type="text" class="form-control" id="sen_palestesia" name="ref_bicipital">
												</div>


												<div class="form-group">
													<label for="ref_bicipital">Batiestesia: </label>
													<input type="text" class="form-control" id="sen_batiestesia" name="ref_bicipital">
												</div>


												<div class="form-group">
													<label for="ref_bicipital">barognosia: </label>
													<input type="text" class="form-control" id="sen_barognosia" name="ref_bicipital">
												</div>


												<div class="form-group">
													<label for="ref_bicipital">Taxia: </label>
													<input type="text" class="form-control" id="sen_taxia" name="ref_bicipital">
												</div>


												<div class="form-group">
													<label for="ref_bicipital">Praxia: </label>
													<input type="text" class="form-control" id="sen_praxia" name="ref_bicipital">
												</div>

									</div>
								</div>
							</div>
					<div class="modal-footer">
													<button id="btn_guardar_sensibilidad" type="button" value="Guardar" class="btn btn-lg  btn-primary "><i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></button>
													<button id="btn_cancelar_eg" value="Cancelar" name='cancelar' data-dismiss="modal"  class="btn  btn-primary btn-lg "> <i class="fa fa-ban">  </i><span class="nav-label"> Cancelar</span></button>
					</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
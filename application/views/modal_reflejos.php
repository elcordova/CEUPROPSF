<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
<script type="text/javascript" src="<?=base_url()?>static/js/consultas/reflejos.js"></script>
<div class="modal fade" id="modal_reflejos">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">Escala de Glasgow</h4>
					</div>
					<form>
					<div class="modal-body">
						<div class="panel-body">
                     		<div class="row">
														
												<input type="text" class="form-control hidden" id="id_consulta" name="id_noticia">
												<input type="text" class="form-control hidden" id="reflejos_id" name="reflejos_id">
												
												<div class="form-group">
													<label for="ref_bicipital">Bicipital: </label>
													<input type="text" class="form-control" id="ref_bicipital" name="ref_bicipital">
												</div>

												<div class="form-group">
													<label for="ref_tricipital">Tricipital: </label>
													<input type="text" class="form-control" id="ref_tricipital" name="ref_tricipital">
												</div>

												<div class="form-group">
													<label for="ref_rotuliano">Rotuliano: </label>
													<input type="text" class="form-control" id="ref_rotuliano" name="ref_rotuliano">
												</div>

									</div>
								</div>
							</div>
					<div class="modal-footer">
													<button id="btn_guardar_reflejos" type="button" value="Guardar" class="btn btn-lg  btn-primary "><i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></button>
													<button id="btn_cancelar_eg" value="Cancelar" name='cancelar' data-dismiss="modal"  class="btn  btn-primary btn-lg "> <i class="fa fa-ban">  </i><span class="nav-label"> Cancelar</span></button>
					</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->